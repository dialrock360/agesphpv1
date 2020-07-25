<?php

//comercial



//mouvement
$cont = htmlspecialchars($_POST['conten']);
if(isset($_POST['contenMP'])){
    $updcont = htmlspecialchars($_POST['contenMP']);

}else{
    $updcont ='..';

}
//$cont = htmlspecialchars_decode($_POST['conten']);
$totalht = $_POST['totalht'];
$tva = $_POST['tva'];
$mtsch = $_POST['totalttc'];
$mtsltr = $_POST['lettr'];
$reg = '...';
$avans = 0;
$reste = 0;

$dateI = $_POST['date'];
$dateC=date_create("$dateI");
date_add($dateC,date_interval_create_from_date_string("0 days"));
$date=date_format($dateC,"Y-m-d");

$number = $_POST['ligne'];
$result = false;
$sdate = new DateTime();
$fdate = $sdate->format('d-m-Y H:i:s');


?>