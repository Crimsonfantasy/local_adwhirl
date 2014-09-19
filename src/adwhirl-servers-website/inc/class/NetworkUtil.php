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

require_once('inc/class/Network.php');

class NetworkUtil {
  public static function getAllNetworksByAid($aid) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
   
    $domain = Network::$SDBDomain;

    $aaa = array();
    foreach(Network::$SDBFields as $field => $meta) {
      $aaa[] = $field;
    }
    //adwhirl simple DB
/*  
 	$sdb = SDB::getInstance();   
    $where = "where `aid` = '$aid'";
    if(!$sdb->select($domain, $aaa, $where)) {
      $my_log->write($aaa,__FILE__,__LINE__);
      return null;
    }
 */
    //adwhirl simple DB
    /** cheng mysql region*/
    
    $my_pdo = myPDO::getinstance();
    $where = "where aid = '$aid' " ;
    if(!$my_pdo->select($domain , $where,$aaa)){
    
    	return null;
    }
     
    /** cheng mysql region*/
    
    
    $my_log->write($aaa,__FILE__,__LINE__);
    fb("aaa",$aaa);
    $appNetworks = array();
    foreach($aaa as $aa) {
      $appNetwork = new Network();
      foreach(Network::$SDBFields as $field => $meta) {
	if (array_key_exists($field, $aa)) $appNetwork->$field = $aa[$field];
      }
      $appNetwork->id = $aa['id'];
      $appNetwork->postGet();
      $appNetworks[] = $appNetwork;
    }
    
    return $appNetworks;
  }		
	
  public static function getNetworksByAid($aid) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
    
    $domain = Network::$SDBDomain;

    $aaa = array();
    foreach(Network::$SDBFields as $field => $meta) {
      $aaa[] = $field;
    }
/*     
    $sdb = SDB::getInstance();
    $where = "where `aid` = '$aid'";
    if(!$sdb->select($domain, $aaa, $where)) {
      $my_log->write($aaa,__FILE__,__LINE__);
      return null;
    }
 */    
    //adwhirl simple DB
    /** cheng mysql region*/
    
    $my_pdo = myPDO::getinstance();
    $where = "where aid = '$aid' " ;
    if(!$my_pdo->select($domain , $where,$aaa)){
    
    	return null;
    }
     
    /** cheng mysql region*/
    
    
    $my_log->write($aaa,__FILE__,__LINE__);
    // fb("aaa",$aaa);
    $appNetworks = array();
    foreach($aaa as $aa) {
      $appNetwork = new Network();
      foreach(Network::$SDBFields as $field => $meta) {
	if (array_key_exists($field, $aa)) $appNetwork->$field = $aa[$field];
      }
      $appNetwork->id = $aa['id'];
      $appNetwork->postGet();
      $appNetworks[$appNetwork->type] = $appNetwork;
    }
    
    return $appNetworks;
  }

  public static function getNetworksByAidIndexNid($aid) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
    
    $domain = Network::$SDBDomain;

    $aaa = array();
    foreach(Network::$SDBFields as $field => $meta) {
      $aaa[] = $field;
    }
/*     
    $sdb = SDB::getInstance();
    $where = "where `aid` = '$aid'";
    if(!$sdb->select($domain, $aaa, $where)) {
      $my_log->write($aaa,__FILE__,__LINE__);
      return null;
    }
 */
    
    //adwhirl simple DB
    /** cheng mysql region*/
    
    $my_pdo = myPDO::getinstance();
    $where = "where aid = '$aid' " ;
    if(!$my_pdo->select($domain , $where,$aaa)){
    
    	return null;
    }
     
    /** cheng mysql region*/
    
    $my_log->write($aaa,__FILE__,__LINE__);
    $appNetworks = array();
    foreach($aaa as $aa) {
      $appNetwork = new Network();
      foreach(Network::$SDBFields as $field => $meta) {
	$appNetwork->$field = $aa[$field];
      }
      $appNetwork->id = $aa['id'];
      $appNetwork->postGet();
      $appNetworks[$appNetwork->id] = $appNetwork;
    }
    
    return $appNetworks;
  }
}
