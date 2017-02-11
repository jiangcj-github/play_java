<?php

namespace App\Http\Controllers;

use App\Util\Compile;
use App\Util\Random;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

use App\Util\TimeUtil;

class PlayController extends BaseController
{
    

    public function getPlay(Request $request){
        $video_id=$request->input("video",md5(sha1(1)));
        $result1=DB::select("select * from video where md5(sha1(id))=?",[$video_id]);
        if(count($result1)==0){
            return response()->view("errors/404");
        }
        $result2=DB::select("select barrage.*,member.name from barrage join member on barrage.user_id=member.id where md5(sha1(video_id))=? order by barrage.time asc",[$video_id]);
        $result3=DB::select("select comment.*,member.name,member.headimg from comment join member on comment.user_id=member.id where md5(sha1(video_id))=? order by comment.time desc limit 10 ",[$video_id]);
        $reply=[];
        foreach ($result3 as $key=>$value){
            $result3[$key]->time=TimeUtil::time_tran($value->time);
            $result4=DB::select("select reply.*,member.name,member.headimg from reply join member on reply.user_id=member.id where comment_id=? order by reply.time desc",[$value->id]);
            foreach ($result4 as $k=>$v){
                $result4[$k]->time=TimeUtil::time_tran($v->time);
            }
            $reply[$key."_reply"]=$result4;
        }
        $video_token=Random::getRandString(40);
        session(["video_token"=>$video_token]);

        return response()->view("play-html5",[
            "video"=>$result1[0],
            "barrage"=>$result2,
            "comment"=>$result3,
            "reply"=>$reply,
            "video_token"=>$video_token
        ]);
    }


    public function getVideo(Request $request){

        //比较client_token与server_token是否一致
        $client_token=$request->input("token","");
        $server_token=session("video_token",Random::getRandString(40));
        if($server_token==$client_token){
            $request->session()->forget('video_token');
            //参考apache中mod_auto_token配置
            $secret = "lindakai";
            $protectedPath = "/mv/";
            $ipLimitation = false;
            $hexTime = dechex(time());
            $fileName = "/1.mp4";
            if ($ipLimitation) {
                $token = md5($secret . $fileName . $hexTime . $_SERVER['REMOTE_ADDR']);
            }
            else {
                $token = md5($secret . $fileName. $hexTime);
            }
            $url = $protectedPath . $token. "/" . $hexTime . $fileName;
            return redirect($url);
        }
        return "404 Not Found";
    }

    public function getVideoFrame(Request $request){
        $FFMPEG_CMD="ffmpeg -i '%s' -f image2 -t 0.01 -ss 0.1 -y ";
        return passthru(sprintf($FFMPEG_CMD,"/mv/1.mp4"));
    }

}

