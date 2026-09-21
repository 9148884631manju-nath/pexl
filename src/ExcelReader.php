<?php
namespace Phpxl\Pexl;
session_start();

use OpenSpout\Reader\XLSX\Reader;

/**
 * Class Pexl project
 *
 * Developing Web Applications using MS Excell worksheets as Database 
 *
 * @category  WEBAPP
 * @package   Phpxl\Pexl
 * @author    Manjunath K <manju9343945143@gmail.com>
 * @copyright 2026 Manjunath / coding-infi
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      http://coding-infi.in
 */

class ExcelReader{
 public function __construct(){

 }
 public function streamFile(string $filepath){
  $reader = new Reader();
  $reader->open($filepath);
  return  $reader->getSheetIterator();
 }
 public function getsheets(string $file){
   $rf = $this->streamFile($file);
   $ar = array();
   foreach($rf as $k){
    $ar[] = $k->getName();
   }
   return $ar;
 }
 public function checksheet(string $file,string $sheet){
  $ar = $this->getsheets($file);
  $res="";
  for($i=0;$i<count($ar);$i+=1)
   {
    if($ar[$i]==$sheet){
     $res=$i;
    }
   }
  return $res;
 }
 public function getdata(string $file,string $sheet){ 
   $reader = $this->streamFile($file);$cells=array();
   foreach ($reader as $xsheet) {
    $sheetName = $xsheet->getName();
    if($sheetName==$sheet){
      foreach ($xsheet->getRowIterator() as $row) {
         $cells[] = $row->toArray();
     }
    }
   }
   return $cells;
   $reader->close();
 }
 public function datatoarraystring(string $file, string $sheet){
  $data = $this->getdata($file,$sheet);
  $nar=array();
  for($i=1;$i<count($data);$i+=1){
    foreach($data[$i] as $kk=>$vv){
      $nar[$data[$i][0]][$data[0][$kk]] =$vv;
    }
  }
  return $nar;
 }
 public function datatoarraynum(string $file, string $sheet){
  $data = $this->getdata($file,$sheet);
  $nar=array();$str=array();
  for($i=1;$i<count($data);$i+=1){
    foreach($data[$i] as $kk=>$vv){
      $str[$data[0][$kk]] =$vv;
    }
    $nar[]=$str;
  }
  return $nar;
 }
 public function datatojson(string $file, string $sheet, string $type){
  
  switch($type){
   case "withid":
    $d = $this->datatoarraystring($file,$sheet);
    break;
   default:
    $d = $this->datatoarraynum($file,$sheet);
   break;
  }
  return json_decode(json_encode($d));
 }

 public function strep($t,$p,$v,$d,$e,$pr,$su,$thm){
    $res="";
     $p = ($p=="") ? $d : $p;
     $p=$p;
     switch($t){
      default:
       $mv=$p;
      break;
     }
     
     $res = str_replace($v,$mv,$thm);
    return $res;
 }

 public function filterdata($v,$tv,$pv,$dv,$ev,$px,$sx){
  $res="";
  switch($tv){
   case "txt":
      $res=$px.$dv.$sx;
      break;
   case "dbtxt":
      $res=$px.$ev.$sx;
      $nv=array();
      for($i=0;$i<count($pv);$i+=1)
        {
          $ppv=$pv[$i];
          $nv[]=$v->$ppv;
        }
      $res = str_replace($dv,$nv,$res);
      break;
   case "db":
    if(isset($v->$pv)){
       $res=$v->$pv;
     }else{
      $res=$dv;
     }
     $res=$px.$res.$sx; 
   break;
  case "check_prd_in_sescart":
    if(isset($v->$pv)){
      $id = $v->$pv;
    }else{
      $id="null";
    } 
    if($id=="null"){
      $res=$px;
    }else{
     
      if(isset($_SESSION[$dv][$id])){
        $res=$ev;
      }
      else{         
        $res=$px;
      }
    }
  break;
   case "db_ifelse":
    if(isset($v->$pv)){
       $dd=$v->$pv;
     }else{
      $dd=$dv;
     }
    if($dd==$dv){$res=$ev;}else{$res=$px;}
    
   break;
   case "request":
    if(isset($_REQUEST[$pv])){
       $res=$_REQUEST[$pv];
     }else{
      $res=$dv;
     }
     $res=$px.$res.$sx;
   break;
   case "get":
    if(isset($_REQUEST[$pv])){
       $res=$_REQUEST[$pv];
     }else{
      $res=$dv;
     }
     $res=$px.$res.$sx;
   break;
   case "post":
    if(isset($_REQUEST[$pv])){
       $res=$_REQUEST[$pv];
     }else{
      $res=$dv;
     }
     $res=$px.$res.$sx;
   break;
   default:
    //$res=$px.$dv.$sx;
   break;
  }
  return $res;
 }

