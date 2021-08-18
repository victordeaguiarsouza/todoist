<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use Illuminate\Http\Request;
use App\Models\Lists;

class Restore
{

    public function execute(int $id){

        $content = new Content();

        try{

            if(!$id) throw new \Exception("Id not informed.");

            $list = Lists::withTrashed()->find($id)->restore();

            $content->done    = true;
            $content->model   = $list;
            $content->message = 'List successfully restored!';

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