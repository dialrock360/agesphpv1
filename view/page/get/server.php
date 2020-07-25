<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 27/02/2018
 * Time: 18:15
 */

//include connection file

/* Database connection start */

//define index of column

//load and initialize database class
$dburl='model/DB.php';
require_once 'classes/classeinclude.php';

require_once 'model/functions.php';
require_once 'model/functionsPrd.php';
require_once 'model/functionsuser.php';
require_once 'model/functionfrontend.php';
require_once 'model/functionsCount.php';
require_once 'model/functionsfac.php';

$db = new  DB();

$tblName = 'produit';

if(($_POST['action'] == 'edit') && !empty($_POST['id'])){
    //update data
    //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1

    $userData = array(
        'DESI' => $_POST['DESI'],
        'PRIXA' => $_POST['PRIXA'],
        'PRIXV' => $_POST['PRIXV'],
        'QNT' => $_POST['QNT'],
        'IDC' =>  $_POST['IDC'] ,
        'ID_CAT' =>  $_POST['ID_CAT']
    );
    $idp = $_POST['id'];
    extract($_POST);
   // $colvalSet=' DESI="'.$_POST['DESI'].'", PRIXA="'.$_POST['PRIXA'].'", PRIXV="'.$_POST['PRIXV'].'", QNT="'.$_POST['QNT'].'" ';
    $condition = array('IDP' => $_POST['id']);
   // $conditions = ' IDP="'.$_POST['id'].'"';

   // $update = $db->update($table,$colvalSet,$conditions);
    $requete = "UPDATE `produit` SET `DESI`='".htmlentities($DESI)."',
`PRIXA`='".htmlentities($PRIXA)."',`PRIXV`='".htmlentities($PRIXV)."',`QNT`='".htmlentities($QNT)."',`IDC`='".htmlentities($QNT)."',`ID_CAT`='".htmlentities($QNT)."' WHERE `IDP`=$idp";
    $update = $db->update($requete);
   // $update = $db->update($tblName, $userData, $condition);
    if($update){
        $prddb = new Produit();

        $idp = $_POST['id'];
         $prddb->setIdp($idp);
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been updated successfully.',
            'data' =>  $prddb->get()
        );
    }else{
        $returnData = array(
            'status' => 'error',
            //'msg' => 'Problème de modification essayer encore..',
            'msg' => 'Problème de modification essayer encore..',
            'data' => ''
        );
    }

    echo json_encode($returnData);
}
elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $idp = $_POST['id'];
    extract($_POST);
    // $colvalSet=' DESI="'.$_POST['DESI'].'", PRIXA="'.$_POST['PRIXA'].'", PRIXV="'.$_POST['PRIXV'].'", QNT="'.$_POST['QNT'].'" ';
    $condition = array('IDP' => $_POST['id']);
    // $conditions = ' IDP="'.$_POST['id'].'"';

    // $update = $db->update($table,$colvalSet,$conditions);
    $requete = "UPDATE `produit` SET `FLAG`=1 WHERE `IDP`=$idp";


    $delete = $db->delete($requete);
    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'produit supprimer avec success.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Problème de suppression essayer encore...'
        );
    }

    echo json_encode($returnData);
}
elseif(($_POST['action'] == 'deleterap') && !empty($_POST['id'])){
	
	
    $idp = $_POST['id'];
	
    extract($_POST);
	 $condition = array('DATEE' => $_POST['id']);
	 $table='etat_compte';
//$requete = "DELETE FROM `etat_compte` WHERE `DATEE`= '$idp' ";
    // SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1


   $delete = $db->delete($table,$condition);
    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'produit supprimer avec success.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Problème de suppression essayer encore...'
        );
    }

    echo json_encode($returnData);
}
die();
?>
