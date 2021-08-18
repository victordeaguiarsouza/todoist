<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\SaveBase;
use Illuminate\Http\Request;
use App\Models\Lists;

class Save extends SaveBase
{

    protected function getModel(){

        return new Lists();
    }

    public function execute(Request $request){

        return parent::save($request);
    }

}