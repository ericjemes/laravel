<?php
namespace App\Module;

use App\Model\BookModel;
use App\Exceptions\ServiceException;


/**
 * Book module
 * @date 2018-06-01
 */
class Book extends BaseModule
{

    /**
     * get new model
     * @date 2018-06-01
     * @return BookModel
     */
    public static function getModel()
    {
        return new BookModel();
    }


}