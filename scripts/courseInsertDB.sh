#!/bin/bash

#This script's purpose is to populate the Course DB with all the courses found in archway/stats/total.txt


for line in $(cat /var/www/archway/stats/total.txt)
do
	echo "INSERT INTO Course (cname) VALUES ('$line');"
done | mysql -uadmin -pvincentdb archway1;
