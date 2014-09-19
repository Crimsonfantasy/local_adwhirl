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

require_once('inc/class/SDB.php');
require_once('inc/mysql/myPDO.php');
abstract class SDBObject {
  protected $sdb;

  function __construct($id=null) {
    if($id === null) {
      return;
    }

    $domain = $this->getSDBDomain();
    
    $fields = array();
    foreach($this->getSDBFields() as $field => $meta) {
      $fields[] = $field;
    }
    
    // adwhirl simpleDB region
    /**    
    $this->sdb = SDB::getInstance();
    if(!$this->sdb->get($domain, $id, $fields)) {
      return null;
    }
    */
    // adwhirl simpleDB region
    
    
    /** cheng mysql */
    $this->sdb = myPDO::getinstance();
    if(!$this->sdb->get($domain,$id,$fields)){
    	
    	return null;
    }
    
    /** cheng mysql */
    $my_log = new MyLogging('/tmp/adwhirl_db_log/myPDO.log');
//    $my_log->write($fields,__FILE__,__LINE__,"field");
    
    foreach($fields as $key => $value) {

     
     $this->$key = $value;
//     $my_log->write($this->$key,__FILE__,__LINE__,"no.....");
     
    }
    
  }

  function put() {
		// fb("sdbo - put $this->id",$this);
    $id = $this->id;
    $domain = $this->getSDBDomain();
    
    $fields = array();
    foreach($this->getSDBFields() as $field => $meta) {
      $fields[$field] = $this->$field===NULL?'':$this->$field;
    }
	
    // adwhirl simpleDB segment
    /**
    $this->sdb = SDB::getInstance();
    $this->sdb->put($domain, $id, $fields, true);
    */
    // adwhirl simpleDB segment
    $fields['id'] = $id;
    /** cheng mysql region */ 
    
    $this->sdb = myPDO::getinstance();
    $this->sdb->put($domain , "where id = '$id'",$fields,true);
    
    /** cheng mysql region*/
  }

  function delete() {
    $id = $this->id;
		// fb("sdbo - delete $this->id");

    $domain = $this->getSDBDomain();

    //adwhirl simpeDB segment
    
    /**
     
    $fields = array('deleted' => date('Y-m-d'));
    $this->sdb = SDB::getInstance();    
    
    // Soft delete
    $this->sdb->put($domain, $id, $fields, true);
    //    $this->sdb->delete($domain, $id);
  
    */
    
    //adwhirl simpeDB segment
    
    /** cheng mysql region */
    
    $fields = array(
    		'deleted' => date('Y-m-d'),
    		'id' => $id
    );
    
    $this->sdb =myPDO::getinstance();
    $this->sdb->put($domain,"where id = '$id'",$fields ,true);
    
    /** cheng mtsql region */
    
  }
}
