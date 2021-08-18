<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Lists;

class Save
{

    public function execute(Request $request){

        $content = new Content();

        try{
            
            $newList = new Lists();

            //$this->validate($request);

            $id_user       = $request->list['id_user'];
            $newList->name = $request->list['name'];
            $newList->save();
            
            $content->done    = true;
            $content->model   = $newList;
            $content->message = 'List successfully saved!';

        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $newList;
            $content->errorCode = $e->getCode();
            $content->message   = $e->getMessage();

        }

        return response()->json($content);
    }

    private function validate($request){
        
        $request->validate([
            'id_user' => 'required',
            'name'    => 'required|max:100',
        ]);
    }

}