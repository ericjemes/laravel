<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Menu as MenuModule;
use App\Module\Tpl\Menu as MenuTpl;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    /**
     * 用户列表
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
                'parent_id' => 'sometime|string',
                'key' => 'sometime|string',
                'name' => 'sometime|string',
                'type' => 'sometime|uint',
                'page' => 'sometime|uint|min:1',
                'page_size' => 'sometime|uint|min:1',
            ];

            $param = self::validate($filed, array_filter($request->all(), function ($val) {
                return $val != '';
            }));
            $page = isset($param['page']) ? $param['page'] : 1;
            $pageSize = isset($param['page_size']) ? $param['page_size'] : 10;
            unset($param['page'], $param['page_size']);
            if (isset($param['name'])) {
                $param['like'] = ['name' => '%' . $param['name'] . '%'];
                unset($param['name']);
            }
            $list = MenuModule::lists($param, $page, $pageSize);
            $list['list'] = $this->formatData($list['list']);
            $this->viewData['data'] = $list;
            $this->viewData['head'] = MenuModule::headerData();
            $query = [
                'id' => [],
                'key' => [],
                'name' => [],
                'type' => [],
                'parent_id' => ['type' => 'select', 'list' => [''=>'请选择', 0=>'根菜单'] + MenuModule::listsMap()],
            ];
            $this->viewData['query'] = MenuTpl::getTpl($query, $param);
            $this->viewData['map'] = MenuTpl::getMap();
            $this->viewData['select_menu'] = 'menu_list';
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户详情
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
            $this->viewData['form'] = MenuTpl::getTpl([], MenuModule::show($id));
            unset($this->viewData['form']['password']);
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户更新
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
                'key' => [],
                'name' => [],
                'type' => [],
                'url' => [],
                'parent_id' => ['type' => 'select', 'list' => [''=>'请选择', 0=>'根菜单'] + MenuModule::listsMap()],
                'icon' => [],
            ];
            $this->viewData['form'] = MenuTpl::getTpl($form, MenuModule::show($id));
            $this->viewData['ajax'] = '/ajax/menu/update';
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户更新
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function add()
    {
        try {
            $query = [
                'name' => [],
                'parent_id' => ['type' => 'select', 'list' => [''=>'请选择', 0=>'根菜单'] + MenuModule::listsMap()],
                'url' => [],
                'key' => [],
                'type' => [],
                'icon' => [],
            ];
            $this->viewData['form'] = MenuTpl::getTpl($query);
            $this->viewData['ajax'] = '/ajax/menu/add';
            $this->viewData['select_menu'] = 'menu_add';
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 列表数据处理，按钮处理
     * @author gaojian291
     * @date 2017-05-19
     * @param array $data required 列表数据
     * @return array
     */
    private function formatData($data)
    {
        foreach ($data as $key => &$val) {                                        //处理操作按钮
            unset($val['password']);
            $val['buttons'] = [
                [
                    'type' => 'page',
                    'name' => '查看',
                    'url' => "/menu/show/{$val['id']}"
                ],
                [
                    'type' => 'page',
                    'name' => '更新',
                    'url' => "/menu/update/{$val['id']}"
                ],
                [
                    'type' => 'ajax',
                    'name' => '删除',
                    'url' => "/ajax/menu/delete/{$val['id']}"
                ]
            ];
            $val['create_time'] = date('Y-m-d H:i:s', $val['create_time']);
            $val['update_time'] = date('Y-m-d H:i:s', $val['update_time']);
        }
        return $data;
    }
}
