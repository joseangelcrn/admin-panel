<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $fillable=[
        'title',
        'description'
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
}
