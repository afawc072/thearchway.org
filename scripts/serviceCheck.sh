#!/bin/bash
lighttpd="lighttpd"
mysql="mysqld"
php="php"

if (( $(ps -ef | grep -v grep | grep $lighttpd | wc -l) > 0 ))
then
echo "$lighttpd is running!!!"
else
/etc/init.d/$lighttpd start
fi