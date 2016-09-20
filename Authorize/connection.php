<?php
  $info = "host=192.168.254.25 port=5432 dbname=occc_visitorsdb user=hacc2016man password=hacc2016_man";
  $db = pg_connect($info);
  if(!$db){
    echo "Error : Unable to open database\n";
  }
  ?>
