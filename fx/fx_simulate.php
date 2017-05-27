<?php

        require_once 'config/config.php';
//Connect to mysql server
$connection = mysql_connect($host, $user, $pass) or die ("Unable to connect!");

//Connect to database (NEEDS UPDATE)
mysql_select_db("fx_analiz") or die ("Unable to select database!");

/* Burası tamam
$query_date = "select distinct `date`, `longentry`, `longtp`, `longsl`, `shortentry`, "
        . "`shorttp`, `shortsl` from `daily_lbo_values` ";


 $result_date = mysql_query($query_date) or die ("Error in query: $query_date. ".mysql_error());
        
while ($row = mysql_fetch_assoc($result_date)) {  

echo $query_day = $row['date'];
}
*/
//Buraya kadar, test için tek tarih giriyoruz

echo "*************************************************\n" ;

$query_date = "select distinct `date`, `longentry`, `longtp`, `longsl`, `shortentry`, "
        . "`shorttp`, `shortsl` from `daily_lbo_values` "
        . "where `date`  = '2016-03-08'";

$result_date = mysql_query($query_date) or die ("Error in query: $query_date. ".mysql_error());
        
while ($row = mysql_fetch_assoc($result_date)) {  
echo "date: ";
$query_day = $row['date'];
echo $query_day;
echo "\n";
echo "longentry: ";
echo $longentry = $row['longentry'];
echo "\n";
echo "longsl: ";
echo $longsl = $row['longsl'];
echo "\n";
echo "longtp: ";
echo $longtp = $row['longtp'];
echo "\n";



echo "shortentry: ";
echo $shortentry = $row['shortentry'];
echo "\n";

echo "shortsl: ";
echo $shortsl = $row['shortsl'];
echo "\n";
echo "shorttp: ";
echo $shorttp = $row['shorttp'];
echo "\n";


}
$query_read = "SELECT `DTYYYYMMDD` DATE, `TIME`, `HIGH` LBO_HIGH, `LOW` LBO_LOW FROM `EURUSD` "
        . "WHERE `DTYYYYMMDD` = '$query_day' "
        . " AND TIME BETWEEN '08:16:00' AND '21:15:00' "
        . "order by DATE, TIME ASC";


 $result_read = mysql_query($query_read) or die ("Error in query: $query_read. ".mysql_error());

 
         
         while ($row = mysql_fetch_assoc($result_read)) {  
    
             
                        
            $longrefarr[] =  ($row['LBO_HIGH']);
            $shortrefarr[] =  ($row['LBO_LOW']);
            $daterefarr[] = ($row['DATE']);
            $timerefarr[] = ($row['TIME']);
            
            
         }
       

         echo "max of the day: ";
echo max($longrefarr);
echo "\n";
echo "min of the day: ";
echo min($longrefarr);
echo "\n";
foreach ($longrefarr as $key => $longref) {
       
       
       if ($longref > $longentry) {
           
       $longstarts[] = $key; }
}   

if (!$longstarts){
 echo "Long did not start"; 
 echo "\n";
 echo "max of the given range was: ";
 echo max($longrefarr);
 echo " vs. long entry value of ";
 echo $longentry;
 } 
 else {
 
       $newlongrefarr = array_slice ($longrefarr, min($longstarts));
       $longdaterefarr = array_slice ($daterefarr, min($longstarts));
       $longtimerefarr = array_slice ($timerefarr, min($longstarts));
       
       
       
       
   
foreach ($newlongrefarr as $key => $newlongref) {
       if ($newlongref > $longtp) {
           
           $longwins[] = $key;
       }
      
       if ($newlongref < $longsl) {
           
           $longlosses[] = $key;
       }
       
 }
 
 
     

     if (!$longwins and $longlosses) {
     $slkey = min($longlosses);
         
         echo "Long SL"; 
     echo "\n";
     echo "Long SL ref was: ";
     echo $newlongrefarr[$slkey];
     echo " vs. sl value of: ";
     echo $longsl;
          echo "\n";
          
          echo "SL date and time: ";
          echo $longdaterefarr[$slkey];
     echo " - ";
     echo $longtimerefarr[$slkey];
          echo "\n";
          
          echo "Lost pips: ";
          echo round((($longentry - $longsl) * 10000), 2);
          echo "\n";
     }
     else {
    
         if ($longwins and !$longlosses) {
     $tpkey = min($longwins);
             
             
             echo "Long TP"; 
     echo "\n";
     echo "Long TP ref was: ";
     echo $newlongrefarr[$tpkey];
     echo " vs. tp value of: ";
     echo $longtp;
          echo "\n";
     
          echo "TP date and time: ";
          echo $longdaterefarr[$tpkey];
     echo " - ";
     echo $longtimerefarr[$tpkey];
          echo "\n";
          
          echo "Earned pips: ";
          echo round((($longtp - $longentry) * 10000), 2);
          echo "\n";
          
         } 
     
     else {

         
     
         if ($longwins and $longlosses) {
             
             
             
if (min($longwins) < min($longlosses)) {
    
       $tpkey = min($longwins);
       
       
echo "TP before SL"; 
     echo "\n";
     echo "TP ref was: ";
     echo $newlongrefarr[$tpkey];
     echo " vs. tp value of: ";
     echo $longtp;
     echo "\n";

        echo "TP date and time: ";
          echo $longdaterefarr[$tpkey];
     echo " - ";
     echo $longtimerefarr[$tpkey];
          echo "\n";
          
          echo "Earned pips: ";
          echo round((($longtp - $longentry) * 10000), 2);
          echo "\n";
          
          

} else {
        
    $slkey = min($longlosses);
         
         echo "Long SL"; 
     echo "\n";
     echo "Long SL ref was: ";
     echo $newlongrefarr[$slkey];
     echo " vs. sl value of: ";
     echo $longsl;
          echo "\n";
          
          echo "SL date and time: ";
          echo $longdaterefarr[$slkey];
     echo " - ";
     echo $longtimerefarr[$slkey];
          echo "\n";
          
          echo "Lost pips: ";
          echo round((($longentry - $longsl) * 10000), 2);
          echo "\n";
          
          
    
    
    
}
} 
else {
     
  
echo "No TP or SL";
  
  echo "\n";
 echo "result is: ";
 echo end($newlongrefarr) ;
 echo " - ";
echo $longentry . "= ";
echo round(((end($newlongrefarr) - $longentry) *10000), 2);
          
}
}
     }
}
     
       
       
       
foreach ($shortrefarr as $key => $shortref) {
       
       
       if ($shortref < $shortentry) {
           
       $shortstarts[] = $key; }
}   

