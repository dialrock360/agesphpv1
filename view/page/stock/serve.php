<?php
 
$dburl='../../../model/DB.php';
require_once '../../../classes/classeinclude.php';
require_once '../../../model/include.php';
require_once '../../../model/DB.php';
require_once '../../../assets/web/rooting.php';



if(($_POST['action'] == 'edit') && !empty($_POST['id'])){

    $prddb = new Produit();

    $idp = $_POST['id'];
    $OldTable= $prddb->setIdp($idp);
    extract($_POST);
    $userData = array(
        'IDC' => $IDC ,
        'ID_CAT' => $ID_CAT,
        'DESI' => $DESI ,
        'PRIXA' =>$PRIXA,
        'PRIXV' =>$PRIXV,
        'QNT' =>$QNT
    );
    $returnData = array(
        'status' => 'error',
        //'msg' => 'Problème de modification essayer encore..',
        'msg' => 'Problème de modification essayer encore..',
        'data' => $userData
    );
    $condition = array( 'IDP' => $idp );
    /* */

    /* $prddb->setIdp($idp);


   $update = inupdate($insertData,'produit',$condition);



     if($update > 0 ){
         $userData=$prddb->get();
       $returnData = array(
           'status' => 'ok',
           'msg' => 'User data has been updated successfully.',
           'data' => $userData
       );
     } */
    echo json_encode($_POST);

}