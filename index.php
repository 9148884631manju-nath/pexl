<?php 
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
$file="data/data.xlsx";
$sheet="Sheet1";
$r = new ExcelReader();


require_once "inc/glob.php";




$d=array(
 array(
  "id"=>"001",
  "name"=>"this product",
  "value"=>"452"
 )
);
$d = file_get_contents("data/myda.json"); 
$d=$r->datatojson($file,$sheet,"withid");

$html = $r->htmlint($d,
[
 ["request","xid","RID","Rid","","",""],
 ["db_ifelse","id","XcID","a2","bg-black","bg-white",""],
 ["check_prd_in_sescart","id","XYID","mycart","Delete Cart","Add Cart",""],
 ["check_prd_in_sescart","id","XYURL","mycart","tocart.php?act=delprd","tocart.php?act=addcount",""],
 ["db_switch","id","XcID",["22","55"],["22","55"],["",""],""],
 ["db","id","XID","did","","",""],
 ["txt","url","Xurl","tocart.php","","",""],
 [
  "dbtxt",
  ["id","name","value"],
  "XData",
  ["XID","XNAM","XVAL"],
  '{
    "productid":"XID",
    "prdname":"XNAM",
    "prdvalue":"XVAL"
   }',
   "",
   ""
 ],
 ["db","name","XNAM","dnam","","",""],
 ["db","value","XVAL","dval","","Rs.","/-"]
],
"temps/row.html");
echo $html;
?>


<!-- Out-of-Band Swap (Updates the Header Counter automatically) -->
<span id="cart-count" hx-swap-oob="true" class="bg-indigo-100 text-indigo-800 text-xs font-bold px-2 py-0.5 rounded-full"></span>
