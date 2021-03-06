<?php

namespace App\Routines\Lists;

use App\Commons\Mvc\Routines\DeleteBase;
use Illuminate\Http\Request;
use App\Models\Lists;

class Delete extends DeleteBase
{

    public function execute(int $id){

        return parent::delete(Lists::class, $id);
    }

}