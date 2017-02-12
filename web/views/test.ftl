
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
        background: green;
        margin-right: 10px;
    }
</style>
@stop

@section("rightDiv")
@parent
<div class="containDiv">
    <div class="rowDiv">
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
    </div>
    <div class="rowDiv">
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
    </div>
    <div class="rowDiv">
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
        <div class="unitDiv">

        </div>
    </div>
</div>
@stop

@section("js")
@parent
<script>
    $(document).ready(function(){
        //
        $("#side_menu_item1").addClass("active");
        $("#side_menu_item1>a").attr("href","#");
    });
</script>
@stop