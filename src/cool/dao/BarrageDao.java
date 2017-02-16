package cool.dao;

import cool.util.DBConnPool;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class BarrageDao {

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public List<Map<String,Object>> getBarrageByVideoId(int video_id){
        List data=new ArrayList<Map<String,Object>>();
        conn=DBConnPool.getConnection();
        String sql="select * from barrage where video_id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,video_id);
            rs= ps.executeQuery();
            while(rs.next()){
                Map<String,Object> d=new HashMap<String,Object>();
                d.put("id",rs.getInt("id"));
                d.put("pos",rs.getInt("pos"));
                d.put("text",rs.getString("text"));
                d.put("user_id",rs.getInt("user_id"));
                d.put("username",rs.getString("username"));
                d.put("video_id",rs.getInt("video_id"));
                data.add(d);
            }
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return data;
    }

    public void addBarrage(Map<String,Object> b){
        conn=DBConnPool.getConnection();
        String sql="insert into barrage(id,video_id,user_id,pos,text,username) values(?,?,?,?,?,?)";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,(int)b.get("id"));
            ps.setInt(2,(int)b.get("video_id"));
            ps.setInt(3,(int)b.get("user_id"));
            ps.setInt(4,(int)b.get("pos"));
            ps.setString(5,(String)b.get("text"));
            ps.setString(6,(String)b.get("username"));
            ps.execute();
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
    }

}
