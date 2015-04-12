#! /bin/bash
mysql -u admin -pvincentdb << EOF
use archway1;
select * from Files;
EOF