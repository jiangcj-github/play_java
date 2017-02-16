package cool.dao;

import cool.util.DBConnPool;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.*;

public class VideoDao {

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public Map<String,Object> getVideoById(int video_id){
        Map<String,Object> d=new HashMap<String,Object>();
        conn=DBConnPool.getConnection();
        String sql="select * from video where id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,video_id);
            rs= ps.executeQuery();
            if(rs.next()){
                d.put("id",rs.getInt("id"));
                d.put("url",rs.getString("url"));
                d.put("username",rs.getString("username"));
                d.put("bitrate",rs.getInt("bitrate"));
                d.put("duration",rs.getDouble("duration"));
                d.put("enrolltime",rs.getDate("enrolltime"));
                d.put("format",rs.getString("format"));
                d.put("poster",rs.getInt("poster"));
            }
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return d;
    }

}
