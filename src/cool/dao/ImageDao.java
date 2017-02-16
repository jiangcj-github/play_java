package cool.dao;

import cool.util.DBConnPool;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

public class ImageDao {

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public Map<String,Object> getImageById(int image_id){
        Map<String,Object> d=new HashMap<String,Object>();
        conn=DBConnPool.getConnection();
        String sql="select * from image where id=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,image_id);
            rs= ps.executeQuery();
            if(rs.next()){
                d.put("id",rs.getInt("id"));
                d.put("data",rs.getBytes("data"));
                d.put("format",rs.getString("format"));
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

    public int addImage(Map<String,Object> b){
        conn=DBConnPool.getConnection();
        String sql="insert into image(id,data,format) values(?,?,?)";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,(int)b.get("id"));
            ps.setBytes(2,(byte[])b.get("data"));
            ps.setString(3,(String)b.get("format"));
            if(ps.execute()){
                return (int)b.get("id");
            }
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return -1;
    }

}
