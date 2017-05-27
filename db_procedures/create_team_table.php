<?php

        require_once '../config/config.php';
//Connect to mysql server
        
         
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
}

 $query = "CREATE TABLE IF NOT EXISTS SUPERLIG_TAKIMLAR"
         
 ."("
 . "KULUP_ADI VARCHAR(50), "
         . "LIG_GRUP VARCHAR(20), "
         . "KULUP_KODU VARCHAR(20), "
         . "ADRES VARCHAR(100), "
         . "SEHIR VARCHAR(20), "
         . "BOLGE VARCHAR(20), "
         . "TELEFON VARCHAR(20), "
         . "FAKS VARCHAR(20), "
         . "BASKAN VARCHAR(20), "
         . "WEB_SITESI VARCHAR(100), "
         . "SOURCE_URL VARCHAR(100), "
         . "DATA_URL VARCHAR(100) "
         
         
         . ")";

 $result = mysqli_query($connection, $query); 
  
  if( !$result )
    echo mysqli_error($connection);
