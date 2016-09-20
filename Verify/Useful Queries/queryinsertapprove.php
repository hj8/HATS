
<?php
 $info = "host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man";
 $db = pg_connect($info);
 if(!$db){
   echo "<!--Error : Unable to open database\n-->";
 }
 else {
   echo "<!--Opened database successfully\n\n-->";
 }

$visitid = "1";
$sql = "INSERT INTO approve (visitid) 
VALUES ('" . $visitid . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "2";
$sql = "INSERT INTO approve (visitid) 
VALUES ('" . $visitid . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "3";
$sql = "INSERT INTO approve (visitid) 
VALUES ('" . $visitid . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "4";
$sql = "INSERT INTO approve (visitid) 
VALUES ('" . $visitid . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "5";
$sql = "INSERT INTO approve (visitid) 
VALUES ('" . $visitid . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }


 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
