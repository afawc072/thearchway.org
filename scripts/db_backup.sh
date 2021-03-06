#!/bin/bash
#
#This executable file is used to backup a mysql Table from a database to a compress file but
#also to extract a compressed database to an existing database.
#
#The script can take two two different arguments, "compress" or "extract"
#
#
#
#
####Variable Declaration
err_reason=""
compress_reason=""
date="$(date +'%d_%m_%Y_%H_%M_%S')"
userInput="null"
####

#Print command line usage information and exit
function help(){ 

echo $err_reason

echo "This executable file is used to backup a mysql Table from a database to a compress file but also to extract a compressed database to an existing database."
echo "db_backup usage: db_backup"
echo "      			   [-h | --help]"
echo "       			   [-c | --compress]"
echo "     				   [-x | --extract]"
} 

##Compress option example
function compress_ie(){ 

echo "This executable file is used to backup a mysql Table from a database to a compress file but also to extract a compressed database to an existing database."
echo "db_backup usage: db_backup"
echo "      			   [-h | --help]"
echo "       			   [-c | --compress]"
echo "     				   [-x | --extract]"
} 


#
#Condition when not arguments are given to the scripts
if [ -z "$1" ] ; then
	err_reason="You forgot to enter an option"
	help
	exit
fi
#
#Condition when the help option is chosen
if [ "$1" == "-h" ] || [ "$1" == "--help" ] ; then
	err_reason="Here is the help for db_backup"
	help
	exit
fi
#
#Condition when the compress option is chosen
if [ "$1" == "-c" ] || [ "$1" == "--compress" ] ; then
	
	echo "You will need to provide the appropriate information when prompted to be able to compress a mysql database"
	echo "Enter your Mysql username: "
	read dbUser
	echo "Enter your Mysql password: "
	read -s dbPass
	echo "Enter the name of the DB to be compressed and backed up: "
	read dbname
	echo "Enter the directory for the DB to be compressed to (full path): "
	read backupPath

    filename=$dbname"_backup_"$date".sql"
    pathFile="$backupPath/$filename"

    while [ "$userInput" != "Y" ] && [ "$userInput" != "n" ]; do
    echo "The database $dbname will be compressed here: $pathFile , do you want to continue(Y/n)?"
    read userInput
    done
    if [ "$userInput" == "n" ]; then
    	exit
    fi
    if [ "$userInput" == "Y" ]; then

    	echo "Starting Dumping"
    	mysqldump --user=$dbUser --password=$dbPass --databases $dbname > $filename
    	echo "Starting Compression"
    	tar -czvf $pathFile".tar.gz" $filename
    	rm $filename
    	echo "Compression Complete"
    	exit
    fi
fi
if [ "$1" == "-x" ] || [ "$1" == "--extract" ] ; then
#in mysql, source asdasd.sql to extract.
	echo "You will need to provide the appropriate information when prompted to be able to rebuil the mysql DB"
	echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!"
	echo "YOU NEED A DATABASE NAMED archway1 IN MYSQL TO BE ABLE TO IMPORT"
	echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!"
	echo "Enter your Mysql username: "
	read dbUser
	echo "Enter your Mysql password: "
	read -s dbPass
	echo "Enter the name of the DB compressed file to be extracted and imported into mysql (i.e archway1_backup.sql): "
	read dbname
	echo "Enter the directory containing the compressed mysql DB (full path i.e. /media): "
	read backupPath

	while [ "$userInput" != "Y" ] && [ "$userInput" != "n" ]; do
    	echo "The database $dbname will be imported into your current mysql, do you want to continue(Y/n)?"
    	read userInput
    done
    if [ "$userInput" == "n" ]; then
    	exit
    fi
    if [ "$userInput" == "Y" ]; then

    	echo "Extracting Compressed File"
    	
    	tar -xzvf $backupPath"/"$dbname".tar.gz"
    	echo "Importing Database into mysql"
    	mysql --user=$dbUser --password=$dbPass archway1 < $dbname
   	fi

else
err_reason="This option doesn't exit"
help
exit

fi
