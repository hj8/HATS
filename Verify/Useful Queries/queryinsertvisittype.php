
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
$visittype = "1";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);


$visitid = "1";
$visittype = "2";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

$visitid = "1";
$visittype = "3";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

$visitid = "2";
$visittype = "1";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);


$visitid = "3";
$visittype = "1";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);


$visitid = "3";
$visittype = "3";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

$visitid = "4";
$visittype = "1";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);


$visitid = "5";
$visittype = "1";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

$visitid = "5";
$visittype = "2";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

$visitid = "5";
$visittype = "3";
$sql = "INSERT INTO visittype (visitid, visittype) 
VALUES ('" . $visitid . "', '" . $visittype . "')";
$ret = pg_query($db, $sql);

 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
