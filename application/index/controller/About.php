<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/27
 * Time: 11:53
 */

namespace app\index\controller;


use app\index\model\LeaveMsg;

class About extends Right
{
    protected $beforeActionList = [
        'setModule' => ['only'=>'index']
    ];

   public function index()
   {
       return view('about');
   }
}