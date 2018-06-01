<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Module\User as UserModule;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * 数据添加
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function add(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'name'=>'sometime|string|length:[0,30]',                                            //用户名称
                'mobile'=>'sometime|string|length:[0,11]',                                          //用户手机号
                'email'=>'sometime|string|length:[0,50]',                                           //邮件地址
                'password'=>'sometime|string|length:[0,50]',                                        //用户密码
                'type'=>'sometime|int|min:0',                                                       //用户类型 [0:默认 1:微信]
                'role'=>'sometime|string|length:[0,50]',                                            //用户拥有的角色
                'description'=>'sometime|string|length:[0,100]',                                    //个人描述
                'address'=>'sometime|string|length:[0,100]',                                        //地址信息
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(UserModule::add($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 数据更新
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function update(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'name'=>'sometime|string|length:[0,30]',                                            //用户名称
                'mobile'=>'sometime|string|length:[0,11]',                                          //用户手机号
                'email'=>'sometime|string|length:[0,50]',                                           //邮件地址
                'password'=>'sometime|string|length:[0,50]',                                        //用户密码
                'type'=>'sometime|int|min:0',                                                       //用户类型 [0:默认 1:微信]
                'role'=>'sometime|string|length:[0,50]',                                            //用户拥有的角色
                'description'=>'sometime|string|length:[0,100]',                                    //个人描述
                'address'=>'sometime|string|length:[0,100]',                                        //地址信息
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(UserModule::update($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户删除
     * @date 2018-06-01
     * @param int $id request 主键id
     * @return array
     */
    public function delete($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $param = compact('id');
            $param = self::validate($filed, $param);
            return $this->responseSuccess(UserModule::del($param));
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
