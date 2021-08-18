<?php

namespace App\Routines\Tasks;

use App\Commons\Mvc\Routines\DeleteBase;
use App\Models\Task;

class Delete extends DeleteBase
{

    public function execute(int $id){

        return parent::delete(Task::class, $id);
    }

}