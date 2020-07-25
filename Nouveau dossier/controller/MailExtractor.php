<?php


//$target_dir = "assets/images/avatars/";

if (empty($_FILES['attachment'])) {
    $file_ary = reArrayFiles($_FILES['attachment']);
    $maxsize=5000000;
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf', 'doc','txt','xps'); // valid extensions

    $nom=$_POST['recipient'];
    $objet=$_POST['subject'];
    $message= htmlspecialchars($_POST['conten']);
    $tel=$_POST['tel'];

    foreach ($file_ary as $file) {

        $erreur=0;

        $imgFile = print 'File Name: ' . $file['name'];
        $imgType = print 'File Type: ' . $file['type'];
        $imgSize = print 'File Size: ' . $file['size'];
        $tmp_dir = print 'File tmp: '  . $file['tmp_name'];

        if ($imgSize > $maxsize) $erreur = "Le fichier est trop gros";
        if ($imgType != $valid_extensions) $erreur = "Le fichier est Incompatible";

        if($erreur==0){
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            $userpic = rand(1000,1000000).".".$imgExt;

        }

    }
}




?>