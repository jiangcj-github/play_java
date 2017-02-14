package cool.controller;

import cool.util.DBConnPool;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.RequestMapping;

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
    public String getList2(ModelMap model){
        Connection conn=DBConnPool.getConnection();
        String sql="select * from test";
        try{
            PreparedStatement ps=conn.prepareStatement(sql);
            ResultSet rs=ps.executeQuery();
            List<String> arr=new ArrayList<String>();
            while(rs.next()){
                arr.add(rs.getString("col1"));
            }
            model.put("test",arr);
        }catch (Exception e){
            e.printStackTrace();
        }
        return "list2";
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
