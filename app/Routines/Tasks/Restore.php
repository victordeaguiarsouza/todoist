<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\RestoreBase;
use Illuminate\Http\Request;
use App\Models\Task;

class Restore extends RestoreBase
{

    public function execute(int $id){

        return parent::restore(Task::class, $id);
    }

}