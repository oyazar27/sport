<?php


include '../classes/Extract_match_URL.php';

$teamURL = new GetTargetURL();
$teamURL -> SetWebsite('http://localhost/data/week1.html');
$teamURL ->ReadURLasOutput();
$teamURL ->SetURLBlockStartDelimiter('GridHeader_TFF_Contents');
$teamURL ->SetURLBlockEndDelimiter('GridHeader_TFF_Contents');
$teamURL ->ConnecttoDatabase();
$teamURL ->ReadURLBlock();
$teamURL ->SetTargetURLStartDelimiter('_detay" href="');
$teamURL ->SetTargetURLEndDelimiter('">');
$teamURL ->ReadTargetURLs();

