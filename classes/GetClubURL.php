<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetCategoryURL
 *
 * @author Omer
 */
class GetCategoryURL {
    
    public $home_page = "Set the website here";
    public $connection = 'Database connection';
    public $start_category_section = "Set starting delimiter of category section";
    public $end_category_section = "Set ending delimiter of category section";
    public $output = "cURL output";
    public $start_category_URL = 'Set starting delimiter of category URL';
    public $end_category_URL = 'Set ending delimiter of category URL';
    public $category_section = "The category block on the homepage";
//    public $connection = "Database connection parameters";
  public function __construct() {

      }
   public function SetWebsite($new_home_page)
  {
      $this->home_page = $new_home_page;
  }

  public function Read_URL_as_Output() {
       $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->home_page);

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

   public function SetCategoryStartDelimiter($start_category_section)
  {
      $this->start_category_section = $start_category_section;
   }
  
  public function SetCategoryEndDelimiter($end_category_section)
  {
      $this->end_category_section = $end_category_section;
  }
  
  public function Connect_to_Database() {
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
   
      public function Read_Category_Section() {

//Find start-end position and string length
$start_pos = strpos ($this->output, $this->start_category_section);
$end_pos = strpos ($this->output, $this->end_category_section, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_category_section));


//Copy Category section to a variable
$this->category_section = substr($this->output, $start_pos + strlen($this->start_category_section), ($string_length));

}

 public function SetCategoryURLStartDelimiter($start_category_URL)
  {
      $this->start_category_URL = $start_category_URL;
   }
  
  public function SetCategoryURLEndDelimiter($end_category_URL)
  {
      $this->end_category_URL = $end_category_URL;
   }
  
     public function Read_Category_URLs() {
         


         $offset = 0; // initial offset is 0

while($offset = strpos($this->category_section, $this->start_category_URL, $offset + 1)){
 
    //Find links
 $start_pos = strpos ($this->category_section, $this->start_category_URL, $offset);
$end_pos = strpos ($this->category_section, $this->end_category_URL, $start_pos);
$string_length = ($end_pos) - ($start_pos + strlen($this->start_category_URL));
$links[] = (substr($this->category_section, $start_pos + strlen($this->start_category_URL), ($string_length)));    

}

//Prepare links for query 
 $links_for_query = "('" . implode("', '$this->home_page'),('", $links) 
        . "', '" . $this->home_page . "')";

//Prepare the query 
  $test_query = "INSERT INTO URL_TEMP "
         . "(BASEURL, "
         . "REFRURL) "
         . "VALUES " 
        . "$links_for_query";

 if( !mysqli_ping($this->connection) ) 
     $this->connection = mysql_connect($host, $user, $pass, $db, true);

      
//Insert categories into the temporary database
 $result = mysqli_query($this->connection, $test_query); 
  
  if( !$result )
    echo mysqli_error($this->connection);
  
  $query1 = "SELECT "
          . "URL_TEMP.BASEURL, "
          . "URL_TEMP.REFRURL, "
          . "URL_TEMP.URLPRSFL, "
         . "URL_TEMP.PDTPRSFL "
          . "FROM URL_TEMP LEFT OUTER JOIN URL "
         . "ON "
          . "URL_TEMP.BASEURL = URL.BASEURL "
          . "where "
          . "URL.BASEURL is NULL";

  $result1 = mysqli_query($this->connection, $query1);

  if (mysqli_affected_rows($this->connection) == 0) {
      echo "No new categories found";
  } else {

      $nbr_new_categories = mysqli_affected_rows($this->connection);
        
      echo $nbr_new_categories  . " new categories found: <br>";
    /* fetch object array */
while ($row = mysqli_fetch_assoc($result1)) {


 $query2 = "INSERT INTO URL "
         . "(MRCHTNAM, "
         . "BASEURL, "
         . "REFRURL, "
         . "URLPRSFL, "
          . "PDTPRSFL) "
         . "VALUES "
         . "('$this->home_page', "
         . "'$row[BASEURL]', "
         . "'$row[REFRURL]',"
         . "'$row[URLPRSFL]', "
         . "'$row[PDTPRSFL]')";


$result2 = mysqli_query($this->connection, $query2) or die ("Error in query: "
        . "$query2. ".mysql_error());

echo $row['BASEURL'] . "<br>";       
  }
  


}
$query3 = "TRUNCATE URL_TEMP";

$result3 = mysqli_query($this->connection, $query3) or die ("Error in query: "
        . "$query3. ".mysql_error());
  mysqli_close($this->connection);
}

}

