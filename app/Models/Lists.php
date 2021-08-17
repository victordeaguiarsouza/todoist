<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

//Utilizei o nome do plural pois na hora de criar a model retornou um erro
//de palavra reservada pelo PHP
class Lists extends Model
{
    use HasFactory;

    public function users(){
        
        return $this->belongsToMany(related:User::class, table: 'users_lists', foreignPivotKey: 'id_user', relatedPivotKey: 'id_list');
    
    }

    public function tasks(){
        
        return $this->hasMany(Task::class);
    
    }
}
