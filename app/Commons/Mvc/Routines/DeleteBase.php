<?php

namespace App\Commons\Mvc\Routines;

use App\Commons\Contents\Content;
use Illuminate\Database\Eloquent\Model;

class DeleteBase 
{

    public function delete(string $classModel, int $id)
    {
        
        $content = new Content();

        try {

            $model = $classModel::find($id);

            if(!$model) throw new \Exception("Register not found.");

            $this->beforeDelete($model);

            $model->delete();

            $this->afterDelete($model);

            $content->done    = true;
            $content->model   = $model;
            $content->message = 'Register successfully deleted!';
        }
        catch(\Exception $e){
            
            $content->done      = false;
            $content->model     = $model;
            $content->errorCode = $e->getCode();
            $content->message   = $e->getMessage();
        }        

        return response()->json($content);
    }

    protected function beforeDelete(Model $model){}

    protected function afterDelete(Model $model){}
}