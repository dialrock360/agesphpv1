<?php
/*
?>
    <script>
      /*  var chk = <?php echo json_encode($chk); ?>;
        var type = <?php echo json_encode($type); ?>;
        var qnt = <?php echo json_encode($qnt); ?>;
        var idu = <?php echo json_encode($idMp); ?>;

        ///alert(idu+' Cocher!!!'+chk+' > '+qnt+' > '+type);
    </script>
<?php
	*/

/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////


require_once '../../../model/include.php';

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
require_once '../../../classes/DB.php';
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
    $requete = "UPDATE `produit` SET `DESI`='".htmlentities($DESI)."',
`PRIXA`='".htmlentities($PRIXA)."',`PRIXV`='".htmlentities($PRIXV)."',`QNT`='".htmlentities($QNT)."' WHERE `IDP`=$idp";
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
            'msg' => 'Problème de modification essayer encore..',
            'data' => ''
        );
    }

    echo json_encode($returnData);
}
elseif(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $idp = $_POST['id'];
    extract($_POST);
    // $colvalSet=' DESI="'.$_POST['DESI'].'", PRIXA="'.$_POST['PRIXA'].'", PRIXV="'.$_POST['PRIXV'].'", QNT="'.$_POST['QNT'].'" ';
    $condition = array('IDP' => $_POST['id']);
    // $conditions = ' IDP="'.$_POST['id'].'"';

    // $update = $db->update($table,$colvalSet,$conditions);
    $requete = "UPDATE `produit` SET `FLAG`=1 WHERE `IDP`=$idp";


    $delete = $db->delete($requete);
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
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////EDITOR/////////////////////////////////////////////////////////////////////////////////
if (isset($_REQUEST['idf'])) {

    $idp = strval($_REQUEST['idp']);
    $pu = strval($_REQUEST['pu']);
    $idf = strval($_REQUEST['idf']);
    $qnt = strval($_REQUEST['qnt']);
    $mts = strval($_REQUEST['mts']);
    $type = strval($_REQUEST['type']);
    $idmv = strval($_REQUEST['idmv']);

    $qntI = Test_prdQnt($pid);
    $pa = Test_prdpa($pid);
    $idfa = ID_fam($pid);
    $desif='CAISSE';
    $flag='3';




    $resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=3   AND DESI='$desif'" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        if($rowCat=$resCat->fetch_array())
        {
            $idfc=$rowCat['IDFA'];
            $depc=$rowCat['DEPENSE'];
            $gainc=$rowCat['GAINS'];
            $stock=$rowCat['STOCK'];


            $resfa = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 AND IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP='$pid')) ");
            $countCat = $resfa->num_rows;
            if($countCat > 0)
            {
                if($rowfa=$resfa->fetch_array())
                {
                    $idf=$rowfa['IDFA'];
                    $dep=$rowfa['DEPENSE'];
                    $gain=$rowfa['GAINS'];

                    if($type=="facture" ) {
                        $qntF = $qntI + $qnt;
                        $updd=$dep+($pa*$qnt);
                        $updg=$gain-$mts;
                        $upddc=$depc+$mts;
                        $updgc=$gainc-$mts;
                        $stk=$stockc-$mts;


                    }
                    if($type=="recu" ) {
                        $qntF = $qntI - $qnt;
                        $updd=$dep-$mts;
                        $updg=$gain+$mts;
                        $updd=$depc-$mts;
                        $updg=$gainc+$mts;
                        $stk=$stockc+$mts;

                    }


                    $sql = ("UPDATE PRODUIT SET QNT='$qntF' WHERE IDP='$pid' ");
                    $res = $base->query($sql);


                    if ($res) {
                        //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1

                        $sql = ("UPDATE FAMILLE SET DEPENSE='$updd',GAINS='$updg' WHERE IDFA='$idf' ");
                        $res = $base->query($sql);

                        if ($res) {

                            $sql = ("UPDATE FAMILLE SET DEPENSE='$upd',STOCK='$stk' WHERE DESI='$desif' ");
                            $res = $base->query($sql);
                            if ($res) {
                                //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
                                $sql = ("DELETE FROM `FACTURE` WHERE IDF='$id' ");
                                $res = $base->query($sql);

                                if ($res) {
                                    ?>
                                    <script>
                                        //alert('<?php echo $type." n ".$idf." produit ".$pid." fam ".$id."qnt= ".$qnt."; qntI= ".$qntI."; qntF= ".$qntF." et mts= ".$mts."///  ===>a.gain= ".$gain." ===>n.gain= ".$updg." ===>a.dep= ".$dep." ===>n.dep= ".$updd; ?>');
                                    </script>
                                    <?php

                                    echo "<label>.</label>";
                                }
                            }
                        }
                    }

                }}
            else{

            }


        }}
    else{

    }






}
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////DELETED////////////////////////////////////////////////////////////////////////////////////////////////////////////




