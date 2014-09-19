package mysql;

import java.sql.ResultSet;
import java.util.HashMap;

public interface fetchWhat {
	
	public HashMap<String,Object>  get(ResultSet resultset , HashMap<String,Object> map);
	
}
