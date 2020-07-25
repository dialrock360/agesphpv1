<?php


error_reporting( ~E_NOTICE ); // avoid notice
$cpt=0;


require_once 'bd.php';

require_once "functionsPrd.php";
require_once 'functionsInsert.php';


if(isset($_POST['mudatecat']))
{

    $total = $_POST['total'];
    $idu = $_POST['idu'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++)
    {
        $id = $_POST["0name$i"];
        $fn = $_POST["1name$i"];
        $sn = $_POST["2name$i"];
        $ln = $_POST["3name$i"];



//UPDATE `CATEGORIE` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`DATE_CAT`=[value-3],`NOM_CAT`=[value-4],`FLAG`=[value-5] WHERE 1
        include 'bd.php';

        $test=Test_cat($ln);


            $cpt=$cpt+1;
            $sql = ("UPDATE CATEGORIE SET IDFA='$fn',DATE_CAT='$sn',NOM_CAT='$ln' WHERE ID_CAT='$id' ");
            $res = $base->query($sql);


        $final=$total-$cpt;

    }
    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Categorie mis a jour avec success !!!"; ?>');
            window.location.href='stock.php';

        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur insertion, TRY AGAIN "; ?>');
            window.location.href='stock.php';


        </script>
        <?php
    }


}










if(isset($_POST['mudatefa']))
{

    $total = $_POST['total'];
    $idu = $_POST['idu'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++)
    {

        $fn = $_POST["Aname$i"];
        $sn = $_POST["Bname$i"];
        $ln = $_POST["Cname$i"];
        $id = $_POST["0name$i"];



        //$stmt = $MySQLiconn->prepare("SELECT * FROM FAMILLE WHERE DESI=:nom");


//UPDATE `FAMILLE` SET `IDFA`=[value-1],`DESI`=[value-2],`NATURE`=[value-3],`FLAG`=[value-4] WHERE 1


            $cpt=$cpt+1;
            $sql = ("UPDATE FAMILLE SET DESI='$fn',NATURE='$sn',VENTE='$ln' WHERE IDFA='$id' ");
            $res = $base->query($sql);

        $final=$total-$cpt;


    }
    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Famille mis a jour avec success !!!"; ?>');


            window.location.href='stock.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur insertion, TRY AGAIN "; ?>');
            window.location.href='stock.php';

        </script>
        <?php
    }


}


if(isset($_POST['mudatefaC']))
{

    $total = $_POST['total'];
    $idu = $_POST['idu'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++)
    {

        $fn = $_POST["Aname$i"];
        $ln = $_POST["Bname$i"];
        $id = $_POST["0name$i"];



        //$stmt = $MySQLiconn->prepare("SELECT * FROM FAMILLE WHERE DESI=:nom");


//UPDATE `FAMILLE` SET `IDFA`=[value-1],`DESI`=[value-2],`NATURE`=[value-3],`FLAG`=[value-4] WHERE 1


        $cpt=$cpt+1;
        $sql = ("UPDATE FAMILLE SET STOCK='$fn',NATURE='$ln' WHERE IDFA='$id' ");
        $res = $base->query($sql);

        $final=$total-$cpt;


    }
    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Caisse mis a jour avec success !!!"; ?>');


            window.location.href='stock.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur insertion, TRY AGAIN "; ?>');
            window.location.href='stock.php';

        </script>
        <?php
    }


}