if (!$shortstarts){
 echo "Short did not start"; 
 echo "\n";
 echo "min of the given range was: ";
 echo min($shortrefarr);
 echo " vs. short entry value of ";
 echo $shortentry;
   echo "\n";
 
 } 
 else {
 
       $newshortrefarr = array_slice ($shortrefarr, min($shortstarts));
       $shortdaterefarr = array_slice ($daterefarr, min($shortstarts));
       $shorttimerefarr = array_slice ($timerefarr, min($shortstarts));
       
       
       
   
foreach ($newshortrefarr as $key => $newshortref) {
       if ($newshortref < $shorttp) {
           
           $shortwins[] = $key;
       }
      
       if ($newshortref > $shortsl) {
           
           $shortlosses[] = $key;
       }
       
 }
 
     if (!$shortwins and $shortlosses) {
         
       $slkey = min($shortlosses);
             
         
         
         
     echo "Short SL"; 
     echo "\n";
     echo "Short SL ref was: ";
     echo $newshortrefarr[$slkey];
     echo " vs. sl value of: ";
     echo $shortsl;
          echo "\n";
          
 echo "SL date and time: ";
          echo $shortdaterefarr[$slkey];
     echo " - ";
     echo $shorttimerefarr[$slkey];
          echo "\n";
          
          echo "Lost pips: ";
          echo round((($shortsl - $shortentry) * 10000), 2);
          echo "\n";          
          
     }
     else {
    
         if ($shortwins and !$shortlosses) {
     $tpkey = min($shortwins);
             
             echo "Short TP"; 
     echo "\n";
     echo "Short TP ref was: ";
     echo $newshortrefarr[$tpkey];
     echo " vs. tp value of: ";
     echo $shorttp;
          echo "\n";
     
                 echo "TP date and time: ";
          echo $shortdaterefarr[$tpkey];
     echo " - ";
     echo $shorttimerefarr[$tpkey];
          echo "\n";
          
          echo "Earned pips: ";
          echo round((($shortentry - $shorttp) * 10000), 2);
          echo "\n";
          
     
         } 
     
     else {

         
     
         if ($shortwins and $shortlosses) {
             
             
             
if (min($shortwins) < min($shortlosses)) {

    
       $tpkey = min($shortwins);
       
       
echo "TP before SL"; 
     echo "\n";
     echo "TP ref was: ";
     echo $newshortrefarr[$tpkey];
     echo "vs. tp value of: ";
     echo $shorttp;
     echo "\n";

        echo "TP date and time: ";
          echo $shortdaterefarr[$tpkey];
     echo " - ";
     echo $shorttimerefarr[$tpkey];
          echo "\n";
          
          echo "Earned pips: ";
          echo round((($shortentry - $shorttp) * 10000), 2);
          echo "\n";
          
          



} else {
    $slkey = min($shortlosses);
         
         echo "SL before TP"; 
     echo "\n";
     echo "Short SL ref was: ";
     echo $newshortrefarr[$slkey];
     echo " vs. sl value of: ";
     echo $shortsl;
          echo "\n";
          
          echo "SL date and time: ";
          echo $shortdaterefarr[$slkey];
     echo " - ";
     echo $shorttimerefarr[$slkey];
          echo "\n";
          
          echo "Lost pips: ";
          echo round((($shortsl - $shortentry) * 10000), 2);
          echo "\n";
          
    
    
    
    
}
} 
else {
     
  
echo "No TP or SL";
  
 echo "\n";
 echo "result is: ";
 echo end($newshortrefarr) ;
 echo " - ";
echo $shortentry . "= ";
echo round(((end($newshortrefarr) - $shortentry) *10000), 2);
echo "\n";
}

 }

}
     }
 
echo "*************************************************" ;
 

