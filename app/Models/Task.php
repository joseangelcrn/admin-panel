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

        $task_total = self::all()->count();
        $task_assigned = self::getAssignedAndActive()->count();
        $task_not_assigned = self::getNotAssignedAndActive()->count();
        $task_enabled = self::where('active',true)->get()->count();
        $task_disabled = self::where('active',false)->get()->count();
        $task_completed = self::getCompletedAndActive()->count();
        $task_incompleted = self::getIncompleteAndActive()->count();


        //----
        //pc = percentage
        $task_assigned_pc = $task_assigned/$task_total * 100;
        $task_not_assigned_pc = $task_not_assigned/$task_total * 100;
        $task_enabled_pc = $task_enabled/$task_total * 100;
        $task_disabled_pc = $task_disabled/$task_total * 100;
        $task_completed_pc = number_format($task_completed/$task_assigned,2) * 100;
        $task_incompleted_pc = number_format($task_incompleted/$task_assigned,2) * 100;
        //----


        $info['task_total']['title'] = 'Total de tareas';
        $info['task_total']['desc'] = 'Todas las tareas del sistema';
        $info['task_total']['n'] = $task_total;
        $info['task_total']['class'] = 'primary';
        $info['task_total']['route_name'] = 'task.index';


        $info['task_enabled']['title'] = 'Tareas activas';
        $info['task_enabled']['desc'] = 'Todas las tareas activas del sistema';
        $info['task_enabled']['n'] = $task_enabled;
        $info['task_enabled']['pc'] = $task_enabled_pc;
        $info['task_enabled']['class'] = 'success';
        $info['task_enabled']['route_name'] = 'task.list-enabled';


        $info['task_disabled']['title'] = 'Tareas inactivas';
        $info['task_disabled']['desc']= 'Tareas las tareas activas del sistema';
        $info['task_disabled']['n'] = $task_disabled;
        $info['task_disabled']['pc'] = $task_disabled_pc;
        $info['task_disabled']['class'] = 'danger';
        $info['task_disabled']['route_name'] = 'task.list-disabled';



        $info['task_assigned']['title'] = 'Tareas asignadas';
        $info['task_assigned']['desc'] = 'Todas las tareas que tienen al menos un usuario asignado';
        $info['task_assigned']['n'] = $task_assigned;
        $info['task_assigned']['pc'] = $task_assigned_pc;
        $info['task_assigned']['class'] = 'success';
        $info['task_assigned']['route_name'] = 'task.list-assigned';



        $info['task_not_assigned']['title'] = 'Tareas no asignadas';
        $info['task_not_assigned']['desc'] = 'Todas las tareas que tienen ningun usuario asignado';
        $info['task_not_assigned']['n'] = $task_not_assigned;
        $info['task_not_assigned']['pc'] = $task_not_assigned_pc;
        $info['task_not_assigned']['class'] = 'danger';
        $info['task_not_assigned']['route_name'] = 'task.list-unassigned';




        $info['task_completed']['title'] = 'Tareas completas(no verificadas)(tareas asignadas)';
        $info['task_completed']['desc'] = 'Tareas completas pendientes de ser verificadas';
        $info['task_completed']['n'] = $task_completed;
        $info['task_completed']['pc'] = $task_completed_pc;
        $info['task_completed']['class'] = 'success';
        $info['task_completed']['route_name'] = 'task.list-completed-unverified';


        $info['task_incompleted']['title'] = 'Tareas incompletas (tareas asignadas)';
        $info['task_incompleted']['desc'] = 'Tareas en las que aun todos sus participantes no han terminado su parte del trabajo';
        $info['task_incompleted']['n'] = $task_incompleted;
        $info['task_incompleted']['pc'] = $task_incompleted_pc;
        $info['task_incompleted']['class'] = 'danger';
        $info['task_incompleted']['route_name'] = 'task.list-incompleted';


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
