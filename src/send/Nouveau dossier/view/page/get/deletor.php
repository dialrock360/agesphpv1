<?php
require_once '../../../classes/DB.php';
$db = new Db();
$post_ids = $_POST['post_id'];
$bdinfo= $_POST['bdinfo'];
$info = explode(" ", $bdinfo);
$tblName = $info[0];
$champ = $info[1];
$objet = $info[2];
$action = $info[3];

$restorquery = "UPDATE $tblName SET `FLAG`=0 WHERE $champ=";
$flagdelete = "UPDATE $tblName SET `FLAG`=1 WHERE $champ=";
$superflagquery = "UPDATE $tblName SET `FLAG`=2 WHERE $champ=";
$delquery = "DELETE FROM $tblName WHERE $champ=";

if(isset($_POST['bdinfo']) && !empty($_POST['post_id']) && $action=='mdelete'){
    if($action='mdelete'){
        /*if($objet='flag'){
            $requete=$flagdelete;
        }
        if($objet='del'){
            $requete=$delquery;
        }
        if($objet='superdel'){
            $requete=$superflagquery;
        }
        if($objet='restor'){
            $requete=$restorquery;
        }*/
        $requete=$flagdelete;

    }

    foreach($post_ids as $id){

        // Delete record
        $query = $requete.$id;
        $delete = $db->delete($query);
    }
    echo 1;
}
elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $id = $_POST['id'];
    if($action='sdelete'){
        if($objet='flag'){
            $requete=$flagquery;
        }
        if($objet='del'){
            $requete=$delquery;
        }
        if($objet='superdel'){
            $requete=$superflagquery;
        }
        if($objet='restor'){
            $requete=$restorquery;
        }

    }
    $query = $requete.$id;

    $delete = $db->delete($query);
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
