<?php


$familledb = new Famille();
$listefamille  = $familledb->liste();
$caisse  = $familledb->getcaisse();


if (Count_Service()<1){
    require_once 'dashboard/add.php';
}else{
    require_once 'dashboard/homecontent.php';
}

?>

<?php
require_once 'bloc/scripthome.php';
?>

