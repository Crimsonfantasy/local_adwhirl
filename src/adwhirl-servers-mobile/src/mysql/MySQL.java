package mysql;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.List;






public class MySQL {
	private Connection conn = null;	
	private static MySQL instance;
	MySQL() {

		try {
			Class.forName("com.mysql.jdbc.Driver");
			conn = DriverManager
					.getConnection(
							"jdbc:MySQL://localhost/adwhirl_DB?useUnicode=true&characterEncoding=Big5",
							"root", "information");
			return;
		} catch (ClassNotFoundException ce) {
			System.out.println("Class NOT found!!");
		} catch (SQLException se) {
			System.out.println("Connection ERROR");
		}
		

	}

	public static MySQL getMySQL() {

		if (MySQL.instance ==null) {
			MySQL.instance = new MySQL();
		}
		return MySQL.instance;

	}
	
	public boolean update(String table , List<ReplaceableAttribute> list , String where){
		
		String queryString = "update " + table + " set ";
		String updateDate = " " ;
		Iterator<ReplaceableAttribute> iterator = list.iterator();
		ReplaceableAttribute buf;
		while(iterator.hasNext()){
			
			buf = iterator.next();
			updateDate = updateDate + buf.getName() +" = \"" + buf.getValue() + "\" ,";			
			
		}
		
		updateDate = updateDate.substring(0,updateDate.length()-1);
		queryString = queryString + updateDate + " " + where + ";";
		
		System.out.print(queryString);
		try {
			Statement stmt = conn.createStatement();
			stmt.execute(queryString);
			stmt.close();		
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
		
		
		
		return true;
		
			
	}

	
	public boolean insert(String table, List<ReplaceableAttribute> list) {
		
		String attributes = "(";
		String values = "(";
		
		Iterator<ReplaceableAttribute> iterator = list.iterator();
		ReplaceableAttribute buf;
		while (iterator.hasNext()){
			buf = iterator.next();
			attributes = attributes + buf.getName() + ",";
			values =values + "'" + buf.getValue() + "'," ; 
		}
		
		attributes = attributes.substring(0, attributes.length()-1);
		values = values.substring(0, values.length()-1);
		
		String qryString = new String("insert into " + table
				+  attributes + ") " + " values" +values + ");");
		
		System.out.println(qryString );
		
		
		
		try {
			Statement stmt = conn.createStatement();
			stmt.execute(qryString);
			stmt.close();		
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
		
		return true;
	}
	public  void  putAttributes(String table  ,List<ReplaceableAttribute> list ,String where) {
		
		int count =0;
		Instance instance = MySQL.instance.select("select * from " + table + " " +where );
		ResultSet resultset = instance.getResuSet();
		try {
			while(resultset.next()){
				count ++;
				if(count >=1){
					
					/**
					 * 
					 * do update; 
					 */
					MySQL.instance.update(table, list, where);
					instance.close();
					
					return;
				}
			}
		} catch (SQLException e) {
			
			e.printStackTrace();
		}
		
		/**
		 * do insert
		 */
		MySQL.instance.insert(table,list);
		instance.close();
		
	}
	
	

	public LinkedList<Integer> queryForInt(String QS) {
		ResultSet RS = null;
		Statement stat = null;
		LinkedList<Integer> Output = null;
		try {
				stat = conn.createStatement();
				RS = stat.executeQuery(QS);
				Output = new LinkedList<Integer>();
				while (RS.next()) {
					Output.add(RS.getInt("level"));
				}

			} catch (SQLException se) {
				System.out.println("SQL ERROR!!");
				se.printStackTrace();
				return null;
			}
		
		return Output;
	}
	
	public void delete(String table , String where)
	{
		
		String queryString = "delete from ";
		queryString = queryString + table + " " + where + ";";
		System.out.println(queryString);
		
		try {
			
			Statement stmt = conn.createStatement();
			stmt.execute(queryString);
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	public Instance select(String sql) {
		
		Statement stmt = null;
		ResultSet resultSet = null;
		sql = sql + " ;";
		try {
			stmt = conn.createStatement();
			System.out.println(sql);
			resultSet  = stmt.executeQuery(sql);
			//stmt.close();			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		} 		
		
		return new Instance(stmt ,resultSet);
	}
	
	public void close() throws SQLException {
		if (conn != null)
			conn.close();		
	}



}
