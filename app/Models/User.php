<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
// implements MustVerifyEmail
{
    use  HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_surname',
        'second_surname',
        'user_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relations
     */

     public function tasks()
     {
        return $this->belongsToMany(Task::class,'tasks_x_users')
                ->withTimestamps()
                ->withPivot('finish_date');
     }


    /**
     * Functions
     */

    //static
    public static function getUsersByRoleName($name)
    {
        $usersByRole = Role::findByName($name)->users;
        return $usersByRole;
    }


    public static function getUsersWithTasks()
    {
        $tasks = self::whereHas('tasks',function ($q){
            $q->where('active',true);
        })->get();


        return $tasks;
    }

    public static function getUsersWithoutTasks()
    {
        $tasks = self::whereDoesntHave('tasks',function ($q){
            $q->where('active',true);
        })->get();

        return $tasks;
    }

    public static function getVerifiedUsers()
    {
        $users = self::whereNotNull('email_verified_at')->get();
        return $users;
    }

    public static function getUnverifiedUsers()
    {
        $users = self::whereNull('email_verified_at')->get();
        return $users;
    }

    public static function getGlobalInfo()
    {
        $info = array();

        $info['user_total'] = self::all()->count();
        $info['user_verified'] = self::getVerifiedUsers()->count();
        $info['user_not_verified'] = self::getUnverifiedUsers()->count();
        $info['user_with_tasks'] = self::getUsersWithTasks()->count();
        $info['user_without_tasks'] = self::getUsersWithoutTasks()->count();

        return $info;
    }

    //object

    //check if user is admin
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    //Assign task to this user
    public function assignTask($taskId)
    {
        $result = false;
        if (! $this->tasks->contains($taskId)) {
            $this->tasks()->attach($taskId);
            $result = $this->tasks()->exists($taskId);
        }
        return $result;
    }

    public function getCompletedTasks()
    {
        $tasks = $this->tasks()->wherePivotNotNull('finish_date')->get();
        return $tasks;
    }

    public function getInProgressTasks()
    {
        $tasks = $this->tasks()->wherePivotNull('finish_date')->get();
        return $tasks;
    }
}
