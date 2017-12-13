<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/22
 * Time: 15:55
 */
namespace app\admin\model;

use think\Exception;
use think\Log;
use think\Model;

class Article extends Model {
    protected $autoWriteTimestamp = true;
    protected $insert = ['index_img'];
    protected $update = ['index_img'];
    public $statusStr = [1=>'正常',0=>'屏蔽'];
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
            $newTag = explode("|",$this->tag); //新的标签数组
            $oldTag = []; //就文章标签数组
            if($this->id){
                $oldTag = $this->getArticleTags($this->id);
            }
            //利用新旧标签数组 分别获取新增和删除的文章标签数组
            //获取新增的标签数组
            $addTag = array_diff($newTag,$oldTag);
            if(!empty($addTag)){
                foreach($addTag as $t){
                    $tagModel = new ArticleTag();
                    if(!$tagModel->addTag(trim($t))){
                        return false;
                    }
                }
            }
            //获取删除的标签数组
            if(!empty($oldTag)){
                $delTag = array_diff($oldTag,$newTag);
                if(!empty($delTag)){
                    foreach($delTag as $t){
                        $tagModel = new ArticleTag();
                        if(!$tagModel->delTag(trim($t))){
                            return false;
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * 获取文章标签
     * @param $id
     * @return array
     */
    public function getArticleTags($id)
    {
        $tags = $this->where('id',$id)->value('tag');
        return empty($tags) ? [] : explode('|',$tags);
    }

    /**
     * 修改文章标签
     * @param array $tags 被替换标签
     * @param array $newTag 替换标签
     * @return bool
     */
    public function updateTag($tags=[],$newTag)
    {
        if(!is_string($newTag) || empty($newTag)){
            Log::write(__FILE__.__LINE__."  传入参数错误:".json_encode($newTag,JSON_UNESCAPED_UNICODE),'ERROR');
            return false;
        }

        if(!is_array($tags) || count($tags)<1){
            Log::write(__FILE__.__LINE__."  传入参数正确:".json_encode($tags,JSON_UNESCAPED_UNICODE),'ERROR');
            return false;
        }
        foreach($tags as $tag){
            $data = $this->field(['id','tag','content'])->where('tag','like','%'.$tag."%")->select();
            foreach($data as &$value){
                $tagsArr = explode('|',$value['tag']);
                $index = array_search($tag,$tagsArr);
                if($index>=0){
                    $tagsArr[$index] = $newTag;
                    $value->tag = implode('|',$tagsArr);
                    $ret = $value->isUpdate(true)->save();
                    if($ret === false){
                        Log::write(__FILE__.__LINE__.'更新文章标签错'.$this->getLastSql(),'ERROR');
                        return false;
                    }
                }
            }
        }
        return true;
    }

}