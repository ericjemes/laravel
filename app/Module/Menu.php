<?php

namespace App\Module;

use App\Model\MenuModel;
use App\Model\UserModel;
use App\Model\RoleModel;
use App\Exceptions\ServiceException;

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

}
