<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Lists;

class Delete
{

    public function execute(Integer $id){

        $content = new Content();
        
        try{

            $list = Lists::find($id);

            if(!$list) throw new \Exception("List not found.");

            $list->delete();
            
            $content->done    = true;
            $content->model   = $list;
            $content->message = 'List successfully deleted!';

        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $list;
            $content->errorCode = $e->getCode();
            $content->message   = $e->getMessage();

        }

        return response()->json($content);
    }

}