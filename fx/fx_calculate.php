<?php

        require_once 'config/config.php';
//Connect to mysql server
$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");

//Connect to database (NEEDS UPDATE)
mysql_select_db("fx_analiz") or die ("Unable to select database!");


$query_date = "select distinct `DTYYYYMMDD` from `EURUSD` "
        . "where TIME BETWEEN '08:00:00' AND '10:15:00' ";


 $result_date = mysql_query($query_date) or die ("Error in query: $query_date. ".mysql_error());
        
while ($row = mysql_fetch_assoc($result_date)) {  

$query_day = $row['DTYYYYMMDD'];

$query_read = "SELECT `DTYYYYMMDD` DATE, `HIGH` LBO_HIGH, `LOW` LBO_LOW FROM `EURUSD` "
        . "WHERE `DTYYYYMMDD` = '$query_day' "
        . " AND TIME BETWEEN '08:00:00' AND '10:15:00' ";


 $result_read = mysql_query($query_read) or die ("Error in query: $query_read. ".mysql_error());

 
         
         while ($row = mysql_fetch_assoc($result_read)) {  
    
             
                        
            $longrefarr[] =  ($row['LBO_HIGH']);
            $shortrefarr[] =  ($row['LBO_LOW']);
            
         }
         
         $query_day;
         //echo "<br>";
         $longref = max($longrefarr);
         //echo "<br>";
         $shortref = min($shortrefarr);
         $variation = $longref - $shortref;
         
         $longentry = $longref + 0.0003 ;
         $longsl = $shortref - 0.0003;
         $longtp = $longentry +$variation + 0.0005;
         
         $shortentry = $shortref - 0.0003 ;
         $shortsl = ($longref + 0.0003);
         $shorttp = $shortentry - $variation - 0.0005;
         
         
        

  echo $query_insert = "INSERT INTO `daily_lbo_values`(`date`, `longref`, "
      . "`longentry`, `longtp`, `longsl`, `shortref`, `shortentry`, `shorttp`," 
      . "`shortsl`) VALUES ('$query_day', $longref, $longentry, $longtp, $longsl, "
          . "$shortref, $shortentry, $shorttp, $shortsl)";
        
$result_insert = mysql_query($query_insert) or die ("Error in query: $query_insert. ".mysql_error());
         
  
 
         unset ($longrefarr);
         unset ($shortrefarr);
         
         
         }      
 