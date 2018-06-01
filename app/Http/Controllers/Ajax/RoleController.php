<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Module\Role as RoleModule;
use Illuminate\Http\Request;

class RoleController extends Controller
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
                'is_admin'=>'sometime|int|min:0',                                                   //是否管理员 [0：否 1:是]
                'name'=>'sometime|string|length:[0,50]',                                            //角色名称
                'desc'=>'sometime|string|length:[0,50]',                                            //角色说明
                'menu_json'=>'sometime|string|length:[0,200]',                                      //角色分配的菜单
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(RoleModule::add($param));
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
                'is_admin'=>'sometime|int|min:0',                                                   //是否管理员 [0：否 1:是]
                'name'=>'sometime|string|length:[0,50]',                                            //角色名称
                'desc'=>'sometime|string|length:[0,50]',                                            //角色说明
                'menu_json'=>'sometime|string|length:[0,200]',                                      //角色分配的菜单
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(RoleModule::update($param));
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
            return $this->responseSuccess(RoleModule::del($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
