<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Task;

class Update
{

    public function execute(Request $request, $id){
        
        $content = new Content();
        
        try{

            $task = Task::find($id);
            
            $this->validate($request);

            if(!$task) throw new \Exception("Task not found.");

            $task->completed = $request->list['completed'] ? true : false;
            $task->save();

            $content->done    = true;
            $content->model   = $task;
            $content->message = 'Task updated successfully!';

        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $task;
            $content->errorCode = $e->getCode();
            $content->message   = $e->getMessage();

        }

        return response()->json($content);
    }

    public function validate($request){
        
        $request->validate([
            'name' => 'required|max:100',
        ]);
    }
}