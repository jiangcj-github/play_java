package cool.controller;

import cool.model.Video;
import cool.util.DBConnPool;
import cool.util.VideoUtil;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.OutputStream;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;


@Controller
public class MainController
{
    @RequestMapping("/list1.do")
    public String getList1(ModelMap model){
        model.put("var1",1);
        model.put("var2",2);
        model.put("var3", 3);
        return "list1";
    }

    @RequestMapping("/list2.do")
    public void getList2(HttpServletResponse response) throws IOException {
        byte[] data=VideoUtil.getVideoFrame("mv/1.mp4",2,256,256);
        response.setContentType("image/jpg");
        OutputStream stream = response.getOutputStream();
        stream.write(data);
        stream.close();
    }

    @RequestMapping("/list3.do")
    public String getList3(ModelMap model){

        return "list3";
    }

    @RequestMapping("/list4.do")
    public String getList4(ModelMap model){
        return "list4";
    }

    @RequestMapping("/list5.do")
    public String getList5(ModelMap model){
        return "list5";
    }
}
