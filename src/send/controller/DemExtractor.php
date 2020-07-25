<?php
;

//mouvement
$cont = htmlspecialchars($_POST['conten']);
if(isset($_POST['contenM'])){
    $updcont = htmlspecialchars($_POST['contenM']);

}else{
    $updcont ='..';

}
//$cont = htmlspecialchars_decode($_POST['conten']);
$totalht =0;
$tva = 0;
$mtsch = 0;
$mtsltr ='..';
$reg = '..';
$avans = 0;
$reste = 0;

$dateI = $_POST['date'];
$dateC=date_create("$dateI");
date_add($dateC,date_interval_create_from_date_string("0 days"));
$date=date_format($dateC,"Y-m-d");

$idcom = $_POST['idacom'];
$number =0;
$result = false;
$desif=0;
$sdate = new DateTime();
$fdate = $sdate->format('d-m-Y H:i:s');


?>