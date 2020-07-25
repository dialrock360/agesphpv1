<?php
 
$dburl='../../../model/DB.php';
require_once '../../../classes/classeinclude.php';
require_once '../../../model/include.php';
require_once '../../../model/DB.php';
require_once '../../../assets/web/rooting.php';

function inupdate($rowarray,$setTablename,$condition){

    $db = new DB() ;
    $db->setTablename($setTablename);
    return $db->updateTable($rowarray,array('where'=>$condition));

}


if(($_POST['action'] == 'edit') && !empty($_POST['id'])){
    /* $OldTable=array();
     $update=0;
	  $prddb = new Produit();
 
      $idp = $_POST['id']; 
      $update=0;
      extract($_POST);*/
	
	 /* $prddb->setIdp($idp);
    $insertData = array(
        'IDC' => $IDC ,
        'ID_CAT' => $ID_CAT,
        'DESI' => $DESI ,
        'PRIXA' =>$PRIXA,
        'PRIXV' =>$PRIXV,
        'QNT' =>$QNT
    );

    $condition = array( 'IDP' => $idp );
    $update = inupdate($insertData,'produit',$condition);

	  $returnData = array(
            'status' => 'error',
            //'msg' => 'Problème de modification essayer encore..',
            'msg' => 'Problème de modification essayer encore..',
            'data' => ''
        );
	 
	  if($update > 0 ){
          $userData=$prddb->get();
        $returnData = array(
            'status' => 'ok',
            'msg' => 'User data has been updated successfully.',
            'data' => $userData
        );
      } */
   echo json_encode( 1);

}


/*
if(($_POST['action'] == 'edit') && !empty($_POST['id'])){
	

	
	 if ( $idp>0){}

                  

    echo json_encode($returnData);  
			 }
	    
	 }*/