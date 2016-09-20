<html>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<?php
 $info = "host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man";
 $db = pg_connect($info);
 if(!$db){
   echo "<!--Error : Unable to open database\n-->";
 }
 else {
   echo "<!--Opened database successfully\n\n-->";
 }

 $sql =<<<EOF
   select * from visitdefinition;
EOF;

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }
echo "<div class='w3-responsive'>";
echo "<table class='w3-card-4 w3-white w3-table w3-bordered w3-border w3-hoverable w3-responsive w3-padding-64'>";
echo "<tr>";
echo "<th>visittype</th>";
echo "<th>visitdefinition</th>";
echo "</tr>";
 while($column = pg_fetch_array($ret)){
   echo "<tr>";
   echo "<td>" . $column[visittype] . "</td>";
   echo "<td>" . $column[visitdefinition] . "</td>";
   echo "</tr>";
 }
echo "</table>";
echo "</div>";
 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
</html>