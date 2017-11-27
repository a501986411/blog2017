<?php
namespace app\index\controller;

use app\index\model\Article;


class Index extends Right
{
    protected $beforeActionList = [
        'getRightData' => ['only'=>'index'],
         'setModule' => ['only'=>'index']
    ];

    /**
     * 首页
     * @return \think\response\View
     */
    public function index()
    {
        $article = new Article();
        $page = input('page') ? input('page') : 1;
        $rows = input('limit') ? input('limit') :7;
        $result = $article->getArticleList($page,$rows);
        $returnData = ['articleList' => $result['rows'],
            'total' => $result['total'],
            'page' => $page,
        ];
        return view('',$returnData);
    }



}
