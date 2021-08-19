<?php

namespace App\Routines\Lists;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\SaveBase;
use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\User;

class Save extends SaveBase
{

    protected function getModel(){

        return new Lists();
    }

    public function execute(Request $request){

        return parent::save($request);
    }

    protected function assign(){

        $userID = $this->request->user_id;
        $user   = User::find($userID);

        if(!$user) throw new \Exception("User not found.");

        $this->model->name = $this->request->name;
        $this->model->save(); 
        $this->model->users()->attach($user);
    }

}