<?php
/**
 * Created by PhpStorm.
 * User: CHL
 * Date: 2017/11/25
 * Time: 14:32
 */
namespace  app\index\controller;

use app\index\model\Article as RightArc;
use think\Controller;

class Right extends  Controller {
    /**
     * 获取右侧内容
     */
    public function getRightData()
    {
        $article = new RightArc();
        $hotArticle =$article->getHotArticleList();
        $bestArticle =$article->getBestArticleList();
        $this->assign('hotArticle',$hotArticle);
        $this->assign('bestArticle',$bestArticle);
        $this->assign('module',input('module') ? input('module') : 1);
    }
}