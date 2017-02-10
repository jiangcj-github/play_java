
@extends("main")
@section("title","item1")

@section("css")
    @parent
    <style>
        .containDiv{
            width:100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .rowDiv{
            width: 100%;
            height:200px;
            display: flex;
            justify-content: center;
            padding-left:10px;
            margin-top:10px;
        }
        .unitDiv{
            height:100%;
            width:170px;
            margin-right: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .unitDiv img{
            width: 130px;
            height: 180px;
            border-radius: 3px;
            cursor: pointer;
        }
        .unitDiv img:hover{
            opacity: 0.6;
        }
        .img-label{
            width: 100%;
            height: 20px;
            line-height: 20px;
            padding: 0 10px 0 10px;
            text-align: center;
            overflow: hidden;
            font-size: 12px;
        }
        .bottomDiv{
            line-height: 50px;
            margin-top: 20px;
            text-align: center;
            height: 50px;
        }
        .b_btn{
            display: inline-block;
            padding: 0 15px 0 15px;
            background: darkgray;
            height: 24px;
            margin-top: 3px;
            line-height: 24px;
            border-radius: 3px;
            font-size: 12px;
            cursor: pointer;
        }
        .b_btn:hover{
            background: gray;
        }
        .b_btn.active{
            background: dodgerblue;
            color: white;
        }
        .go_input{
            height: 25px;
            width: 60px;
            padding: 2px 22px 2px 5px;
            margin-left:10px;
        }
        .go_btn{
            width: 20px;
            font-size: 12px;
            height: 20px;
            line-height: 20px;
            margin-left: -22px;
            display: inline-block;
            cursor: pointer;
            vertical-align: middle;
        }
        .go_btn:hover{
            color:gray;
        }
    </style>
@stop

@section("rightDiv")
    @parent
    <div class="containDiv">
        <div class="rowDiv">
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获阶段</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题2实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题3实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获则事件在句柄捕获阶段阶段</span>
            </div>
        </div>
        <div class="rowDiv">
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获阶段</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题2实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题3实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获则事件在句柄捕获阶段阶段</span>
            </div>
        </div>
        <div class="rowDiv">
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获阶段</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题2实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题3实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获则事件在句柄捕获阶段阶段</span>
            </div>
        </div>
        <div class="rowDiv">
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获阶段</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题2实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题3实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获则事件在句柄捕获阶段阶段</span>
            </div>
        </div>
        <div class="rowDiv">
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获阶段</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题2实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">标题3实例</span>
            </div>
            <div class="unitDiv">
                <img src="img/1.jpg">
                <span class="img-label">则事件在句柄捕获则事件在句柄捕获阶段阶段</span>
            </div>
        </div>
        <div class="bottomDiv">

            <div class="b_btn">上一页</div>
            <div class="b_btn">1</div>
            <div class="b_btn">2</div>
            <div class="b_btn active">3</div>
            <div class="b_btn">4</div>
            <div class="b_btn">5</div>
            <div class="b_btn">下一页</div>
            <div class="b_btn">首页</div>
            <div class="b_btn">末页</div>
            <span style="margin-left: 10px;">共20页</span>
            <input type="text" class="go_input"><i class="icon-search go_btn"></i>

        </div>
    </div>
@stop

@section("js")
    @parent
    <script>
        $(document).ready(function(){
            //
            $("#side_menu_item2").addClass("active");
            $("#side_menu_item2>a").attr("href","#");
        });
    </script>
@stop