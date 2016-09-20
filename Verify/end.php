<?php


$info="host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man"; 
      $db=pg_connect($info); 
      if(!$db){ echo "<!--Error : Unable to open database\n-->"; } 
      else { echo "<!--Opened database successfully\n\n-->"; } 

foreach($_POST as $key=>$value){
   
  if (preg_match('#[0-9]#', $key))

  {  
    
    $sl = strlen($key);

    $i = ($i-7) * -1;

    $vid = substr($key, $i);

    echo $vid;
    
  }

if(isset($_POST["timeout{$vid}"])){
  	

  	$timestamp = date('Y-m-d G:i:s');

   	$timeout = "UPDATE verify SET  vtexit =
                        (select to_timestamp
                        ('{$timestamp}',
                        'YYYY-MM-DD HH24:MI:SS'))
                     
                     WHERE visitid={$vid}; ";

    $Out = pg_query($db, $timeout);

       /*
        if(!$ApQ){
        echo pg_last_error($db);
        exit;
      }
       */

        //echo "done";

        pg_close($db);
        header("Location: index.php"); 
        exit;
}
}

?>