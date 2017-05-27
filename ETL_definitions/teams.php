<?php


include '../classes/Extract_URL.php';

$teamURL = new GetTargetURL();
$teamURL -> SetWebsite('http://localhost/data/clubs.html');
$teamURL ->ReadURLasOutput();
$teamURL ->SetURLBlockStartDelimiter('GridHeader_TFF_Contents');
$teamURL ->SetURLBlockEndDelimiter('GridHeader_TFF_Contents');
$teamURL ->ConnecttoDatabase();
$teamURL ->ReadURLBlock();
$teamURL ->SetTargetURLStartDelimiter('lnkKulup" href="');
$teamURL ->SetTargetURLEndDelimiter('">');
$teamURL ->ReadTargetURLs();

