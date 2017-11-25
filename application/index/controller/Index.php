<?php
namespace app\index\controller;

use app\admin\model\Article;

class Index
{
    public function index()
    {
        $page = input('get.page') ? input('get.page') : 1;
        $rows = input('get.limit') ?  input('get.limit') : 5;
        $result = Article::where('status',1)->page($page,$rows)->select();
        $total = Article::where('status',1)->count();
        return view('',['articleList'=>$result,'total'=>$total]);
    }

}