if (!empty($_REQUEST['deletep'])) {

    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idMp = intval($_REQUEST['deletep']);
    $chk = $_REQUEST['chk'];
    $cpt2=0;$cpt=0;
    if($qnt>1){
        $a = explode(' ', $chk);
    }
    //UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1

    if ($type == 'produit'){
        if ($qnt == 1 && $chk==""){
            $val='qnt';
            $qntp=Show_Prodref($val,$idMp);
            if($qntp>0){

                $cpt2=$cpt2+1;
            }else{
                $sql= delProd($idMp);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }


        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];
                $val='qnt';
                if($id!='on'){
                    $qntp=Test_prd($val,$id);
                    if($qntp<1){
                        $sql= delProd($id);
                        if($sql==1){
                            $cpt=$cpt+1;

                        }else{
                            $cpt2=$cpt2+1;

                        }

                    }else{
                        $cpt2=$cpt2+1;

                    }
                }

            }
        }
    }

    if ($type == 'categorie'){
        if ($qnt == 1 && $chk==""){
            $val='cat';
            $pexsit=Test_prd($val,$idMp);
            if($pexsit>0){

                $cpt2=$cpt2+1;
            }else{
                $sql= delCat($idMp);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }


        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];
                $val='cat';
                if($id!='on'){
                    $pexsit=Test_prd($val,$id);
                    if($pexsit>0){

                        $cpt2=$cpt2+1;
                    }else{
                        $sql= delCat($id);
                        if($sql==1){
                            $cpt=$cpt+1;

                        }
                    }
                }

            }
        }
    }

    if ($type == 'famille'){
        if ($qnt == 1 && $chk==""){
            $val='fam';
            $pexsit=Test_cat($val,$idMp);
            if($pexsit>0){

                $cpt2=$cpt2+1;
            }else{
                $sql= delFam($idMp);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }


        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];
                $val='fam';
                $pexsit=Test_cat($val,$id);
                if($pexsit>0){

                    $cpt2=$cpt2+1;
                }else{
                    if($id!='on'){
                        $sql= delFam($id);
                        if($sql==1){
                            $cpt=$cpt+1;

                        }else{
                            $cpt2=$cpt2+1;
                        }
                    }

                }
            }
        }
    }

    if ($type == 'condis'){
        if ($qnt == 1 && $chk==""){
            $sql= delCondis($idMp);
            if($sql==1){
                $cpt=$cpt+1;

            }else{
                $cpt2=$cpt2+1;
            }

        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];

                if($id!='on'){
                    $sql= delCondis($id);
                    if($sql==1){
                        $cpt=$cpt+1;

                    }else{
                        $cpt2=$cpt2+1;
                    }
                }

            }
        }
    }
    if ($type == 'mouv'){

        if ($qnt == 1 && $chk==""){
            $sql= delMouv($idMp);
            if($sql==1){
                $cpt=$cpt+1;

            }else{
                $cpt2=$cpt2+1;
            }


        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];
                if($id!='on'){
                    $sql= delMouv($id);
                    if($sql==1){
                        $cpt=$cpt+1;

                    }else{
                        $cpt2=$cpt2+1;
                    }
                }

            }
        }
    }
    if($cpt>0)
    {
        echo $cpt." Elements Supprimer Avec Success ...";
    }
    else
    {

        echo "Supressions Impossible !! ";
    }

}

