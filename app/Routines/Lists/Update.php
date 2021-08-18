<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\UpdateBase;
use Illuminate\Http\Request;
use App\Models\Lists;

class Update extends UpdateBase
{

    protected function getModel(int $id){

        $list = Lists::find($id);

        if(!$list) throw new \Exception("List not found.");

        return $list;
    }

    public function execute(Request $request, int $id){

        return parent::update($request, $id);
    }

}