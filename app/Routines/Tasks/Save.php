<?php

namespace App\Routines\Tasks;

use App\Commons\Contents\Content;
use App\Commons\Mvc\Routines\SaveBase;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Lists;

class Save extends SaveBase
{

    protected function getModel(){

        return new Task();
    }

    public function execute(Request $request){

        return parent::save($request);
    }

    protected function assign(){

        $listId = $this->request->list_id;
        $userId = $this->request->user_id;
        
        $list = Lists::find($listId);

        if(!$list) throw new \Exception("List not found.");

        $user = User::find($userId);

        if(!$user) throw new \Exception("User not found.");

        $this->model->description = $this->request->description;
        $this->model->details     = $this->request->details;
        $this->model->list_id     = $listId;

        //$this->model->lists()->associate($list);
        $this->model->user()->associate($user);
    }

}