<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\SaveBase;
use Illuminate\Http\Request;
use App\Models\Task;

class Save extends SaveBase
{

    protected function getModel(){

        return new Task();
    }

    public function execute(Request $request){

        return parent::save($request);
    }

}