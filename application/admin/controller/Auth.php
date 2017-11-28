<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/28
 * Time: 14:58
 */

namespace app\admin\controller;


use think\Controller;

class Auth extends Controller
{

    /**
     * 首页
     * @return \think\response\View
     */
    public function index()
    {
        $this->view->engine->layout(false);
        return view();
    }


    public function login()
    {
        $loginName = input('login_name');
        $password = input('password');
        return ['success'=>false,'msg'=>'密码错误'];
    }
}