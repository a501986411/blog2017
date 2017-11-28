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

    public function index()
    {
        $this->view->engine->layout(false);
        return view();
    }
}