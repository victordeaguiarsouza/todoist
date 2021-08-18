<?php

namespace App\Commons\Contents;

class Content
{
    public $done;
    public $model;
    public $message;
    public $extra;
    public $errorCode;

    public function __construct($done = true, $model = null, $message = '', $extra = '', $errorCode = ''){

        $this->done      = $done;
        $this->model     = $model;
        $this->message   = is_array($message) ? implode(', ', $message) : $message;            
        $this->extra     = $extra;
        $this->errorCode = $errorCode;
    }
}