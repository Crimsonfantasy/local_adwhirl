<?php
/**
 *  copyright 2011/11/27 by FCU , ChengYuSheng
 */
require_once 'Logging.php';
class MyLogging{
	
	
	private $file_path;
	function __construct($file_path){
		return;
		$this->file_path = $file_path;		
		
	}
	public function write($value,$in_file,$at_line,$msg='non'){
		return;
		
	
		$this->log_value = $value;
/*
 	 ob_start():
	 This function will turn output buffering on. 
	 While output buffering is active no output is sent from the script 
	 (other than headers), instead the output is stored in an internal buffer. 
*/
		ob_start();	
		
		echo "\n-------------------------\n";
		echo 'file name'.$in_file."\n";
		echo 'at line'.$at_line."\n";
		echo  $msg."\n";
		echo "@ @ @ @ @ @ @ @ @ @ @ @ @\n";
		var_dump($value);
		echo "---------------------------\n";

/*
 	  Gets the contents of the output buffer without clearing it. 
 */
		$log_message = ob_get_contents();
		
		$log = new Logging();
		$log->lfile($this->file_path);
		$log->lwrite($log_message);

/*
 	 This function discards the contents of the topmost 
 	 output buffer and turns off this output buffering
*/
		ob_end_clean();
	}

		
}

?>