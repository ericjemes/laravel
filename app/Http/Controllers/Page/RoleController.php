<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Role as RoleModule;
use App\Module\Tpl\Role as RoleTpl;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * 角色列表
     * @author gaojian291
     * @date 2017-05-15
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function lists(Request $request)
    {
        try {
            $filed = [
                'id' => 'sometime|string',
                'name' => 'sometime|string',
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {
                return $val != '';
            }));
            $page = isset($param['page']) ? $param['page'] : 1;
            $pageSize = isset($param['page_size']) ? $param['page_size'] : 10;
            unset($param['page'], $param['page_size']);
            $list = RoleModule::lists($param, $page, $pageSize);
            $query = [
                'id' => [],
                'name' => [],
            ];
            $this->viewData['query'] = RoleTpl::getTpl($query, $param);
            $list['list'] = RoleTpl::formatData($list['list']);
            $this->viewData['data'] = $list;
            $this->viewData = array_merge($this->viewData, RoleTpl::getConfig('role_list'));
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 角色详情
     * @author gaojian291
     * @date 2017-05-15
     * @param int $id request 主键id
     * @return array
     */
    public function show($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $data = compact('id');
            self::validate($filed, $data);
            $roleInfo = RoleModule::show($id);
            $form = [
                'id'=>[],
                'is_admin'=>[],
                'name'=>[],
                'desc'=>[],
                'menu_json'=>['type'=>'list'],
            ];
            $this->viewData['form'] = RoleTpl::getTpl($form, $roleInfo);
            $this->viewData = array_merge($this->viewData, RoleTpl::getConfig('role_show'));
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 角色更新
     * @author gaojian291
     * @date 2017-05-15
     * @param int $id request 主键id
     * @return array
     */
    public function update($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $data = compact('id');
            self::validate($filed, $data);
            $form = [
                'id' => ['readonly' => true],
                'is_admin' => [],
                'name' => [],
                'desc' => [],
            ];
            $this->viewData['form'] = RoleTpl::getTpl($form, RoleModule::show($id));
            $this->viewData = array_merge($this->viewData, RoleTpl::getConfig('role_update'));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 角色添加页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function add()
    {
        try {
            $tpl = RoleTpl::getTpl();
            unset($tpl['status'], $tpl['id']);
            $this->viewData['form'] = $tpl;
            $this->viewData = array_merge($this->viewData, RoleTpl::getConfig('role_add'));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 角色分配菜单页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function alignMenu($id)
    {
        try {
            $this->viewData['data'] = RoleModule::selectMenu($id);
            $this->viewData['ajax'] = '/ajax/role/update';
            $this->viewData['id'] = $id;
            $this->viewData['update_key'] = 'menu_json';        //更新的字段
            return $this->view('align');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }
}
