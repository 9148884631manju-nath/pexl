<?php

require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
$file="data/data.xlsx";
$sheet="Sheet1";
$r = new ExcelReader();


require_once "inc/glob.php";
$theme = (isset($_REQUEST['theme'])) ? $_REQUEST['theme'] : "";
if(file_exists($theme)){
require_once $theme; 
}else{
 echo "Invalid Theme";
}
?>