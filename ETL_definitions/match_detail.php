<?php


include '../classes/Parse_match_data.php';

$clubdata = new ParseMatchData;
$clubdata -> ConnecttoDatabase();
$clubdata ->SelectURLs();

   $clubdata ->Iterate_URLs();

$clubdata ->Read_URL_as_Output();


         $clubdata ->SetDataFields('EVSAHIBI_KULUP_ADI', 'dtMacBilgisi_lnkTakim1', '</a>');
                 

                 
         $clubdata ->SetDataFields('MISAFIR_KULUP_ADI', 'dtMacBilgisi_lnkTakim2', '</a>'); 
         $clubdata ->SetDataFields('MAC_KODU', 'MacBilgiDisplay1_dtMacBilgisi_lblKod', '</span>');
         $clubdata ->SetDataFields('STAD', 'dtMacBilgisi_lnkStad', '</a>');
         $clubdata ->SetDataFields('TARIH', 'dtMacBilgisi_lblTarih', '</span>');
         $clubdata ->SetDataFields('HAKEM', 'ctl00_lnkHakem', '</a>');
         $clubdata ->SetDataFields('YARDIMCI_HAKEM', 'ctl01_lnkHakem', '</a>');
         $clubdata ->SetDataFields('IKINCI_YARDIMCI_HAKEM', 'ctl02_lnkHakem', '</a>');
         $clubdata ->SetDataFields('DORDUNCU_HAKEM', 'ctl03_lnkHakem', '</a>');
         $clubdata ->SetDataFields('GOZLEMCI', 'dtMacBilgisi_goz_ctl00_lnkgoz', '</span>');
         $clubdata ->SetDataFields('TEMSILCI1', 'dtMacBilgisi_tem_ctl01_lnkTem', '</span>');
         $clubdata ->SetDataFields('TEMSILCI2', 'dtMacBilgisi_tem_ctl02_lnkTem', '</span>');
         $clubdata ->SetDataFields('TEMSILCI3', 'dtMacBilgisi_tem_ctl03_lnkTem', '</span>');
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_1_URL', 'Takim1_rptKadrolar_ctl01_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_2_URL', 'Takim1_rptKadrolar_ctl02_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_3_URL', 'Takim1_rptKadrolar_ctl03_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_4_URL', 'Takim1_rptKadrolar_ctl04_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_5_URL', 'Takim1_rptKadrolar_ctl05_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_6_URL', 'Takim1_rptKadrolar_ctl06_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_7_URL', 'Takim1_rptKadrolar_ctl07_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_8_URL', 'Takim1_rptKadrolar_ctl08_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_9_URL', 'Takim1_rptKadrolar_ctl09_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_10_URL', 'Takim1_rptKadrolar_ctl10_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('EVSAHIBI_KADRO_11_URL', 'Takim1_rptKadrolar_ctl11_lnkOyuncu', '</a>'); 
         
         
         $clubdata ->SetDataFields('MISAFIR_KADRO_1_URL', 'Takim2_rptKadrolar_ctl01_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_2_URL', 'Takim2_rptKadrolar_ctl02_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_3_URL', 'Takim2_rptKadrolar_ctl03_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_4_URL', 'Takim2_rptKadrolar_ctl04_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_5_URL', 'Takim2_rptKadrolar_ctl05_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_6_URL', 'Takim2_rptKadrolar_ctl06_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_7_URL', 'Takim2_rptKadrolar_ctl07_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_8_URL', 'Takim2_rptKadrolar_ctl08_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_9_URL', 'Takim2_rptKadrolar_ctl09_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_10_URL', 'Takim2_rptKadrolar_ctl10_lnkOyuncu', '</a>'); 
         $clubdata ->SetDataFields('MISAFIR_KADRO_11_URL', 'Takim2_rptKadrolar_ctl11_lnkOyuncu', '</a>'); 
         
         
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_1_URL', 'Takim1_rptYedekler_ctl01_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_2_URL', 'Takim1_rptYedekler_ctl02_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_3_URL', 'Takim1_rptYedekler_ctl03_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_4_URL', 'Takim1_rptYedekler_ctl04_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_5_URL', 'Takim1_rptYedekler_ctl05_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_6_URL', 'Takim1_rptYedekler_ctl05_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_YEDEK_7_URL', 'Takim1_rptYedekler_ctl07_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_1_URL', 'Takim2_rptYedekler_ctl01_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_2_URL', 'Takim2_rptYedekler_ctl02_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_3_URL', 'Takim2_rptYedekler_ctl03_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_4_URL', 'Takim2_rptYedekler_ctl04_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_5_URL', 'Takim2_rptYedekler_ctl05_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_6_URL', 'Takim2_rptYedekler_ctl05_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_YEDEK_7_URL', 'Takim2_rptYedekler_ctl07_lnkOyuncu', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_TEKNIK_DIREKTOR_URL', 'grdTakim1_rptTeknikKadro_ctl01_lnkTeknikSorumlu', '</a>');
         $clubdata ->SetDataFields('MISAFIR_TEKNIK_DIREKTOR_URL', 'grdTakim2_rptTeknikKadro_ctl01_lnkTeknikSorumlu', '</a>');
  
 
        
         $clubdata ->SetDataFields('EVSAHIBI_GOL_1_URL', 'grdTakim1_rptGoller_ctl01_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_2_URL', 'grdTakim1_rptGoller_ctl02_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_3_URL', 'grdTakim1_rptGoller_ctl03_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_4_URL', 'grdTakim1_rptGoller_ctl04_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_5_URL', 'grdTakim1_rptGoller_ctl05_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_6_URL', 'grdTakim1_rptGoller_ctl06_lblGol', '</a>');
         $clubdata ->SetDataFields('EVSAHIBI_GOL_7_URL', 'grdTakim1_rptGoller_ctl07_lblGol', '</a>');
         
         $clubdata ->SetDataFields('MISAFIR_GOL_1_URL', 'grdTakim2_rptGoller_ctl01_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_2_URL', 'grdTakim2_rptGoller_ctl02_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_3_URL', 'grdTakim2_rptGoller_ctl03_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_4_URL', 'grdTakim2_rptGoller_ctl04_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_5_URL', 'grdTakim2_rptGoller_ctl05_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_6_URL', 'grdTakim2_rptGoller_ctl06_lblGol', '</a>');
         $clubdata ->SetDataFields('MISAFIR_GOL_7_URL', 'grdTakim2_rptGoller_ctl07_lblGol', '</a>');
         
  
        
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_1', 'grdTakim1_rptKartlar_ctl01_k', '</span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_2', 'grdTakim1_rptKartlar_ctl02_k', '</span>');
 
 

         $clubdata ->SetCardDataFields('EVSAHIBI_KART_3', 'grdTakim1_rptKartlar_ctl03_k', '</span>');
 
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_4', 'grdTakim1_rptKartlar_ctl04_k', '</span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_5', 'grdTakim1_rptKartlar_ctl05_k', '</span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_6', 'grdTakim1_rptKartlar_ctl06_k', '</span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_KART_7', 'grdTakim1_rptKartlar_ctl07_k', '</span>');
         
         $clubdata ->SetCardDataFields('MISAFIR_KART_1', 'grdTakim2_rptKartlar_ctl01_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_2', 'grdTakim2_rptKartlar_ctl02_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_3', 'grdTakim2_rptKartlar_ctl03_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_4', 'grdTakim2_rptKartlar_ctl04_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_5', 'grdTakim2_rptKartlar_ctl05_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_6', 'grdTakim2_rptKartlar_ctl06_k', '</span>');
         $clubdata ->SetCardDataFields('MISAFIR_KART_7', 'grdTakim2_rptKartlar_ctl07_k', '</span>');
         
         
         $clubdata ->SetCardDataFields('EVSAHIBI_CIKAN_1', 'grdTakim1_rptCikanlar_ctl01_lblCikan', '/span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_CIKAN_2', 'grdTakim1_rptCikanlar_ctl02_lblCikan', '/span>');
         $clubdata ->SetCardDataFields('EVSAHIBI_CIKAN_3', 'grdTakim1_rptCikanlar_ctl03_lblCikan', '/span>');
         
         
         $clubdata ->SetCardDataFields('MISAFIR_CIKAN_1', 'grdTakim2_rptCikanlar_ctl01_lblCikan', '/span>');
         $clubdata ->SetCardDataFields('MISAFIR_CIKAN_2', 'grdTakim2_rptCikanlar_ctl02_lblCikan', '/span>');
         $clubdata ->SetCardDataFields('MISAFIR_CIKAN_3', 'grdTakim2_rptCikanlar_ctl03_lblCikan', '/span>');
         
         
         
       
 $clubdata ->ReadArray();
 
 
  $clubdata ->ReadCardArray();
 