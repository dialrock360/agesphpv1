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
require_once '../../../classes/Db.php';
require_once '../../../model/include.php';
require_once '../../../assets/web/rooting.php';
$db = new Db();

$tblName = 'produit';

if(($_POST['action'] == 'edit') && !empty($_POST['id'])){
    //update data
    //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1

    $userData = array(
        'DESI' => $_POST['DESI'],
        'PRIXA' => $_POST['PRIXA'],
        'PRIXV' => $_POST['PRIXV'],
        'QNT' => $_POST['QNT']
    );
    $idp = $_POST['id'];
    extract($_POST);
   // $colvalSet=' DESI="'.$_POST['DESI'].'", PRIXA="'.$_POST['PRIXA'].'", PRIXV="'.$_POST['PRIXV'].'", QNT="'.$_POST['QNT'].'" ';
    $condition = array('IDP' => $_POST['id']);
   // $conditions = ' IDP="'.$_POST['id'].'"';

   // $update = $db->update($table,$colvalSet,$conditions);
    $requete = "UPDATE `produit` SET `DESI`='$DESI',
`PRIXA`='$PRIXA',`PRIXV`='$PRIXV',`QNT`='$QNT' WHERE `IDP`=$idp";
    $update = $db->update($requete);
   // $update = $db->update($tblName, $userData, $condition);
    if($update){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been updated successfully.',
            'data' => $userData
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.'.$_POST['DESI'],
            'data' => ''
        );
    }

    echo json_encode($returnData);
}elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $condition = array('id' => $_POST['id']);
    $delete = $db->delete($tblName, $condition);
    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been deleted successfully.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Some problem occurred, please try again.'
        );
    }

    echo json_encode($returnData);
}
die();
?>
