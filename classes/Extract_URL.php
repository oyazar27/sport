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
class GetTargetURL {
    
    public $target_page = "Set the target web page here";
    public $connection = 'Database connection';
    public $start_URL_block = "Set starting delimiter of URL block";
    public $end_URL_block = "Set ending delimiter of URL block";
    public $output = "cURL output";
    public $start_URL = 'Set starting delimiter of target URL';
    public $end_URL = 'Set ending delimiter of target URL';
    public $URL_block = "The URL block on the target page";
//    public $connection = "Database connection parameters";
  public function __construct() {

      }
   public function SetWebsite($new_target_page)
  {
      $this->target_page = $new_target_page;
  }

  public function ReadURLasOutput() {
       $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->target_page);

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

   public function SetURLBlockStartDelimiter($start_URL_block)
  {
      $this->start_URL_block = $start_URL_block;
   }
  
   public function SetURLBlockEndDelimiter($end_URL_block)
  {
      $this->end_URL_block = $end_URL_block;
   }
  
  
  public function ConnecttoDatabase() {
//Connect to database
        require_once '../config/config.php';
//Connect to mysql server
$this->connection = mysqli_connect($host, $user, $pass, $db);

// check connection 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();       
       
   }
   
   /* change character set to utf8 */
mysqli_set_charset($this->connection, "utf8");
   
}
   
      public function ReadURLBlock() {

//Find start-end position and string length
$start_pos = strpos ($this->output, $this->start_URL_block);
$end_pos = strpos ($this->output, $this->end_URL_block, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_URL_block));


//Copy Category section to a variable
$this->URL_block = substr($this->output, $start_pos + strlen($this->start_URL_block), ($string_length));

//echo 'here';
//print_r($this->URL_block);
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
