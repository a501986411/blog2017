<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/23
 * Time: 16:33
 */
namespace app\admin\model;

use think\Model;

class ArticleTag extends Model{

    /**
     * 检查标签是否存在
     * @param $tag
     * @return bool
     */
    protected function checkIsExit($tag){
        $tag = $this->where('tag',$tag)->find();
        if($tag){
            return $tag['id'];
        }
        return false;
    }

    /**
     * 保存标签
     * @param $tag
     * @return bool|false|int
     */
    public function saveTag($tag)
    {
        $tagId = $this->checkIsExit($tag);
        if($tagId){
            $ret = $this->where('id', $tagId)->setInc('show_times');
            if($ret===false){
                return false;
            }
        }else{
           return $this->save(['tag'=>$tag]);
        }
        return true;
    }
}