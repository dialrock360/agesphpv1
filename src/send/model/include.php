<?php


require_once "functions.php";
require_once "functionsCount.php";
require_once "functionsuser.php";
require_once "functionsPrd.php";
require_once "functionsfac.php";
require_once "functionsTest.php";
require_once "functionsInsert.php";
require_once "functionsUpdate.php";
require_once "functionsDelete.php";
require_once "functionsRestor.php";
require_once "echotest.php";
require_once "modelfac.php";
require_once "modelprd.php";
require_once "modelrdv.php";
require_once "modelservice.php";
require_once "modeluser.php";
//Chargecleaner();Roomcleaner();
function dateconverter($originalDate,$day=0){
setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

  return  $newDate =($day==0) ? strftime("%A %d %B %Y",strtotime($originalDate)) : 
  $newDate =($day==1) ? strftime(" %d %B %Y",strtotime($originalDate)) : strftime("%B %Y",strtotime($originalDate));  
}
?>