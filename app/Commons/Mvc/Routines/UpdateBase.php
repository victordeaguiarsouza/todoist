<?php

namespace App\Commons\Mvc\Routines;

use App\Commons\Contents\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateBase 
{

    protected $model;
    protected $request;

    protected function getModel(int $id){}

    protected function getExtra(){ return null; }

    protected function update(Request $request, int $id){

        try{

            $content = new Content();
            
            $this->request = $request;

            $this->model = $this->getModel($id);

            $this->assign();

            $this->beforeUpdate();
            
            $this->model->save();            
            
            $this->afterUpdate();

            $content->done    = true;
            $content->model   = $this->model;
            $content->message = 'Register successfully updated!';
            $content->extra   = $this->getExtra();
        }
        catch(\Exception $e){

            $content->done      = false;
            $content->model     = $this->model;
            $content->message   = $e->getMessage();
            $content->errorCode = $e->getCode();
        }

        return response()->json($content);
    }

    protected function assign(){

        $this->model->fill($this->request->all());
    }

    protected function beforeUpdate(){}

    protected function afterUpdate(){}
}