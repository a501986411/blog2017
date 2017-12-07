<?php
/**
 * (程序员模块（文章）首页)
 * User: CHL
 * Date: 2017/11/25
 * Time: 14:21
 */
namespace app\index\controller;

use app\admin\model\ArticleTag;
use app\index\model\Article as Art;
use think\Exception;

class Article  extends  Right{

    protected $beforeActionList = [
        'getRightData' => ['only'=>'index,show'],
        'setModule' => ['only'=>'index,show']
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
        $searchKey = [];
        if(input('tag')){
            $searchKey['tag'] = trim(input('tag'));
        }
        $result = $article->getArticleList($page,$rows,$searchKey); //获取文章首页文章列表
        $returnData = ['articleList' => $result['rows'],
            'total' => $result['total'],
            'page' => $page,
            'pages' => ceil($result['total']/$rows),
            'tag' => $this->getTagsNav(),
        ];
        return view('article',$returnData);
    }

    /**
     * 获取标签
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getTagsNav()
    {
        $tag = new ArticleTag();
        $data = $tag->where('status',1)->order('show_times','desc')->limit(6)->select();
        return $data;
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
        return view('detail',[
            'article'=>$articleList,
             'tag' => $this->getTagsNav(),
            ]);
    }

}