<?php
/**
 * Created by PhpStorm.
 * User: chl
 * Date: 2017/11/21
 * Time: 14:02
 */
namespace app\admin\model;

use think\Model;

class Menu  extends Model {

    /**
     * 获取以及菜单
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getTopList()
    {
        $topMenu = $this->where('status',1)
            ->where('pid',0)
            ->order('sort','asc')
            ->select();
        return $topMenu;
    }

    /**
     * 获取子菜单id
     * @param $pid
     */
    public function getChildMenuList($pid)
    {
        $menu = $this->where('pid',$pid)
        ->where('status',1)
        ->order('sort','asc')
        ->select();
        return $menu;
    }
}