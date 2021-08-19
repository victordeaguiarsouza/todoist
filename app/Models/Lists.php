<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

//Utilizei o nome do plural pois na hora de criar a model retornou um erro
//de palavra reservada pelo PHP
class Lists extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_user', 'name'];

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($offer) {
            $offer->tasks()->delete();
        });

        static::restoring(function($offer) {
            $offer->tasks()->restore();
        });
    }

    public function users(){
        
        return $this->belongsToMany(related:User::class, table: 'users_lists', foreignPivotKey: 'user_id', relatedPivotKey: 'list_id');
    
    }

    public function tasks(){
        
        return $this->hasMany(Task::class);
    
    }
}
