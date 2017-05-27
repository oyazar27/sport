<?php


$env = gethostname();

if ($env != 'Lenovo-PC') {

include 'webconfig.php';
//echo 'web <br>';
} else {

include 'localconfig.php';
//echo 'local <br>';
//echo "hostname: $env"; 

}



