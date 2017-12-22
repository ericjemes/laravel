<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Cjjl\Coach as CoachModule;
use App\Module\Cjjl\Tpl\Coach as CoachTpl;
use Illuminate\Http\Request;

class CoachController extends Controller
{

    /**
     * 教练列表
     * @author gaojian291
     * @date 2017-05-15
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function lists(Request $request)
    {
        try {
            $filed = [
                'c_id'      => 'sometime|numberic|min:0',
                'c_phone'   => 'sometime|mobile',
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {
                return $val != '';
            }));
            $page = isset($param['page']) ? $param['page'] : 1;
            $pageSize = isset($param['page_size']) ? $param['page_size'] : 10;
            unset($param['page'], $param['page_size']);
            $list = CoachModule::lists($param, $page, $pageSize);
            $query = [
                'c_id' => [],
                'c_phone' => [],
            ];
            $this->viewData['query'] = CoachTpl::getTpl($query, $param);
            $list['list'] = CoachTpl::formatData($list['list']);
            $this->viewData['data'] = $list;
            $this->viewData = array_merge($this->viewData, CoachTpl::getConfig('coach_list'));
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * 教练详情
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
     * 教练更新
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
     * 教练添加页面
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
}
