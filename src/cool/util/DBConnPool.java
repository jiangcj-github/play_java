package cool.util;

import org.w3c.dom.Document;
import javax.xml.parsers.DocumentBuilderFactory;
import java.sql.Connection;
import java.sql.DriverManager;

public class DBConnPool {
    private static String host;
    private static String database;
    private static String user;
    private static String password;

    private static Connection conn = null;

    static{
        try {
            String path=DBConnPool.class.getClassLoader().getResource("/").getPath();
            path=path.substring(0,path.indexOf("WEB-INF"));
            Document doc = DocumentBuilderFactory.newInstance().newDocumentBuilder().parse(path+"WEB-INF/mysql.xml");
            host=doc.getElementsByTagName("host").item(0).getChildNodes().item(0).getNodeValue();
            database=doc.getElementsByTagName("database").item(0).getChildNodes().item(0).getNodeValue();
            user=doc.getElementsByTagName("user").item(0).getChildNodes().item(0).getNodeValue();
            password=doc.getElementsByTagName("password").item(0).getChildNodes().item(0).getNodeValue();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static Connection getConnection(){
        if(conn!=null){
            return conn;
        }
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://"+host+"/"+database, user, password);
        } catch (Exception e) {
            e.printStackTrace();
        }
        return conn;
    }

}
