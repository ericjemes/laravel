<?php

namespace App\Module;

class Base
{
    public static function headerData()
    {
        $model = new static;
        return $model->headerData;
    }
}
