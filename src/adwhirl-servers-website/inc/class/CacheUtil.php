<?php
/*
 -----------------------------------------------------------------------
Copyright 2009-2010 AdMob, Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
------------------------------------------------------------------------
*/
?>
<?php

require_once('inc/class/App.php');
require_once('inc/class/HouseAd.php');
require_once('inc/mysql/myPDO.php');

class CacheUtil {
	public static function invalidateApp($aid) {
			
		$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
			
		//adwhirl segment

		/**

		$aa = array('dateTime' => gmdate('Y-m-d, H:i:s'));
		$sdb = SDB::getInstance();
		$sdb->put(App::$SDBDomainInvalid, $aid, $aa, true);

		*/

		//adwhirl segment
			
		/** cheng mysql DB*/

		$aa=  array(
  	    			'dateTime' => gmdate('Y-m-d, H:i:s'),
  	    			'id' =>$aid
		);
		$my_pdo = myPDO::getinstance();
		$my_pdo->put(App::$SDBDomainInvalid,"where id = '$aid' ",$aa,true);

		/** cheng mysql DB*/

		$my_log->write($aa,__FILE__,__LINE__,'put');
	}

	public static function invalidateCustom($nid) {
		$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
		
		//adwhirl simpeDB segment
		/**
		
		$sdb = SDB::getInstance();
		$aa = array('dateTime' => gmdate('Y-m-d, H:i:s'));
		$sdb->put(HouseAd::$SDBDomainInvalid, $nid, $aa, true);
		
		*/
		//adwhirl simpleDB segment
		
		/** cheng mysql DB */
				
		$aa = array(
				'dateTime' => gmdate('Y-m-d, H:i:s'),
				'id' => $nid
			);
		$my_pdo = myPDO::getinstance();
		$my_pdo->put(HouseAd::$SDBDomainInvalid ,"where id = '$nid'",$aa , True);
		
		/** cheng mysql DB */
		
		$my_log->write($aa,__FILE__,__LINE__,'put');
		
	}
}
