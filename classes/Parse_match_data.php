<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetTargetURL
 *
 * @author Omer
 */
class ParseMatchData {
    
    // public $target_page = "Set the target web page here";
    public $connection = 'Database connection';
    public $data_URL = array();
    public $oneurl;
    public $column = array();
    public $start_data_field = array();
    public $end_data_field = array();
    public $card_column = array();
    public $card_start_data_field = array();
    public $card_end_data_field = array();
    public $start_club_name = "start club";
    public $end_club_name = "end";
    public $offset;
    public $club_name = "Club name read from title";
    public $data_block = "Data block to be parsed";
    public $data_list = array();
    public $column_value = array();
    
    public $start_URL_block;
    public $end_URL_block = "Set ending delimiter of URL block";
    public $output = "cURL output";
    public $start_URL = 'Set starting delimiter of target URL';
    public $end_URL = 'Set ending delimiter of target URL';
    public $URL_block = "The URL block on the target page";


//    public $connection = "Database connection parameters";
  
 public function __construct() {  }



//Connect
 
   public function ConnecttoDatabase() {

        require_once '../config/config.php';

        $this->connection = mysqli_connect($host, $user, $pass, $db);

        if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();       
        mysqli_set_charset($this->connection, "utf8");
   
                                    }
   }


  public function SelectURLs()
     {
      
           $query = "SELECT DATA_URL "
               . "FROM MACLAR";


 $result = mysqli_query($this->connection, $query); 
  
  if( !$result )
    echo mysqli_error($this->connection);

  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        
       $this->data_URL[] = $row[0];
 
      }
  
 
  }

    public function Iterate_URLs() {
      
    foreach (array_keys($this->data_URL) as $key ){
        
      $this->oneurl = $this->data_URL[$key] ;
      
    /*  
      $this->Read_URL_as_Output();
      $this->SetClubNameDelimiters($this->start_club_name, $this->end_club_name, $this->offset);
      $this->ReadClubName();
    
      $this->ReadArray();
     */
      
    }
    
    }
  
        
      
    
     public function Read_URL_as_Output() {
  
         
         $test_page = 'http://tff.org/Default.aspx?pageID=29&macId=156927';
  //    echo $this->oneurl;

// set url
       $ch = curl_init();
     
       
       
       //curl_setopt($ch, CURLOPT_URL, $this->oneurl);
       curl_setopt($ch, CURLOPT_URL, $test_page);
 //      echo "Starting page: " . $this->oneurl;
 //      echo "<br>";

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        // set the UA
        curl_setopt($ch, CURLOPT_USERAGENT, 'oCrawl Yazar');

        // Alternatively, lie, and pretend to be a browser
        // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');

        // $output contains the output string
        $this->output = curl_exec($ch);
        
        // close curl resource to free up system resources
  
       curl_close($ch);     
 

  
   }
    
       
public function SetDataFields($column, $start_data, $end_data) {
    
      
    
    $this->column[] = $column;
    $this->start_data_field[] = $start_data;
    $this->end_data_field[] = $end_data;

    
}




public function ReadArray() {
    
        
    foreach (array_keys($this->column) as $key ){
        
$start_pos = strpos ($this->output, $this->start_data_field[$key]);


if ($start_pos) {

$end_pos = strpos ($this->output, $this->end_data_field[$key], $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_data_field[$key]));

$raw_text = substr($this->output, $start_pos + strlen($this->start_data_field[$key]), ($string_length));

 $name_section = strstr($raw_text, '">');
 $name = ltrim ($name_section, '">');
 
} 

else $name = '';

 $query_strings[] = '`' .  $this->column[$key] . '`= \'' . $name .'\'';
 
 
 
    }
 
  
    $values_for_query = implode(',', $query_strings);

     
       echo $club_data_query = "UPDATE `MACLAR` "
         . "SET $values_for_query "
         . "WHERE DATA_URL = '$this->oneurl' ";
 
    
   
 if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert data  into the database
 $result = mysqli_query($this->connection, $club_data_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
     
 
}



public function SetCardDataFields($card_column, $card_start_data, $card_end_data) {
    
      
    
    $this->card_column[] = $card_column;
    $this->card_start_data_field[] = $card_start_data;
   $this->card_end_data_field[] = $card_end_data;
    
}




public function ReadCardArray() {
    


    foreach (array_keys($this->card_column) as $key ){
        
 //       echo $this->output;
//Find start-end position and string length
$start_pos = strpos ($this->output, $this->card_start_data_field[$key]);
 


$end_pos = strpos ($this->output, $this->card_end_data_field[$key], $start_pos);
 $string_length = ($end_pos)  - ($start_pos + strlen($this->card_start_data_field[$key]));


 $raw_text = substr($this->output, $start_pos + strlen($this->card_start_data_field[$key]), ($string_length));

if (strpos($raw_text, 'sarikart')) {
 
  $player_name_section = strstr($raw_text, '">');
  
  $trim1 = ltrim ($player_name_section, '">');
  
$namelen = strpos($trim1, '</a>');

  $player_name = substr($trim1, 0, $namelen);
  
   $query_strings[] = '`' .  $this->card_column[$key] . '`= \'' . $player_name .'\'';

     
  
}
 
if (strpos($raw_text, 'kirmizikart')) {
 
  $player_name_section = strstr($raw_text, '">');
  
  $trim1 = ltrim ($player_name_section, '">');
  
$namelen = strpos($trim1, '</a>');

  $player_name = substr($trim1, 0, $namelen);
  

  $query_strings[] = '`' .  $this->card_column[$key] . '`= \'' . $player_name .'\'';
     
 }    
 

if (strpos($raw_text, 'Cikanlar')) {
 
  $player_name_section = strstr($raw_text, '">');
  
  $trim1 = ltrim ($player_name_section, '">');
  
$namelen = strpos($trim1, '</a>');

  $player_name = substr($trim1, 0, $namelen);
  
  $query_strings[] = '`' .  $this->card_column[$key] . '`= \'' . $player_name .'\'';

   
 }    
 
       
       
}
 
$values_for_query = implode(',', $query_strings);

echo$club_data_query = "UPDATE `MACLAR` "
         . "SET $values_for_query "
         . "WHERE DATA_URL = '$this->oneurl' ";

       if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert data  into the database
 $result = mysqli_query($this->connection, $club_data_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
 
 
 

}
    
  




}
