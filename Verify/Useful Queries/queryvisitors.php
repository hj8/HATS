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
   select * from visitors;
EOF;

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }
echo "<div class='w3-responsive'>";
echo "<table class='w3-card-4 w3-white w3-table w3-bordered w3-border w3-hoverable w3-responsive w3-padding-64'>";
echo "<tr>";
echo "<th>visitid</th>";
echo "<th>visitornumber</th>";
echo "<th>vfname</th>";
echo "<th>vmname</th>";
echo "<th>vlname</th>";
echo "<th>vdob</th>";
echo "<th>vaddress</th>";
echo "<th>vcity</th>";
echo "<th>vzip</th>";
echo "<th>vemail</th>";
echo "<th>vphone</th>";
echo "<th>vssn</th>";
echo "<th>vrelation</th>";
echo "<th>minorstatus</th>";
echo "</tr>";
 while($column = pg_fetch_array($ret)){
   echo "<tr>";
   echo "<td>" . $column[visitid] . "</td>";
   echo "<td>" . $column[visitornumber] . "</td>";
   echo "<td>" . $column[vfname] . "</td>";
   echo "<td>" . $column[vmname] . "</td>";
   echo "<td>" . $column[vlname] . "</td>";
   echo "<td>" . $column[vdob] . "</td>";
   echo "<td>" . $column[vaddress] . "</td>";
   echo "<td>" . $column[vcity] . "</td>";
   echo "<td>" . $column[vzip] . "</td>";
   echo "<td>" . $column[vemail] . "</td>";
   echo "<td>" . $column[vphone] . "</td>";
   echo "<td>" . $column[vssn] . "</td>";
   echo "<td>" . $column[vrelation] . "</td>";
   echo "<td>" . $column[minorstatus] . "</td></td>";
   echo "</tr>";
 }
echo "</table>";
echo "</div>";
 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
</html>