<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubTask;
use App\Models\User;
use App\Models\Lists;
class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['list_id', 'user_id', 'description', 'details', 'completed'];

    public function subTasks(){
        
        return $this->hasMany(SubTask::class);
    
    }

    public function lists(){
        
        return $this->belongsTo(Lists::class, 'list_id');
    
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    
    }
}
