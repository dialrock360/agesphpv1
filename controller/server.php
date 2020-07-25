<?php


$dburl='../model/DB.php';

require_once '../classes/classeinclude.php';
require_once'../model/include.php';


$prddb = new Produit();
$catdb = new Categorie();
$condisdb = new Condis();
$famdb = new Famille();
$prdcomdb = new Produit_cmp();

function allupdateoperator($sql){
    $db = new DB();
    return   $db->updatespecificQuery($sql);
}

if(($_POST['action'] == 'edit') && !empty($_POST['id'])){

    $prddb->setIdp($_POST["id"]);
    $OldTable=$prddb->get();
    $returnData = array(
        'status' => 'error',
        //'msg' => 'Problème de modification essayer encore..',
        'msg' => 'Problème de modification essayer encore..',
        'data' => json_encode($OldTable)
    );
    $desi = $_POST["DESI"];
    $idc = (!isset($_POST["IDC"]) || empty($_POST["IDC"]) )  ? $OldTable['IDC']:$_POST["IDC"];
    $cat = (!isset($_POST["ID_CAT"]) || empty($_POST["ID_CAT"]) )  ? $OldTable['ID_CAT']:$_POST["ID_CAT"];
    $prixa = $_POST["PRIXA"];
    $prixv = $_POST["PRIXV"];
    $ftech = (!isset($_POST["FTECH"]) || empty($_POST["FTECH"]) )  ? $OldTable['FTECH']:$_POST["FTECH"];
    $qnt = $_POST["QNT"];
    $comp= $OldTable['COMPOSER'];
    $photo= $OldTable['PHOTO'];
    extract($_POST);

   // $update=  $prddb->updateProd($idc, $cat, $desi, $qnt, $comp,$photo, $prixa, $prixv,$ftech);
    $requete = "UPDATE `produit` SET `DESI`='".htmlentities($desi)."',
                `PRIXA`='".htmlentities($prixa)."',
                `PRIXV`='".htmlentities($prixv)."',
                `QNT`='".htmlentities($qnt)."',
                `IDC`='".htmlentities($idc)."',
                `ID_CAT`='".htmlentities($cat)."'
                 WHERE `IDP`=$id";
    $update= allupdateoperator($requete);

    if($update>0){
        $OldTable=$prddb->get();
        $userData= array(

            'IDP'=>$OldTable['IDP'],
            'IDC'=>$OldTable['IDC'],
            'NOMC'=>$OldTable['NOMC'],
            'ID_CAT'=>$OldTable['ID_CAT'],
            'NOM_CAT'=>$OldTable['NOM_CAT'],
            'DESI'=>$OldTable['DESI'],
            'PHOTO'=>$OldTable['PHOTO'],
            'PRIXA'=>$OldTable['PRIXA'],
            'PRIXV'=>$OldTable['PRIXV'],
            'QNT'=>$OldTable['QNT'],
            'COMPOSER'=>$OldTable['COMPOSER'],
            'FTECH'=>$OldTable['FTECH'],
            'FLAG'=>$OldTable['FLAG']
        );
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been updated successfully.',
            'data' => $userData
        );
    }
   // {"action":"edit","id":"225","DESI":" GAZELLES KANETTE","PRIXA":"471","PRIXV":"1000","QNT":"0"}
    echo json_encode($returnData);
}

?>
