<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Task;

class Save
{

    public function execute(Request $request){

        $content = new Content();

        try{
            
            $newTask = new Task();
            
            $this->validate($request);

            $newTask->id_list     = $request->task['id_list'];
            $newTask->id_user     = $request->task['id_user'];
            $newTask->description = $request->task['description'];

            $newTask->save();
            
            $content->done    = true;
            $content->model   = $newTask;
            $content->message = 'Task saved successfully!';

        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $newTask;
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