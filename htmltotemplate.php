<?php
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();
$totheme = $r->htmltotheme("temps/headerwithpara.html");
echo $totheme;


?>