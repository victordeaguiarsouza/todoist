<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubTask;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_user','id_list', 'description', 'details', 'completed'];

    public function subTasks(){
        
        return $this->hasMany(SubTask::class);
    
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    
    }

}
