package cool.dao;

import cool.model.Video;
import cool.util.DBConnPool;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by Administrator on 2017/2/14.
 */
public class VideoDao {

    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public List<Video> getVideoById(int id){
        List videos=new ArrayList<Video>();
        conn=DBConnPool.getConnection();
        String sql="select * from video";
        try {
            ps=conn.prepareStatement(sql);
            //ps.setInt(1,id);
            rs= ps.executeQuery();
            while(rs.next()){
                Video e=new Video();
                e.setId(rs.getInt("id"));
                e.setUrl(rs.getString("url"));
                videos.add(e);
            }
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return videos;
    }

    //conn必须关闭，否则达到c3p0连接数上限进程会阻塞
    public static void main(String[] s){
        VideoDao dao=new VideoDao();
        for(int n=0;n<100000;n++){
            List<Video> data=dao.getVideoById(1);
        }
        System.out.println("finish");
    }
}
