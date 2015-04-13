#! /bin/bash
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
echo "use archway1;DELETE from Files where id like '${row[0]}';" | mysql -u root -pvince$

fi

done < <(echo "use archway1;SELECT id,path from Files" | mysql -u admin -pvincentdb)