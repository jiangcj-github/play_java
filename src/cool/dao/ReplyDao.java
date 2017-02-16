package cool.dao;

import cool.util.DBConnPool;
import java.sql.*;
import java.sql.Date;
import java.util.*;

public class ReplyDao {

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public List<Map<String,Object>> getReplyByCommentId(int comment_id){
        List<Map<String,Object>> data=new ArrayList<Map<String,Object>>();
        conn=DBConnPool.getConnection();
        String sql="select * from reply where comment_id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,comment_id);
            rs= ps.executeQuery();
            if(rs.next()){
                Map<String,Object> d=new HashMap<String,Object>();
                d.put("id",rs.getInt("id"));
                d.put("user_id",rs.getInt("user_id"));
                d.put("comment_id",rs.getInt("comment_id"));
                d.put("video_id",rs.getInt("video_id"));
                d.put("text",rs.getString("text"));
                d.put("enrolltime",rs.getDate("enrolltime"));
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

    public List<Map<String,Object>> getReplyByVideoId(int video_id){
        List<Map<String,Object>> data=new ArrayList<Map<String,Object>>();
        conn=DBConnPool.getConnection();
        String sql="select * from reply where video_id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,video_id);
            rs= ps.executeQuery();
            if(rs.next()){
                Map<String,Object> d=new HashMap<String,Object>();
                d.put("id",rs.getInt("id"));
                d.put("user_id",rs.getInt("user_id"));
                d.put("comment_id",rs.getInt("comment_id"));
                d.put("video_id",rs.getInt("video_id"));
                d.put("text",rs.getString("text"));
                d.put("enrolltime",rs.getDate("enrolltime"));
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

    public void addReply(Map<String,Object> b){
        conn=DBConnPool.getConnection();
        String sql="insert into reply(id,user_id,comment_id,video_id,text,enrolltime) values(?,?,?,?,?,?)";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,(int)b.get("id"));
            ps.setInt(2,(int)b.get("user_id"));
            ps.setInt(3,(int)b.get("comment_id"));
            ps.setInt(4,(int)b.get("video_id"));
            ps.setString(5,(String)b.get("text"));
            ps.setDate(6,new Date(Calendar.getInstance().getTimeInMillis()));
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
