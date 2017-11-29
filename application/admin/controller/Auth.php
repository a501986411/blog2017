<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/28
 * Time: 14:58
 */

namespace app\admin\controller;


use app\admin\model\AdminUser;
use think\Controller;
use think\Cookie;

class Auth extends Controller
{

    /**
     * 首页
     * @return \think\response\View
     */
    public function index()
    {
        if(Cookie::has(config('cookie_user'))){ //若存在登录信息，就跳转到首页
            $this->redirect(url('Index/index'));
        }
        $this->view->engine->layout(false);
        return view();
    }

    /**
     * 登录操作
     * @return array
     */
    public function login()
    {
        $loginName = input('login_name');
        $password = input('password');
        $model = new AdminUser();
        $loginResult = $model->loginAuth($loginName,$password);
        return $loginResult;
    }

    /**
     * 登出
     */
    public function loginOut()
    {
        cookie(config('cookie_user'),null);
        return true;
    }

}