package cool.util;

import java.sql.Date;
import java.util.Calendar;

public class TimeUtil {

    public static String time_tran(Date the_time){
        long dur=Calendar.getInstance().getTimeInMillis()-the_time.getTime();
        if (dur < 0) {
            return "";
        }
        else if (dur < 60) {
            return dur + "秒前";
        }
        else if (dur < 3600) {
            return Math.floor(dur/60)+"分钟前";
        }
        else if (dur < 86400) {
            return Math.floor(dur/3600)+"小时前";
        }
        else if (dur < 2592000) {
            return Math.floor(dur / 86400)+"天前";
        }
        else if (dur < 31104000) {
            return Math.floor(dur / 2592000)+"个月前";
        }
        else {
            return Math.floor(dur / 31104000)+"年前";
        }
    }
}
