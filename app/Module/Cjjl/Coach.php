<?php

namespace App\Module\Cjjl;

use App\Model\Cjjl\CoachModel;
use App\Exceptions\ServiceException;

class Coach extends \App\Module\Base
{

    /**
     * 教练列表
     * @author gaojian291
     * @date 2017-05-18
     * @param array $param required 筛选参数
     * @param int $page option 当前页
     * @param int $pageSize option 当前页大小
     * @param arrray|array $order option 排序字段
     * @param string $lastID
     * @return array
     */
    public static function lists($param, $page, $pageSize, $order = [], $lastID = '')
    {
        return CoachModel::getLists($param, $page, $pageSize, $order, $lastID);
    }
    

    /**
     * 教练详情
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 教练ID
     * @return array
     */
    public static function show($id)
    {
        return self::_getModel(['id' => $id])->toArray();
    }


    /**
     * 获取数据model
     * @author gaojian291
     * @date 2017-05-16
     * @param array $param required 请求参数
     * @throws ServiceException
     * @return model
     */
    private static function _getModel($param)
    {
        $model = CoachModel::where($param)->first();
        if (!$model) {
            throw new ServiceException('DATA_NOT_FIND_EXCEPTION');
        }
        return $model;
    }

}
