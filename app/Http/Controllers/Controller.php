<?php

namespace App\Http\Controllers;

use App\Util\Validate;
use App\Module\User as UserModule;
use App\Module\Menu as MenuModule;
use App\Exceptions\ServiceException;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{

    public $viewData = [
        'menu' => [],
        'data' => [],
    ];

    public $userID = 0;

    public function __construct(){}


    /**
     * 页面返回
     * @author gaojian291
     * @date 2017-05-15
     * @param string $path required 页面路径
     * @return view
     * @throws ServiceException
     */
    public function view($path)
    {
        $this->debug();
        if (isset($_COOKIE['token'])) {
            $user = UserModule::getUserIDByToken($_COOKIE['token']);
            if ($user) {
                $this->userID = $user['user_id'];
                $this->viewData['menu'] = $userInfo = MenuModule::getMenu($user['user_id']);
            }
        }
        return view($path, $this->viewData);
    }


    /**
     * 错误统一提示页面
     * @author gaojian291
     * @date 2017-05-15
     * @param string $messge required 错误提示页面
     * @return array
     */
    public function errorView($messge, $code = 500)
    {
        return view('errors.page', ['message' => $messge, 'code' => $code]);
    }


    /**
     * debug
     * @author gaojian291
     * @date 2017-05-15
     */
    public function debug()
    {
        if (config('app.debug') && config('app.env') != 'production' && isset($_GET['debug']) && $_GET['debug'] == 1) {
            echo "<pre>";
            print_r($this->viewData);
            exit;
        }
    }


    /**
     * 参数校验类
     * @author gaojian291
     * @date   2017-03-23
     * @param array $field required 校验规则
     * @param array $params required 校验的参数
     * @param array $message
     * @param boolean $filter option 是否需要过滤掉多余的参数
     * @return array
     * @throws \Exception
     */
    public static function validate($field, $params, $message = [], $filter = true)
    {
        $model = Validate::check($field, $params, $message);
        if ($model->fail()) {
            try {
                $msg = reset($model->getErrorMsg());
            } catch (\Exception $e) {
                $msg = '参数错误';
            }
            throw new \Exception($msg, 999998);
        }
        if ($filter) {                                                            //是否过滤除了校验规则之外的数据
            $params = array_intersect_key($params, $field);
        }
        return array_map(function ($val) {                                        //转义特殊字符串
            return is_string($val) ? stripslashes($val) : $val;
        }, $params);
    }


    /**
     * 正确数组返回
     * @author gaojian291
     * @date 2017-04-18
     * @param array $data required 数组信息
     * @return array
     */
    public function responseSuccess($data)
    {
        return ['code' => 0, 'msg' => 'ok', 'data' => $data];
    }


    /**
     * 错误数组返回
     * @author gaojian291
     * @date 2017-04-18
     * @param string $code required 错误code
     * @param string $msg required 错误message
     * @param array $data option data数据
     * @return array
     */
    public function responseError($code, $msg, $data = [])
    {
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }

}
