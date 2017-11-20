<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"F:\blog2017\public/../application/index\view\index\index.html";i:1511189679;s:63:"F:\blog2017\public/../application/index\view\layout\layout.html";i:1511189121;s:63:"F:\blog2017\public/../application/index\view\public\header.html";i:1511181755;s:63:"F:\blog2017\public/../application/index\view\public\footer.html";i:1511179763;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo APP_NAME; ?></title>
</head>
<link rel="stylesheet"  href="<?php echo APP_PUBLIC; ?>layui/css/layui.css"/>
<link rel="stylesheet"  href="<?php echo APP_PUBLIC; ?>static/css/bass.css"/>
<link rel="stylesheet"  href="<?php echo APP_PUBLIC; ?>static/css/font-awesome.min.css"/>
<script src="<?php echo APP_PUBLIC; ?>layui/layui.js"></script>
<script src="<?php echo APP_PUBLIC; ?>static/js/layui_use.js"></script>
<body class="padding-none margin-none layui-bg-gray">
<style>
.nav-bg{background-color: #393D49;}
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
<nav class="layui-header nav-bg layui-col-md12" style="position: fixed;top: 0px;">
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
<div class="layui-container" style="width: 1400px;">
    <style>
    .body-left{margin-top: 70px;float: left;}
    .body-right{margin-top: 70px;margin-left: 20px;float: left;}
    .index-article{
        padding: 15px;
        margin-bottom: 10px;
        background: #fff;
        border-left: 5px solid #fff;
        -moz-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }
    .index-article > .article-left {width: 25%;float: left;}
    .index-article > .article-right {float: left;width: 75%;}
    .index-article > .article-left > img{width: 100%;height: auto;}
    .index-article > .article-right > .article-title a {
        font-size: 18px;
    }
    .index-article > .article-footer {
        margin-top: 10px;
        font-size: 13px;
    }
    .index-article > .article-footer > span {
        padding-right: 3%;
    }
    .index-article > .article-footer > .article-viewinfo{float: right;display: inline-block;}
</style>
    <div class="layui-col-md7 body-left">
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
        <div class="article-left">
            <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
        </div>
        <div class="article-right">
            <div class="article-title">
                <i class="icon-stick">顶</i>
                <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
            </div>
            <div class="article-abstract">
                .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
            </div>
        </div>
        <div class="layui-clear"></div>
        <div class="article-footer">
            <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
            <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
            <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
            <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
        </div>
    </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
        <div class="index-article shadow">
            <div class="article-left">
                <img src="<?php echo APP_PUBLIC; ?>static/tmpImg/201708252044567037.jpg" alt="【Welcome to .NET Core】ASP.NET Core介绍">
            </div>
            <div class="article-right">
                <div class="article-title">
                    <i class="icon-stick">顶</i>
                    <a href="/Article/Detail/LY08252045102818">【Welcome to .NET Core】ASP.NET Core介绍</a>
                </div>
                <div class="article-abstract">
                    .NET Core入门系列第一篇。ASP.NET Core是一个新的开源和跨平台框架，用于构建Web应用。
                </div>
            </div>
            <div class="layui-clear"></div>
            <div class="article-footer">
                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;2017-08-25</span>
                <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;Absolutely</span>
                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;410</span>
                <span class="article-viewinfo"><i class="fa fa-comment"></i>&nbsp;0</span>
            </div>
        </div>
    </div>
    <div class="layui-col-md4 body-right" style="background-color: yellow;height: 100px;">

    </div>
    <div style="clear:both;"></div>

</div>
<style>
    .footer{text-align: center;border-top: 1px solid #009688;margin-top: 15px;background: #2F4056;padding: 5px 0;color: #d3d2d2;}
    .footer > p {
        margin: 2px 0;
    }
    .footer a {
        color: #d2d2d2;
    }
    .footer > p a, .footer > p span {
        padding-left: 7px;
    }
</style>
<footer class="footer">
    <p><span>Copyright</span><span>©</span><span>2017</span><a href="http://www.heiniuer.cn">黑牛儿</a><span>Design By ChenHaiLong</span></p>
    <p><a href="http://www.miibeian.gov.cn/" target="_blank">蜀ICP备xxxxxx号-1</a></p>
</footer>
</body>
</html>