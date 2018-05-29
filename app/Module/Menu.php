<?php

namespace App\Module;

use App\Model\Menu as MenuModel;
use App\Model\User as UserModel;
use App\Model\Role as RoleModel;
use App\Exceptions\ServiceException;
use App\Module\BaseModule;

class Menu extends BaseModule
{

    /**
     * get new model
     * @date 2018-04-02
     * @return object
     */
    public static function getModel()
    {
        return new MenuModel();
    }




//    /**
//     * 菜单列表
//     * @author gaojian291
//     * @date 2017-05-18
//     * @param array $param required 筛选参数
//     * @param int $page option 当前页
//     * @param int $pageSize option 当前页大小
//     * @param arrray|array $order option 排序字段
//     * @param string $lastID
//     * @return array
//     */
//    public static function lists($param, $page, $pageSize, $order = [], $lastID = '')
//    {
//        return MenuModel::getLists($param, $page, $pageSize, $order, $lastID);
//    }
//
//
//    /**
//     * 菜单列表
//     * @author gaojian291
//     * @date 2017-05-18
//     * @param array $param required 筛选参数
//     * @return array
//     */
//    public static function listsMap($param = [])
//    {
//        return MenuModel::where($param)->lists('name', 'id')->toArray();
//    }
//
//    /**
//     * 菜单详情
//     * @author gaojian291
//     * @date 2017-05-19
//     * @param string $id required 菜单ID
//     * @return array
//     */
//    public static function show($id)
//    {
//        return self::_getModel(['id' => $id])->toArray();
//    }
//
//
//    /**
//     * 菜单添加
//     * @author gaojian291
//     * @date 2017-05-22
//     * @param array $param required 菜单数据
//     * @return array
//     * @throws ServiceException
//     */
//    public static function add($param)
//    {
//        if (MenuModel::where('key', $param['key'])->first()) {
//            throw new ServiceException('MENU_KEY_EXIST_EXCEPTION');
//        }
//        return MenuModel::create($param)->getOriginal('id');
//    }
//
//
//    /**
//     * 菜单更新
//     * @author gaojian291
//     * @date 2017-05-19
//     * @param array $param required 菜单数据
//     * @return array
//     * @throws ServiceException
//     */
//    public static function update($param)
//    {
//        if (!MenuModel::where('id', $param['id'])->first()) {
//            throw new ServiceException('MENU_NOT_FIND_EXCEPTION');
//        }
//        return MenuModel::where('id', $param['id'])->update($param);
//    }
//
//
//    /**
//     * 菜单删除
//     * @author gaojian291
//     * @date 2017-05-19
//     * @param string $id required 菜单ID
//     * @return array
//     */
//    public static function delete($id)
//    {
//        return MenuModel::where('id', $id)->delete();
//    }
//
    /**
     * 根据userid获取菜单
     * @author gaojian291
     * @date 2017-05-24
     * @param int $user_id required user_id
     * @return array
     */
    public static function getMenu($user_id)
    {
        $user = UserModel::where('id', $user_id)->first();
        if ($user) {
            $user = $user->toArray();
            $roleids = explode(',', $user['role']);
            $roles = RoleModel::whereIn('id', $roleids)->get(['is_admin', 'menu_json'])->toArray();
            $isAdmin = false;
            $menus = [];
            foreach ($roles as $key => $val) {
                if ($val['is_admin']) {
                    $isAdmin = true;
                    break;
                } else {
                    $menus = array_merge($menus, explode(',', $val['menu_json']));
                }
            }
            if ($isAdmin) {
                $data = MenuModel::where('type', 0)->get(['id', 'name', 'parent_id', 'url', 'key', 'icon'])->toArray();
            } else {
                $data = MenuModel::where('type', 0)->whereIn('id', $menus)->get(['id', 'name', 'parent_id', 'url', 'key', 'icon'])->toArray();
            }
            return \App\Util\Tree::_formatMenuData($data, 'parent_id', 'id');
        }
        return [];
    }
//
//
//    public static function headerData()
//    {
//        return [
//            'id' => '菜单id',
//            'name' => '菜单名称',
//            'parent_id' => '父级菜单',
//            'url' => '菜单地址',
//            'type' => '菜单类型',
//            'create_time' => '创建时间',
//            'update_time' => '更新时间',
//            'buttons' => '操作'
//        ];
//    }
//
//
//    /**
//     * 获取数据model
//     * @author gaojian291
//     * @date 2017-05-16
//     * @param array $param required 请求参数
//     * @throws ServiceException
//     * @return model
//     */
//    private static function _getModel($param)
//    {
//        $model = MenuModel::where($param)->first();
//        if (!$model) {
//            throw new ServiceException('USER_NOT_FIND_EXCEPTION');
//        }
//        return $model;
//    }

}
