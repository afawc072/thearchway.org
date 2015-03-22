#!/bin/bash
lighttpd="lighttpd"
mysql="mysql"
php="php"

if (( $(ps -ef | grep -v grep | grep $lighttpd | wc -l) > 0 ))
then
echo "$lighttpd is running!!!"
else
/etc/init.d/$lighttpd start
fi
if (( $(ps -ef | grep -v grep | grep $mysql | wc -l) > 0 ))
then
echo "$mysql is running!!!"
else
/etc/init.d/$mysql start
fi