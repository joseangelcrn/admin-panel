<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    

    /**
     * relations
     */

     public function users()
     {
         return $this->belongsToMany(User::class,'tasks_x_users');
     }
}
