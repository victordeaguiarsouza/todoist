<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Lists;

class Update
{

    public function execute(Request $request, Integer $id){

        $content = new Content();
        
        try{

            $list = Lists::find($id);
            
            //$this->validate($request);

            if(!$list) throw new \Exception("List not found.");

            $list->name = $request->list['name'];
            $list->save();
            
            $content->done    = true;
            $content->model   = $list;
            $content->message = 'List successfully updated!';

        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $list;
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