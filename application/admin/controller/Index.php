<?php
namespace app\admin\controller;

use app\admin\model\Menu;

class Index extends Before
{
    /**
     * 首页
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


    /**
     * 获去顶部菜单列表
     * @return mixed
     */
    public function getTopMenuList(){
        $model = new Menu();
        $menu['topMenu'] = $model->getTopList();
        return $menu;
    }

    /**
     * 获取子菜单列表
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
