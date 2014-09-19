package mysql;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
public class Instance {
	
	Statement stmt;
	ResultSet rs;
	Instance (Statement stmt ,ResultSet rs ){
		
		this.stmt = stmt;
		this.rs =rs;
	}
	
	
	public void close(){
		
		try {
			stmt.close();
			rs.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}		
	}
	
	/**
	 * 
	 * @param fetchNum : fetch X columns of ResultSet
	 * @param fetchWhat: fetch what's data in each column
	 */
	public List<HashMap<String,Object>>  getsliceResultSet(int fetchNum , fetchWhat  fetch){
		
		List<HashMap<String,Object>> list = new ArrayList<HashMap<String,Object>>();
		
		int count= 0;
		try {
			while(this.rs.next()){
				
				HashMap<String,Object> hashMap = new HashMap<String,Object>();
				hashMap = fetch.get(rs, hashMap);
				list.add(hashMap);
				
				count++;
				
				if(count == fetchNum){
									
					return list;
				}

				
				
				
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		if(count==0){
			return null;
		}
		else{
			
			return list;
		}
		
		
	}
	
	
	public Statement getStatement(){
		return this.stmt;

	}
	
	public ResultSet getResuSet(){
		
		return this.rs;
	}
	
}
