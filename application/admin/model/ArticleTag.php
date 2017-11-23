<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/23
 * Time: 16:33
 */
namespace app\admin\model;

use think\Model;
use think\Log;

class ArticleTag extends Model{
    /**
     * 检查标签是否存在
     * @param $tag
     * @return bool
     */
    protected function checkIsExit($tag){
        $tag = $this->where('tag',$tag)->find();
        if(!is_null($tag)){
            return $tag['id'];
        }
        return false;
    }

    /**
     * 标签出现次数加1，首次出现新增此标签
     * @param $tag
     * @return bool|false|int
     */
    public function addTag($tag)
    {
        if(empty($tag)){
            return true;
        }
        $tagId = $this->checkIsExit($tag);
        if($tagId){
            $ret = $this->where('id', $tagId)->setInc('show_times');
            if($ret===false){
                return false;
            }
        }else{
            $this->data(['tag'=>$tag]);
            $ret =  $this->save();
            return $ret;
        }
        return true;
    }

    /**
     * 标签出现次数减1
     * 当标签出现次数为1时则删除此数据记录
     * @param $tag
     */
    public function delTag($tag){
        if(!empty($tag)){
            $showTimes = $this->where('tag',$tag)->value('show_times');
            if($showTimes > 1){
                $ret = $this->where('tag', $tag)->setDec('show_times');
                if($ret===false){
                    return false;
                }
            }else{
                return $this->where('tag',$tag)->delete();
            }
        }
        return true;
    }
}