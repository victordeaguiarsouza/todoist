<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubTask;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    public function subTasks(){
        
        return $this->hasMany(SubTask::class);
    
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    
    }

}
