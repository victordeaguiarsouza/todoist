<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table    = 'users_lists';
    protected $fillable = ['user_id','list_id', 'name'];
    
}
