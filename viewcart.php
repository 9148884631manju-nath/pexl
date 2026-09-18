<?php


require_once "inc/glob.php";
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
$r = new ExcelReader();

$mycart = json_decode(json_encode($_SESSION["mycart"]));

$html = $r->htmlint($mycart,[
 ["db","prdname","XNAM","","","",""],
 ["txt","jam","XYID","super","","",""],
 ["db","prdvalue","XVAL","","","",""],
 ["db","items","XID","","","",""]
],"temps/row.html");
echo $html;

echo "Total Products: ".$r->cartx("mycart","count","","","")."<hr/>";
echo "Total Amount: ".$r->cartx("mycart","totalamount","","","totalvalue")."<hr/>";
echo "Total GST: ".$r->cartx("mycart","totalamount","","","gst")."<hr/>";
echo "Total grandtotal: ".$r->cartx("mycart","totalamount","","","grandtotal")."<hr/>";
?>