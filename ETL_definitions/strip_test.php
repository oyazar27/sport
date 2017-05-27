<?php


include '../classes/Parse_match_data_test.php';

$clubdata = new ParseMatchData;
$clubdata -> ConnecttoDatabase();
$clubdata ->SelectURLs();

   $clubdata ->Iterate_URLs();

$clubdata ->Read_URL_as_Output();



         $clubdata ->SetDataFields('EVSAHIBI_KULUP_ADI', 'dtMacBilgisi_lnkTakim1" href="Default.aspx?pageId=28&amp;kulupId=', '</a>');
               
         $clubdata ->ReadArray();  
/*
                 
         $clubdata ->SetDataFields('MISAFIR_KULUP_ADI', 'dtMacBilgisi_lnkTakim2" href="Default.aspx?pageId=28&amp;kulupId=', '">'); 
         $clubdata ->SetDataFields('MAC_KODU', 'MacBilgiDisplay1_dtMacBilgisi_lblKod">', '</span>');
         $clubdata ->SetDataFields('STAD', 'dtMacBilgisi_lnkStad" href="Default.aspx?pageId=394&amp;stadId=', '">');
         $clubdata ->SetDataFields('TARIH', 'dtMacBilgisi_lblTarih">', '</span>');
         $clubdata ->SetDataFields('HAKEM', 'ctl00_lnkHakem" href="Default.aspx?pageId=72&amp;hakemId=', '">');
         $clubdata ->SetDataFields('YARDIMCI_HAKEM', 'ctl01_lnkHakem" href="Default.aspx?pageId=72&amp;hakemId=', '">');
         $clubdata ->SetDataFields('IKINCI_YARDIMCI_HAKEM', 'ctl02_lnkHakem" href="Default.aspx?pageId=72&amp;hakemId=', '">');
         $clubdata ->SetDataFields('DORDUNCU_HAKEM', 'ctl03_lnkHakem" href="Default.aspx?pageId=72&amp;hakemId=', '">');
         $clubdata ->SetDataFields('GOZLEMCI', 'dtMacBilgisi_goz_ctl00_lnkgoz">', '</span>');
         $clubdata ->SetDataFields('TEMSILCI1', 'dtMacBilgisi_tem_ctl01_lnkTem">', '</span>');
         $clubdata ->SetDataFields('TEMSILCI2', 'dtMacBilgisi_tem_ctl02_lnkTem">', '</span>');
         $clubdata ->SetDataFields('TEMSILCI3', 'dtMacBilgisi_tem_ctl03_lnkTem">', '</span>');
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_1_URL', 'Takim1_rptKadrolar_ctl01_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_2_URL', 'Takim1_rptKadrolar_ctl02_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_3_URL', 'Takim1_rptKadrolar_ctl03_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_4_URL', 'Takim1_rptKadrolar_ctl04_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_5_URL', 'Takim1_rptKadrolar_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_6_URL', 'Takim1_rptKadrolar_ctl06_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_7_URL', 'Takim1_rptKadrolar_ctl07_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_8_URL', 'Takim1_rptKadrolar_ctl08_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_9_URL', 'Takim1_rptKadrolar_ctl09_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_10_URl', 'Takim1_rptKadrolar_ctl10_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_11_URL', 'Takim1_rptKadrolar_ctl11_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_KADRO_1_URL', 'Takim2_rptKadrolar_ctl01_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_2_URL', 'Takim2_rptKadrolar_ctl02_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_3_URL', 'Takim2_rptKadrolar_ctl03_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_4_URL', 'Takim2_rptKadrolar_ctl04_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_5_URL', 'Takim2_rptKadrolar_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_6_URL', 'Takim2_rptKadrolar_ctl06_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_7_URL', 'Takim2_rptKadrolar_ctl07_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_8_URL', 'Takim2_rptKadrolar_ctl08_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_9_URL', 'Takim2_rptKadrolar_ctl09_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_10_URl', 'Takim2_rptKadrolar_ctl10_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_11_URL', 'Takim2_rptKadrolar_ctl11_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_1_URL', 'Takim1_rptYedekler_ctl01_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_2_URL', 'Takim1_rptYedekler_ctl02_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_3_URL', 'Takim1_rptYedekler_ctl03_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_4_URL', 'Takim1_rptYedekler_ctl04_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_5_URL', 'Takim1_rptYedekler_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_6_URL', 'Takim1_rptYedekler_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_7_URL', 'Takim1_rptYedekler_ctl07_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_1_URL', 'Takim2_rptYedekler_ctl01_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_2_URL', 'Takim2_rptYedekler_ctl02_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_3_URL', 'Takim2_rptYedekler_ctl03_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_4_URL', 'Takim2_rptYedekler_ctl04_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_5_URL', 'Takim2_rptYedekler_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_6_URL', 'Takim2_rptYedekler_ctl05_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_7_URL', 'Takim2_rptYedekler_ctl07_lnkOyuncu" href="Default.aspx?pageId=30&amp;kisiId=', '">');
         $clubdata ->SetDataFields('EVSAHIBI_TEKNIK_DIREKTOR_URL', 'grdTakim1_rptTeknikKadro_ctl01_lnkTeknikSorumlu" href="Default.aspx?pageId=219&amp;antId=', '">');
         $clubdata ->SetDataFields('MISAFIR_TEKNIK_DIREKTOR_URL', 'grdTakim2_rptTeknikKadro_ctl01_lnkTeknikSorumlu" href="Default.aspx?pageId=219&amp;antId=', '">');
         $clubdata ->SetDataFields('MISAFIR_GOL_1_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_2_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_3_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_4_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_5_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_6_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GOL_7_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_1_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_2_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_3_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_4_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_5_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_6_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_7_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_1_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_2_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_3_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_4_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_5_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_6_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_KART_7_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_1_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_2_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_3_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_4_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_5_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_6_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_KART_7_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_CIKAN_1_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_CIKAN_2_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_CIKAN_3_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GIREN_4_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GIREN_5_URL', '', '');
         $clubdata ->SetDataFields('MISAFIR_GIREN_6_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_CIKAN_1_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_CIKAN_2_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_CIKAN_3_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GIREN_4_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GIREN_5_URL', '', '');
         $clubdata ->SetDataFields('EVSAHIBI_GIREN_6_URL', '', '');

 
 
 */