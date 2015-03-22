#!/bin/bash
lighttpd="lighttpd"
mysql="mysql"

COL_RESET=$ESC_SEQ"39;49;00m"
COL_RED=$ESC_SEQ"31;01m"
COL_GREEN=$ESC_SEQ"32;01m"

echo "     *******************************************************"
echo "     *		      		                           *"
echo "     *				 	                   *"
echo "     *						           *"
echo "     *	          - T H E   A R C H W A Y -                *"
echo "     *		          - Service Check -                *"
echo "     *				            	           *"
echo "     *		 	           		           *"
echo "     *******************************************************"

sleep 5
echo "Verifying the status of Lighttpd"
sleep 1
if (( $(ps -ef | grep -v grep | grep $lighttpd | wc -l) > 0 ))
then
	echo -e "$lighttpd $COL_GREEN[OK]$COL_RESET!!!"
else
	echo -e "Lighttpd $COL_GREEN[DOWN]$COL_RESET"
	sleep 1
	/etc/init.d/$lighttpd start
fi
echo "Verifying the status of Mysql"
sleep 1
if (( $(ps -ef | grep -v grep | grep $mysql | wc -l) > 0 ))
then
	echo -e "$Mysql $COL_GREEN[OK]$COL_RESET!!!"
else
	echo -e "Mysql $COL_RED[OK]$COL_RESET"
	sleep 1
	/etc/init.d/$mysql start
fi