#!/bin/bash

cd /var/www/archway/upload/uploadedFiles/
path=/var/www/archway/stats/coursesStats.txt


numCourses=$(ls -lR | grep ^d | wc -l)

dirList=$(du -hs)

date=$(date -I) 

ppt=$(locate -c *.ppt)

docx=$(locate -c *.docx)

doc=$(locate -c *.doc)

pdf=$(locate -c *.pdf)

odt=$(locate -c *.odt)


echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">"$path"
echo "Statistics Courses with Uploaded Content $date">>"$path"
echo "There are $numCourses courses containing files!">>"$path"
echo $ppt" Powerpoint, "$docx" DocX files, "$doc" Doc files, "$pdf" PDF files and "$odt" OpenOffie/LibreOffice files!">
>"$path"
echo "Total Size: $dirList ">>"$path"
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">>"$path"




