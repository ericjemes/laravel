<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Tpl\User as UserTpl;
use Illuminate\Http\Request;
use App\Module\User;


/**
 * User class
 * @desc more description
 * @date 2018-06-01
 */
class UserController extends Controller
{

    /**
     * User lists
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return view
     */
    public function lists(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'name'=>'sometime|string|length:[0,30]',                                            //用户名称
                'mobile'=>'sometime|string|length:[0,11]',                                          //用户手机号
                'email'=>'sometime|string|length:[0,50]',                                           //邮件地址
                'password'=>'sometime|string|length:[0,50]',                                        //用户密码
                'type'=>'sometime|int|min:0',                                                       //用户类型 [0:默认 1:微信]
                'role'=>'sometime|string|length:[0,50]',                                            //用户拥有的角色
                'description'=>'sometime|string|length:[0,100]',                                    //个人描述
                'address'=>'sometime|string|length:[0,100]',                                        //地址信息
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
                'page'=>'sometime|int|min:1',                                                       //更新时间
                'size'=>'sometime|int|between:[1,50]',                                              //更新时间
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $query = array_except($param, ['page','size']);
            $this->viewData['tpl'] = UserTpl::getTpl($query);
            $this->viewData['data'] = User::lists($query, array_get($param,'page',1), array_get($param,'size',50), 'id', 'desc', UserTpl::$header);
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * User detail
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
            $this->viewData['tpl'] = UserTpl::getTpl(User::show($param));
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * User update
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
            $this->viewData['tpl'] = UserTpl::getTpl(User::show($param));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * User add
     * @date 2018-06-01
     * @return view
     */
    public function add()
    {
        try {
            $this->viewData['tpl'] = UserTpl::getTpl();
            return $this->view('add');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

}