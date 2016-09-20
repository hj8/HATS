
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
$applicationdate = "2016-09-12 12:05:30";
$ifname = "Thomas";
$imname = "A";
$ilname = "Lee";
$visitdate = "2016-09-24";
$visittime = "4:12:03 PM";
$consentcheck = "t";
$agreementcheck = "t";
$dresscheck= "t";
$sql = "INSERT INTO visitorid (visitid, applicationdate, iFName, iMName, iLName, visitdate, visittime, consentcheck, agreementcheck, dresscheck) 
VALUES ('" . $visitid . "', '" . $applicationdate . "', '" . $ifname . "', '" . $imname . "', '" . $ilname . "', '" . $visitdate . "', '" . $visittime . "', '" . $consentcheck . "',  '" . $agreementcheck . "' , '" . $dresscheck . "')";
$ret = pg_query($db, $sql);


$visitid = "2";
$applicationdate = "2016-09-18 13:57:37";
$ifname = "Franciszek";
$imname = "P";
$ilname = "Slade";
$visitdate = "2016-09-24";
$visittime = "7:12:03 PM";
$consentcheck = "t";
$agreementcheck = "t";
$dresscheck= "t";
$sql = "INSERT INTO visitorid (visitid, applicationdate, iFName, iMName, iLName, visitdate, visittime, consentcheck, agreementcheck, dresscheck) 
VALUES ('" . $visitid . "', '" . $applicationdate . "', '" . $ifname . "', '" . $imname . "', '" . $ilname . "', '" . $visitdate . "', '" . $visittime . "', '" . $consentcheck . "',  '" . $agreementcheck . "' , '" . $dresscheck . "')";		
$ret = pg_query($db, $sql);

$visitid = "3";
$applicationdate = "2016-12-13 07:05:30";
$ifname = "Othmar";
$imname = "Z";
$ilname = "Leofstan";
$visitdate = "2016-09-24";
$visittime = "8:24:41 AM";
$consentcheck = "t";
$agreementcheck = "t";
$dresscheck= "t";
$sql = "INSERT INTO visitorid (visitid, applicationdate, iFName, iMName, iLName, visitdate, visittime, consentcheck, agreementcheck, dresscheck) 
VALUES ('" . $visitid . "', '" . $applicationdate . "', '" . $ifname . "', '" . $imname . "', '" . $ilname . "', '" . $visitdate . "', '" . $visittime . "', '" . $consentcheck . "',  '" . $agreementcheck . "' , '" . $dresscheck . "')";		
$ret = pg_query($db, $sql);

$visitid = "4";
$applicationdate = "2015-09-18 05:02:41";
$ifname = "Zinon";
$imname = "K";
$ilname = "Joseph";
$visitdate = "2016-09-24";
$visittime = "11:30:10 AM";
$consentcheck = "t";
$agreementcheck = "t";
$dresscheck= "t";
$sql = "INSERT INTO visitorid (visitid, applicationdate, iFName, iMName, iLName, visitdate, visittime, consentcheck, agreementcheck, dresscheck) 
VALUES ('" . $visitid . "', '" . $applicationdate . "', '" . $ifname . "', '" . $imname . "', '" . $ilname . "', '" . $visitdate . "', '" . $visittime . "', '" . $consentcheck . "',  '" . $agreementcheck . "' , '" . $dresscheck . "')";		
$ret = pg_query($db, $sql);

$visitid = "5";
$applicationdate = "2016-09-18 15:32:21";
$ifname = "Kofi";
$imname = "A";
$ilname = "Sweeney";
$visitdate = "2016-09-24";
$visittime = "12:12:11 AM";
$consentcheck = "t";
$agreementcheck = "t";
$dresscheck= "t";
$sql = "INSERT INTO visitorid (visitid, applicationdate, iFName, iMName, iLName, visitdate, visittime, consentcheck, agreementcheck, dresscheck) 
VALUES ('" . $visitid . "', '" . $applicationdate . "', '" . $ifname . "', '" . $imname . "', '" . $ilname . "', '" . $visitdate . "', '" . $visittime . "', '" . $consentcheck . "',  '" . $agreementcheck . "' , '" . $dresscheck . "')";		
$ret = pg_query($db, $sql);



 echo "<!--Operation done successfully\n-->";
 pg_close($db);
?>
