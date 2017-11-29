<?php
/**
 * admin（后台）模块单独配置文件
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
    'cookie_user' => 'user',
    'cookie'                 => [
        // cookie 名称前缀
        'prefix'    => 'admin_',
        // cookie 保存时间
        'expire'    => bcmul(3600,0.5),
        // cookie 保存路径
        'path'      => '/',
        // cookie 有效域名
        'domain'    => '',
        //  cookie 启用安全传输
        'secure'    => false,
        // httponly设置
        'httponly'  => '',
        // 是否使用 setcookie
        'setcookie' => true,
    ],
];