<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\UpdateBase;
use Illuminate\Http\Request;
use App\Models\Lists;

class Update extends UpdateBase
{

    protected function getModel(int $id){

        $lists = Lists::find($id);

        if(!$lists) throw new \Exception("List not found.");

        return $lists;
    }

    public function execute(Request $request, int $id){

        return parent::update($request, $id);
    }

}