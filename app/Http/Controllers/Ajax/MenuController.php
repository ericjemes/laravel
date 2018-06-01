<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Module\Menu as MenuModule;
use Illuminate\Http\Request;

class MenuController extends Controller
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
                'name'=>'sometime|string|length:[0,30]',                                            //菜单名称
                'parent_id'=>'sometime|int|min:0',                                                  //父菜单ID
                'url'=>'sometime|string|length:[0,100]',                                            //菜单地址
                'key'=>'sometime|string|length:[0,50]',                                             //菜单key
                'type'=>'sometime|int|min:0',                                                       //菜单类型[0:菜单 1:权限 2:资源]
                'icon'=>'sometime|string|length:[0,25]',                                            //菜单图标
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(MenuModule::add($param));
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
                'name'=>'sometime|string|length:[0,30]',                                            //菜单名称
                'parent_id'=>'sometime|int|min:0',                                                  //父菜单ID
                'url'=>'sometime|string|length:[0,100]',                                            //菜单地址
                'key'=>'sometime|string|length:[0,50]',                                             //菜单key
                'type'=>'sometime|int|min:0',                                                       //菜单类型[0:菜单 1:权限 2:资源]
                'icon'=>'sometime|string|length:[0,25]',                                            //菜单图标
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(MenuModule::update($param));
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
            return $this->responseSuccess(MenuModule::del($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
