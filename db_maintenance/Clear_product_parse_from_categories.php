<?php

require_once '../config/config.php';
//Connect to mysql server
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
}

 $query = "SELECT Base_URL_id FROM url where Base_URL in ( "
         . "SELECT DISTINCT Referring_URL FROM url) and "
         . "Parse_for_Product = 'Y'";


 $result = mysqli_query($connection, $query); 
  
  if( !$result )
    echo mysqli_error($connection);

  while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s \n", $row["Base_URL_id"]);
  
        
$query2 = "UPDATE url SET Parse_for_Product = 'N' where Base_URL_id = '$row[Base_URL_id]'";
         


 $result2 = mysqli_query($connection, $query2); 
  
  if( !$result2 )
    echo mysqli_error($connection);
        
  }
   
