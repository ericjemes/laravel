<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Tpl\Role as RoleTpl;
use Illuminate\Http\Request;
use App\Module\Role;


/**
 * Role class
 * @desc more description
 * @date 2018-06-01
 */
class RoleController extends Controller
{

    /**
     * Role lists
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return view
     */
    public function lists(Request $request)
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
                'page'=>'sometime|int|min:1',                                                       //更新时间
                'size'=>'sometime|int|between:[1,50]',                                              //更新时间
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $query = array_except($param, ['page','size']);
            $this->viewData['tpl'] = RoleTpl::getTpl($query);
            $this->viewData['data'] = Role::lists($query, array_get($param,'page',1), array_get($param,'size',10), 'id', 'desc', RoleTpl::$header);
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Role detail
     * @date 2018-06-01
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
            $this->viewData['tpl'] = RoleTpl::getTpl(Role::show($param));
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Role update
     * @date 2018-06-01
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
            $this->viewData['tpl'] = RoleTpl::getTpl(Role::show($param));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Role add
     * @date 2018-06-01
     * @return view
     */
    public function add()
    {
        try {
            $this->viewData['tpl'] = RoleTpl::getTpl();
            return $this->view('add');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Role align
     * @date 2018-06-01
     * @return view
     */
    public function align($id)
    {
        try {
            $this->viewData['data'] = Role::selectMenu($id);
            $this->viewData['tpl'] = RoleTpl::getTpl();
            $this->viewData['id'] = $id;
            return $this->view('align');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

}