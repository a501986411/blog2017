<?php
/**
 * 公告管理
 * User: chl
 * Date: 2017/12/11
 * Time: 10:30
 */

namespace app\admin\controller;
use \app\admin\model\Notice as noticeModel;

class Notice extends Auth
{
    /**
     * 公告管理页面
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }

    /**
     * 公告保存修改
     * @return bool
     */
    public function save()
    {
        $model = new noticeModel();
        $model->content = input('post.content');
        $model->url = input('post.url');
        $model->create_time = time();
        if(empty(input('post.id'))){
            $ret = $model->save();
            if($ret === false){
                return false;
            }
        }else{
            $model->id = input('post.id');
            $ret = $model->isUpdate(true)->save();
            if($ret === false){
                return false;
            }
        }
        return true;
    }

    /**
     * 获取列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getList()
    {
        $model = new noticeModel();
        $result = $model->order('id','desc')->select();
        return $result;
    }

    /**
     * 删除公告
     */
    public function removeNotice()
    {
        if(!input('?get.noticeId')){
            return false;
        }
    }
}