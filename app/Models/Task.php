<?php

namespace App\Models;

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
         return $this->belongsToMany(User::class,'tasks_x_users');
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
