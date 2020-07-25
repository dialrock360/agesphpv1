<?php

require_once'../model/bd.php';
require_once'../model/NotesDao.php';
require_once '../model/functions.php';
//SELECT `idn`, `idm`, `valeur`, `annee`, `semestre`, `mat` FROM `notes` WHERE 1
if(isset($_POST['add'])){
    extract($_POST);
    $val='not';
    $ok=Test($val,$valeur,$semestre,$mat);
    if($ok==0){

        $ok=addNote($idm, $valeur, $annee, $semestre, $mat);
    }else{
        $ok='cette note est déjà enregistrée';
    }

    header("location:../index.php?ok=$ok");
}
elseif(isset($_POST['upd'])){
    extract($_POST);
    upd($val,$id,$nom,$prenom,$genre,$tel,$idm,$valeur,$annee,$semestre,$mat,$date,$img);
    header("location:../index.php?ok=$ok");
}
elseif(isset($_GET['id'])){
    $val='note';$id=$_GET['id'];del($val,$id);
    header("location:../index.php?ok=$ok");
}
else{
    header("location:../index.php");
}
?>