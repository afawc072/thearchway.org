<?php

if ( !isset($_REQUEST['term']) )
    exit;

//open connection
$conn = mysql_connect("localhost", "admin", "vincentdb") or die(mysql_error());
//select database
mysql_select_db("archway1");

$rs = mysql_query('select cname from Course where cname like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by zip asc limit 0,10', $conn);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['cname'] ,
            'value' => $row['cname']
        );
    }
}

echo json_encode($data);
flush();
?>