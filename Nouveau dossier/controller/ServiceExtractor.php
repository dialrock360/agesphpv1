<?php




    $imgFile = $_FILES['img']['name'];

    if($imgFile=='...'|| empty($_FILES['img']['name'])){
        $userpic ='...';
        $errMSG=0;
    }else{

        $tmp_dir = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
        $secu=0;
//$target_dir = "assets/images/avatars/";
        $upload_dir = '../assets/images/avatars/'; // upload directory
        $target_file = $upload_dir . basename($imgFile);

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
    $logo=$userpic;

    extract($_POST);

  //  testeserv($objet,$id,$ninea,$nom,$sigle,$emmail,$tel,$adress,$secteur_E,$type,$ca,$logo);


?>