<?php
require_once  (dirname(__FILE__).'/Logging/MyLogging.php');
class myPDO{
	
	
	private static $user = 'root';
	private static $pass = 'information';
	private static $dsn = 'mysql:dbname=adwhirl_DB;host=127.0.0.1';
	private static $instance = null;
	private static $pdo=null; 
	
	function __construct(){
		
			self::$pdo = new PDO(self::$dsn,self::$user,self::$pass);
			
			
			
	}
	
	/**
	  // id generator 
	  Enter description here ...
	 
	 * @return string
	 */
	
	public static function uuid() {
		return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
		mt_rand( 0, 0x0fff ) | 0x4000,
		mt_rand( 0, 0x3fff ) | 0x8000,
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
	}
	
	/**
	 
	  Enter description here ...
	  
	  get myPDO instance
	  
	 */
	
	static function getinstance(){
		if(self::$instance == null)
			self::$instance = new myPDO();
		return self::$instance; 
	}	
	/**
	 * 
	  Enter description here ...
	  @param string $table_name 	:	table of database 
	  @param array  $input_array 	:	key of array is matedata(row) , value of array is column values
	 
	 */
	 
	function insert($table_name , $input_array){
		
		//matedata
		$input_array = self::trim_array($input_array);
		if(empty($input_array["id"]))
			return; 
		$metadata = array_keys($input_array);
		$qry = 'insert into '.$table_name.'('.implode(',', $metadata).") values('".implode("','",$input_array)."');";
		
		try{
			$my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
			$my_log->write($qry,__FILE__,__LINE__);
			$qry_stm = self::$pdo->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$qry_stm->execute();
			return true;
		}
		catch(PDOException $error){
			
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
		}
		return false;
		
	}
	
	
	 
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param string  $table_name : table name
	 * @param string  $where : condition
	 * @param array   $field : array(domain=>value)
	 * @param boolean $replace : if false , insert row into DB , else if satisfied where conditition,do update ,else
	 * 
	 * insert
	 */
	
	
	function put($table_name ,$where ,$field,$replace){
	
	
		try{
		
			if(self::$instance->count($table_name,$where) > 0 && $replace ==true){
		
				self::$instance->update($table_name ,$where ,$field);		
				echo 'update';		
									
			}
			else{
			
				self::$instance->insert($table_name,$field);
				echo 'insert';
			}
			return true;
		}
		catch(PDOException $error){
				
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
		}

		return false;
	
	
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $table_name
	 * @param string $where
	 * @return null
	 * 
	 * count number which contents the where condition
	 */
	 
	 
	function count($table_name ,$where){
		
		$qry = "select count(*) from ".$table_name.' '.$where.' ;';
		$my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
		$my_log->write($qry,__FILE__,__LINE__);
		$qry_stm = self::$pdo->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		try{
			$qry_stm->execute();
			$line_num = $qry_stm->fetchColumn() ;
			return $line_num ;	
		}
		catch(PDOException $error){
				
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
		}
		return -1;
		
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param sting $table_name
	 * @param sting $where
	 * @param array $field
		update column satisfied condition
	 */
	

	function update($table_name ,$where ,$field){
		
		
		$update_field = "set ";
		
		$field = self::trim_array($field);
		foreach( $field as $key => $value){
			
			$update_field = $update_field." ".(string)$key." = \"".(string)$value."\" ,";
		
		}
		$update_field = rtrim($update_field , ',');
			
		$qry="update ".$table_name.' '.$update_field.' '.$where." ;";
		
		$my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
		$my_log->write($qry,__FILE__,__LINE__);
		
		
		try {
			$qry_stm = self::$pdo->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$cc = $qry_stm->execute();
			return true;
		}
		catch(PDOException $error){
				
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
		}
		
		
		return false;
		
		
		
	}
	
	function get($table_name,$id,&$aaa){
		$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
		
		
		$where = "where id = '$id' limit 1 ";
		
		
		if(self::$instance->select($table_name,$where,$aaa,false)){
			// adwhirl code need a 2 dimention array output
			
			$my_log->write($aaa,__FILE__,__LINE__,"what aaa aaa[0] diff??");
			if(!empty($aaa))
				$aaa =$aaa[0];
			return true;
			
		}
		else
			return false;
		
	}
	
	
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $table_name
	 * @param string $where
	 * @param array $selected_domain : if no assign $selected_domain , then default process use *.
	 * 
	 */
	

	
	function select($table_name,$where,&$selected_domain,$showAliveOnly=true){
		$my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
//		$my_log->write($selected_domain,__FILE__,__LINE__,"......qry");
		if($showAliveOnly){
			
			if(empty($where)){
				//soft delete
				$where = " where deleted is null " ;
		
			}else{
			
				$where = $where." and deleted is null ";
			}
		}			
		
		if ($selected_domain == '*'){
			
			$qry = 'select * from '.$table_name.' '.$where.';';
			
		}else if(is_array($selected_domain)){
			
			$qry = 'select id, '. implode(',',$selected_domain).' from '.$table_name.' '.$where.';';
		
		}
		else{
			
			$qry = 'select '. $selected_domain.' from '.$table_name.' '.$where.';';
			
		}
		
		
		$my_log->write($qry,__FILE__,__LINE__,"....select..qry");
		
		try{
			$qry_stm = self::$pdo->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$qry_stm->execute();
			$selected_domain = $qry_stm->fetchAll();

			$this->filter_number_index($selected_domain);
			return true;
		}
		catch(PDOException $error){
				
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
			return false;
		}
		
		
		
	}
	/**
	 * 
	 * Enter description here ...
	 * @param array &$array
	 */
	 private function filter_number_index( &$array){
		
		foreach($array as $key =>&$row){
		
			$len = count($row);
		
			for($i=0 ; $i<$len ; $i++){
				unset($row[$i]);
		
			}
		}
		
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $domain
	 * @param string $where
	 * 
	 * delete column satisfied contition  
	 */
	
	
	public function delete($domain, $where)
	{
		$qry = "delete from ".$domain.' '.$where.' ;';
		$my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
		$my_log->write($qry,__FILE__,__LINE__);
		
		try{
			$qry_stm = self::$pdo->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$qry_stm->execute();
		}
		catch(PDOException $error){
				
			$msg =$error->getMessage();
			$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			$my_log->write($msg,__FILE__,__LINE__);
			
		}	
		return false;
		
		
	}
	
	/**
	 * 
	 * 
	 * Enter description here ...
	 * erace spaceblank before string and after string
	 * @param unknown_type $arr : target string
	 */
	
	static function  trim_array(&$arr){
	
		foreach($arr as $key =>$value){
	
			$arr[$key] = trim($value);
	
		}
	
		return $arr;
	}
	
}
?>