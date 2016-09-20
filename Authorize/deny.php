<?php
    echo "ok";
    require('connection.php');

    foreach($_POST as $key=>$value){


	if (preg_match('!\d+!', $key))
	{
		

    $sl = strlen($key);
    $i = ($sl - 4) * -1;

    $vid = substr($key, "{$i}");
		//$find = $matches[0];
		//echo $matches;
  	//echo "sofarsogood";
  	}
}

    //echo $vid;
  	
  		if(isset($_POST["Deny{$vid}"]) && ($_POST['DenyReason'])){

  			require("connection.php");

        $timestamp = date('Y-m-d G:i:s');
 	 		  $Denyc = $_POST["Deny{$vid}"];
  			$reasonf = $_POST['DenyReason'];
        $reason  = htmlspecialchars($reasonf, ENT_QUOTES);

   			$DenyQuerry= "UPDATE approve SET reason='{$reason}', approvedeny= FALSE,
                      date = (select to_timestamp
                        ('{$timestamp}',
                        'YYYY-MM-DD HH24:MI:SS'))
                      WHERE visitid={$vid}";
    	  
        	$DnQ = pg_query($db, $DenyQuerry);

          // Debggued
        	if(!$DnQ){
    		echo pg_last_error($db);
    		exit;
    			}

          
        	pg_close($db);

          

        header("Location: index.php"); 
 			  exit();
  		}

	      	

	//	header("Location: check.php"); 
			

//}
    
    
  
?>



