#! /bin/bash

echo "WE WILL NOW UPDATE THE DB BY REMOVING FROM IT FILES THAT AREN'T IN THE FILE SERVER ANYMORE"
sleep 5

while read -a row
do

echo ${row[1]}
if [ "${row[1]}" == "path" ]
then
echo "row path"

elif [ -f ${row[1]} ]
then
echo "file exists"

else
echo "file doesn't exists, therefore will be deleted from DB"
echo "use archway1;DELETE from Files where id like '${row[0]}';" | mysql -u admin -pvincentdb

fi

done < <(echo "use archway1;SELECT id,path from Files" | mysql -u admin -pvincentdb)

echo "WE WILL NOW UPDATE THE DB WITH COURSES THAT MIGHT HAVE SLIPPED THROUGH THE CRACKS OF OUR DB OR WERE ADDED MANUALLY TO THE FILE SERVER"
sleep 5

ARRAY=( $(find /var/www/archway/upload/uploadedFiles/* | grep -e ".doc" -e ".odt" -e ".ppt" -e ".docx" -e ".pdf") )

for i in "${ARRAY[@]}"
	do
	:
	COURSENAME=$(echo ${ARRAY[i]} | cut -c47-)
done

