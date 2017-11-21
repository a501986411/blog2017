<?php
namespace app\admin\controller;

use app\admin\model\Menu;

class Index
{
    /**
     * ��ҳ
     * @return \think\response\View
     */
    public function index()
    {
        return view();
    }

    public function main()
    {
        return view();
    }


    public function menuMange()
    {
        return view();
    }

    /**
     * 获取顶部菜单
     * @return mixed
     */
    public function getTopMenuList(){
        $model = new Menu();
        $menu['topMenu'] = $model->getTopList();
        return $menu;
    }

    /**
     * 获取左侧菜单
     * @return mixed
     */
    public function getChildMenu()
    {
        $pid = input('get.pid');
        $model = new Menu();
        $menu['leftMenu'] = $model->getChildMenuList($pid);
        return $menu;
    }

}
