<?php
namespace App\Module;

use App\Model\UserModel;
use App\Model\TokenModel;
use App\Exceptions\ServiceException;
use App\Util\Aes;
use App\Util\Arr;
use App\Model\MenuModel;
use DB;

/**
 * User module
 * @date 2018-06-01
 */
class User extends BaseModule
{

    /**
     * get new model
     * @date 2018-06-01
     * @return UserModel
     */
    public static function getModel()
    {
        return new UserModel();
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