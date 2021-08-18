<?php

namespace App\Commons\Mvc\Routines;

use App\Commons\Contents\Content;
use Illuminate\Database\Eloquent\Model;

class RestoreBase 
{

    public function restore(string $classModel, int $id)
    {

        $content = new Content();

        try {

            $model = $classModel::withTrashed()->find($id);
            
            if(!$model) throw new \Exception("Register not found.");

            $this->beforeRestore($model);

            $model->restore();

            $this->afterRestore($model);

            $content->done    = true;
            $content->model   = $model;
            $content->message = 'Register successfully restored!';
        }
        catch(\Exception $e){
            
            $content->done      = false;
            $content->model     = $model;
            $content->errorCode = $e->getCode();
            $content->message   = $e->getMessage();
        }        

        return response()->json($content);
    }

    protected function beforeRestore(Model $model){}

    protected function afterRestore(Model $model){}
}