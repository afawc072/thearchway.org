#!/bin/bash
#Backup Script


#This executable script allows you to backup a file and create an archive for it
#
#
#i.e /var/www/archway/scripts/backup.sh archway /var/www/archway
#
#

backupPath="/media/backup"
archivePath="/media/archive"

if [ $(find "${archivePath}/${1}.tar.gz") ]

then
	rm "${archivePath}/${1}.tar.gz"

	mv "${backupPath}/${1}.tar.gz" "${archivePath}/"

elif [ $(find "${backupPath}/${1}.tar.gz") ]

then

	mv "${backupPath}/${1}.tar.gz" "${archivePath}/"


fi

cd $backupPath

tar czPf $1.tar.gz $2

