<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/22
 * Time: 15:55
 */
namespace app\admin\model;

use think\Model;

class Article extends Model {
    protected $autoWriteTimestamp = true;
    protected $insert = ['index_img'];
    protected $update = ['index_img'];
    public static function init()
    {
        Article::event('before_insert',function($article){
            return $article->saveTags();
        });
        Article::event('before_update',function($article){
            return $article->saveTags();
        });
    }

    /**
     * 设置文章列表显示图片
     * @return string
     */
    protected function setIndexImgAttr()
    {
        $content = $this->content;
        $token = strtok($content, "(");
        while ($token !== false) {
            if(strpos($token,"/uploads/")===0)
            {
                return  mb_substr($token,0,strpos($token,')'));
            }
            $token = strtok("(");
        }
        return "/static/tmpImg/201708252044567037.jpg";
    }

    /**
     * 保存文章标签
     * @return bool
     */
    protected function saveTags()
    {
        if($this->tag){
            $tag = explode("|",$this->tag);
            $tagModel = new ArticleTag();
            foreach($tag as $t){
               if(!$tagModel->saveTag(trim($t))){
                   return false;
               }
            }
        }
        return true;
    }
}