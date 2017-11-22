<?php
/**
 * 菜单管理控制器
 * User: CHL
 * Date: 2017/11/21
 * Time: 20:33
 */
namespace app\admin\controller;

use app\admin\model\Menu;
use think\Controller;

class MenuMange extends Controller{

    /**
     * 菜单管理页面
     * @return \think\response\View
     */
    public function menuMange()
    {
        $model = new Menu();
        $topMenuList = $model->getTopList();
        return view('',['topMenuList'=>$topMenuList]);
    }

    /**
     * 获取菜单列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getMenuList()
    {
        $model = new Menu();
        $list = $model->getMenuList();
        return $list;
    }

    /**
     * 保存菜单数据
     */
    public function save()
    {
        $model = new Menu(input());
        $ret = $model->allowField(true)->save();
        if($ret){
            return true;
        }else{
            return false;
        }
    }
}