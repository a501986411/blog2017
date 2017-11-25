<?php
/**
 * index（前台）模块单独配置文件
 * User: chl
 * Date: 2017/11/20
 * Time: 15:00
 */
return [
    'template'               => [
        //开启使用模板布局
        'layout_on'=>true,
        'layout_name'=>'layout/layout'
    ],
    'page_rows'=>10,

    'menu' => [
        '1'=>'home',
        '2'=>'article',
        '3'=>'about'
    ],
];