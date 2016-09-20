<?php
 $info = "host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man";
 $db = pg_connect($info);
 if(!$db){
   echo "<!--Error : Unable to open database\n-->";
 }
 else {
   echo "<!--Opened database successfully\n\n-->";
 }

 $sql =  "select * from information_schema.tables";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }
 while($column = pg_fetch_row($ret)){  
   echo "Visitor ID = " . $column[1] . "<br>";
   echo "Firstname = " . $column[2] . "<br>";
   echo "Lastname = " . $column[3] . "<br>";
   echo "Inmate = " . $column[4] . "<br><br>";
 }
 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>