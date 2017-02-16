package cool.dao;

import cool.util.DBConnPool;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class SeqDao {

    private Connection conn=null;
    private PreparedStatement ps=null;
    private ResultSet rs=null;

    public int getCurIndex(String table_name){
        conn=DBConnPool.getConnection();
        String sql="select cur_index from seq where table_name=?";
        int cur_index=-1;
        try {
            ps=conn.prepareStatement(sql);
            ps.setString(1,table_name);
            rs= ps.executeQuery();
            if(rs.next()){
                cur_index=rs.getInt("cur_index");
            }
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return cur_index;
    }

    public boolean updateIndex(String table_name,int index){
        conn=DBConnPool.getConnection();
        String sql="update seq set cur_index=? where table_name=?";
        try {
            ps=conn.prepareStatement(sql);
            ps.setInt(1,index);
            ps.setString(2,table_name);
            return ps.execute();
        }catch (SQLException e) {
            e.printStackTrace();
        }finally {
            if(conn!=null){
                try{conn.close();} catch (Exception e){}
            }
        }
        return false;
    }

    public int nextIndex(String table_name){
        int index=getCurIndex(table_name);
        if(index>0&&updateIndex(table_name,index+1)){
            return index;
        }
        return -1;
    }
}
