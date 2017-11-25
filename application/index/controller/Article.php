<?php
/**
 * (程序员模块（文章）首页)
 * User: CHL
 * Date: 2017/11/25
 * Time: 14:21
 */
namespace app\index\controller;

use app\index\model\Article as Art;
use think\Exception;

class Article  extends  Right{

    protected $beforeActionList = [
        'getRightData' => ['only'=>'index,show']
    ];


    /**
     * 文章模块首页
     * @return \think\response\View
     */
    public function index()
    {
        $article = new Art();
        $page = input('page') ? input('page') : 1;
        $rows = input('limit') ? input('limit') :10;
        $result = $article->getArticleList($page,$rows); //获取文章首页文章列表
        $returnData = ['articleList' => $result['rows'],
            'total' => $result['total'],
            'page' => $page,
        ];
        return view('',$returnData);
    }

    /**
     * 文章查看页面
     * @return \think\response\View
     */
    public function show()
    {
        $articleId = input('articleId');
        $article = new Art();
        $article->isUpdate(true)->where('id',$articleId)->setInc('visit_num');
        $articleList = $article->where('id',$articleId)->find();
        return view('',['article'=>$articleList]);
    }

}