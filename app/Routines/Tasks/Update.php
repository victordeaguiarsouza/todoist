<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\UpdateBase;
use Illuminate\Http\Request;
use App\Models\Task;

class Update extends UpdateBase
{

    protected function getModel(int $id){
        
        $task = Task::find($id);

        if(!$task) throw new \Exception("Task not found.");
        
        return $task;
    }

    public function execute(Request $request, int $id){

        return parent::update($request, $id);
    }

}