<?php 
  #JSON Data 
 $data='[{"PXA":"asdfasdf Side","PXB":"Back Side"}]'; 

 #Decode JSON Data 
 $data=json_decode($data); 

 #JSON Data to HTML Template 
 $html=$r->htmlint( 
 $data, 
 [
["db","PXA","XA","Title 1","","",""],
["db","PXB","XB","Title 2","","",""],
], 
 "templates/twobuttons.html" 
 ); 

 #Print HTML Data 
 echo $html; 
 ?>