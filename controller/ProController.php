<?php
//        header("location:$base_url?page=etudiant/add&ok=$result");


$dburl='../model/DB.php';

require_once '../classes/classeinclude.php';
require_once'../model/include.php';

require_once'../assets/web/rooting.php';
$target='?file=page/stock';
require_once'SaveStockExtractor.php';

function filename($name,$size,$objame='') {
    return strtolower(trim(($objame=='')?explode('.',$name)[0]:$objame))."_".$size."_".date("Ymd").".".strtolower(pathinfo($name,PATHINFO_EXTENSION));
}

$prddb = new Produit();
$catdb = new Categorie();
$condisdb = new Condis();
$famdb = new Famille();
$prdcomdb = new Produit_cmp();

if(isset($_POST['msavecat'])){
    $cpt=0;
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
        $val='nom';
       $Inser=MInsertcat($val,$nom,$idf,$ach,$vent,$compt);
        if($Inser==1){
            $cpt++;

        }


    }


}
if(isset($_POST['mudatecat'])){
    $cpt=0;
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
            $cpt++;

        }

    }




}



if(isset($_POST['msavefa'])){
    $dep=0;$gain=0;$stk=0;
    $val='nom';
    $cpt=0;
    for($i=1; $i<=$total; $i++)
    {

        $nom = $_POST["Aname$i"];
        $color = $_POST["Bname$i"];


        $sql =  MInsertfam($val,$nom,$color);
        if($sql==1){
            $cpt++;

        }

    }


}
if(isset($_POST['mudatefa'])){
    $cpt=0;
    for($i=1; $i<=$total; $i++)
    {

        $ifa = $_POST["Aname$i"];
        $nom = $_POST["Bname$i"];
        $col = $_POST["Cname$i"];

        $Inser=MUpdatefam($ifa,$nom,$col);
        if($Inser==1){
            $cpt++;

        }

    }

}



if(isset($_POST['msavecondis'])){
    $cpt=0;
    for($i=1; $i<=$total; $i++)
    {


        $fn = $_POST["Aname$i"];

        $Inser=MInsertcondis($fn);
        if($Inser==1){
            $cpt++;

        }


    }


}
if(isset($_POST['mudatecondis'])){
    $cpt=0;
    for($i=1; $i<=$total; $i++)
    {


        $fn = $_POST["Aname$i"];
        $ln = $_POST["Bname$i"];

        $Inser=MUpdatecondis($fn,$ln);

        if($Inser==1){
            $cpt++;

        }


    }



}



if(isset($_POST['msavepro'])){
    $cpt=0;
    for($i=1; $i<=$total; $i++) {
//print_r($_POST);echo '<hr/>';
        $insert=0;
        $desi = $_POST["1name$i"];
        $idc = $_POST["2name$i"];
        $cat = $_POST["3name$i"];
        $pa = $_POST["4name$i"];
        $pv = $_POST["5name$i"];
        $fiche = $_POST["6name$i"];
        $qnt = $_POST["8name$i"];
        $comp= 0;
        //$idu= $_POST["7name$i"];
        $imgFile = $_FILES["7name$i"]['name'];
        $tmp_dir = $_FILES["7name$i"]['tmp_name'];
        $imgSize = $_FILES["7name$i"]['size'];

        //$target_dir = "assets/images/avatars/";
        $upload_dir = '../assets/images/gallery/'; // upload directory
        $target_file = $upload_dir . basename($imgFile);

        $img=filename($imgFile,$imgSize,str_replace(' ','-',trim($desi)));;
        if(empty($imgFile)){
            $img='...';
        }
        $val='nom';
          $test=Test_prd($val,$desi); $insert=0;

/*
        echo '<br>'.$desi.'<br>';
        testechopro('null',$idf,$idc,$cat,$desi,$img,$pa,$pv,$fiche,$color,0,0);
        echo '<hr>';*/

        if($test==0){

         $sql=  $prddb->addProd($idc, $cat, $desi, $qnt, $img, $pa, $pv, $fiche);
            if($sql>0){

                $insert=1;
               if(!empty($imgFile)){
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

                    // valid image extensions
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions


                    // allow valid image file formats
                    if(in_array($imgExt, $valid_extensions)){
                        // Check file size '5MB'
                        if($imgSize < 5000000)				{
                            move_uploaded_file($tmp_dir,$upload_dir.$img);

                        }
                        else{
                            $errMSG = "Sorry, your file is too large.";
                        }
                    }
                    else{
                        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }

            }

        }


        if($Inser==1){
            $cpt++;

        }

    }



    }

if(isset($_POST['mudatepro'])){
    $cpt=0;
    for($i=1; $i<=$total; $i++) {
//print_r($_POST);echo '<hr/>';
        $insert=0;
        $idp = $_POST["0name$i"];
        $desi = htmlentities($_POST["1name$i"]);
        $idc = $_POST["2name$i"];
        $cat = $_POST["3name$i"];
        $pa = $_POST["4name$i"];
        $pv = $_POST["5name$i"];
        $fiche = $_POST["6name$i"];
        $qnt = $_POST["8name$i"];
        $comp = $_POST["10name$i"];
        $oldimg= $_POST["oldimg$i"];
        //$idu= $_POST["7name$i"];
        $imgFile = $_FILES["7name$i"]['name'];
        $tmp_dir = $_FILES["7name$i"]['tmp_name'];
        $imgSize = $_FILES["7name$i"]['size'];
        $prddb->setIdp($idp);

        //$target_dir = "assets/images/avatars/";
        $upload_dir = '../assets/images/gallery/'; // upload directory
        $target_file = $upload_dir . basename($imgFile);

        $img=filename($imgFile,$imgSize,rand(1000,1000000));
        if(empty($imgFile)){
            $img=$oldimg;
        }
        $val='nom';

/*
        echo '<br>'.$desi.'<br>';
        testechopro('null',$idf,$idc,$cat,$desi,$img,$pa,$pv,$fiche,$color,0,0);
        echo '<hr>';*/



      $sql=  $prddb->updateProd( $idc, $cat, $desi, $qnt,$comp, $img, $pa, $pv,$fiche);
            if($sql>0){

                $insert=1;
               if(!empty($imgFile)){
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

                    // valid image extensions
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions


                    // allow valid image file formats
                    if(in_array($imgExt, $valid_extensions)){
                        // Check file size '5MB'
                        if($imgSize < 5000000)				{
                           move_uploaded_file($tmp_dir,$upload_dir.$img);

                        }
                        else{
                            $errMSG = "Sorry, your file is too large.";
                        }
                    }
                    else{
                        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                }
                if($Inser==1){
                    $cpt++;

                }

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
