<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

class MainController extends BaseController
{
    public function getList1(Request $request){

        return response()->view("list1");
    }

    public function getList2(Request $request){

        return response()->view("list2");
    }

    public function getList3(Request $request){

        return response()->view("list3");
    }

    public function getList4(Request $request){

        return response()->view("list4");
    }

    public function getList5(Request $request){

        return response()->view("list5");
    }

    public function getPlay(Request $request){

        return response()->view("play");
    }

    public function getProjects(Request $request){
        $type=$request->session()->get('type',1);
        $id=$request->session()->get('id',0);
        $result2=DB::select('select * from projects where find_in_set(?,type)>0 order by id asc', [$type]);
        $curIndex=0;
        foreach ($result2 as $key=>$value){
            if($value->id==$id){
                $curIndex=$key;
                break;
            }
        }
        return response()->view("main2",[
            'data'=>$result2,
            'curIndex'=>$curIndex,
            'curRight_1'=>'project'
        ]);
    }
}
