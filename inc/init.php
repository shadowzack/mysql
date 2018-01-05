<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$_GET['module']=isset($_GET['module']) ? $_GET['module']:"engineer";
$_GET['page']=isset($_GET['page']) ? $_GET['page']:"list";
$FILE_TO_LOAD='inc/modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
//echo $FILE_TO_LOAD;
include('config.php');


 ?>
