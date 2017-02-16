package cool.controller;

import cool.dao.*;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Controller
public class PlayController
{

    @RequestMapping("/poster/{imageId}")
    public void getPoster(@PathVariable int imageId, HttpServletResponse response){
        ImageDao dao=new ImageDao();
        Map<String,Object> img=dao.getImageById(imageId);
        try {
            OutputStream os=response.getOutputStream();
            os.write((byte[])img.get("data"));
            os.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @RequestMapping("/play/{videoId}")
    public String getPlay(@PathVariable int videoId, ModelMap model){
        VideoDao dao1=new VideoDao();
        Map<String,Object> video=dao1.getVideoById(videoId);
        BarrageDao dao2=new BarrageDao();
        List<Map<String,Object>> barrages=dao2.getBarrageByVideoId(videoId);
        CommentDao dao3=new CommentDao();
        List<Map<String,Object>> comments=dao3.getCommentByVideoId(videoId);
        ReplyDao dao4=new ReplyDao();
        List<Map<String,Object>> list4=dao4.getReplyByVideoId(videoId);
        Map<Integer,Object> replies=new HashMap<Integer,Object>();
        for(int n=0;n<list4.size();n++){
            int comment_id=(int)list4.get(n).get("comment_id");
            if(replies.containsKey(comment_id)){
                List<Map<String,Object>> arr=(List<Map<String,Object>>)replies.get(comment_id);
                arr.add(list4.get(n));
            }
            else{
                List<Map<String,Object>> arr=new ArrayList<Map<String, Object>>();
                arr.add(list4.get(n));
                replies.put(comment_id,arr);
            }
        }
        model.put("video",video);
        model.put("comments",comments);
        model.put("barrages",barrages);
        model.put("replies",replies);

        /*
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
        */
        return "play-html5";
    }

    @RequestMapping("/video")
    @ResponseBody
    public String getVideo(ModelMap model){

        /*
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
        */
        return "404";
    }

}

