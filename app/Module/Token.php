<?php
namespace App\Module;

use App\Model\TokenModel;
use App\Exceptions\ServiceException;


/**
 * Token module
 * @date 2018-06-01
 */
class Token extends BaseModule
{

    /**
     * get new model
     * @date 2018-06-01
     * @return TokenModel
     */
    public static function getModel()
    {
        return new TokenModel();
    }


}