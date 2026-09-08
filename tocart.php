<?php

require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
$r = new ExcelReader();


$act=isset($_REQUEST['act']) ? $_REQUEST['act'] : "";
if($act){
echo $r->cartx("mycart",$act,"xviewarray","productid",[
  ["post","prdname","","","",""],
  ["post","prdvalue","","","",""],
  ["post","items","1","","",""],
  ["post_calc","totalvalue","items","prdvalue","","multiply"],
  ["post_calc","gst","totalvalue","12","","percent"],
  ["post_calc","grandtotal","totalvalue","gst","","add"]
]);
echo "Total Products: ".$r->cartx("mycart","count","","","")."<br/>";
echo "Total Amount: ".$r->cartx("mycart","totalamount","","","totalvalue")."<br/>";
echo "Total GST: ".$r->cartx("mycart","totalamount","","","gst")."<br/>";
echo "Total grandtotal: ".$r->cartx("mycart","totalamount","","","grandtotal")."<br/>";
}else{}

?>