<?php

namespace App\Module;

use App\Model\Role as RoleModel;
use App\Model\Menu as MenuModel;
use App\Exceptions\ServiceException;

class Role extends Base
{

    /**
     * 角色列表
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
        return RoleModel::getLists($param, $page, $pageSize, $order, $lastID);
    }


    /**
     * 角色详情
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 角色ID
     * @return array
     */
    public static function show($id)
    {
        $data = self::_getModel(['id'=>$id])->toArray();
        if ($data['is_admin']) {
            $data['menu_json'] = MenuModel::where('type', 0)->lists('name')->toArray();
        } else {
            $menuID = explode(',', $data['menu_json']);
            $data['menu_json'] = MenuModel::where('type', 0)->whereIn('id', $menuID)->lists('name')->toArray();
        }
        return $data;
    }



    /**
     * 角色添加
     * @author gaojian291
     * @date 2017-05-19
     * @param array $param required 角色数据
     * @return array
     */
    public static function add($param)
    {
        return RoleModel::create($param)->getOriginal('id');
    }


    /**
     * 角色更新
     * @author gaojian291
     * @date 2017-05-19
     * @param array $param required 角色数据
     * @return array
     */
    public static function update($param)
    {
        return RoleModel::where('id', $param['id'])->update($param);
    }


    /**
     * 角色删除
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 角色ID
     * @return array
     */
    public static function delete($id)
    {
        return RoleModel::where('id', $id)->delete();
    }


    /**
     * 角色分配菜单
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 角色ID
     * @return array
     * @throws ServiceException
     */
    public static function selectMenu($id)
    {
        $data = self::_getModel(['id'=>$id])->toArray();
        if ($data && $data['is_admin'] == 1) {
            throw new ServiceException('ADMIN_ROLE_CAN_NOT_ALIGN');
        }
        $menuID = explode(',', $data['menu_json']);
        $menu = MenuModel::where('type', 0)->get(['id', 'name'])->toArray();
        foreach ($menu as $key => &$val) {
            if (in_array($val['id'], $menuID)) {
                $val['selected'] = true;
            } else {
                $val['selected'] = false;
            }
        }
        return $menu;
    }



    /**
     * 根据角色ID获取角色信息
     * @author gaojian291
     * @date 2017-05-19
     * @param array $ids required 角色IDs
     * @return array
     */
    public static function getRoleInfoByIDs($ids)
    {
        return RoleModel::whereIn('id', $ids)->lists('name', 'id')->toArray();
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
        $model = RoleModel::where($param)->first();
        if (!$model) {
            throw new ServiceException('ROLE_NOT_FIND_EXCEPTION');
        }
        return $model;
    }

}
