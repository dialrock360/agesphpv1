<?php


$idf = $_POST["1name$i"];
$nom = $_POST["3name$i"];
if(!empty($_POST["4name$i"]))
{

    $ach = $_POST["4name$i"];

}
else{ $ach=0;}
if(!empty($_POST["5name$i"]))
{

    $vent = $_POST["5name$i"];

}
else{ $vent=0;}
$val='nom';

?>