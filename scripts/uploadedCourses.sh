#!/bin/bash

cd /var/www/upload/uploadedFiles/
path=/var/www/stats/coursesStats.txt


numCourses=$(ls -lR | grep ^d | wc -l)

dirList=$(du -hs)

date=$(date -I) 

echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">"$path"
echo "Statistics Courses with Uploaded Content $date">>"$path"
echo "There are $numCourses courses containing files">>"$path"
echo "Total Size: $dirList ">>"$path"
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">>"$path"




