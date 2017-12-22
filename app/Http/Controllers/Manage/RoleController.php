<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Module\Role as RoleModule;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * 角色数据添加
     * @author gaojian291
     * @date 2017-05-19
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function add(Request $request)
    {
        try {
            $filed = [
                'is_admin' => 'require|uint|in:[0,1]',
                'name'     => 'require|string',
                'desc'     => 'sometime|string',
                'menu_json' => 'sometime|string',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(RoleModule::add($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 角色更新
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
                'is_admin' => 'sometime|uint|in:[0,1]',
                'name'     => 'sometime|string',
                'desc'     => 'sometime|string',
                'menu_json' => 'sometime|string',
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(RoleModule::update($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 角色删除
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
            return $this->responseSuccess(RoleModule::delete($id));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
