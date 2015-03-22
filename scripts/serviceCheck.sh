#!/bin/bash
lighttpd="lighttpd"
mysql="mysql"

red='\033[0;31m'
green='\0330[;32'
NC='\033[0m' # No Color

echo "     *******************************************************"
echo "     *		      		                           *"
echo "     *				 	                   *"
echo "     *						           *"
echo "     *	          - T H E   A R C H W A Y -                *"
echo "     *		      - Service Check -                    *"
echo "     *				            	           *"
echo "     *		 	           		           *"
echo "     *******************************************************"

sleep 5
echo "Verifying the status of Lighttpd"
sleep 1
if (( $(ps -ef | grep -v grep | grep $lighttpd | wc -l) > 0 ))
then
	echo -e "$lighttpd ${green} [OK] ${NC}!!!"
else
	echo -e "Lighttpd ${green} [DOWN] ${NC}"
	sleep 1
	/etc/init.d/$lighttpd start
fi
echo "Verifying the status of Mysql"
sleep 1
if (( $(ps -ef | grep -v grep | grep $mysql | wc -l) > 0 ))
then
	echo -e "$Mysql ${green}[OK]${NC}!!!"
else
	echo -e "Mysql ${red}[OK]${NC}"
	sleep 1
	/etc/init.d/$mysql start
fi