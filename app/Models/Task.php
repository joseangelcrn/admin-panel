<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $fillable=[
        'title',
        'description',
        'active'
    ];

    /**
     * relations
     */

     public function users()
     {
        return $this->belongsToMany(User::class,'tasks_x_users')->withTimestamps()->withPivot('finish_date');
     }

     /**
      * Functions
      */

      //static

      public static function getNotAssigned()
      {
          $tasks = self::whereDoesntHave('users')->get();
          return $tasks;
      }

      public static function getNotAssignedAndActive()
      {
          $tasks = self::whereDoesntHave('users')->where('active',true)->get();
          return $tasks;
      }

      public static function getAssignedAndActive()
      {
          $tasks = self::whereHas('users')->where('active',true)->get();
          return $tasks;
      }

    /**
     * Return all tasks with, at least, 1 uncomplete assigned user task
     */
      public static function getIncompleteAndActive()
      {
        $incompletedTasks = collect();

        $tasks = self::getAssignedAndActive();

        foreach ($tasks as $task) {
            if ($task->hasIncompleteWorks()) {
                $incompletedTasks->push($task);
            }
        }

        return $incompletedTasks;
      }

      public static function getCompletedAndActive()
      {
        $completedTasks = collect();

        $tasks = self::getAssignedAndActive();

        foreach ($tasks as $task) {
            if (!$task->hasIncompleteWorks()) {
                $completedTasks->push($task);
            }
        }

        return $completedTasks;
      }

      public static function getNotAttachedTaskToUser($userId)
      {
        $tasks = self::whereDoesntHave('users')
        ->orwhereHas('users',function($q) use($userId){
            $q->where('user_id','!=',$userId);
        })
        ->get();

        return $tasks;
      }

      public static function getGlobalInfo()
      {
        $info = array();

        $info['task_total'] = self::all()->count();
        $info['task_assigned'] = self::getAssignedAndActive()->count();
        $info['task_not_assigned'] = self::getNotAssignedAndActive()->count();
        $info['task_enabled'] = self::where('active',true)->get()->count();
        $info['task_disabled'] = self::where('active',false)->get()->count();
        $info['task_completed'] = self::getCompletedAndActive()->count();
        $info['task_incompleted'] = self::getIncompleteAndActive()->count();

        return $info;
      }

      //-----------------

      /**
       * Return true if task has some asigned user to it with incompleted works
       */

      public function hasIncompleteWorks()
      {
        return  $this->users()->wherePivotNull('finish_date')->exists();
      }

      //Function to complete some task by user
      public function completeByUser($userId)
      {
        $user = User::findOrFail($userId);
        $updated = $this->users()->updateExistingPivot($user,['finish_date'=>Carbon::now(),],false);

        if ($updated) {
            return true;
        }
        return false;
    }

      public function assignUser($userIds,$dettachFirst = false)
      {
        if ($dettachFirst) {
            $this->users()->detach();
        }
        $this->users()->syncWithOutDetaching($userIds);
      }

      public function activate()
      {
        return $this->update(['active'=>true]);
      }

      public function deactivate()
      {
        return $this->update(['active'=>false]);
      }
}
