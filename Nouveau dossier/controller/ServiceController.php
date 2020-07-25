<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 25/02/2018
 * Time: 06:12
 */
require_once'../model/bd.php';
require_once'../model/functions.php';
require_once '../model/modelservice.php';
require_once'../model/echotest.php';
//$id=$_POST['id'];


if(isset($_POST['addservice'])){

    $objet='addservice';
   // addservice($id,$ninea,$nom,$sigle,$emmail,$tel,$adress,$secteur_E,$type,$ca,$logo);

}
if(isset($_POST['updateservice'])){

    $objet='updateservice';
}

//
$idS = $_POST['idS'];
include 'ServiceExtractor.php';
 $sql = Saveservice($objet,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo,$idS);
if($sql==1){
    ?>
    <script>
        alert('<?php echo "service enregistré avec success !"; ?>');
        window.location.href='../start.php?file=page/dashboard';
    </script>
    <?php

}else{
    ?>

    <script>
       alert('<?php echo "erreur de processus... !!!"; ?>');
       window.location.href='../start.php?file=page/dashboard';
    </script>

    <?php
    //
}
