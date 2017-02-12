<@override name="css">
    <@super/>
    <style>
        #mainDiv{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width:100%;
            min-height: 500px;
        }
        #sideDiv{
            width:200px;
            border:1px solid #337ab7;
            border-radius: 5px;
        }
        #rightDiv{
            width:800px;
            margin-left:33px;
            background: #e0eee8;
            height:2009px;
        }
    </style>
</@override>
<@override name="content">
<div id="mainDiv">
    <div id="sideDiv">
        <ul class="nav nav-pills nav-stacked" id="side_menu">
            <li id="side_menu_item1">
                <a href="/list1">最新信息</a>
            </li>
            <li id=side_menu_item2>
                <a href="/list2">第一部分</a>
            </li>
            <li id="side_menu_item3">
                <a href="/list3">第二部分</a>
            </li>
            <li id="side_menu_item4">
                <a href="list4">第二部分</a>
            </li>
            <li id="side_menu_item5">
                <a href="list5">第二部分</a>
            </li>
        </ul>
    </div>
    <div id="rightDiv">
        <@block name="rightDiv"></@block>
    </div>
</div>
</@override>
<@extends name="navTop.ftl"></@extends>