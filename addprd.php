<?php
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();

$ary=array(array());
$mycart = json_decode(json_encode($ary));



$form=$r->formmodule("prdmodule.json",["name","price","image"],$mycart);
$html = $r->htmlint($mycart,[
 ["txt","prdname","XA",$form,"","",""],
 ["txt","prdnamec","XB","Save Product","","",""]
],"temps/form.html");
echo $html;



?>