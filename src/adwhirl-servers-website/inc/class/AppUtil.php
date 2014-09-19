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

class AppUtil {
	public static function getAppsByUid($uid, $showAliveOnly=true) {
			
		$domain = App::$SDBDomain;

		$aaa = array();
		foreach(App::$SDBFields as $field => $meta) {
			$aaa[] = $field;
		}
		if (!$showAliveOnly) {
			$aaa[] = 'deleted';
		}
		$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
		
		//adwhirl simpleDB		
		/*
		 $sdb = SDB::getInstance();
		$where = "where `uid` = '$uid'";
		if(!$sdb->select($domain, $aaa, $where, $showAliveOnly)) {
		$my_log->write($aaa,__FILE__,__LINE__);
		return null;
		}

		*/
		//adwhirl simpeDB


		/** cheng mysql region*/

		$my_pdo = myPDO::getinstance();
		$where = "where uid = '$uid' " ;
		if(!$my_pdo->select($domain , $where,$aaa,$showAliveOnly)){

			return null;
		}
			
		/** cheng mysql region*/



		$my_log->write($aaa,__FILE__,__LINE__);

		$apps = array();
		foreach($aaa as $aa) {
			$app = new App();
			foreach(App::$SDBFields as $field => $meta) {
				$app->$field = isset($aa[$field]) ? $aa[$field] : null;
			}
			if (!$showAliveOnly) {
				$app->deleted = isset($aa['deleted']) ? true : false;
			}
			$app->id = $aa['id'];
			$apps[] = $app;
		}

		return $apps;
	}

	public static function getActiveApp($user) {
		$aid = isset($_REQUEST['aid']) ? $_REQUEST['aid'] : null;
		$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
		if($aid === null) {
			$domain = App::$SDBDomain;

			$aaa = array();
			foreach(App::$SDBFields as $field => $meta) {
				$aaa[] = $field;
			}

			$uid = $user->id;
			//adwhirl 
/* 			
			$where = "where `uid` = '$uid' limit 1";
			$sdb = SDB::getInstance();
			if(!$sdb->select($domain, $aaa, $where, false)) {
				$my_log->write($aaa,__FILE__,__LINE__);
				return null;
			}
			
 */			
			//adwhirl
			/** cheng mysql region*/
			
			$my_pdo = myPDO::getinstance();
			$where = "where uid = '$uid' limit 1" ;
			if(!$my_pdo->select($domain , $where,$aaa ,false)){
			
				return null;
			}
			 
			/** cheng mysql region*/
			
			$app = new App();
			foreach(App::$SDBFields as $field => $meta) {
				$app->$field = $aaa[0][$field];
			}
			$app->id = $aaa[0]['id'];
		}
		else {
			$app = new App($aid);
		}

		return $app;
	}
}
