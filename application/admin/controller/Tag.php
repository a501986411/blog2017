<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/12/13
 * Time: 11:00
 */

namespace app\admin\controller;


use app\admin\model\Article;
use app\admin\model\ArticleTag;
use think\Exception;
use think\Log;

class Tag extends Auth
{

    /**
     * 标签管理首页
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }

    /**
     * 获取标签列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getList()
    {
        $model = new ArticleTag();
        $result =  $model->order('show_times','desc')->select();
        foreach($result as &$value){
            $value->status_text = $value->status_text;
        }
        return $result;
    }

    /**
     * 屏蔽标签
     * @return bool
     */
    public function removeTag()
    {
        if(!input('?get.tagId')){
            return false;
        }
        $model = new ArticleTag();
        $model->status = 2;
        $model->id = input('get.tagId');
        $ret = $model->isUpdate(true)->save();
        if($ret=== false){
            return false;
        }
        return true;
    }
    /**
     * 启用标签
     * @return bool
     */
    public function useTag()
    {
        if(!input('?get.tagId')){
            return false;
        }
        $model = new ArticleTag();
        $model->status = 1;
        $model->id = input('get.tagId');
        $ret = $model->isUpdate(true)->save();
        if($ret=== false){
            return false;
        }
        return true;
    }

    /**
     * 合并标签
     * @return bool
     */
    public function mergeTags()
    {
        if(!input('?post.tags')){
            return false;
        }
        $tags = input('post.tags');
        $model = new ArticleTag();
        $articleModel = new Article();
        $result = $model->where('id','in',explode(',',$tags))->select();

        $totalShowTimes = 0; //合计频率
        $lastTagTd = 0; //保留标签的id
        $maxShowTimes = 0;//最大频率
        $lastTag = '';//保留的标签
        $deleteId = 0;//需要删除的Id

        try{
            $model->startTrans();
            foreach($result as $key=>$value){
                $model = new ArticleTag();
                $articleModel = new Article();
                if($maxShowTimes <= $value['show_times']){
                    $deleteId = $lastTagTd;//更待徐删除的标签id
                    //更改保留标签
                    $lastTagTd = $value['id'];
                    $maxShowTimes = $value['show_times'];
                    $lastTag = $value['tag'];
                }else {
                    $deleteId = $value['id'];
                }

                //删除tag 同时更新 文章标签
                if($deleteId){
                    //更新文章
                    if(!$articleModel->updateTag([$value['tag']],$lastTag)){
                        throw new Exception('更新文章标签出错');
                    }
                    //删除标签
                    $ret = $model->delete($deleteId);
                    if($ret === false){
                        Log::write(__FILE__.__LINE__.'标签删除错误:'.$model->getError());
                        throw new Exception('删除标签出错');
                    }
                }
                $totalShowTimes += $value['show_times'];
            }

            //更新保留标签频率
            $ret = $model->save(['show_times'=>$totalShowTimes],['id'=>$lastTagTd]);
            if($ret === false){
                throw new Exception('更新保留标签出错');
            }
            $model->commit();
            return true;
        }catch (Exception $e){
            $model->rollback();
            Log::write(__FILE__.__LINE__.$e->getMessage(),'ERROR');
            return false;
        }
    }

}