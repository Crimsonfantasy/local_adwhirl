#!/bin/sh
#
#
#

#install sending mail server

yum install postfix
chkconfig --add postfix
service postfix start

#update php to php5.2

if test -e /etc/yum.repos.d/CentOS-Base.repo ; then
	cp  -f /etc/yum.repos.d/CentOS-Base.repo  origine/CentOS-Base.repo_origine
	cp  -f  CentOS-Base.repo_origine CentOS-Base.repo_origine1 
	cat CentOS-Base.repo_php >> CentOS-Base.repo_origine1
	mv CentOS-Base.repo_origine1   /etc/yum.repos.d/CentOS-Base.repo
	yum install -y php
	yum update php*
else
	echo "not find /etc/yum.repos.d/CentOS-Base.repo"
	exit 1
fi


if (php -v | grep "PHP 5.2.*") ;then
	echo  "update php to php 5.2.10 "
	cp /etc/httpd/conf/httpd.conf  origine/httpd.conf_origine
	cp -f httpd.conf_adwhirl  /etc/httpd/conf/httpd.conf
else
	echo "plesae check php version by php -v" 
	exit 1
fi



# install xml paser
yum install -y php-xml

install php development tookit and other ?
yum install -y  php-devel 
yum install -y php* 

insatll pdo 
cd install_PDO
./install_pdo_sql
cd ..

yum insatll mysql
yum update mysql

# mount adwhirl web server
cd src
#mount --bind  adwhirl-servers-website /etc/www/html/
cd ..
service httpd restart


# next-----> what to do?

echo "1. mount web service to /var/www/html/"
echo "check 8080 port  is accessable"
echo "load DB schema"
echo "change service  IP"



