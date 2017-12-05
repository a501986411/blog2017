<?php
/**
 * Created by PhpStorm.
 * User: CHL
 * Date: 2017/11/25
 * Time: 14:32
 */
namespace  app\index\controller;

use app\admin\model\FriendLink;
use app\index\model\Article as RightArc;
use think\Controller;

class Right extends  Controller
{
    /**
     * 获取右侧内容
     */
    public function getRightData()
    {
        $article = new RightArc();
        $friendLink = new FriendLink();
        $hotArticle = $article->getHotArticleList();
        $bestArticle = $article->getBestArticleList();
        $link = $friendLink->limit(7)->select();
        $this->assign('hotArticle', $hotArticle);
        $this->assign('bestArticle', $bestArticle);
        $this->assign('link', $link);
    }

    /**
     * 设置模块Id
     */
    public function setModule()
    {
        $this->assign('module', input('module') ? input('module') : 1);
    }

    /**
     *友情链接点击时 点击数 + 1
     */
    public function linkJumpsTimes()
    {
        $linkId = input('linkId');
        $friendLink = new FriendLink();
        $friendLink->where('id',$linkId)->setInc('click_num');
        return true;
    }
}