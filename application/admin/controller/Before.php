<?php
/**
 * 前置操作控制器
 * User: chl
 * Date: 2017/11/29
 * Time: 10:49
 */

namespace app\admin\controller;

use think\Controller;
use think\Cookie;

class Before extends Controller
{
    protected $beforeActionList = [
        'checkAuth'
    ];
    protected function checkAuth()
    {
       if(!Cookie::has(config('cookie_user'))){
           $this->error('登录信息过期，请登录',url("Auth/index"));
       }else{
           cookie(config('cookie_user'),cookie(config('cookie_user')));
       }

    }
}