<?php
namespace app\index\controller;

use app\admin\model\Notice;
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
            'notice'=>$this->getNoticeList(),
        ];
        return view('',$returnData);
    }

    /**
     * 获取网站公告提示
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getNoticeList()
    {
        $model = new Notice();
        return $model->order('id','desc')->limit(3)->select();
    }

    public function showBuild()
    {
        return view('showbuild');
    }

}