if (!empty($_REQUEST['deletepD'])) {

    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idMp = intval($_REQUEST['deletepD']);
    $chk = $_REQUEST['chk'];
    $cpt2=0;$cpt=0;
    //UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1

    if ($type == 'produit'){
        $sql= delProd2($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'categorie'){
        $sql= delCat2($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'famille'){
        $sql= delFam2($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'condis'){
        $sql= delCondis2($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'mouv'){

        if ($qnt == 1 && $chk==""){
            $sql= delMouv2($idMp);
            if($sql==1){
                $cpt=$cpt+1;

            }else{
                $cpt2=$cpt2+1;
            }


        }else{
            for($i=1; $i<=$qnt; $i++)
            {
                $id = $a[$i];
                $sql= delMouv2($id);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
        }
    }
    if($cpt>0)
    {
        echo "Elements Supprimer Avec Success ...";
    }
    else
    {

        echo "Impossible de supprimer ce fichier !! ";
    }

}

if (!empty($_REQUEST['restorp'])) {

    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idMp = intval($_REQUEST['restorp']);
    $chk = $_REQUEST['chk'];
    $cpt2=0;$cpt=0;
    //UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1

    if ($type == 'produit'){
        $sql= restorProd($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'categorie'){
        $sql= restorCat($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'famille'){
        $sql= restorFam($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }

    if ($type == 'condis'){
        $sql= restorCondis($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }
    if ($type == 'mouv'){
        $sql= restorMouv($idMp);
        if($sql==1){
            $cpt=$cpt+1;

        }else{
            $cpt2=$cpt2+1;
        }
    }
    if($cpt>0)
    {
        echo "Elements Restauré Avec Success ...";
    }
    else
    {

        echo "Impossible de Restauré cet element !! ";
    }

}











//UPDATE `CATEGORIE` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`DATE_CAT`=[value-3],`NOM_CAT`=[value-4],`FLAG`=[value-5] WHERE 1



if (!empty($_REQUEST['deleteu'])) {

	$pid = $_REQUEST['deleteu'];


	//UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1
   $base->query("UPDATE UTILISATEUR SET FLAG=1 WHERE IDU='$pid'");
    if(!$base)
    { echo mysqli_error();}
    else
    {
        echo "Utilisateur Supprimé Avec Success ...";
    }

}
if (!empty($_REQUEST['sdeleteu'])) {

	$pid = $_REQUEST['sdeleteu'];
	//UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1
    $base->query("UPDATE UTILISATEUR SET FLAG=2 WHERE IDU='$pid'");
    if(!$base)
    { echo mysqli_error();}
    else
    {
        echo "Utilisateur Supprimé Avec Success ...";
    }

}


/////RESTOR////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////RESTOR////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////RESTOR////////////////////////////////////////////////////////////////////////////////////////////////////////////



//UPDATE `CATEGORIE` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`DATE_CAT`=[value-3],`NOM_CAT`=[value-4],`FLAG`=[value-5] WHERE 1



/////MULTIPLE DELETE / RESTOR////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!empty($_POST['mdeleteT'])) {
    $count= $_POST['mdeleteT'];

    $chk = $_POST['chk'];
    $cpt=0;
    $cpt2=0;



    $t = explode(' ', $chk);   $k=0;
    foreach ($t as $key => $value) {
        //echo $key.' => '.$value.'<br>';
        if($key!='on'){

            $tab1[$k] = $value;
            $k=$k+1;

        }
    }
    for($x=0; $x<count($tab1); $x++)
    {
        $pid = $tab1[$x];
        $tab=explode2($pid);
        foreach ($tab as $key => $value) {

            if ($key=='prd') {
                $sql= delProd2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='cat') {
                $sql= delCat2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='condis') {
                $sql= delCondis2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='fam') {
                $sql= delFam2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='user') {
                $sql= delUser2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='fac') {
                $qnf=0;
                $sql= delMouv2($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
        }
    }
    if ($cpt>0) {
        echo $cpt." Elements Supprimés Avec Success ...";
    }else{

        echo $cpt2." Elements non Supprimés !";
    }
}




if (!empty($_POST['mrestorT'])) {
    $count= $_POST['mrestorT'];

    $chk = $_POST['chk'];
    $cpt=0;
    $cpt2=0;


   /* ?>
    <script>
      //  var chk = <?php echo json_encode($chk); ?>;

      //  alert('S...'+ chk);
    </script>
    <?php*/
    $t = explode(' ', $chk);   $k=0;
    foreach ($t as $key => $value) {
        //echo $key.' => '.$value.'<br>';
        if($key!='on'){

            $tab1[$k] = $value;
            $k=$k+1;

        }
    }
    for($x=0; $x<count($tab1); $x++)
    {
        $pid = $tab1[$x];
        $tab=explode2($pid);
        foreach ($tab as $key => $value) {

            if ($key=='prd') {
                $sql= restorProd($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='cat') {
                $sql= restorCat($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='condis') {
                $sql= restorCondis($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='fam') {
                $sql= restorFam($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='user') {
                $sql= restorUser($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
            if ($key=='fac') {
                $qnf=0;
                $sql= restorMouv($value);
                if($sql==1){
                    $cpt=$cpt+1;

                }else{
                    $cpt2=$cpt2+1;
                }
            }
        }
    }
    if ($cpt>0) {
        echo $cpt." Elements Restaurés Avec Success ...";
    }else{
        echo $cpt2." Elements non Restaurés !";
    }
}






























