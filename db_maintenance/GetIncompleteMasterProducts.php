<?php

        require_once '../config/config.php';
//Connect to mysql server
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
}

        $query = "SELECT *  "
         . "FROM "
         . "PRODUCT_MASTER "
         . "WHERE "
         . "(PRDTDESC IS NULL OR "
         . "BRAND IS NULL OR "
         . "PRDTPRCE IS NULL OR "
         . "PRDTCURR IS NULL OR "
         . "PRDTVATI IS NULL OR "
         . "PRDTMANM IS NULL OR "
         . "PRDTIMAG IS NULL OR "
         . "MAINCATE IS NULL OR "
         . "MIDDCATE IS NULL OR "
         . "SUBCATEG IS NULL) "
         . "AND "
         . "PDTREAFL = 'Y'";
         

 $result = mysqli_query($connection, $query); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Incomplete records in the database: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      echo $row["PRDTURL"];
        echo "<br>";
  }
  echo "***************************************** <br><br>";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

