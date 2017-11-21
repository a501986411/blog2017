<?php
/**
 * 菜单管理控制器
 * User: CHL
 * Date: 2017/11/21
 * Time: 20:33
 */
namespace app\admin\controller;

use app\admin\model\Menu;

class MenuMange {

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
}