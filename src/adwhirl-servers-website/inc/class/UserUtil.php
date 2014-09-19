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

require_once('inc/class/User.php');
require_once('inc/class/SDB.php');
require_once('inc/mysql/myPDO.php');

class UserUtil {
  public static $DOMAIN_USERS_FORGOT = "users_forgot";
  public static $DOMAIN_USERS_UNVERIFIED = "users_unverified";

  public static function getUser($email, $password=null) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
/* 
  	$sdb = SDB::getInstance();
    
 */
  	$my_pdo =  myPDO::getinstance();
  	
  	$domain = User::$SDBDomain;

    $aaa = array();
    foreach(User::$SDBFields as $field => $meta) {
      $aaa[] = $field;
    }
    
    $email_l = strtolower($email);
    
    //adwhirl simple DB
    
/* 
    if($password === null) {
      $where = "where `email` = '$email' or `email` = '$email_l'";
    }
    else {
      $password = User::getHashedPassword($password);
      $where = "where (`email` = '$email' or `email` = '$email_l') and `password` = '$password'";
    }

    if(!$sdb->select($domain, $aaa, $where)) {
      $my_log->write($aaa,__FILE__,__LINE__);
      return null;
    }
 */
    
    //adwhirl simple DB
          
    /** cheng mysql region*/
    if($password === null) {
    	$where = "where email = '$email' or email = '$email_l'";
    }
    else {
    	$password = User::getHashedPassword($password);
    	$where = "where (email = '$email' or email = '$email_l') and password = '$password'";
    }
    
    if(! $my_pdo->select($domain , $where,$aaa)){
    	
    	return null;
    }
    /** cheng mysql region*/       
    
    
    $my_log->write($aaa,__FILE__,__LINE__);

    if(empty($aaa)) {
      return null;
      
    }

    $user = array();
    foreach(User::$SDBFields as $field => $meta) {
      $user[$field] = isset($aaa[0][$field]) ? $aaa[0][$field] : '';
    }
    $user['id'] = $aaa[0]['id'];

    return $user;
  }
	public static function hasUser($email) {
    $sdb = SDB::getInstance();
    $user = UserUtil::getUser($email);
		return $user!=NULL?'true':'false';
	}
  public static function setupForgotPassword($email) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
    

    $user = UserUtil::getUser($email);
    
    $ufid = SDB::uuid();
    
    $aa = array('uid' => $user['id'],
                'createdAt' => date('Y-m-d'));
    
    // adwhirl region
    /**
    
    $sdb = SDB::getInstance();
    if(!$sdb->put(self::$DOMAIN_USERS_FORGOT, $ufid, $aa, true)) {
      $my_log->write($aaa,__FILE__,__LINE__);
      return false;
    }
    
    */
    
    //adwhirl region
    
    /**cheng mysql region */
    $aa['id']=$ufid;
    $my_pdo = myPDO::getinstance();
    if(!$my_pdo->put(self::$DOMAIN_USERS_FORGOT , "where id = '$ufid'" , $aa ,true)){
    	
    	return false;
    }
    
    /**cheng mysql region */
    
    $my_log->write($aa,__FILE__,__LINE__,'put');
    $activationLink = 'http://'.$_SERVER['HTTP_HOST'].'/home/login/passwordReset?ufid='.$ufid;
    
    $to      = $email;
    $subject = 'AdWhirl Password Reset';
    $message = 'Hello AdWhirl User,
    
        We received a request to reset your password. Click on the link below to set up a new password for your account.
        
        '.$activationLink.'
        
        If you did not request to reset your password, ignore this email - the link will expire on its own.
        
        Best,
        AdWhirl Team
        ';
    
    mail($to, $subject, $message);

    return true;
  }

  public static function passwordReset($ufid, $password) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
  	$aaa = 'uid';
  	