 public function gettextfromhtml($thm){
  $html = file_get_contents($thm);
  preg_match_all('/>([^<]+)</', $html, $matches);  
  $resultArray = array_values(array_filter(array_map('trim', $matches[1])));
  return $resultArray;
 }

 public function htmltotheme($thm){
  $res="";
  if(file_exists($thm))
    {
      $oldfile=file_get_contents($thm);
      //echo $oldfile;
      $hml = $this->gettextfromhtml($thm);
      //var_dump($hml);
      $newatr = ["XA","XB","XC","XD","XE","XF","XG","XH","XI","XJ","XK","XL","XM","XN","XO","XP","XQ","XR","XS","XT"];
      $defval = ["Title 1","Title 2","Title 3","Title 4","Title 5","Title 6","Title 7","Title 8","Title 9","Title 10","Title 11","Title 12","Title 13","Title 14","Title 15","Title 16","Title 17","Title 18","Title 19","Title 20"];
      $newfile = str_replace($hml,$newatr,$oldfile);
      if(file_put_contents($thm,$newfile))
        {
          $dar="";$dat="";
          for($i=0;$i<count($hml);$i+=1)
            {
              $dat.='"P'.$newatr[$i].'":"'.$hml[$i].'",';
              $dar.="\t". '["db","P'.$newatr[$i].'","'.$newatr[$i].'","'.$defval[$i].'","","",""],' . "\n";
            }
          $res = " /* JSON Data */ \n \$data='[{".substr($dat,0,-1)."}]'; \n\n /* Decode JSON Data */ \n \$data=json_decode(\$data); \n\n /* JSON Data to HTML Template */ \n \$html=\$r->htmlint( \n \$data, \n [\n".$dar." ], \n \"".$thm."\" \n ); \n\n /* Print HTML Data */ \n echo \$html;";

        }
        else{
          $res= file_put_contents($thm,$newfile);
        }
    }
    else{
      $res=" File Not Found: ".$thm;
    }
    return $res;
 }

 public function htmlint($data, array $keys, string $theme){
  $res="";
  $type=array();
  $post=array();
  $vars=array();
  $defs=array();
  $extr=array();
  $pref=array();
  $suff=array();
  for($i=0;$i<count($keys);$i+=1){
    $type[]=$keys[$i][0];
    $post[]=$keys[$i][1];
    $vars[]=$keys[$i][2];
    $defs[]=$keys[$i][3];
    $extr[]=$keys[$i][4];
    $pref[]=$keys[$i][5];
    $suff[]=$keys[$i][6];
  }
  $nv=array();
  $j=0;
  $thm=file_get_contents($theme);
  if(is_string($data)){$data=json_decode($data);}
  foreach($data as $k=>$v){
    for($i=0;$i<count($post);$i+=1)
     {
       $tv=$type[$i];    
       $pv=$post[$i];
       $dv=$defs[$i];
       $ev=$extr[$i];
       $px=$pref[$i];
       $sx=$suff[$i];
       $fld = $this->filterdata($v,$tv,$pv,$dv,$ev,$px,$sx);
        $nv[$j][$i]= $fld;
     }
     $res.=str_replace($vars,$nv[$j],$thm);
    $j+=1;
  }
  return $res;
 }

