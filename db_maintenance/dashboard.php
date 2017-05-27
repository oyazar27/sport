<?php

        require_once '../config/config.php';
//Connect to mysql server
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
}

 $query = "SELECT DISTINCT MRCHTNAM FROM url";


 $result = mysqli_query($connection, $query); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Merchants in the database: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s \n", $row["MRCHTNAM"]);
        echo "<br>";
  }
  echo "***************************************** <br><br>";
  
 $query2 = "SELECT "
         . "MRCHTNAM, "
         . "COUNT(BASEURL) "
         . "FROM url "
         . "WHERE URLPRSFL = 'Y' "
         . ""
         . ""
         . "group by "
         . "MRCHTNAM";


 $result = mysqli_query($connection, $query2); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Base URLs in the database awaiting parsing of URLs: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s: %s \n", $row["MRCHTNAM"], $row["COUNT(BASEURL)"]);
        echo "<br>";
  }
  echo "***************************************** <br><br>";
 $query2 = "SELECT "
         . "MRCHTNAM, "
         . "COUNT(BASEURL) "
         . "FROM url "
         . "WHERE PDTPRSFL = 'Y' "
         . "AND PDTREAFL = 'N' "
         . ""
         . "group by "
         . "MRCHTNAM";


 $result = mysqli_query($connection, $query2); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Base URLs in the database awaiting parsing of products: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s: %s \n", $row["MRCHTNAM"], $row["COUNT(BASEURL)"]);
        echo "<br>";
  }
  echo "***************************************** <br><br>";

  $query3 = "SELECT MRCHTNAM, COUNT(PRDTURL) FROM PRODUCT group by MRCHTNAM";


 $result = mysqli_query($connection, $query3); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Products in the database: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s: %s \n", $row["MRCHTNAM"], $row["COUNT(PRDTURL)"]);
        echo "<br>";
  }
  echo "***************************************** <br><br>";

  $query4 = "SELECT MRCHTNAM, COUNT(PRDTURL) FROM product_master "
          . "group by MRCHTNAM";


 $result = mysqli_query($connection, $query4); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "All products in the master database: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s: %s \n", $row["MRCHTNAM"], $row["COUNT(PRDTURL)"]);
        echo "<br>";
  }
  echo "***************************************** <br><br>";

    $query4 = "SELECT MRCHTNAM, "
            . "COUNT(PRDTURL) "
            . "FROM product_master "
            . "WHERE PDTREAFL = 'Y' "
          . "group by MRCHTNAM";


 $result = mysqli_query($connection, $query4); 
  
  if( !$result )
    echo mysqli_error($connection);
echo "Products with details in the master database: <br>";
  while ($row = mysqli_fetch_assoc($result)) {
      
      printf ("%s: %s \n", $row["MRCHTNAM"], $row["COUNT(PRDTURL)"]);
        echo "<br>";
  }
