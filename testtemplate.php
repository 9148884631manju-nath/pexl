<?php
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
require_once "inc/glob.php";
$r = new ExcelReader();


#JSON Data
$data='[{"PXA":"NEXT-GEN WORKFLOW ENGINE","PXB":"Supercharge Your Workflow With","PXC":"Orange Precision","PXD":"Empower your organization with seamless real-time analytics, automated data pipelines, and intelligent collaboration tools designed for high-performing modern teams.","PXE":"More Info","PXF":"Watch Demo","PXG":"+12k","PXH":"4.9/5","PXI":"rating from 2,000+ teams","PXJ":"Growth","PXK":"+148.5%","PXL":"Bank-Grade Security","PXM":"256-Bit SSL Encrypted"}]';

#Decode JSON Data
$data=json_decode($data);

#JSON Data to HTML Template
$html=$r->htmlint(
$data,
[
["db","PXA","XA","Title 1","","",""],
["db","PXB","XB","Title 2","","",""],
["db","PXC","XC","Title 3","","",""],
["db","PXD","XD","Title 4","","",""],
["db","PXE","XE","Title 5","","",""],
["db","PXF","XF","Title 6","","",""],
["db","PXG","XG","Title 7","","",""],
["db","PXH","XH","Title 8","","",""],
["db","PXI","XI","Title 9","","",""],
["db","PXJ","XJ","Title 10","","",""],
["db","PXK","XK","Title 11","","",""],
["db","PXL","XL","Title 12","","",""],
["db","PXM","XM","Title 13","","",""],
],
"temps/headerwithpara.html"
);

#Print HTML Data
echo $html;
?>