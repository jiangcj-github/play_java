<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><@block name="title">主页</@block></title>
    <@block name="css_lib">
    <link rel="stylesheet" href="/lib/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    </@block>
    <@block name="css"></@block>
</head>
<body>
    <@block name="js_lib">
    <script src="/lib/jquery/jquery-3.1.1.min.js"></script>
    <script src="/lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    </@block>
    <div class="top">
        <div class="wh">
            <p class="fl">欢迎来到酷比网！
                <a href="#" class="hrefs" onclick="setHome(this,'http://www.baidu.com')">设为主页</a>|
                <a href="javascript:addFavorite('草莓网','http://www.caoliu.com')">加入收藏</a></p>
            <p class="fr">申请酷比帐号<a href="#" id="">注册</a>|<a href="#" id="">登录</a></p>
        </div>
    </div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <span class="navbar-brand">酷比网</span>
        </div>
        <form class="navbar-form navbar-right navbar-search" role="search">
            <div class="form-group">
                <input type="text" class="form-control form-search" placeholder="search..."/>
            </div>
            <button type="submit" class="btn btn-search"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </nav>
    <@block name="content"></@block>
    <@block name="js">
    <script>
        //设为首页
        function setHome(obj,url){
            try{
                obj.style.behavior='url(#default#homepage)';
                obj.setHomePage(url);
            }catch(e){
                if(window.netscape){
                    try{
                        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                    }catch(e){
                        alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
                    }
                }else{
                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
                }
            }
        }
        //收藏本站
        function addFavorite(title, url){
            try {
                window.external.addFavorite(url, title);
            }
            catch (e) {
                try {
                    window.sidebar.addPanel(title, url, "");
                }
                catch (e) {
                    alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请进入新网站后使用Ctrl+D进行添加");
                }
            }
        }
    </script>
    </@block>
</body>
</html>
