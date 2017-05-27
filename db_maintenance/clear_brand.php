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

ECHO $query = "SELECT BRAND, PRDTMANM FROM PRODUCT_MASTER "
        . "WHERE BRAND LIKE \"'%'\" AND "
        . "BRAND_CORR ='' ";
                
        
$result = mysqli_query($connection, $query);   

while ($row = mysqli_fetch_assoc($result)) {
    
$brand['old'][] = $row['BRAND'];
$brand['master'][] = $row['PRDTMANM'];

    }


foreach ($brand['old'] as $brand_value) {
    $brand['new'][] = str_replace("'", "", $brand_value);
    
}
//print_r ($brand);    

$count = count ($brand['old']);


for ($i = 0; $i < $count; $i ++) {
    
    $old_brand = $brand['old'][$i];
    
    $new_brand = $brand['new'][$i];
    $master_name = $brand['master'][$i];
    $old_brand = $brand['old'][$i];
        
echo $query2 = "UPDATE `product_master` SET "
        . "`BRAND_CORR` = '$new_brand' WHERE "
         . "`BRAND` = \"$old_brand\" ";
                
$result2 = mysqli_query($connection, $query2);   

}
        

