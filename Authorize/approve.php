<?php
foreach($_POST as $key=>$value)
{
   echo "$key";

  if(isset($_POST[$key])){

  		require("connection.php");

  		//get last digit from the key 
  		if (preg_match('!\d+!', $key))
    {
    

    $sl = strlen($key);
    $i = ($sl - 7) * -1;

    $vid = substr($key, "{$i}");
    //$find = $matches[0];
    //echo $matches;
    //echo "sofarsogood";
    }

  		//time update
  		$timestamp = date('Y-m-d G:i:s');
      echo $timestamp;

   		$ApproveQuery = "UPDATE approve SET approvedeny = TRUE , date =
                        (select to_timestamp
                        ('{$timestamp}',
                        'YYYY-MM-DD HH24:MI:SS'))

                     WHERE visitid={$vid} ";
    	  
        $ApQ = pg_query($db, $ApproveQuery);

       
        if(!$ApQ){
        echo pg_last_error($db);
        exit;
      }

	$sql = "INSERT INTO verify (visitid) VALUES ('".$vid."')";

	 $ret = pg_query($db, $sql);
 	if(!$ret){
 	  echo pg_last_error($db);
 	  exit;
	 }
       

        //echo "done";

        pg_close($db);

        header("Location: index.php"); 
 		    exit();
    }

}


?>
