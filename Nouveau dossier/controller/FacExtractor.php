<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 01/12/2017
 * Time: 15:40
 */


//mouvement
$cont = '...';
$updcont = '...';

//$cont = htmlspecialchars_decode($_POST['conten']);
$totalht = $_POST['totalht'];
$tva = $_POST['tva'];
$mtsch = $_POST['totalttc'];
$mtsltr = $_POST['lettr'];
$reg = htmlspecialchars($_POST['reg']);
$avans = $_POST['avance'];
$reste = $_POST['reste'];




$dateI = $_POST['date'];
$dateC=date_create("$dateI");
date_add($dateC,date_interval_create_from_date_string("0 days"));
$sdate = new DateTime();

$date=date_format($dateC,"Y-m-d");
$fdate = $sdate->format('d-m-Y H:i:s');
$sdate = new DateTime();
$Ldate = $sdate->format('D-M-Y H:i:s');
$val='nom';

$number = $_POST['ligne'];

$cnt = '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <caption>' . $titre . ' DE TRANSACTIONS DU ' . $fdate . ' </caption> <thead> <tr> <th scope="col">##</th> <th scope="col"><strong>MOUVEMENT</strong></th> <th scope="col"><strong>MONTANT</strong></th> <th scope="col"><strong>CLI/FOUR</strong></th> <th scope="col"><strong>OBJET</strong></th> <th scope="col"><strong>DATE</strong></th> </tr> </thead> 
<tbody> <tr> <td>' . $idmv . '</td> <td>' . $nommv . '</td> <td>' . $mtsch . '</td> <td>' .User_info($val,$idcom). '</td> <td>MODIFIER ' . $obj . '</td> <td>' . $Ldate . '</td> </tr> </tbody> </table> <p>&nbsp;</p>';
$log=htmlentities($cnt);

