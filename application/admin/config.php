<?php
/**
 * admin����̨��ģ�鵥�������ļ�
 * User: chl
 * Date: 2017/11/20
 * Time: 15:00
 */
return [
    'template'               => [
        //����ʹ��ģ�岼��
        'layout_on'=>true,
        'layout_name'=>'layout/layout'
    ],
    'cookie_user' => 'user',
    'cookie'                 => [
        // cookie ����ǰ׺
        'prefix'    => 'admin_',
        // cookie ����ʱ��
        'expire'    => bcmul(3600,0.5),
        // cookie ����·��
        'path'      => '/',
        // cookie ��Ч����
        'domain'    => '',
        //  cookie ���ð�ȫ����
        'secure'    => false,
        // httponly����
        'httponly'  => '',
        // �Ƿ�ʹ�� setcookie
        'setcookie' => true,
    ],
];