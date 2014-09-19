local_adwhirl
=============

  Use the AdWhirl technology to display ads from different ad networks in your Android and iPhone applications. But the original Project depend on Amazon EC2 environment. With the source code available, you can see how it works in your local server. This is the original Adwhirl project.

This system work fine in CentOS 5. However, I consider it will be  well in other platform.
To install system, there are four main STEP: 

1. create database schema
2. Deploy Adwhirl Web server. 
3. lauch mobile server
4. modify client

Now, Assume :
1. your location  is in the root of project.
2. your web server and database are at same machine.
    
Create Database schema
======================

check whether mySQL is in your environment.

Option:

	1. cd ./mySQL_schema
	2. mysql -u root -p < adwhirl_mysql_schema
or:
	You cloud create database manually. If you want, please refer context in the ./mySQL_schema/adwhirl_mysql_schema.
	This file detail the table schema local adwhirl refer to.


Deploy Adwhirl Web server
==========================
Option 
       If you enviroment is  Ret hat serios,such as fedora or Centos, you should use that
       1. cd ./install_system_environment/sh/
       2. ./adwhirl_web_install.sh

or:
	If you are do not use  these OS,you must manually install these tools before launching Adwhirl web server.
	1. php 5.2
	2. php-xml
	3. PDO
	4. copy ./install_system_environment/sh/httpd.conf_adwhirl to /etc/httpd/conf/httpd.conf, otherwise, settle manually

Then, you put web project  in the entry of PHP server.You also have two method to choose.
opion:
	cp ./src/adwhirl-servers-website    /var/www/html
or
	 mount --bind ./src/adwhirl-servers-website /var/www/html

At the end of this Step, please check whether server work fine now by input  'localhost:8080' into address bar of web browser.


lauch mobile server
======================
This mobile server notify clients to switch ad networks on the fly.

     1.change location, "cd  ./src/adwhirl-servers-mobile" 
     2.open  adwhirl-servers-mobile with eclispe
     5. modify util.AdWhirlUtil

      search 'public static final String SERVER = "XXXXXXXXXXXX";'
      ,and then replace your web server ID to XXXXXXXXXXXX 

     3.execute Ivoker.java
     4. execute Daemon.java 


 modify client
===================================

1. 
	modify 4 line of code in class  com.adwhirl.util.AdWhirlUtil. xxxx is replaced with Web server IP.
	1. public static final String urlConfig = "http://XXXX:80/getInfo.php?appid=%s&appver=%d&client=2";
	2. public static final String urlImpression = "http://XXXX:80/exmet.php?appid=%s&nid=%s&type=%d&uuid=%s&country_code=%s&appver=%d&client=2";
	3. public static final String urlClick = "http://XXXX:80/exclick.php?appid=%s&nid=%s&type=%d&uuid=%s&country_code=%s&appver=%d&client=2";
	4. public static final String urlCustom = "http://XXXX:80/custom.php?appid=%s&nid=%s&uuid=%s&country_code=%s%s&appver=%d&client=2";
	


And done, Congratulation.

finally, If you want to know how to  use Adwhirl SDK, please see https://code.google.com/p/adwhirl/.