if(isset($_POST['mudatepro']))
{
    $total = $_POST['total'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++) {
        $idp = $_POST["0name$i"];
        $des = $_POST["1name$i"];
        $condis = $_POST["2name$i"];
        $pa = $_POST["3name$i"];
        $pv = $_POST["4name$i"];
        $fiche = $_POST["5name$i"];
        $cat = $_POST["6name$i"];
        //$idu= $_POST["7name$i"];
        $imgFile = $_FILES["7name$i"]['name'];
        $tmp_dir = $_FILES["7name$i"]['tmp_name'];
        $imgSize = $_FILES["7name$i"]['size'];

        //$target_dir = "assets/images/avatars/";
        $upload_dir = 'assets/images/gallery/'; // upload directory

        $img = '';

        //TRAVAIL
        $idu = $_POST['id'];
        ?>

        <script>
            var idu0 = <?php echo json_encode($idp); ?>;
            var idu1 = <?php echo json_encode($des); ?>;
            var idu2 = <?php echo json_encode($condis); ?>;
            var idu3 = <?php echo json_encode($cat); ?>;
            var idu4 = <?php echo json_encode($pa); ?>;

            var idu5 = <?php echo json_encode($pv); ?>;
            var idu6 = <?php echo json_encode($imgFile); ?>;

            alert(' PRODUIT  '+ idu0 + '/*** '+ idu1 + '/ '+ idu2 + ' / ' + idu3 + ' / ' + idu4 + ' / '  + ' / ' + idu5 + ' / ' + ' / ' + idu6 + ' / '  + ' déjà');
            //alert(myvar1 + ' ' + myvar2);
        </script>

        <?php

/*
        ?>

        <script>
            var idu0 = <?php echo json_encode($idp); ?>;
            var idu1 = <?php echo json_encode($des); ?>;
            var idu2 = <?php echo json_encode($condis); ?>;
            var idu3 = <?php echo json_encode($cat); ?>;
            var idu4 = <?php echo json_encode($pa); ?>;

            var idu5 = <?php echo json_encode($pv); ?>;
            var idu6 = <?php echo json_encode($imgFile); ?>;

            alert(' PRODUIT  '+ idu0 + '/*** '+ idu1 + '/ '+ idu2 + ' / ' + idu3 + ' / ' + idu4 + ' / '  + ' / ' + idu5 + ' / ' + ' / ' + idu6 + ' / '  + ' déjà');
            //alert(myvar1 + ' ' + myvar2);
        </script>

        <?php
*/
       // $test=Test_prdID($idp);
/*
        if($test==true){


        }else{
            ?>
            <script>
                var idu = <?php echo json_encode($des); ?>;
                alert('le produit '+ idu + ' ' + 'est deja enregistree');
                //alert(myvar1 + ' ' + myvar2);
            </script>
            <?php
        }*/

        if(empty($imgFile)){
///UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`IDC`=[value-3],`ID_CAT`=[value-4],`DESI`=[value-5],`PHOTO`=[value-6],`PRIXA`=[value-7],`PRIXV`=[value-8],`FTECH`=[value-9],`FLAG`=[value-10] WHERE 1


            $sql = ("UPDATE PRODUIT SET IDU='$idu',IDC='$condis',ID_CAT='$cat',DESI='$des',PRIXA='$pa',PRIXV='$pv',FTECH='$fiche' WHERE IDP='$idp' ");
            $res = $base->query($sql);
            $cpt=$cpt+1;

        }else{

            $upload_dir = 'assets/images/gallery/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '5MB'
                if($imgSize < 5000000)				{
                    include 'bd.php';

                    //INSERT INTO `PRODUIT`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
                    $sql = ("UPDATE PRODUIT SET IDU='$idu',IDC='$condis',ID_CAT='$cat',DESI='$des',PHOTO='$userpic',PRIXA='$pa',PRIXV='$pv',FTECH='$fiche' WHERE IDP='$idp' ");
                    $res = $base->query($sql);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                    $cpt=$cpt+1;

                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        //INSERT INTO `PRODUIT`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])


        $final=$total-$cpt;

    }

    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Article mis a jour avec success ...!!!"; ?>');
          window.location.href='stock.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur de mise a jour, TRY AGAIN "; ?>');
           window.location.href='stock.php';

        </script>
        <?php
    }

}
if(isset($_POST['mudateQpro']))
{
    $total = $_POST['total'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++) {
        $idp = $_POST["0name$i"];
        $qnt= $_POST["1name$i"];
        $condis = $_POST["2name$i"];
        $pa = $_POST["3name$i"];
        $pv = $_POST["4name$i"];
        $fiche = $_POST["5name$i"];
        $cat = $_POST["6name$i"];
        //$idu= $_POST["7name$i"];
        $imgFile = $_FILES["7name$i"]['name'];
        $tmp_dir = $_FILES["7name$i"]['tmp_name'];
        $imgSize = $_FILES["7name$i"]['size'];

        //$target_dir = "assets/images/avatars/";
        $upload_dir = 'assets/images/gallery/'; // upload directory

        $img = '';

        //TRAVAIL
        $idu = $_POST['id'];

        /*
                ?>

                <script>
                    var idu0 = <?php echo json_encode($idp); ?>;
                    var idu1 = <?php echo json_encode($des); ?>;
                    var idu2 = <?php echo json_encode($condis); ?>;
                    var idu3 = <?php echo json_encode($cat); ?>;
                    var idu4 = <?php echo json_encode($pa); ?>;

                    var idu5 = <?php echo json_encode($pv); ?>;
                    var idu6 = <?php echo json_encode($imgFile); ?>;

                    alert(' PRODUIT  '+ idu0 + '/*** '+ idu1 + '/ '+ idu2 + ' / ' + idu3 + ' / ' + idu4 + ' / '  + ' / ' + idu5 + ' / ' + ' / ' + idu6 + ' / '  + ' déjà');
                    //alert(myvar1 + ' ' + myvar2);
                </script>

                <?php
        */
        // $test=Test_prdID($idp);
        /*
                if($test==true){


                }else{
                    ?>
                    <script>
                        var idu = <?php echo json_encode($des); ?>;
                        alert('le produit '+ idu + ' ' + 'est deja enregistree');
                        //alert(myvar1 + ' ' + myvar2);
                    </script>
                    <?php
                }*/

        if(empty($imgFile)){
///UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`IDC`=[value-3],`ID_CAT`=[value-4],`DESI`=[value-5],`PHOTO`=[value-6],`PRIXA`=[value-7],`PRIXV`=[value-8],`FTECH`=[value-9],`FLAG`=[value-10] WHERE 1


            $sql = ("UPDATE PRODUIT SET QNT='$qnt' WHERE IDP='$idp' ");
            $res = $base->query($sql);
            $cpt=$cpt+1;

        }else{

            $upload_dir = 'assets/images/gallery/'; // upload directory

            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;

            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){
                // Check file size '5MB'
                if($imgSize < 5000000)				{
                    include 'bd.php';

                    //INSERT INTO `PRODUIT`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
                    $sql = ("UPDATE PRODUIT SET QNT='$qnt' WHERE IDP='$idp' ");
                    $res = $base->query($sql);
                    $cpt=$cpt+1;

                }
                else{
                    $errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        //INSERT INTO `PRODUIT`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])


        $final=$total-$cpt;

    }

    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Article mis a jour avec success ...!!!"; ?>');
            window.location.href='stock.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur de mise a jour, TRY AGAIN "; ?>');
            window.location.href='stock.php';

        </script>
        <?php
    }

}













