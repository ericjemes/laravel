<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Module\Token as TokenModule;
use Illuminate\Http\Request;

class TokenController extends Controller
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
                'user_id'=>'sometime|int|min:0',                                                    //用户ID
                'token'=>'sometime|string|length:[0,50]',                                           //登录token
                'type'=>'sometime|int|min:0',                                                       //用户类型 0:默认 1:微信
                'status'=>'sometime|int|min:0',                                                     //数据状态:1:正常 0:失效
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(TokenModule::add($param));
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
                'user_id'=>'sometime|int|min:0',                                                    //用户ID
                'token'=>'sometime|string|length:[0,50]',                                           //登录token
                'type'=>'sometime|int|min:0',                                                       //用户类型 0:默认 1:微信
                'status'=>'sometime|int|min:0',                                                     //数据状态:1:正常 0:失效
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(TokenModule::update($param));
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
            return $this->responseSuccess(TokenModule::del($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
