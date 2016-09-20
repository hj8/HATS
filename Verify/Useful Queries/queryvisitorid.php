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
   select * from visitorid;
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
echo "<th>applicationdate</th>";
echo "<th>ifname</th>";
echo "<th>imname</th>";
echo "<th>ilname</th>";
echo "<th>visitdate</th>";
echo "<th>visittime</th>";
echo "<th>consentcheck</th>";
echo "<th>agreementcheck</th>";
echo "<th>dresscheck</th>";
echo "<th>visittype</th>";
echo "</tr>";
 while($column = pg_fetch_array($ret)){
   echo "<tr>";
   echo "<td>" . $column[visitid] . "</td>";
   echo "<td>" . $column[applicationdate] . "</td>";
   echo "<td>" . $column[ifname] . "</td>";
   echo "<td>" . $column[imname] . "</td>";
   echo "<td>" . $column[ilname] . "</td>";
   echo "<td>" . $column[visitdate] . "</td>";
   echo "<td>" . $column[visittime] . "</td>";
   echo "<td>" . $column[consentcheck] . "</td>";
   echo "<td>" . $column[agreementcheck] . "</td>";
   echo "<td>" . $column[dresscheck] . "</td>";
   echo "<td>" . $column[visittype] . "</td>";

   echo "</tr>";
 }
echo "</table>";
echo "</div>";
 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
</html>