if(isset($_POST['mudatecondis']))
{


    $total = $_POST['total'];
    $idu = $_POST['idu'];
//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    for($i=1; $i<=$total; $i++)
    {
        $fn = $_POST["Aname$i"];

        $id = $_POST["0name$i"];
       //UPDATE `CONDIS` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
/*
        ?>

        <script>
            var idu0 = <?php echo json_encode($total); ?>;
            var idu1 = <?php echo json_encode($idu); ?>;
            var idu2 = <?php echo json_encode($id); ?>;
            var idu3 = <?php echo json_encode($fn); ?>;
            var idu4 = <?php echo json_encode($total); ?>;

            var idu5 = <?php echo json_encode($ln); ?>;
            var idu6 = <?php echo json_encode($i); ?>;

            alert(' PRODUIT  '+ idu0 + '/*** '+ idu1 + '/ '+ idu2 + ' / ' + idu3 + ' / ' + idu4 + ' / '  + ' / ' + idu5 + ' / ' + ' / ' + idu6 + ' / '  + ' déjà');
            //alert(myvar1 + ' ' + myvar2);
        </script>

        <?php
*/
        $sql = ("UPDATE CONDIS SET NOMC='$fn' WHERE IDC='$id' ");
            $res = $base->query($sql);
            $cpt=$cpt+1;

        $final=$total-$cpt;

    }
    if($res)
    {
        ?>
        <script>
            alert('<?php echo $cpt." Conditionements  mis a jour avec success !!!"; ?>');
            window.location.href='stock.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('<?php echo $final." erreur insertion, TRY AGAIN "; ?>');
            window.location.href='stock.php';

        </script>
        <?php
    }


}







