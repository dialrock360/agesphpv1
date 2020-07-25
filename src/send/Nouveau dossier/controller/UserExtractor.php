<?php

$imgFile = $_FILES['img']['name'];
$tmp_dir = $_FILES['img']['tmp_name'];
$imgSize = $_FILES['img']['size'];
$oldimg=$_POST['oldimg'];
$origine=$_POST['origine'];
$secu=0;
//$target_dir = "assets/images/avatars/";
$upload_dir = '../assets/images/avatars/'; // upload directory
$target_file = $upload_dir . basename($imgFile);

if(empty($imgFile)){
    $userpic =$oldimg;
    $errMSG=0;
}else{

    $timg=fichier($imgFile,$tmp_dir,$imgSize,$upload_dir) ;
    for($i=0;$i<count($timg);$i++) {
        if($timg[$i]==0){
            $x=1;
            $userpic=$timg[$x];
            $error=0;
            break;
        }else{
            $x=1;
            $userpic=$timg[$i];
            $error=1;
            break;
        }
    }
}

$id=$_POST['id'];

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$daten=$_POST['daten'];
$tel=$_POST['tel'];
$cni=$_POST['cni'];
$sexe=$_POST['sexe'];

//TRAVAIL
$poste=$_POST['poste'];
$salaire=$_POST['salaire'];
$datem=$_POST['datem'];
$adresse=$_POST['adresse'];

//$cacher=$_SESSION['login'];

$cacher="DIAL";
$login=$_POST['login'];
$passe=$_POST['passe'];
$email=$_POST['email'];

$cacher=$_POST['cacher'];
$info='';
$flag='0';
$statut=$_POST['statut'];
$empty=1;
// if no error occured, continue ....
if($empty==1)
{

    if(empty($datem)){
        $datem=date("Y/m/d");
    }
    if(empty($daten)){
        $daten=date("Y/m/d");
    }
    if(empty($prenom)){
        $prenom='...';
    }
    if(empty($adresse)){
        $adresse='...';
    }
    if(empty($tel)){
        $tel='...';
    }
    if(empty($poste)){
        $poste='...';
    }
    if(empty($userpic)){
        $userpic='...';
    }
    if(empty($info)){
        $info='...';
    }
    if(empty($sexe)){
        $sexe='...';
    }
    if(empty($login)){
        $login='...';
    }
    if(empty($cni)){
        $cni='...';
    }
    if(empty($email)){
        $email='...';
    }
    if(empty($poste)){
        $poste='...';
    }
    if(empty($salaire)){
        $salaire='0';
    }



}


?>