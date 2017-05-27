<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../classes/Parse_URL.php';

$clubdata = new ParseURL;
$clubdata -> ConnecttoDatabase();
$clubdata ->SelectURLs();
$clubdata ->SetClubNameDelimiters('<head id="ctl00_Head"><title>', '</title><link rel="ICON"', 24);

$clubdata ->SetDataBlock('TakimKartiAdi', '<td class="FiksturBaslik">', 0);

$clubdata ->SetDataFields('KULUP_KODU',  'dtKulupBilgisi_Label6">',  '</span>');
$clubdata ->SetDataFields('ADRES',       'dtKulupBilgisi_Label2">',  '</span>');
$clubdata ->SetDataFields('SEHIR',       'dtKulupBilgisi_Label3">',  '</span>');
$clubdata ->SetDataFields('BOLGE',       'dtKulupBilgisi_Label14">', '</span>');
$clubdata ->SetDataFields('TELEFON',     'dtKulupBilgisi_Label4">',  '</span>');
$clubdata ->SetDataFields('FAKS',        'dtKulupBilgisi_Label5">',  '</span>');
$clubdata ->SetDataFields('BASKAN',      'dtKulupBilgisi_Label7">',  '</span>');
$clubdata ->SetDataFields('WEB_SITESI',  'lnkWeb" href="',  '" target=');

$clubdata ->Iterate_URLs();




