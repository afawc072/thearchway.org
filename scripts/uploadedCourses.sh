#!/bin/bash

cd /opt/lampp/htdocs/archway/upload/uploadedFiles/
path=/opt/lampp/htdocs/archway/stats/coursesStats.txt


numCourses=$(ls -lR | grep ^d | wc -l)

dirList=$(du -hs)

date=$(date -I) 

echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">"$path"
echo "Statistics Courses with Uploaded Content $date">>"$path"
echo "There are $numCourses courses containing files!">>"$path"
echo "Total Size: $dirList ">>"$path"
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">>"$path"




