package cool.dao;

import cool.util.DBConnPool;

import java.sql.*;
import java.sql.Date;
import java.util.*;

public class CommentDao {

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public List<Map<String,Object>> getCommentByVideoId(int video_id){
        List<Map<String,Object>> data=new ArrayList<Map<String,Object>>();
        conn=DBConnPool.getConnection();
        String sql="select comment.*,username,headimg from comment join member on comment.user_id=member.id where video_id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,video_id);
            rs= ps.executeQuery();
            while(rs.next()){
                Map<String,Object> d=new HashMap<String,Object>();
                d.put("id",rs.getInt("id"));
                d.put("video_id",rs.getInt("video_id"));
                d.put("user_id",rs.getInt("user_id"));
                d.put("enrolltime",rs.getDate("enrolltime"));
                d.put("text",rs.getString("text"));
                d.put("support",rs.getInt("support"));
                d.put("object",rs.getInt("object"));
                d.put("username",rs.getString("username"));
                d.put("headimg",rs.getInt("headimg"));
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

    public void addComment(Map<String,Object> b){
        conn=DBConnPool.getConnection();
        String sql="insert into comment(id,video_id,user_id,enrolltime,text,support,object) values(?,?,?,?,?,?,?)";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,(int)b.get("id"));
            ps.setInt(2,(int)b.get("video_id"));
            ps.setInt(3,(int)b.get("user_id"));
            ps.setDate(4,new Date(Calendar.getInstance().getTimeInMillis()));
            ps.setString(5,(String)b.get("text"));
            ps.setInt(6,(int)b.get("support"));
            ps.setInt(6,(int)b.get("object"));
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
