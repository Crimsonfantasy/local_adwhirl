package test;

import java.sql.ResultSet;
import java.sql.SQLException;

import mysql.Instance;
import mysql.MySQL;

public class test1 {

	
	
	public static void main(String[] args) throws SQLException {
		// TODO Auto-generated method stub
		int a=2;
		String c ="ssss ssss  sss = '" + a + "';";
		System.out.println(c);
				
		/**

		MySQL mysql = MySQL.getMySQL();
		Instance instance = mysql
				.select("select * from networks where id ='c740a85abc764029a9cc239e5d500000 '");
		
		ResultSet rs = instance.getResuSet();
		
		int i=0;
		while(rs.next()){
			
			i++;
			
		}
		
		System.out.println("i === " + i);*/
		
	}
	

}
