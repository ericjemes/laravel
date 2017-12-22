<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\User as UserModule;
use App\Module\Role as RoleModule;
use App\Module\Tpl\User as UserTpl;

use Illuminate\Http\Request;

class UserController extends Controller
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
                'mobile' => 'sometime|string',
                'name' => 'sometime|string',
                'email' => 'sometime|string',
                'type' => 'sometime|uint',
                'page' => 'sometime|uint|min:1',
                'page_size' => 'sometime|uint|min:1',
            ];
            $param = self::validate($filed, \App\Util\Arr::filter($request->all()));
            $page = isset($param['page']) ? $param['page'] : 1;
            $pageSize = isset($param['page_size']) ? $param['page_size'] : 10;
            unset($param['page'], $param['page_size']);
            $list = UserModule::lists($param, $page, $pageSize);
            $query = [
                'id' => [],
                'mobile' => [],
                'email' => [],
            ];
            $this->viewData['query'] = UserTpl::getTpl($query, $param);
            $list['list'] = UserTpl::formatData($list['list']);
            $this->viewData['data'] = $list;
            $this->viewData = array_merge($this->viewData, UserTpl::getConfig('user_list'));
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
            $this->viewData['form'] = UserTpl::getTpl([], UserModule::show($id));
            unset($this->viewData['form']['password']);
            $this->viewData = array_merge($this->viewData, UserTpl::getConfig('user_show'));
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
                'mobile' => ['readonly' => true],
                'name' => [],
                'type' => [],
                'email' => [],
            ];
            $this->viewData['form'] = UserTpl::getTpl($form, UserModule::show($id));
            $this->viewData = array_merge($this->viewData, UserTpl::getConfig('user_update'));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户添加页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function add()
    {
        try {
            $tpl = UserTpl::getTpl();
            unset($tpl['status'], $tpl['id']);
            $this->viewData['form'] = $tpl;
            $this->viewData = array_merge($this->viewData, UserTpl::getConfig('user_add'));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户分配角色页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function alignRole($id)
    {
        try {
            $this->viewData['data'] = UserModule::selectRole($id);
            $this->viewData['ajax'] = '/ajax/user/update';
            $this->viewData['id'] = $id;
            $this->viewData['update_key'] = 'role';        //更新的字段
            return $this->view('align');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户分配角色页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function profile()
    {
        try {
            $userInfo = UserModule::show($this->userID);
            $this->viewData['userInfo'] = $userInfo;
            $roleinfo = RoleModule::getRoleInfoByIDs(explode(',', $userInfo['role']));
            $this->viewData['roleInfo'] = $roleinfo;
            return $this->view('user.profile');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }


    /**
     * 用户分配角色页面
     * @author gaojian291
     * @date 2017-05-15
     * @param null
     * @return array
     */
    public function headImage()
    {
        try {
            return $this->view('user.headImage');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage());
        }
    }
}
