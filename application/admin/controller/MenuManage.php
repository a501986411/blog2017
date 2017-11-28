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
use think\Exception;

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
        $model = new Menu();
        if(input('id')){
            $ret = $model->isUpdate(true)->save(input());
        }else{
            $ret = $model->allowField(true)->save(input());
        }
        if($ret === false){
            return false;
        }else{
            return true;
        }
    }

    /**
     * 菜单操作
     * @return bool
     */
    public function operateMenu()
    {
        $isUse = input('isUse');
        $menuId = input('menuId');
        $model = new Menu();
        try{
            $model->startTrans();
            if(!$isUse){
                $result = $model->stopChildMenu($menuId);
                if($result === false){
                    exception('修改失败');
                }
            }
            $model = $model->where('id',$menuId)->find();
            $model->status = $isUse;
            $ret = $model->save();
            if($ret === false){
                exception('修改失败');
            }
            $model->commit();
        }catch(Exception $e){
            $model->rollback();
            return ['success'=>false,'msg'=>$e->getMessage()];
        }
        return ['success'=>true];
    }

    /**
     * 获取菜单数据
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getMenuData()
    {
        $menuId = input('menuId');
        $model = new Menu();
        $result = $model->where('id',$menuId)->find();
        return $result;
    }
}