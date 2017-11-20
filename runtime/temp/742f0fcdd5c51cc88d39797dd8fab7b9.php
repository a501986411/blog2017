<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\project\blog2017\public/../application/index\view\index\index.html";i:1511163027;s:71:"E:\project\blog2017\public/../application/index\view\layout\layout.html";i:1511169857;s:71:"E:\project\blog2017\public/../application/index\view\public\header.html";i:1511168955;s:71:"E:\project\blog2017\public/../application/index\view\public\footer.html";i:1511162980;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo APP_NAME; ?></title>
</head>
<link rel="stylesheet"  href="<?php echo APP_PUBLIC; ?>layui/css/layui.css"/>
<link rel="stylesheet"  href="<?php echo APP_PUBLIC; ?>static/css/bass.css"/>
<script src="<?php echo APP_PUBLIC; ?>layui/layui.js"></script>
<script src="<?php echo APP_PUBLIC; ?>static/js/layui_use.js"></script>
<body class="padding-none margin-none layui-bg-gray">
<style>
.nav-bg{background-color: #393D49;border-bottom: 1px solid rgb(95, 184, 120);}
.nav{position: relative;}
.nav-common{position: absolute; left: 15%;top:0;}
.nav-logo{
    width: auto;
    text-align: center;
    line-height: 64px;
    font-size: 30px;
    color: white;
    font-weight: bold;
    font-family:KaiTi;
    display: inline-block;
    z-index: 10;
    margin:  0 auto;
}
.nav-common .layui-nav{width: 85%;}
</style>
<nav class="layui-header nav-bg layui-col-md12">
    <div class="nav nav-common layui-col-md10">
        <a class="nav-logo" href="/">黑牛儿</a>
        <ul class="nav-common layui-nav" lay-filter="nav">
            <li class="layui-nav-item layui-this">
                <a href="/"><i class="fa fa-home fa-fw"></i>首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="">程序猿</a>
                <dl class="layui-nav-child">
                    <dd><a>技术</a></dd>
                    <dd><a>工作</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="">生活</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="">心情</a></dd>
                    <dd><a href="">感想</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">关于</a></li>
        </ul>
    </div>
</nav>
dfsdfsdfsd
<div>
    this is footer
</div>
</body>
</html>