<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Module\User as UserModule;
use App\Module\Role as RoleModule;
use App\Module\Tpl\User as UserTpl;

use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{

    /**
     * 用户数据添加
     * @author gaojian291
     * @date 2017-05-19
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function add(Request $request)
    {
        try {
            $filed = [
                'name' => 'require|string|length:1',
                'mobile' => 'require|mobile',
                'password' => 'require|string|length:6',
                'email' => 'sometime|email',
                'type' => 'sometime|uint',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(UserModule::add($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户详情
     * @author gaojian291
     * @date 2017-05-15
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function update(Request $request)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
                'name' => 'sometime|string|length:1',
                'email' => 'sometime|email',
                'type' => 'sometime|uint',
                'role' => 'sometime|string',
                'address' => 'sometime|string',
                'description' => 'sometime|string',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(UserModule::update($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户删除
     * @author gaojian291
     * @date 2017-05-15
     * @param int $id request 主键id
     * @return array
     */
    public function delete($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $data = compact('id');
            self::validate($filed, $data);
            return $this->responseSuccess(UserModule::delete($id));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户登录
     * @author gaojian291
     * @date 2017-05-15
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function login(Request $request)
    {
        try {
//            Log::info('This is some useful information.');
            $filed = [
                'mobile' => 'require|mobile',
                'password' => 'require|string|length:6',
            ];
            $param = self::validate($filed, $request->all());
            $data = UserModule::login($param);
            setcookie('token', $data['token'], time() + 3600, '/');
            setcookie('name', $data['name'], time() + 3600, '/');
            return $this->responseSuccess($data);
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户注册
     * @author gaojian291
     * @date 2017-05-15
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function register(Request $request)
    {
        try {
            $filed = [
                'mobile' => 'require|mobile',
                'name' => 'require|string|length:1',
                'password' => 'require|string|length:6',
                'confirmPassword' => 'require|string|length:6',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(UserModule::register($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
