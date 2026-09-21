<?php
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();

//var_dump($_POST);

$temp= "templates/";
$them= "themes/";

$template_name = $temp.$_POST['template_name'].".html";
$theme_name = $them.$_POST['template_name'].".php";
$html_content = $_POST['html_content'];
if(file_put_contents($template_name,$html_content)){
$totheme = $r->htmltotheme($template_name); 
if(file_put_contents($theme_name,"<?php \n ".$totheme." \n ?>")){
 printf($totheme);
 require_once $theme_name;
}else{

}
}
else{
echo "Error Writing template and Reading";
}
?>