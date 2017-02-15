package cool.util;

import freemarker.ext.beans.HashAdapter;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.io.*;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Created by mathew on 2017/2/15.
 */
public class VideoUtil {

    public static Map<String,Object> getVideoInfo(String filename){
        Map<String,Object> result=new HashMap<String,Object>();
        String base=System.getProperty("demo.webapp");
        try {
            //命令格式:ffmpeg -i [file]
            List<String> commend = new ArrayList<String>();
            commend.add(base+"tool/ffmpeg");
            commend.add("-i");
            commend.add(base+filename);
            ProcessBuilder builder = new ProcessBuilder(commend);
            builder.command(commend);
            Process p=builder.start();
            p.waitFor();
            //从输入流中读取视频信息
            BufferedReader br = new BufferedReader(new InputStreamReader(p.getErrorStream()));
            StringBuilder sb = new StringBuilder();
            String line = "";
            while ((line = br.readLine()) != null) {
                sb.append(line);
            }
            br.close();
            //从视频信息中解析时长
            String regex= "Duration: (.*?), start: (.*?), bitrate: (\\d*) kb\\/s";
            Pattern pattern = Pattern.compile(regex);
            Matcher m = pattern.matcher(sb.toString());
            if (m.find()) {
                String[] s=m.group(1).split(":");
                result.put("duration",Integer.parseInt(s[0])*3600+Integer.parseInt(s[1])*60+Double.parseDouble((s[2])));
                result.put("start",Double.parseDouble(m.group(2)));
                result.put("bitrate",Integer.parseInt(m.group(3)));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }

    public static byte[] getVideoFrame(String filename,int pos,int width,int height){

        String base=System.getProperty("demo.webapp");
        try {
            //命令格式:ffmpeg -i input.mkv -ss 00:10:00 -f image2 output.jpg
            List<String> commend = new ArrayList<String>();
            commend.add(base+"tool/ffmpeg");
            commend.add("-i");
            commend.add(base+filename);
            commend.add("-ss");
            commend.add(""+pos);
            commend.add("-f");
            commend.add("image2");
            commend.add("-s");
            commend.add(width+"*"+height);
            commend.add("-y");
            commend.add(base+"tmp/output.jpg");
            ProcessBuilder builder = new ProcessBuilder(commend);
            builder.command(commend);
            Process p=builder.start();
            p.waitFor();
            //获取视频截图
            File f2=new File(base+"tmp/output.jpg");
            BufferedImage bi=ImageIO.read(f2);
            ByteArrayOutputStream bos = new ByteArrayOutputStream();
            ImageIO.write(bi, "jpg", bos);
            f2.delete();
            return bos.toByteArray();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return null;
    }

    public static void main(String[] s) throws IOException {

        //'Process p=Runtime.getRuntime().exec("ffmpeg -i 1.mp4 -y -f image2 -ss 1 -t 0.001 -s 352x240 a.jpg");

    }

}
