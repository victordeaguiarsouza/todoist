<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\RestoreBase;
use Illuminate\Http\Request;
use App\Models\Lists;

class Restore extends RestoreBase
{

    public function execute(int $id){

        return parent::restore(Lists::class, $id);
    }

}