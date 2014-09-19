package test;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.TimeZone;

import util.AdWhirlUtil;
import util.CacheUtil;

import mysql.Instance;
import mysql.MySQL;
import mysql.fetchWhat;

public class test {

	/**
	 * @param args
	 * @throws SQLException
	 */
	public static void main(String[] args) throws SQLException {
		// TODO Auto-generated method stub

		MySQL mysql = MySQL.getMySQL();

		Instance instance = mysql
				.select("select * from test2 where name1 ='2' limit 1");
		List<HashMap<String, Object>> list;

		fetchWhat fetch = new fetchWhat() {

			public HashMap<String, Object> get(ResultSet resultset,
					HashMap<String, Object> map) {

				try {
					map.put("name1", resultset.getString("name1"));
					map.put("name2", resultset.getString("name2"));
				} catch (SQLException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				return map;

			}
		};
		int i = 1;
		while ((list = instance.getsliceResultSet(AdWhirlUtil.FETCH_MAX_NUM, fetch)) != null) {

			Iterator<HashMap<String, Object>> iterator = list.iterator();
			while (iterator.hasNext()) {
				HashMap<String, Object> map = iterator.next();
				map.get("name1");
				map.get("name2");
			}
			i++;
			
			
		
		}
		System.out.println("i =" + i);

		/**
		 * ReplaceableAttribute r = new ReplaceableAttribute();
		 * List<ReplaceableAttribute> list = new
		 * ArrayList<ReplaceableAttribute>(); r = new
		 * ReplaceableAttribute().withName("name1").withValue("7"); list.add(r);
		 * r = new ReplaceableAttribute().withName("name2").withValue("7");
		 * list.add(r); int i; for(i=0;i<20000;i++){ mysql.insert("test2",
		 * list); }
		 */
		/**
		 * for (int i = 0; i < 2; i++) { Instance instance = mysql
		 * .select("select * from test2 where name1='7' and name2='7'");
		 * ResultSet rs = instance.getResuSet(); int j=0; while (rs.next()) {
		 * 
		 * j++; } System.out.println(j); instance.close(); }
		 */

		/*
		 * ResultSet set =
		 * mysql.select("select * from test2 where name1='7' and name2='7'");
		 * 
		 * 
		 * try { set.next(); int a =set.getInt("deleted");
		 * System.out.println(a); } catch (SQLException e) { // TODO
		 * Auto-generated catch block e.printStackTrace(); }
		 * 
		 * 
		 * 
		 * ReplaceableAttribute r = new ReplaceableAttribute();
		 * List<ReplaceableAttribute> list = new
		 * ArrayList<ReplaceableAttribute>(); r = new
		 * ReplaceableAttribute().withName("name1").withValue("7"); list.add(r);
		 * r = new ReplaceableAttribute().withName("name2").withValue("7");
		 * list.add(r);
		 * 
		 * 
		 * mysql.putAttributes("test2", list , "where name1='6' and name2='6'");
		 */

	}

	private static Date startOfDay(Date date) {
		Calendar calendar = new GregorianCalendar();
		calendar.setTimeZone(TimeZone.getTimeZone("GMT"));
		calendar.setTime(date);
		calendar.set(Calendar.HOUR_OF_DAY, 0);
		calendar.set(Calendar.MINUTE, 0);
		calendar.set(Calendar.SECOND, 0);
		calendar.set(Calendar.MILLISECOND, 0);
		return calendar.getTime();
	}

}
