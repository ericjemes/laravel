<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Module\Menu as MenuModule;
use App\Module\Tpl\Menu as MenuTpl;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    /**
     * 菜单数据添加
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
                'parent_id' => 'require|uint|min:0',
                'url' => 'require|string|length:1',
                'key' => 'require|string',
                'type' => 'require|uint',
                'icon' => 'sometime|string',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(MenuModule::add($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 菜单数据更新
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
                'name' => 'require|string|length:1',
                'parent_id' => 'require|uint|min:0',
                'url' => 'sometime|string|length:1',
                'key' => 'require|string',
                'type' => 'require|uint',
                'icon' => 'sometime|string',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(MenuModule::update($param));
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
            return $this->responseSuccess(MenuModule::delete($id));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
