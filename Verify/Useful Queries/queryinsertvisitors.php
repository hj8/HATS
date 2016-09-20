
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
$visitornumber = "1";
$vfname = "Thomas";
$vmname = "A";
$vlname = "Lee";
$vdob = "1993-12-04";
$vrelation = "Dad";
$vaddress = "Dem California Streetz";
$vcity = "Poly Mona";
$vzip = "96792";
$vssn = "428184928";
$vphone = "8081928283";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }
$visitid = "1";
$visitornumber = "2";
$vfname = "Kaiewa";
$vmname = "D";
$vlname = "Bello";
$vdob = "1995-01-12";
$vrelation = "Mom"; 
$vaddress = "83-201 Waimanalo St";
$vcity = "Waimanalo";
$vzip = "96792";
$vssn = "573231827";
$vphone = "8083829938";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }


$visitid = "2";
$visitornumber = "1";
$vfname = "Judd";
$vmname = "K";
$vlname = "Yachin";
$vdob = "1980-01-23";
$vrelation = "Uncle";
$vaddress = "849-1923 Kinau St";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "182392837";
$vphone = "8083827392";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }
$visitid = "2";
$visitornumber = "2";
$vfname = "Lazzaro";
$vmname = "B";
$vlname = "Fulco";
$vdob = "1985-04-15";
$vrelation = "Uncle";
$vaddress = "849-1923 Kinau St";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "183943827";
$vphone = "8082938473";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "3";
$visitornumber = "1";
$vfname = "Jerker";
$vmname = "G";
$vlname = "Baldwin";
$vdob = "1960-11-15";
$vrelation = "Son";
$vaddress = "84-203 Farrington Hwy";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "183943827";
$vphone = "8082938473";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "4";
$visitornumber = "1";
$vfname = "Hyram";
$vmname = "N";
$vlname = "Aegidius";
$vdob = "1997-12-15";
$vrelation = "Daughter";
$vaddress = "19-212 Apple St";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "192389403";
$vphone = "8084928374";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }


$visitid = "4";
$visitornumber = "2";
$vfname = "Joktan";
$vmname = "A";
$vlname = "Emmanuhel";
$vdob = "1920-01-01";
$vrelation = "Dad";
$vaddress = "11 Gerome Way";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "183939283";
$vphone = "8082938493";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }

$visitid = "5";
$visitornumber = "1";
$vfname = "Shamsuddin";
$vmname = "D";
$vlname = "Emmanuhel";
$vdob = "1970-05-13";
$vrelation = "Dad";
$vaddress = "91 Piikoi St";
$vcity = "Honolulu";
$vzip = "96817";
$vssn = "183939283";
$vphone = "8082938493";
$vemail = "example@example.com";
$sql = "INSERT INTO visitors (visitid, visitornumber, vFName, vMName, vLName, vRelation, vAddress, vCity, vZip, vSSN, vphone, vdob,vemail) 
VALUES ('" . $visitid . "', '" . $visitornumber . "', '" . $vfname . "', '" . $vmname . "', '" . $vlname . "', '" . $vrelation . "', '" . $vaddress . "', '" . $vcity . "',  '" . $vzip . "' , '" . $vssn . "' , '" . $vphone . "', '" . $vdob . "' , '" . $vemail . "')";

 $ret = pg_query($db, $sql);
 if(!$ret){
   echo pg_last_error($db);
   exit;
 }


 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