 public function cartx($cart,$type,$raw,$cid,$data){
 $res="";
 $data=isset($data)?$data:array();
 $cid=isset($cid)?$cid:"";
 $mycart = isset($_SESSION[$cart]) ? $_SESSION[$cart] : $_SESSION[$cart]=array();
 switch($raw){
  case "viewarray":
    echo "Sessions<br/>";
    var_dump($_SESSION);
    echo "<hr/>Requests<br/>";
    var_dump($_REQUEST);
    echo "<hr/>Posts<br/>";
    var_dump($_POST);
    echo "<hr/>";
   break;
  default:
  break;
  
 }
 switch($type)
  {
  case "totalamount":
    $res=0; 
    foreach($mycart as $k=>$v){
      if(isset($v[$data])){
        $amn=$v[$data];
        $res+=$amn;
      }else{
        $res+=0;
      }
    }
  break;
  case "count":
    $res = count($mycart);
  break;
  case "delprd":
     $cid=$_POST[$cid];
    unset($_SESSION[$cart][$cid]);
    $mycart = $_SESSION[$cart];
    $res="Delete";
  break;
  case "addcount":
        //$mycart=$data;
        $cid=$_POST[$cid];
        for($i=0;$i<count($data);$i+=1)
          {
            $mycart = $this->swcpo($data[$i],$mycart,$cid);
          }
    break;
   default:
    
   break;   
  }
  $_SESSION[$cart]=$mycart;
  return $res;
}
public function swcpo($data,$mycart,$cid){

  switch($data[0])
  {
    case "post":
      if(isset($_POST[$data[1]])){$vb=$_POST[$data[1]];}else{$vb=$data[2];}
    break;
    case "post_calc":
      $fval = is_numeric($data[2]) ? $data[2] : $mycart[$cid][$data[2]]; 
      $sval = is_numeric($data[3]) ? $data[3] : $mycart[$cid][$data[3]]; 
      $ope = $data[5];
      $vb = $this->math($fval,$sval,$ope);
    break;
    default:
    break;
  }
  $mycart[$cid][$data[1]]=$vb;
  return $mycart;
}
public function formmodule($file,$flds,$mycart){
  $res="";
  $rf=file_get_contents($file);
  $rf=json_decode($rf);
  $iar=array();
  foreach($rf as $kk=>$vv)
    {
      if(isset($vv->XType)){
        switch($vv->XType)
        {
          case "text":
            $file = "input";
            break;
          case "select":
            $file = "selecttext";
            break;
          case "selectnumber":
            $file = "selectnumber";
            break;
          case "file":
            $file = "file";
            break;
          default:
            $file="input";
          break;
        }
        $mfile="temps/".$file.".html";
        if(file_exists($mfile)){}else{$mfile = "temps/input.html";}
        foreach($vv as $ik=>$iv){
          $iar[$kk][]=["txt",$ik,$ik,$iv,"","",""];
        }
        if(in_array($kk,$flds)){
          $res.=$this->htmlint($mycart,$iar[$kk],$mfile);
        }
      }else{
        $res.="";
      }
    }
    return $res;
}
public function formelement($mycart,$txt,$XForname,$XFor,$name,$XLabel,$title,$XplaceHolder,$placeholder,$XRequired,$required,$temp){
  return $this->htmlint($mycart,[
 [$txt,$XFor."name",$XFor,$name,"","",""],
 [$txt,$XLabel."name",$XLabel,$title,"","",""],
 [$txt,$XplaceHolder."name",$XplaceHolder,$placeholder,"","",""],
 [$txt,$XRequired."name",$XRequired,$required,"","",""]
],$temp);
}
public function math($fval,$sval,$ope){ 
  $res=0;
  switch($ope){
  case "add": $res=(int)$fval + (int)$sval; break;    
  case "multiply": $res=(int)$fval * (int)$sval; break;
      case "percent": $res=(int)$fval * (int)$sval / 100; break;
      default: $res=$fval; break;
  }
  return $res;
}
 
}

?>