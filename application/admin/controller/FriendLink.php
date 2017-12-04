<?php
/**
 * 友情链接
 * User: CHL
 * Date: 2017/12/2
 * Time: 15:26
 */

namespace app\admin\controller;

use \app\admin\model\FriendLink as link;

class FriendLink extends Auth
{

    /**、
     * 友情链接管理页面
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }


    /**
     * 保存友情链接
     * @return bool
     */
    public function save()
    {
        $model = new link();
        $model->web_name = input('web_name');
        $model->web_url = input('web_url');
        if(input('id')){
            $model->id = input('id');
            $ret = $model->isUpdate(true)->save();
        }else{
            $ret = $model->save();
        }
        if($ret === false){
            return false;
        }
        return true;
    }

    /**
     * 获取友情链接列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getList()
    {
        $model = new link();
        $list = $model->select();
        return $list;
    }

    /**
     * 获取友情链接数据
     * @return array|null|static
     */
    public function getlinkData()
    {
        $linkId = input('linkId');
        if(!$linkId){
            return [];
        }

        $data = link::get($linkId);
        return $data;
    }

    /**
     * 删除 友情链接
     * @return bool
     */
    public function removeLink()
    {
        $linkId = input('linkId');
        $model = new link();
        $ret = $model->where('id',$linkId)->delete();
        if($ret=== false){
            return false;
        }
        return true;
    }
}