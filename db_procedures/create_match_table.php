<?php

        require_once '../config/config.php';
//Connect to mysql server
        
         
$connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
}

 echo $query = "CREATE TABLE IF NOT EXISTS MACLAR"
         
 ."("
         . "SOURCE_URL VARCHAR(100), "
         . "DATA_URL VARCHAR(100), "
         . "EVSAHIBI_KULUP_ADI VARCHAR(50), "
         . "MISAFIR_KULUP_ADI VARCHAR(50), "
         . "MAC_KODU VARCHAR(10), "
         . "STAD VARCHAR(100), "
         . "TARIH VARCHAR(20), "
         . "SAAT VARCHAR(20), "
         . "HAKEM VARCHAR(20), "
         . "YARDIMCI_HAKEM VARCHAR(20), "
         . "IKINCI_YARDIMCI_HAKEM VARCHAR(20), "
         . "DORDUNCU_HAKEM VARCHAR(20), "
         . "GOZLEMCI VARCHAR(20), "
         . "TEMSILCI1 VARCHAR(20), "
         . "TEMSILCI2 VARCHAR(20), "
         . "TEMSILCI3 VARCHAR(20), "
         . "EVSAHIBI_KADRO_1_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_2_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_3_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_4_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_5_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_6_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_7_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_8_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_9_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_10_URL VARCHAR(100), "
         . "EVSAHIBI_KADRO_11_URL VARCHAR(100), "
         . "MISAFIR_KADRO_1_URL VARCHAR(100), "
         . "MISAFIR_KADRO_2_URL VARCHAR(100), "
         . "MISAFIR_KADRO_3_URL VARCHAR(100), "
         . "MISAFIR_KADRO_4_URL VARCHAR(100), "
         . "MISAFIR_KADRO_5_URL VARCHAR(100), "
         . "MISAFIR_KADRO_6_URL VARCHAR(100), "
         . "MISAFIR_KADRO_7_URL VARCHAR(100), "
         . "MISAFIR_KADRO_8_URL VARCHAR(100), "
         . "MISAFIR_KADRO_9_URL VARCHAR(100), "
         . "MISAFIR_KADRO_10_URL VARCHAR(100), "
         . "MISAFIR_KADRO_11_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_1_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_2_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_3_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_4_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_5_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_6_URL VARCHAR(100), "
         . "MISAFIR_YEDEK_7_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_1_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_2_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_3_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_4_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_5_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_6_URL VARCHAR(100), "
         . "EVSAHIBI_YEDEK_7_URL VARCHAR(100), "
         . "EVSAHIBI_TEKNIK_DIREKTOR_URL VARCHAR(100), "
         . "MISAFIR_TEKNIK_DIREKTOR_URL VARCHAR(100), "
         . "MISAFIR_GOL_1_URL VARCHAR(100), "
         . "MISAFIR_GOL_2_URL VARCHAR(100), "
         . "MISAFIR_GOL_3_URL VARCHAR(100), "
         . "MISAFIR_GOL_4_URL VARCHAR(100), "
         . "MISAFIR_GOL_5_URL VARCHAR(100), "
         . "MISAFIR_GOL_6_URL VARCHAR(100), "
         . "MISAFIR_GOL_7_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_1_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_2_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_3_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_4_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_5_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_6_URL VARCHAR(100), "
         . "EVSAHIBI_GOL_7_URL VARCHAR(100), "
         
         . "EVSAHIBI_KART_1 VARCHAR(100), "
         . "EVSAHIBI_KART_2 VARCHAR(100), "
         . "EVSAHIBI_KART_3 VARCHAR(100), "
         . "EVSAHIBI_KART_4 VARCHAR(100), "
         . "EVSAHIBI_KART_5 VARCHAR(100), "
         . "EVSAHIBI_KART_6 VARCHAR(100), "
         . "EVSAHIBI_KART_7 VARCHAR(100), "
  
         . "MISAFIR_KART_1 VARCHAR(100), "
         . "MISAFIR_KART_2 VARCHAR(100), "
         . "MISAFIR_KART_3 VARCHAR(100), "
         . "MISAFIR_KART_4 VARCHAR(100), "
         . "MISAFIR_KART_5 VARCHAR(100), "
         . "MISAFIR_KART_6 VARCHAR(100), "
         . "MISAFIR_KART_7 VARCHAR(100), "
  
         
         
         . "EVSAHIBI_CIKAN_1 VARCHAR(100), "
         . "EVSAHIBI_CIKAN_2 VARCHAR(100), "
         . "EVSAHIBI_CIKAN_3 VARCHAR(100), "
         . "EVSAHIBI_GIREN_1 VARCHAR(100), "
         . "EVSAHIBI_GIREN_2 VARCHAR(100), "
         . "EVSAHIBI_GIREN_3 VARCHAR(100), "
         . "MISAFIR_CIKAN_1 VARCHAR(100), "
         . "MISAFIR_CIKAN_2 VARCHAR(100), "
         . "MISAFIR_CIKAN_3 VARCHAR(100), "
         . "MISAFIR_GIREN_1 VARCHAR(100), "
         . "MISAFIR_GIREN_2 VARCHAR(100), "
         . "MISAFIR_GIREN_3 VARCHAR(100) "
         
         . ")";

 $result = mysqli_query($connection, $query); 
  
  if( !$result )
    echo mysqli_error($connection);
