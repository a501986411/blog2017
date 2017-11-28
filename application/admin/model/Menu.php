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
    protected $statusConf = [0=>'停用', 1=>'启用'];
    protected $pk = 'id';
    /**
     * 获取顶部菜单
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
     * 获取子菜单
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

    /**
     * 获取菜单列表
     */
    public function getMenuList()
    {
        $list = $this->order('id','asc')->select();
        foreach($list as &$v){
            $v['status_text'] = $this->statusConf[$v['status']];
        }
        return $list;
    }

    /**
     * 状态获取器
     */
    public function getStatusTextAttr($value,$data)
    {
         $statusConf = [0=>'停用', 1=>'启用'];
         return $statusConf[$data['status']];
    }

    /**
     * 停用子菜单
     * @param $pid
     * @return bool
     */
    public function stopChildMenu($pid)
    {
        $ret = $this->isUpdate(true)->save(['status'=>0],['pid'=>$pid]);
        if($ret===false){
            return false;
        }
        return true;
    }
}