/*   	
  	$sdb = SDB::getInstance();
    if($sdb->select(self::$DOMAIN_USERS_FORGOT, $aaa, "where itemName() = '$ufid'")) {
 */
  	/** cheng mysql region*/
  	$my_pdo = myPDO::getinstance();
  	if($my_pdo->select(self::$DOMAIN_USERS_FORGOT , "where id = '$ufid' " , $aaa)){

  	  /** cheng mysql region*/
  	  $my_log->write($aaa,__FILE__,__LINE__);
      $uid = $aaa[0]['uid'];

      $user = new User($uid);

      $user->password = md5($password.User::$PASSWORD_SALT);
      $user->put();
/* 
      $sdb->delete(self::$DOMAIN_USERS_FORGOT, $ufid);
*/ 
      $my_pdo->delete(self::$DOMAIN_USERS_FORGOT , "where id = '$ufid' ");
      $my_log->write($ufid,__FILE__,__LINE__,'delete');
      return true;
    }
    $my_log->write($aaa,__FILE__,__LINE__);

    return false;
  }

  public static function registerNewUser($email, $firstName, $lastName, $password, $allowEmail) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
  	
    
    
  
    
    
    $user = new User($email);

    if($user->id != null) {
      return false;
    }

    $uid = SDB::uuid();

    $password = User::getHashedPassword($password);

    $aa = array('email' => $email,
		  'password' => $password,
		  'allowEmail' => $allowEmail,
      'firstName' => $firstName,
      'lastName' => $lastName,
      'createdAt' => date('Y-m-d'));
    
    //adwhirl simpleDB
    /** 
    $sdb = SDB::getInstance();
    $sdb->put(self::$DOMAIN_USERS_UNVERIFIED, $uid, $aa, true);
    
    */
    //adwhirl simpleDB
    
    /**cheng mysql DB */
    $aa['id']=$uid;
    $my_pdo= myPDO::getinstance();
    $my_pdo->put(self::$DOMAIN_USERS_UNVERIFIED,"where id = '$uid' " , $aa ,true);
    
    /**cheng mysql DB */
    
    $my_log->write($aa,__FILE__,__LINE__.'put');
    $activationLink = 'http://'.$_SERVER['HTTP_HOST'].'/home/register/confirm?uid='.$uid;
    
    $to      = $email;
    $subject = 'AdWhirl Account Registration';
		$message = "Hello iPhone and Android Developer,

Thanks for registering with AdWhirl. Click on the link below to validate your email address and activate your account.

$activationLink

We hope that you’ll find AdWhirl’s mediation very helpful in managing your ad inventory, as you can simultaneously run as many or as few ad networks as you’d like, and you’re also able to create and run your own house ads whenever you want to – all for free – and all open source.

We are spending a lot of time perfecting the library and the interface, and giving you, the developer, as many hooks as possible to optimize revenue. We’d love to hear from you with suggestions, feedback, anything! You can also contribute directly to the AdWhirl Open Source community on our project page (http://code.google.com/p/adwhirl/).

If you have any questions, or trouble logging in, please email us at support@adwhirl.com. 

Happy Advertising!

AdWhirl Team";
    mail($to, $subject, $message);

    return true;
  }

  public static function confirmUser($uid) {
  	$my_log = new MyLogging('/tmp/adwhirl_db_log/mytest.log');
/* 
    $sdb = SDB::getInstance();
*/
  	$my_pdo = myPDO::getinstance();
  	    
    
    $aaa = array('email', 'firstName','lastName', 'password', 'allowEmail');
/*     
    $sdb->select(self::$DOMAIN_USERS_UNVERIFIED, $aaa, "where itemName() = '$uid' limit 1", false);
    
*/ 
    /** cheng mysql region*/
    
    $my_pdo->select(self::$DOMAIN_USERS_UNVERIFIED , "where id = '$uid' limit 1" , $aaa ,false);
    
    /** cheng mysql region*/
    
    $my_log->write($aaa,__FILE__,__LINE__);
    if(empty($aaa[0])) {
      return false;
    }
    
    $user = new User();
    $user->id = $uid;
    $user->email = $aaa[0]['email'];
    $user->password = $aaa[0]['password'];
    $user->allowEmail = $aaa[0]['allowEmail'];
    $user->firstName = $aaa[0]['firstName'];
    $user->lastName = $aaa[0]['lastName'];
    
    $user->put();
    
    return true;
  }    
}
