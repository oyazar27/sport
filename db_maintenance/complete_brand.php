<?php

        require_once '../config/config.php';
//Connect to mysql server
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();   
    
     /* change character set to utf8 */
mysqli_set_charset($connection, "utf8");
}

//**********************************

ECHO $query = "SELECT BRAND, BRAND_CORR, PRDTID FROM PRODUCT_MASTER "
        . "WHERE BRAND LIKE \"'%'\" ";
                
        
$result = mysqli_query($connection, $query);   

while ($row = mysqli_fetch_assoc($result)) {
    
$brand['old'][] = $row['BRAND'];
$brand['master'][] = $row['PRDTID'];
$brand['corrected'][] = $row['BRAND_CORR'];
    }

   

$count = count ($brand['old']);

for ($i = 0; $i < $count; $i ++) {
    
    $old_brand = $brand['old'][$i];
    $corrected_brand = $brand['corrected'][$i];
    $master_name = $brand['master'][$i];
    
        
echo $query2 = "UPDATE `product_master` SET "
        . "`BRAND` = '$corrected_brand' WHERE "
         . "`PRDTID` = \"$master_name\" ";
  echo "<br>";

  $result2 = mysqli_query($connection, $query2);   
  
   if( !$result2 )
    echo mysqli_error($connection);

}
        

