<?php

require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();

//var_dump($_POST);


switch($_REQUEST['for'])
{
 case "attr":
    $temp= "templates/";
    $them= "themes/";

    $template_name = $temp.$_POST['template_name'].".html";
    $theme_name = $them.$_POST['template_name'].".php";
    $html_content = $_POST['html_content'];

    if(file_put_contents($template_name,$html_content)){
    $totheme = $r->htmltoattributes($_POST['template_name'],$template_name,$theme_name);

    echo $totheme;
    }
    else{
    echo "Error Writing template and Reading";
    }
  break;
  case "theme":
    $sheeetName = $_POST['basename'];
    $attr = $_POST['label'];
    $vals = $_POST['value'];
    $template_name = $_POST['template_name'];
    $theme_name = $_POST['theme_name'];
    $html_content = file_get_contents($template_name);
   //var_dump($attr);
   //var_dump($vals);
    
    if(file_put_contents($template_name,$html_content)){
     $totheme = $r->htmltotheme($template_name,$attr,$vals); 
     if(file_put_contents($theme_name,"<?php \n ".$totheme." \n ?>")){
      
      echo "Template Generated : <a href='viewtheme.php?theme=".$theme_name."' target='_blank'>".$theme_name."</a><br/><br/><br/>";
      $filePath="data/data.xlsx"; 
      echo $r->createExcelFile($filePath,$sheeetName,$attr,$vals);
        require_once $theme_name;
       }else{

       }
    }
    else{
    echo "Error Writing template and Reading";
    }
    
   break;
 default:
 break;
}



?>