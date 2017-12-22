<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * 用户login
     * @author gaojian291
     * @date 2017-05-15
     * @return view
     */
    public function login()
    {
        return $this->view('login');
    }


    /**
     * 用户logout
     * @author gaojian291
     * @date 2017-05-15
     * @return view
     */
    public function logout()
    {
        setcookie('token', "", time() - 3600, '/');
        setcookie('name', "", time() - 3600, '/');
        return redirect()->route('login');
    }


    /**
     * 用户register
     * @author gaojian291
     * @date 2017-05-15
     * @return view
     */
    public function register()
    {
        return $this->view('register');
    }


    /**
     * 用户首页
     * @author gaojian291
     * @date 2017-05-15
     * @return view
     */
    public function home()
    {
        if (isset($_COOKIE['token'])) {
            return $this->view('home');
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * 用户首页
     * @author gaojian291
     * @date 2017-05-15
     * @return view
     */
    public function welcome()
    {
        return $this->view('welcome');
    }

}
