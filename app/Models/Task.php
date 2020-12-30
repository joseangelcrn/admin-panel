<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

class Task extends Model
{
    use HasFactory;

    public const RULES = [
        'title' => 'required|min:2|max:255',
        'description' => 'required',
    ];

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

        $task_total = self::all()->count();
        $task_assigned = self::getAssignedAndActive()->count();
        $task_not_assigned = self::getNotAssignedAndActive()->count();
        $task_enabled = self::where('active',true)->get()->count();
        $task_disabled = self::where('active',false)->get()->count();
        $task_completed = self::getCompletedAndActive()->count();
        $task_incompleted = self::getIncompleteAndActive()->count();


        //n_pc = percentage
        $task_assigned_pc = $task_assigned/$task_total * 100;
        $task_not_assigned_pc = $task_not_assigned/$task_total * 100;
        $task_enabled_pc = $task_enabled/$task_total * 100;
        $task_disabled_pc = $task_disabled/$task_total * 100;

        if ($task_assigned != 0) {
            $task_completed_pc = number_format($task_completed/$task_assigned,2) * 100;
            $task_incompleted_pc = number_format($task_incompleted/$task_assigned,2) * 100;
        }
        else {
            $task_completed_pc = 0;
            $task_incompleted_pc = 0;
        }


        //inserting info
        $array['title'] = 'Total de tareas';
        $array['desc'] = 'Todas las tareas del sistema';
        $array['n'] = $task_total;
        $array['class'] = 'primary';
        $array['route_name'] = 'task.index';
        array_push($info,$array);


        $array['title'] = 'Tareas activas';
        $array['desc'] = 'Todas las tareas activas del sistema';
        $array['n'] = $task_enabled;
        $array['n_pc'] = $task_enabled_pc;
        $array['class'] = 'success';
        $array['route_name'] = 'task.list-enabled';
        array_push($info,$array);


        $array['title'] = 'Tareas inactivas';
        $array['desc']= 'Tareas las tareas activas del sistema';
        $array['n'] = $task_disabled;
        $array['n_pc'] = $task_disabled_pc;
        $array['class'] = 'danger';
        $array['route_name'] = 'task.list-disabled';
        array_push($info,$array);


        $array['title'] = 'Tareas asignadas';
        $array['desc'] = 'Todas las tareas que tienen al menos un usuario asignado';
        $array['n'] = $task_assigned;
        $array['n_pc'] = $task_assigned_pc;
        $array['class'] = 'success';
        $array['route_name'] = 'task.list-assigned';
        array_push($info,$array);


        $array['title'] = 'Tareas no asignadas';
        $array['desc'] = 'Todas las tareas que tienen ningun usuario asignado';
        $array['n'] = $task_not_assigned;
        $array['n_pc'] = $task_not_assigned_pc;
        $array['class'] = 'danger';
        $array['route_name'] = 'task.list-unassigned';
        array_push($info,$array);


        $array['title'] = 'Tareas completas(no verificadas)(tareas asignadas)';
        $array['desc'] = 'Tareas completas pendientes de ser verificadas';
        $array['n'] = $task_completed;
        $array['n_pc'] = $task_completed_pc;
        $array['class'] = 'success';
        $array['route_name'] = 'task.list-completed-unverified';
        array_push($info,$array);


        $array['title'] = 'Tareas incompletas (tareas asignadas)';
        $array['desc'] = 'Tareas en las que aun todos sus participantes no han terminado su parte del trabajo';
        $array['n'] = $task_incompleted;
        $array['n_pc'] = $task_incompleted_pc;
        $array['class'] = 'danger';
        $array['route_name'] = 'task.list-incompleted';
        array_push($info,$array);


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
