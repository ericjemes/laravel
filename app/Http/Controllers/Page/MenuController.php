<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Tpl\Menu as MenuTpl;
use Illuminate\Http\Request;
use App\Module\Menu;


/**
 * Menu class
 * @desc more description
 * @date 2018-05-31
 */
class MenuController extends Controller
{

    /**
     * Menu lists
     * @date 2018-05-31
     * @param Request $request $request 请求requset对象
     * @return view
     */
    public function lists(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'name'=>'sometime|string|length:[0,30]',                                            //菜单名称
                'parent_id'=>'sometime|int|min:0',                                                  //父菜单ID
                'url'=>'sometime|string|length:[0,100]',                                            //菜单地址
                'key'=>'sometime|string|length:[0,50]',                                             //菜单key
                'type'=>'sometime|int|min:0',                                                       //菜单类型 0:菜单 1:权限 2:资源
                'icon'=>'sometime|string|length:[0,25]',                                            //菜单图标
                'status'=>'sometime|int|min:0',                                                     //数据状态:1:正常 0:失效
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
                'page'=>'sometime|int|min:1',                                                       //更新时间
                'size'=>'sometime|int|between:[1,50]',                                              //更新时间
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $query = array_except($param, ['page','size']);
            $this->viewData['data'] = Menu::lists($query, array_get($param,'page',1), array_get($param,'size',10), 'id', 'desc', MenuTpl::$header);
            $default = [
                'parent_id' => [
                    'type' => 'select',
                    'list' => [
                        '0' => '根菜单',
                    ],
                ],
            ];
            $default['parent_id']['list'] = $default['parent_id']['list'] + Menu::bootMenu();;
            $this->viewData['tpl'] = MenuTpl::getTpl($query, $default);
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Menu detail
     * @date 2018-05-31
     * @param int $id request 主键id
     * @return view
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
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Menu update
     * @date 2018-05-31
     * @param int $id request 主键id
     * @return view
     */
    public function update($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $param = compact('id');
            $param = self::validate($filed, $param);
            $default = [
                'parent_id' => [
                    'type' => 'select',
                    'list' => [
                        '0' => '根菜单',
                    ],
                ],
            ];
            $default['parent_id']['list'] = $default['parent_id']['list'] + Menu::bootMenu();;
            $this->viewData['tpl'] = MenuTpl::getTpl(Menu::show($param), $default);
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Menu add
     * @date 2018-05-31
     * @return view
     */
    public function add()
    {
        try {
            $default = [
                'parent_id' => [
                    'type' => 'select',
                    'list' => [
                        '0' => '根菜单',
                    ],
                ],
            ];
            $default['parent_id']['list'] = $default['parent_id']['list'] + Menu::bootMenu();
            $this->viewData['tpl'] = MenuTpl::getTpl([], $default);
            return $this->view('add');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }

}