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
class ParseURL {
    
    // public $target_page = "Set the target web page here";
    public $connection = 'Database connection';
    public $data_URL = array();
    public $oneurl;
    public $column = array();
    public $start_data_field = array();
    public $end_data_field = array();
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
               . "FROM superlig_takimlar";


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
      //echo $this->oneurl;
      
      $this->Read_URL_as_Output();
      $this->SetClubNameDelimiters($this->start_club_name, $this->end_club_name, $this->offset);
      $this->ReadClubName();
      $this->ReadDataBlock();
      $this->ReadArray();
     
      
    }
    
    }
  
        
      
    
     public function Read_URL_as_Output() {
      
      //echo $this->oneurl;

// set url
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $this->oneurl);
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
    
       
   
   public function SetClubNameDelimiters($start_club_name, $end_club_name, $offset) {
       
       $this->start_club_name = $start_club_name;
       $this->end_club_name = $end_club_name;
       $this->offset = $offset;
       
       
       
   }
    public function ReadClubName() {


   
//Find start-end position and string length
$start_pos = strpos ($this->output, $this->start_club_name);
$end_pos = strpos ($this->output, $this->end_club_name, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_club_name)) - $this->offset;


//Copy Category section to a variable
 $this->club_name = substr($this->output, $start_pos + strlen($this->start_club_name), ($string_length));

  $club_name_query = "UPDATE `superlig_takimlar` "
         . "SET `KULUP_ADI` = "
         . " '$this->club_name' "
         . "WHERE DATA_URL = '$this->oneurl' ";
       

 if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert categories into the temporary database
 $result = mysqli_query($this->connection, $club_name_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
     }
  
   
   
  
  public function SetDataBlock($start_data_block, $end_data_block, $offset) {

      
      $this->start_data_block = $start_data_block;
      $this->end_data_block = $end_data_block;
     
      
  }
   
      public function ReadDataBlock() {

//Find start-end position and string length
$start_pos = strpos ($this->output, $this->start_data_block);
$end_pos = strpos ($this->output, $this->end_data_block, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_data_block));


//Copy data block to a variable
$this->URL_block = substr($this->output, $start_pos + strlen($this->start_data_block), ($string_length));

}

public function SetDataFields($column, $start_data, $end_data) {
    
      
    
    $this->column[] = $column;
    $this->start_data_field[] = $start_data;
    $this->end_data_field[] = $end_data;

    
}





public function ReadArray() {
    
        
    foreach (array_keys($this->column) as $key ){
        
 //       echo $this->URL_block;
//Find start-end position and string length
$start_pos = strpos ($this->URL_block, $this->start_data_field[$key]);
$end_pos = strpos ($this->URL_block, $this->end_data_field[$key], $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_data_field[$key]));


//Copy column value to an array
 $this->column_value[] = substr($this->URL_block, $start_pos + strlen($this->start_data_field[$key]), ($string_length));
   
  $query_strings[] = '`' .  $this->column[$key] . '`= \'' . substr($this->URL_block, $start_pos + strlen($this->start_data_field[$key]), 
         ($string_length)) .'\'';
   
 
 
 
    }
 
  
    $values_for_query = implode(',', $query_strings);

     
     
      $club_data_query = "UPDATE `superlig_takimlar` "
         . "SET $values_for_query "
         . "WHERE DATA_URL = '$this->oneurl' ";
 
    
    
 if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert data  into the database
 $result = mysqli_query($this->connection, $club_data_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
     }
     

    









 public function SetTargetURLStartDelimiter($start_target_URL)
  {
      $this->start_target_URL = $start_target_URL;
   }
  
  public function SetTargetURLEndDelimiter($end_target_URL)
  {
      $this->end_target_URL = $end_target_URL;
   }
  
     public function ReadTargetURLs() {
         


         $offset = 0; // initial offset is 0
$this->URL_block;
while($offset = strpos($this->URL_block, $this->start_target_URL, $offset + 1)){
 
    //Find links
 $start_pos = strpos ($this->URL_block, $this->start_target_URL, $offset);
$end_pos = strpos ($this->URL_block, $this->end_target_URL, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_target_URL));
$raw_URL = (substr($this->URL_block, $start_pos + strlen($this->start_target_URL), ($string_length)));  


//Correct issue with ampersand - move this into an independent function later
$links[] =   str_replace('&amp;','&',$raw_URL) ;



}

//Prepare links for query 
 $links_for_query = "('" . implode("', '$this->target_page'),('", $links) 
        . "', '" . $this->target_page . "')";

//Prepare the query 
  $URL_query = "INSERT INTO superlig_takimlar "
         . "(DATA_URL, "
         . "SOURCE_URL) "
         . "VALUES " 
        . "$links_for_query";

 if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert categories into the temporary database
 $result = mysqli_query($this->connection, $URL_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
     }
     
}
