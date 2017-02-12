package cool.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import java.util.Map;

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
