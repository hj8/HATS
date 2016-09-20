<?php

	require("connection.php");

	
	//$ApproveQuery = "UPDATE approve SET approvedeny = NULL WHERE visitid={$number} ";
    //		$DenyQuery    = "UPDATE approve SET approvedeny = \"f\" WHERE visitid=" . $number. "';";

	

foreach (range(1,100) as $number){

	$ApproveQuery = "UPDATE approve SET approvedeny = NULL WHERE visitid={$number} ";


	$ApQ = pg_query($db, $ApproveQuery);
	//header('Location: ' . $_SERVER['REQUEST_URI']);
	//header('Location:' . $_SERVER['PHP_SELF'], true, 303);
	//	exit;

	  if(!$ApQ){
    	echo pg_last_error($db);
    	exit;
  }


 
  //$test = ctype_digit ( $key );

  //echo $test;
  
  

 }

?>