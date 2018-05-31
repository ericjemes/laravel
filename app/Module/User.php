<?php

namespace App\Module;

use App\Model\UserModel;
use App\Model\RoleModel;
use App\Model\TokenModel;
use App\Exceptions\ServiceException;
use App\Util\Aes;
use App\Util\Arr;
use App\Model\MenuModel;
use DB;

class User //extends Base
{

    /**
     * 用户列表
     * @author gaojian291
     * @date 2017-05-18
     * @param array $param required 筛选参数
     * @param int $page option 当前页
     * @param int $pageSize option 当前页大小
     * @param arrray|array $order option 排序字段
     * @param string $lastID
     * @return array
     */
    public static function lists($param, $page = 1, $pageSize = 10, $order = [], $lastID = '')
    {
        return UserModel::getLists($param, $page, $pageSize, $order, $lastID);
    }


    /**
     * 用户详情
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 用户ID
     * @return array
     */
    public static function show($id)
    {
        return self::_getModel(['id'=>$id])->toArray();
    }



    /**
     * 用户添加
     * @author gaojian291
     * @date 2017-05-19
     * @param array $param required 用户数据
     * @return array
     */
    public static function add($param)
    {
        $param['password'] = Aes::strMD5($param['password']);
        return UserModel::create($param)->getOriginal('id');
    }


    /**
     * 用户更新
     * @author gaojian291
     * @date 2017-05-19
     * @param array $param required 用户数据
     * @return array
     */
    public static function update($param)
    {
        return UserModel::where('id', $param['id'])->update($param);
    }


    /**
     * 用户删除
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 用户ID
     * @return array
     */
    public static function delete($id)
    {
        return UserModel::where('id', $id)->delete();
    }


    /**
     * 用户注册
     * @author gaojian291
     * @date 2017-05-16
     * @param array $param required [
     *      "mobile"   =>"18652979335",
     *      "name"   =>"jemes",
     *      "password" =>"******",
     *      "comfirmPassword" =>"******",
     * ]
     * @throws ServiceException
     * @return array
     */
    public static function register($param)
    {
        if ($param['password'] !== $param['confirmPassword']) {
            throw new ServiceException('COMFIRM_PASSWROD_INVALID_EXCEPTION');
        }
        $data = UserModel::where('mobile', $param['mobile'])->first();
        if ($data) {
            throw new ServiceException('USER_MOBILE_EXIST_EXCEPTION');
        }
        $param['password'] = Aes::strMD5($param['password']);
        return UserModel::create($param)->getOriginal('id');
    }


    /**
     * 用户登录
     * @author gaojian291
     * @date 2017-05-16
     * @param array $param required [
     *      "mobile"   =>"18652979335",
     *      "password" =>"******",
     * ]
     * @throws ServiceException
     * @return array
     */
    public static function login($param)
    {
        $model = self::_getModel(['mobile' => $param['mobile']]);

        if (Aes::strMD5($param['password']) !== $model->password) {
            throw new ServiceException('USER_PASSWORD_INVALID_EXCEPTION');
        }
        $token = Aes::token($model->id);
        $tokenModel = TokenModel::where('user_id', $model->id)->first();

        if ($tokenModel) {
            TokenModel::where('user_id', $model->id)->update(['token' => $token]);
        } else {
            TokenModel::create(['user_id' => $model->id, 'token' => $token]);
        }
        $model->token = $token;
        return Arr::except($model->toArray(), ['password']);
    }


    /**
     * 根据token获取用户id
     * @author gaojian291
     * @date 2017-05-22
     * @param string $token require 用户token
     * @return array
     * @throws ServiceException
     */
    public static function getUserIDByToken($token)
    {
        $model = TokenModel::where('token', $token)->first();
        if (!$model) {
            throw new ServiceException('TOKEN_INVALID_EXCEPTION');
        }
        return $model->toArray();
    }


    /**
     * 根据token获取用户id
     * @author gaojian291
     * @date 2017-05-22
     * @param string $token require 用户token
     * @return array
     * @throws ServiceException
     */
    public static function getUserInfoByToken($token)
    {
        $model = TokenModel::where('token', $token)->first();
        if (!$model) {
            throw new ServiceException('TOKEN_INVALID_EXCEPTION');
        }
        $userModel = UserModel::find($model->user_id);
        if (!$userModel) {
            throw new ServiceException('NOT_FIND_USER_EXCEPTION');
        }
        return $userModel->toArray();
    }


    /**
     * 角色分配菜单
     * @author gaojian291
     * @date 2017-05-19
     * @param string $id required 角色ID
     * @return array
     * @throws ServiceException
     */
    public static function selectRole($id)
    {
        $data = self::_getModel(['id'=>$id])->toArray();
        $roleID = explode(',', $data['role']);
        $role = RoleModel::get(['id', 'name'])->toArray();
        foreach ($role as $key => &$val) {
            if (in_array($val['id'], $roleID)) {
                $val['selected'] = true;
            } else {
                $val['selected'] = false;
            }
        }
        return $role;
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
        $model = UserModel::where($param)->first();
        if (!$model) {
            throw new ServiceException('USER_NOT_FIND_EXCEPTION');
        }
        return $model;
    }

}
