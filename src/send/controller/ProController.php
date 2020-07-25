<?php
//        header("location:$base_url?page=etudiant/add&ok=$result");

require_once'../model/bd.php';
require_once'../model/functions.php';
require_once'../model/modelprd.php';
require_once'../model/echotest.php';
require_once'../model/functionsTest.php';
require_once'../model/functionsPrd.php';
require_once'../model/functionsUpdate.php';
require_once'../model/include.php';
require_once'../assets/web/rooting.php';
$target='?file=page/stock';
require_once'SaveStockExtractor.php';


if(isset($_POST['msavecat'])){

    for($i=1; $i<=$total; $i++)
    {


        $idf = $_POST["1name$i"];
        $nom = $_POST["3name$i"];
        if(!empty($_POST["4name$i"]))
        {

            $ach = $_POST["4name$i"];

        }else{ $ach=0;}
        if(!empty($_POST["5name$i"]))
        {

            $vent = $_POST["5name$i"];

        }else{ $vent=0;}


        if(!empty($_POST["6name$i"]))
        {

            $compt = $_POST["6name$i"];

        }else{ $compt=0;}
       // $Inser = 0;
           //testecat($id,$nom,$idf,$ach,$vent,$compt);

       $Inser=MInsertcat($val,$nom,$idf,$ach,$vent,$compt);
        if($Inser==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;

        }


    }


}
if(isset($_POST['mudatecat'])){
    for($i=1; $i<=$total; $i++)
    {

        $cat = $_POST["1name$i"];
        $idf = $_POST["2name$i"];
        $nom = $_POST["3name$i"];
        $ach = $_POST["4name$i"];
        $vent = $_POST["5name$i"];
        $compt = $_POST["6name$i"];



//INSERT INTO `CATEGORIE`(`ID_CAT`, `IDFA`, `DATE_CAT`, `NOM_CAT`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        $sql = updCat($cat,$idf,$nom,$ach,$vent,$compt);
      //  $sql = 0;
       // testecat($id,$nom,$idf,$ach,$vent,$compt);
        if($sql==1){
            $cpt=$cpt+1;

        }
        else{
            $cpt2=$cpt2+1;

        }

    }




}



if(isset($_POST['msavefa'])){
    $nom = $_POST["Aname$i"];
    $color = $_POST["Bname$i"];
    $dep=0;$gain=0;$stk=0;
    $val='nom';

    for($i=1; $i<=$total; $i++)
    {
        require_once 'CatExtractor.php';


        $Inser=MInsertfam($val,$nom,$color);
        if($Inser==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;

        }

    }


}
if(isset($_POST['mudatefa'])){
    for($i=1; $i<=$total; $i++)
    {

        $ifa = $_POST["Aname$i"];
        $nom = $_POST["Bname$i"];
        $col = $_POST["Cname$i"];

        $Inser=MUpdatefam($ifa,$nom,$col);
        if($Inser==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;

        }

    }

}



if(isset($_POST['msavecondis'])){

    for($i=1; $i<=$total; $i++)
    {


        $fn = $_POST["Aname$i"];

        $Inser=MInsertcondis($fn);
        if($Inser==1){
            $cpt=$cpt+1;

        }
        else{
            $cpt2=$cpt2+1;

        }

    }


}
if(isset($_POST['mudatecondis'])){
    for($i=1; $i<=$total; $i++)
    {


        $fn = $_POST["Aname$i"];
        $ln = $_POST["Bname$i"];

        $Inser=MUpdatecondis($fn,$ln);

        if($Inser==1){
            $cpt=$cpt+1;

        }
        else{
            $cpt2=$cpt2+1;

        }

    }



}



if(isset($_POST['msavepro'])){
    for($i=1; $i<=$total; $i++) {

        $desi = $_POST["1name$i"];
        $idc = $_POST["2name$i"];
        $pa = $_POST["3name$i"];
        $pv = $_POST["4name$i"];
        $fiche = $_POST["5name$i"];
        $cat = $_POST["6name$i"];
        //$idu= $_POST["7name$i"];
        $imgFile = $_FILES["7name$i"]['name'];
        $tmp_dir = $_FILES["7name$i"]['tmp_name'];
        $imgSize = $_FILES["7name$i"]['size'];

        //$target_dir = "assets/images/avatars/";
        $upload_dir = '../assets/images/gallery/'; // upload directory
        $target_file = $upload_dir . basename($imgFile);

        if(empty($imgFile)){
            $img='...';
        }
        else{


            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '5MB'
                if($imgSize < 5000000)				{
                    $img=$userpic;
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);

                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        $val='nom';
        $Inser=MInsertprod($val,$idc,$cat,$desi,$img,$pa,$pv,$fiche);
        if($Inser==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;

        }

    }



    }
if(isset($_POST['mudatepro'])){
    for($i=1; $i<=$total; $i++)
    {
    $idp = $_POST["0name$i"];
    $desi = htmlentities($_POST["1name$i"]);
    $idc = $_POST["2name$i"];
    $pa = $_POST["3name$i"];
    $pv = $_POST["4name$i"];
    $fiche = $_POST["5name$i"];
    $cat = $_POST["6name$i"];
    $qnt= $_POST["8name$i"];
    $oldimg= $_POST["oldimg$i"];
    $imgFile = $_FILES["7name$i"]['name'];
    $tmp_dir = $_FILES["7name$i"]['tmp_name'];
    $imgSize = $_FILES["7name$i"]['size'];

    $upload_dir = '../assets/images/gallery/'; // upload directory
    $target_file = $upload_dir . basename($imgFile);
    $valimg='img';$imgI=Show_Prodref($valimg,$idp);
        if(empty($imgFile)){
            $img=$imgI;
        }
    else{
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic = rand(1000,1000000).".".$imgExt;

        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions)){
            // Check file size '5MB'
            if($imgSize < 5000000)				{
                $img=$userpic;
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);

            }
            else{
                $errMSG = "Sorry, your file is too large.";
            }
        }
        else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }


       $Inser=updProd($idp,$idc,$cat,$desi,$img,$pa,$pv,$qnt,$fiche);

    if($Inser==1){
        $cpt=$cpt+1;

    }
    else{
        $cpt2=$cpt2+1;

    }

   }
}



if($cpt>0)
{
    ?>
    <script>
        alert('<?php echo $cpt." Operations Réussies !!!"; ?>');
      window.location.href='../start.php<?php echo $target; ?>';

    </script>

    <?php

}
else
{
    ?>
    <script>
        alert('<?php echo $cpt2." erreurs Operationnel, Essayez Encors "; ?>');
       window.location.href='../start.php<?php echo $target; ?>';

    </script>
    <?php
}

?>