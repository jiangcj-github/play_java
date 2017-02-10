@extends("nav")

@section("title","play")

@section("css_lib")
    @parent

@stop

@section("css")
    @parent
    <style>
        body{
            font-family: "微软雅黑";
            box-sizing: border-box;
        }
        #playDiv{
            display: flex;
            justify-content: center;
            align-items: center;
            width:100%;
        }
        #leftDiv{
            width:840px;
        }
        #caption{
            width: 100%;
            height:40px;
            line-height: 40px;
            font-size:14px;
            color:#777;
        }
        #videoDiv{
            width: 100%;
            height: 580px;
            position: relative;
        }
        :-webkit-full-screen{
            width: 100% !important;
            height: 100% !important;
        }
        :-moz-full-screen{
            width: 100% !important;
            height: 100% !important;
        }
        :-ms-fullscreen{
            width: 100% !important;
            height: 100% !important;
        }
        .controls{
            width: 100%;
            height:40px;
            font-size: 14px;
            cursor: default;
            background: black;
            opacity: 0.9;
            margin-top: -80px;
            color: #cccccc;
            display: flex;
            align-items: center;
        }
        .control-item{
            margin-left: 10px;
            margin-right: 10px;
        }
        .btnPlay{
            font-size: 20px;
            cursor: pointer;
        }
        .progressBar
        {
            position: relative;
            flex-grow: 1;
            height:6px;
            background-color: #cccccc;
            border-radius: 5px;
        }
        .timeBar
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: gray;
            border-radius: 5px;
        }
        .timeBar:before{
            content: "";
            width: 12px;
            height: 12px;
            background: dodgerblue;
            position: absolute;
            right: 0px;
            margin-right:-6px;
            z-index: 1000;
            border-radius: 6px;
            margin-top: -3px;
        }
        .progressTime{
            font-size: 14px;
        }
        .bufferBar {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: darkgreen;
            border-radius: 5px;
        }
        .volumeDiv{
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .muted{
            font-size: 20px;
            width: 20px;
            cursor: pointer;
        }
        .volumeBar{
            position: relative;
            width: 100px;
            height:6px;
            margin-left: 8px;
            background-color: #cccccc;
            border-radius: 5px;
        }
        .volume{
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background-color: gray;
            border-radius: 5px;
        }
        .volume:before{
            content: "";
            width: 12px;
            height: 12px;
            background: dodgerblue;
            position: absolute;
            right: 0px;
            margin-right:-6px;
            z-index: 1000;
            border-radius: 6px;
            margin-top: -3px;
        }
        .playSpeed{
            display: inline-flex;
            justify-content: space-around;
            align-items: center;
            width: 100px;
        }
        .playSpeed-item{
            height:25px;
            line-height: 25px;
            font-size: 12px;
            width: 30px;
            text-align: center;
            border: 1px solid #cccccc;
            border-radius: 3px;
            cursor: pointer;
        }
        .playSpeed-item.active{
            color: yellow;
        }
        .fullscreen{
            font-size: 20px;
            cursor: pointer;
        }
        .tools{
            width: 100%;
            height:40px;
            font-size: 14px;
            cursor: default;
            background: black;
            color: #cccccc;
            opacity: 0.99;
            display: flex;
            align-items: center;
        }
        .barrage{
            margin-left: 20px;
            flex-grow: 1;
            display: inline-flex;
            align-items: center;
            justify-content: space-around;
        }
        .inputBarrage{
            flex-grow: 1;
            width: 200px;
            height: 27px;
            line-height: 27px;
            border-radius: 3px;
            border: 1px solid black;
            padding: 0 5px 0 30px;
            color:black;
            font-size: 12px;
        }
        .inputBarrage:focus{
            outline: none !important;
        }
        .btnBarrage{
            height: 25px;
            display: inline-block;
            background: white;
            padding: 0 10px 0 10px;
            line-height: 25px;
            color:white;
            background: green;
            cursor: pointer;
            font-size: 12px;
        }
        .btnBarrage:hover{
           background: darkgreen;
        }
        .emotion{
            width: 24px;
            height: 24px;
            margin-right: -25px;
            z-index: 1000;
        }
        .qqFace{
            background: #fff;
            border:1px #cccccc solid;
            border-radius: 3px;
            width: 390px;
            height: 140px;
            box-sizing: content-box;
        }
        .qqFace table td img{cursor:pointer;border:1px #fff solid !important;}
        .qqFace table td img:hover{border:1px #0066cc solid !important;}
        #face_1{
            position: static !important;
            margin-top: -166px;
        }
        .toggle{
            width: 70px;
            height: 25px;
            margin-left: 20px;
            margin-right: 20px;
            background: gray;
            cursor: pointer;
            position: relative;
        }
        .toggleBtn{
            width:40px;
            height: 25px;
            line-height: 25px;
            font-size: 13px;
            text-align: center;
            background: green;
            position: absolute;
        }
        .toggle-item{
            line-height: 25px;
            font-size: 12px;
            text-align: center;
            width:30px;
            height: 25px;
            position: absolute;
        }
        #maskDiv{
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events:none;
            top:0px;
            padding-top:30px;
            overflow: hidden;
            display:none;
        }
        .barageLine{
            height: 30px;
            margin-top: 5px;
            line-height: 30px;
            font-size: 16px;
            color: yellow;
            position: relative;
            left:100%;
        }
        .barageLine >span{
            position: absolute;
        }
        #rightDiv{
            width: 230px;
            height: 580px;
            background: #789262;
            overflow-x: hidden;
            overflow-y: auto;
            align-self: flex-start;
            margin-top: 40px;
            border: 1px solid gray;
            border-radius: 3px;
            padding: 5px;
            line-height: 14px;
        }
        .r_list{
            line-height: 17px;
            font-size: 14px;
            border-bottom: 1px solid gray;
            padding: 0 3px 0 3px;
            cursor: pointer;
            color:white;
        }
        .r_list:hover{
            color:yellowgreen;
        }
        .r_list.active{
            color:yellowgreen;
        }
        .r_list_user{
            float: left;
            font-size: 12px;
        }
        .r_list_content{
            text-align: right;
            margin-top: 5px;
            margin-bottom: 3px;
            line-height: 24px;
        }
        .r_list_time{
            text-align: right;
            font-size: 12px;
        }
        #commentDiv{
            width:100%;
            min-height:500px;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
        .sendComment{
            width: 1064px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
        }
        .sc_label{
            width: 100%;
            font-size: 16px;
            color: green;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .sc_text{
            width: 100%;
            border: 1px solid green;
            padding: 5px;
            border-bottom: none;
        }
        .sc_text:focus{
            outline: none;
        }
        .sc_emotion{
            width: 100%;
            height: 28px;
            border:1px solid green;
            border-top:none;
            line-height: 28px;
            display: flex;
            align-items: center;
            padding-left: 3px;
            background: #e3e3e3;
        }
        .sc_emotion img{
            cursor: pointer;
        }
        #face_2{
            position: static !important;
            margin-top: -169px;
            margin-left: -27px;
        }
        .sc_submit{
            align-self: flex-end;
            width:100px;
            height: 35px;
            background: green;
            line-height: 35px;
            color: white;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }
        .sc_submit:hover{
            background: darkgreen;
        }
        .commentList{
            width: 1064px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 10px;
            padding: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
        .cl_header{
            font-size: 16px;
            margin-bottom: 10px;
        }
        .cl_header a{
            text-decoration: none;
            display: inline-block;
            color: green;
        }
        .cl_header a:hover{
            color:darkgreen;
        }
        .cl_header a.active{
            color:black;
        }
        .cl-item{
            width: 100%;
            margin-top: 15px;
            display: flex;
            align-items: center;
            padding: 10px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e2e5;
        }
        .headImg{
            width:48px;
            height: 48px;
            border-radius: 50%;
            align-self: flex-start;
        }
        .item-content{
            height: 100%;
            margin-left: 10px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding-right: 20px;
        }
        .ic-header{
            height: 20px;
            margin-bottom: 8px;
            line-height: 20px;
            font-size: 12px;
            color:#7b838a;

        }
        .ic-header .small{
            font-size: 12px;
            float: right;
            color:#acb4bb;
        }
        .ic-main{
            flex-grow: 1;
            line-height: 20px;
            font-size: 14px;
        }
        .ic-reply{
            background: #e4e4e4;
            line-height: 20px;
            min-height: 60px;
            padding: 10px 20px 10px 20px;
            border-bottom: 1px solid #cccccc;
            display: flex;
            align-items: center;
        }
        .reply-main{
            flex-grow: 1;
            margin-left: 10px;
        }
        .reply-header{
            height: 20px;
            margin-bottom: 8px;
            line-height: 20px;
            font-size: 12px;
            color:#7b838a;
        }
        .reply-header .small{
            font-size: 12px;
            float: right;
            color:#acb4bb;
        }
        .reply-content{
            line-height: 20px;
        }
        .ic-footer{
            margin-top: 8px;
            margin-bottom: 8px;
            height: 20px;
            line-height: 20px;
            font-size: 12px;
            align-self: flex-end;
            color:#949ba1;
        }
        .ic-footer a{
            color:#949ba1;
        }
        .ic-footer a:hover{
            color:#f60;
        }
        .ic-reply-footer{
            padding:5px 30px;
            font-size:12px;
        }
        .ic-reply-footer >a{
            margin-right: 10px;
        }
        .if_seperator{
            margin-left: 8px;
            margin-right:8px;
        }
        .reply-input{
            margin-bottom: 10px;
            display: none;
            flex-direction: column;
        }
        .reply-input.eject{
            display: flex !important;
        }
        .ri_text{
            width:100%;
            border: 1px solid gray;
            padding: 5px;
            border-bottom: none;
        }
        .ri_text:focus{
            outline: none;
        }
        .ri_emotion{
            width: 100%;
            height: 28px;
            border:1px solid gray;
            border-top:none;
            line-height: 28px;
            display: flex;
            align-items: center;
            padding-left: 3px;
            background: #e3e3e3;
        }
        .ri_emotion img{
            cursor: pointer;
        }
        .ri_emotion >.qqFace{
            position: static !important;
            margin-top: -169px;
            margin-left: -27px;
        }
        .ri_submit{
            align-self: flex-end;
            width:90px;
            height: 30px;
            background: green;
            line-height: 30px;
            color: white;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }
        .ri_submit:hover{
            background: darkgreen;
        }
        .cl-pageControll{
            display:flex;
            justify-content: flex-end;
            width: 100%;
            height: 50px;
            align-items: center;
            padding-right: 50px;
        }
        .pg-btn{
            font-size: 14px;
            margin: 0 6px;
        }
        .xpl-btn{
            margin-top: 20px;
            background: #858c93;
            width: 100%;
            color: white;
        }
        .xpl-btn:hover{
            background:#858c93;
            color:white;
        }
    </style>
@stop

@section("content")
    <div id="playDiv">
        <div id="leftDiv">
            <div id="caption">
                <b>正在播放：喜洋洋和灰太狼</b>
            </div>
            <div id="videoDiv">
                <div id="video" style="display: none"></div>
                <div class="controls">
                    <div class="btnPlay control-item"><i class="glyphicon glyphicon-play"></i></div>
                    <div class="progressBar control-item">
                        <div class="bufferBar"></div>
                        <div class="timeBar"></div>
                    </div>
                    <div class="progressTime control-item">
                        <span class="current"></span>/
                        <span class="duration"></span>
                    </div>
                    <div class="volumeDiv control-item">
                        <div class="muted"><i class="icon-volume-up"></i></div>
                        <div class="volumeBar">
                            <div class="volume"></div>
                        </div>
                    </div>
                    <div class="playSpeed control-item">
                        <div class="slow playSpeed-item">&times;0.5</div>
                        <div class="normal playSpeed-item active">&times;1</div>
                        <div class="fast playSpeed-item">&times;2</div>
                    </div>
                    <div class="fullscreen control-item"><i class="glyphicon glyphicon-fullscreen"></i></div>
                </div>
                <div class="tools">
                    <div class="barrage">
                        <div class="emotion"><img src="/img/laugh.png" style="width:24px;height:24px;"></div>
                        <input type="text" class="inputBarrage" id="saytext">
                        <div class="btnBarrage">发送</div>
                    </div>
                    <div class="toggle" id="barrageSwitch">
                        <div style="background:white;color:gray;left:0;" class="toggle-item">开</div>
                        <div style="right:0;" class="toggle-item">关</div>
                        <div class="toggleBtn">弹幕</div>
                    </div>
                </div>
                <div id="maskDiv">
                    <div class="barageLine" id="line1">
                        @foreach($barrage as $key=>$value)
                            @if($loop->index%5!=0)
                                @continue
                            @endif
                            <span style="left:{!! ($value->time-3)*50 !!}px">{!! $value->name !!}：{!! $value->text !!}</span>
                        @endforeach
                    </div>
                    <div class="barageLine" id="line2">
                        @foreach($barrage as $key=>$value)
                            @if($loop->index%5!=1)
                                @continue
                            @endif
                            <span style="left:{!! ($value->time-3)*50 !!}px">{!! $value->name !!}：{!! $value->text !!}</span>
                        @endforeach
                    </div>
                    <div class="barageLine" id="line3">
                        @foreach($barrage as $key=>$value)
                            @if($loop->index%5!=2)
                                @continue
                            @endif
                            <span style="left:{!! ($value->time-3)*50 !!}px">{!! $value->name !!}：{!! $value->text !!}</span>
                        @endforeach
                    </div>
                    <div class="barageLine" id="line4">
                        @foreach($barrage as $key=>$value)
                            @if($loop->index%5!=3)
                                @continue
                            @endif
                            <span style="left:{!! ($value->time-3)*50 !!}px">{!! $value->name !!}：{!! $value->text !!}</span>
                        @endforeach
                    </div>
                    <div class="barageLine" id="line5">
                        @foreach($barrage as $key=>$value)
                            @if($loop->index%5!=4)
                                @continue
                            @endif
                            <span style="left:{!! ($value->time-3)*50 !!}px">{!! $value->name !!}：{!! $value->text !!}</span>
                        @endforeach
                    </div>
                    <div class="barageLine" id="line6"></div>
                </div>
            </div>
        </div>
        <div id="rightDiv">
            @foreach($barrage as $key=>$value)
                <div class="r_list">
                    <div class="r_list_user">{!! $value->name !!}</div>
                    <div class="r_list_time" time="{!! $value->time !!}">{!! $value->time !!}</div>
                    <div class="r_list_content">{!! $value->text !!}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="commentDiv">
        <div class="sendComment">
            <div class="sc_label">
                发表留言:
            </div>
            <textarea class="sc_text" rows="5" id="sc_text"></textarea>
            <div class="sc_emotion"><img src="/img/laugh.png" style="width:24px;height:24px;"></div>
            <div class="sc_submit">提交</div>
        </div>
        <div class="commentList">
            <div class="cl_header">
                <a href="javascript:void(0);">按时间</a>
                <span style="margin-left:3px;margin-right: 3px;color:black;">|</span>
                <a href="javascript:void(0);">按热度</a>
            </div>
            @foreach($comment as $key=>$value)
                <div class="cl-item">
                    <img src="{!! $value->headimg !!}" class="headImg">
                    <div class="item-content">
                        <div class="ic-header">{!! $value->name !!}<span class="small">{!! $value->time !!}</span></div>
                        <div class="ic-main">{!! $value->text !!}</div>
                        <div class="ic-footer">
                            <a href="javascript:void(0);">支持</a>&nbsp;({!! $value->suport !!})
                            <span class="if_seperator">|</span>
                            <a href="javascript:void(0);">反对</a>&nbsp;({!! $value->object !!})
                            <span class="if_seperator">|</span>
                            <a href="javascript:void(0);" onclick="$(this).parent().next().toggleClass('eject')">回复</a>
                        </div>
                        <div class="reply-input">
                            <textarea rows="3" class="ri_text" id="{!! $value->id !!}"></textarea>
                            <div class="ri_emotion"><img src="/img/laugh.png" style="width:24px;height:24px;"></div>
                            <script>
                                $('.ri_emotion img').qqFace({
                                    assign:'{!! $value->id !!}',
                                    path:'/lib/jQuery-qqFace/arclist/'
                                });
                            </script>
                            <div class="ri_submit">确定</div>
                        </div>
                        @foreach($reply[$key."_reply"] as $rkey=>$rvalue)
                            @if($loop->index>=3)
                                <div class="ic-reply" style="display: none;">
                            @else
                                <div class="ic-reply">
                            @endif
                                <img src="{!! $rvalue->headimg !!}" class="headImg">
                                <div class="reply-main">
                                    <div class="reply-header">{!! $rvalue->name !!}<span class="small">{!! $rvalue->time !!}</span></div>
                                    <div class="reply-content">{!! $rvalue->text !!}</div>
                                </div>
                            </div>
                        @endforeach
                        @if(count($reply[$key."_reply"])>3)
                            <div class="ic-reply-footer">
                                <a href="javascript:void(0)" onclick="$(this).parents('.item-content').find('.ic-reply').show()">查看全部({!! count($reply[$key."_reply"]) !!})</a>
                                <a href="javascript:void(0)" onclick="$(this).parents('.item-content').find('.ic-reply').slice(3).hide()">收起</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <!--page-->
            <div class="cl-pageControll">
                <span class="pg-btn">当前位置：第5页</span>
                <a class="pg-btn" href="javascript:void(0)">上一页</a>
                <a class="pg-btn" href="javascript:void(0)">下一页</a>
                <a class="pg-btn" href="javascript:void(0)">首页</a>
                <a class="pg-btn" href="javascript:void(0)">尾页</a>
            </div>
            <div class="btn xpl-btn" onclick="location.href='#commentDiv'">写评论</div>
        </div>
        <div style="height: 200px"></div>
    </div>
    </div>
@stop

@section("js_lib")
    @parent
    <script type="text/javascript" src="/lib/jQuery-qqFace/js/jquery.qqFace.js"></script>
    <script type="text/javascript" src="/lib/jQuery-qqFace/js/jquery-browser.js"></script>
    <script src="lib/jwplayer/jwplayer.js" type="text/javascript"></script>
    <script src="lib/jwplayer/jwplayer.html5.js" type="text/javascript"></script>
@stop

@section("js")
    @parent
    <script>

        $(document).ready(function(){
            $(document).bind("selectstart",function(){
                return false;}
            );
            $(document).bind("dragstart",function(){
                return false;
            });
            $(".controls").mouseenter(function(){
                $(".controls").css("opacity","0.9");
            });
            $(".controls").mouseleave(function(){
                if(thePlayer.getState()=="playing"){
                    $(".controls").css("opacity","0");
                }
            });
        });

        var thePlayer;

        $(function() {
            thePlayer = jwplayer('video').setup({
                primary: "flash",
                flashplayer: "lib/jwplayer/Player.swf",
                width: "100%",
                height: "100%",
                controls: false,
                icons:true,
                stretching:"uniform",
                preload:"auto",
                logo:{
                    file: "img/bad_mark.png"
                },
                playlist:[{
                    file:"/video",
                    type:"flv"
                }],
                events:{
                    onPlay:function(){
                        $(".btnPlay").children("i").removeClass("glyphicon-play glyphicon-play");
                        $(".btnPlay").children("i").addClass("glyphicon-play glyphicon-pause");
                    },
                    onPause:function(){
                        $(".btnPlay").children("i").removeClass("glyphicon-play glyphicon-pause");
                        $(".btnPlay").children("i").addClass("glyphicon-play glyphicon-play");
                    },
                    onMute:function(e){
                        if(e.mute){
                            $(".muted").children("i").removeClass("icon-volume-up");
                            $(".muted").children("i").addClass("icon-volume-off");
                        }
                        else{
                            $(".muted").children("i").removeClass("icon-volume-off");
                            $(".muted").children("i").addClass("icon-volume-up");
                        }
                    },
                    onMeta:function(e){
                        $(".duration").text(formatSeconds(thePlayer.getDuration()));
                        $(".current").text("00:00");
                        $(".barageLine").css("width",thePlayer.getDuration()*50);
                    },
                    onTime:function(){
                        var currentPos = thePlayer.getPosition();
                        var maxduration = thePlayer.getDuration();
                        $(".current").text(formatSeconds(currentPos));
                        //
                        if(thePlayer.getState()=="paused"){
                            $(".btnPlay").children("i").removeClass("glyphicon-pause");
                            $(".btnPlay").children("i").addClass("glyphicon-play");
                            thePlayer.play(0);
                        }
                        //
                        var percentage = 100 * currentPos / maxduration;
                        $(".timeBar").css("width", percentage+"%");
                        //
                        $(".barageLine").css("margin-left",-currentPos*50);
                        //
                        @foreach($barrage as $key=>$value)
                        if(Math.abs(currentPos-{!! $value->time !!})<0.5){
                            $(".r_list.active").removeClass("active");
                            var target=$(".r_list:eq({!! $loop->index !!})");
                            target.addClass("active");
                            $("#rightDiv").scrollTop(target.offset().top-$("#rightDiv").offset().top-$("#rightDiv").height()/2+$("#rightDiv").scrollTop());
                        }
                        @endforeach
                    },
                    onBufferChange:function(e){
                        var maxduration = thePlayer.getDuration();
                        var currentBuffer = thePlayer.getBuffer();
                        $(".bufferBar").css("width", currentBuffer+"%");
                    },
                    onBuffer:function(e){
                        console.log("正在缓冲...");
                    },
                    onBufferFull: function () {
                        console.log("视频缓冲完成!!!");
                    },
                    onFullScreen:function(e){
                        if(e.fullscreen){

                        }
                        else{

                        }
                    }
                }
            });

            //Play/Pause control clicked
            $(".btnPlay").on("click", function() {
                thePlayer.play();
                return false;
            });


        });
        //


        var timeDrag = false;   /* Drag status */
        $(".progressBar").mousedown(function(e) {
            timeDrag = true;
            updatebar(e.pageX);
        });
        $(document).mouseup(function(e) {
            if(timeDrag) {
                timeDrag = false;
                updatebar(e.pageX);
            }
        });
        $(document).mousemove(function(e) {
            if(timeDrag) {
                updatebar(e.pageX);
            }
        });

        //update Progress Bar control
        var updatebar = function(x) {
            var progress = $(".progressBar");
            var maxduration = thePlayer.getDuration();
            var position = x - progress.offset().left;
            var percentage = 100 * position / progress.width();

            //Check within range
            if(percentage > 100) {
                percentage = 100;
            }
            if(percentage < 0) {
                percentage = 0;
            }
            $(".timeBar").css("width", percentage+"%");
            thePlayer.seek(maxduration * percentage / 100);
        };


        //Mute/Unmute control clicked
        $(".muted").click(function() {
            thePlayer.setMute(!thePlayer.getMute());
            return false;
        });

        var volumnDrag = false;   /* Drag status */
        $(".volumeBar").mousedown(function(e) {
            volumnDrag = true;
            updateVolumebar(e.pageX);
        });
        $(document).mouseup(function(e) {
            if(volumnDrag) {
                volumnDrag = false;
                updateVolumebar(e.pageX);
            }
        });
        $(document).mousemove(function(e) {
            if(volumnDrag) {
                updateVolumebar(e.pageX);
            }
        });

        //update Progress Bar control
        var updateVolumebar = function(x) {
            var volumeBar = $(".volumeBar");
            var position = x - volumeBar.offset().left;
            var percentage = 100 * position / volumeBar.width();
            if(percentage > 100) {
                percentage = 100;
            }
            if(percentage < 0) {
                percentage = 0;
            }
            $(".volume").css("width", percentage+"%");
            thePlayer.setVolume(percentage);
        };

        $(".fast").on("click", function() {
            thePlayer.playbackRate = 2.0;
            $(".playSpeed .active").removeClass("active");
            $(".fast").addClass("active");
            return false;
        });

        //Rewind control
        $(".normal").on("click", function() {
            thePlayer.playbackRate =1.0;
            $(".playSpeed .active").removeClass("active");
            $(".normal").addClass("active");
            return false;
        });

        //Rewind control
        $(".slow").on("click", function() {
            thePlayer.playbackRate = 0.5;
            $(".playSpeed .active").removeClass("active");
            $(".slow").addClass("active");
            return false;
        });

        $(".fullscreen").on("click", function() {
            var videoDiv=document.getElementById("videoDiv");
            enterFullScreen(videoDiv)
        });
        function enterFullScreen(obj){
            if(obj.requestFullscreen) {
                obj.requestFullscreen();
            } else if(obj.mozRequestFullScreen) {
                obj.mozRequestFullScreen();
            } else if(obj.webkitRequestFullscreen) {
                obj.webkitRequestFullscreen();
            } else if(obj.msRequestFullscreen) {
                obj.msRequestFullscreen();
            }
            return false;
        }

        function exitFullscreen() {
            if(document.exitFullscreen) {
                document.exitFullscreen();
            } else if(document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if(document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }

        function formatSeconds(s){
            s=parseInt(s);
            var hour="",minute="",second="";
            if(s>3600){
                hour=parseInt(s/3600);
                s=s%3600;
                hour=hour+":"
            }
            minute=parseInt(s/60);
            s=s%60;
            if(minute<10){
                minute="0"+minute;
            }
            second=s;
            if(second<10){
                second="0"+second;
            }
            return hour+minute+":"+second;
        }

        //
        $('.emotion img').qqFace({
            assign:'saytext',
            path:'/lib/jQuery-qqFace/arclist/',
            id:'face_1'
        });
        $('.sc_emotion img').qqFace({
            assign:'sc_text',
            path:'/lib/jQuery-qqFace/arclist/',
            id:'face_2'
        });
        //
        $("#barrageSwitch").click(function(){
            if($("#barrageSwitch").attr("open")!=undefined){
                $("#barrageSwitch").attr("open",false);
                $(".toggleBtn").stop().animate({"left":"0"},400);
                $(".toggleBtn").css("right","auto");
                //close
                $("#maskDiv").hide();
            }
            else{
                $("#barrageSwitch").attr("open",true);
                $(".toggleBtn").css("left","auto");
                $(".toggleBtn").stop().animate({"right":"0"},400);
                //open
                $("#maskDiv").show();
            }
        });
        //
        function replace_em(str){
            str = str.replace(/\</g,'&lt;');
            str = str.replace(/\>/g,'&gt;');
            str = str.replace(/\n/g,'<br/>');
            str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/lib/jQuery-qqFace/arclist/$1.gif" border="0" />');
            return str;
        }

        $(".r_list_time").text(function(){
            return formatSeconds($(this).text());
        });
        $(".r_list_content").html(function(){
            return replace_em($(this).html());
        });
        $(".ic-main").html(function(){
            return replace_em($(this).html());
        });
        $(".reply-content").html(function(){
            return replace_em($(this).html());
        });



    </script>
@stop

