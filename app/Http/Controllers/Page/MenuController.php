<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Menu;
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
                'id'        => 'sometime|string',
                'parent_id' => 'sometime|string',
                'key'       => 'sometime|string',
                'name'      => 'sometime|string',
                'type'      => 'sometime|uint',
                'page'      => 'sometime|uint|min:1',
                'size'      => 'sometime|uint|min:1',
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $this->viewData['tpl'] = MenuTpl::getTpl($param);
            $page = isset($param['page']) ? $param['page'] : 1;
            $pageSize = isset($param['size']) ? $param['size'] : 50;
            unset($param['page'], $param['size']);
            if (isset($param['name'])) {
                $param['like'] = ['name' => '%' . $param['name'] . '%'];
                unset($param['name']);
            }
            $this->viewData['data'] = Menu::lists($param, $page, $pageSize, 'id', 'desc', MenuTpl::$header);
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
            $param = compact('id');
            $param = self::validate($filed, $param);
            $this->viewData['tpl'] = MenuTpl::getTpl(Menu::show($param));
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
            $param = compact('id');
            $param = self::validate($filed, $param);
            $this->viewData['tpl'] = MenuTpl::getTpl(Menu::show($param));
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
            $this->viewData['tpl'] = MenuTpl::getTpl();
            return $this->view('add');
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
