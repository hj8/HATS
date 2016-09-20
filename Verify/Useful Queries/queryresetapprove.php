
<?php
 $info = "host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man";
 $db = pg_connect($info);
 if(!$db){
   echo "<!--Error : Unable to open database\n-->";
 }
 else {
   echo "<!--Opened database successfully\n\n-->";
 }

$sql = "UPDATE approve SET approvedeny=NULL";
$ret = pg_query($db, $sql);

$sql = "UPDATE approve SET reason=NULL";
$ret = pg_query($db, $sql);

$sql = "UPDATE approve SET date=NULL";
$ret = pg_query($db, $sql);

$sql = "UPDATE approve SET authorizer=NULL";
$ret = pg_query($db, $sql);



 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
