<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/22/17
 * Time: 1:26 PM
 */

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE USERS OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adress,$email,$tel,$userpic,$info,$idu){
    include 'bd.php';


    $sql = "UPDATE `utilisateur` SET `CNI`='$cni',`PRENOM_USER`='$prenom',`NOM_USER`='$nom',`LOGIN`='$login',`SEXE_USER`='$sexe',
    `POSTE`='$poste',`SALAIRE`='$salaire',`STATUT`='$statut',`DATNAIS`='$daten',`DATEM`='$datem',`LEVESECURITY`='$secu',
    `PASSE`='$passe',`ADRESS`='$adress',`EMAIL`='$email',`NUM_UER`='$tel',`PHOTO`='$userpic',`INFOS`='$info' WHERE `IDU`='$idu'";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;

    }
    else {
        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE PRD OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updCat($cat,$idf,$nom,$ach,$vent,$compt){
    include 'bd.php';

//UPDATE `categorie` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`NOM_CAT`=[value-3],`ACHAT`=[value-4],`VENTE`=[value-5],`FLAG`=[value-6] WHERE 1
    $sql = "UPDATE `categorie` SET `IDFA`='$idf',
`NOM_CAT`='$nom',`ACHAT`=$ach,`VENTE`=$vent,`COMPT`=$compt WHERE ID_CAT=$cat";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

function FiupdFam($ifa,$dep,$gain){
    include 'bd.php';

//UPDATE `famille` SET `IDFA`=[value-1],`DESI`=[value-2],`DEPENSE`=[value-3],`GAINS`=[value-4],`STOCK`=[value-5],`COLOR`=[value-6],`FLAG`=[value-7] WHERE 1

    $sql = "UPDATE `famille` SET `DEPENSE`='$dep',`GAINS`='$gain' WHERE `IDFA`=$ifa";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updCaisse($mts){
    include 'bd.php';
//INSERT INTO `fond`(`id`, `capital`) VALUES ([value-1],[value-2]);

    $sql = "UPDATE `fond` SET `capital`='$mts' WHERE `id`=1";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updFam($ifa,$nom,$col){
    include 'bd.php';

//UPDATE `famille` SET `IDFA`=[value-1],`DESI`=[value-2],`DEPENSE`=[value-3],`GAINS`=[value-4],`STOCK`=[value-5],`COLOR`=[value-6],`FLAG`=[value-7] WHERE 1

    $sql = "UPDATE `famille` SET `DESI`='$nom',
`COLOR`='$col' WHERE `IDFA`=$ifa";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

function updCondis($nom,$idc){
    include 'bd.php';

//UPDATE `condis` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
    $sql = "UPDATE `condis` SET `NOMC`='$nom' WHERE `IDC`=$idc";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

function updProd($idp,$idc,$cat,$desi,$img,$pa,$pv,$qnt,$fiche){
    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `IDC`=$idc,`ID_CAT`=$cat,`DESI`='$desi',`PHOTO`='$img',
`PRIXA`='$pa',`PRIXV`='$pv',`QNT`='$qnt',`FTECH`='$fiche' WHERE `IDP`=$idp";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updEtat($ide,$dep,$gain,$stock,$date){
    include 'bd.php';
//UPDATE `etat_compte` SET `IDE`=[value-1],`IDFA`=[value-2],`IDMOUV`=[value-3],`DEPENSE`=[value-4],`GAINS`=[value-5],`STOCK`=[value-6],`DATEE`=[value-7] WHERE 1

    $sql = "UPDATE `etat_compte` SET `DEPENSE`='$dep',`GAINS`='$gain',`STOCK`='$stock',`DATEE`='$date'  WHERE `IDE`=$ide";

    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function FiupdProd($idp,$qnt){
    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `QNT`='$qnt' WHERE `IDP`=$idp";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

function Roomcleaner(){
    Chargecleaner();
    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    //SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flag` FROM `categorie` WHERE 1


    $resCat = $MySQLiconn->query("SELECT * FROM `produit` WHERE ID_CAT IN ( SELECT `ID_CAT` FROM `CATEGORIE` WHERE `ACHAT`=0 and VENTE=1 and `COMPT`=0)" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {
            extract($rowCat);

            $sms= FiupdProd($IDP,1);
        }
    }
    return $sms;
}
function Chargecleaner(){
    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    //SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flag` FROM `categorie` WHERE 1


    $resCat = $MySQLiconn->query("SELECT * FROM `produit` WHERE ID_CAT IN ( SELECT `ID_CAT` FROM `CATEGORIE` WHERE `ACHAT`=1 and VENTE=0 and `COMPT`=0)" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {
            extract($rowCat);

            $sms= FiupdProd($IDP,1);
        }
    }
    return $sms;
}
function EupdProd($idp,$qnt){

    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `QNT`='$qnt' WHERE `IDP`=$idp";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updMouv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste)
{
    include 'bd.php';
//UPDATE `mouvement` SET `IDMV`=[value-1],`IDU`=[value-2],`NOMMV`=[value-3],`DATE_DEL`=[value-4],`OBJET`=[value-5],`CONTEN`=[value-6],`TOTALHT`=[value-7],`TVA`=[value-8],`MTSCH`=[value-9],`MTSLTR`=[value-10],`REG`=[value-11],`AVANS`=[value-12],`RESTE`=[value-13],`CACHER`=[value-14],`FLAG`=[value-15] WHERE 1

    $sql = "UPDATE `mouvement` SET `IDU`=$idcom,`NOMMV`='$nommv',`DATE_DEL`='$date',`OBJET`='$obj',`CONTEN`='$updcont',
    `TOTALHT`='$totalht',`TVA`=$tva,`MTSCH`='$mtsch',`MTSLTR`='$mtsltr',`REG`='$reg',`AVANS`='$avans',
    `RESTE`='$reste' WHERE `IDMV`=$idmv ";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;

    }
    else {
        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updFac($idf, $pu, $qnt, $mts, $i, $fdesi, $fcondis)
{
    include 'bd.php';
//UPDATE `facture` SET `IDF`=[value-1],`IDMV`=[value-2],`IDP`=[value-3],`IDFA`=[value-4],`PU`=[value-5],`QNT`=[value-6],`MTS`=[value-7],`TYPEF`=[value-8],`DATEF`=[value-9],`ROW`=[value-10],`FDESI`=[value-11],`FCONDIS`=[value-12],`ACHAT`=[value-13],`VENTE`=[value-14],`FLAG`=[value-15] WHERE 1

    $sql = "UPDATE `facture` SET `PU`='$pu',`QNT`='$qnt',
`MTS`='$mts',`ROW`=$i,
`FDESI`='$fdesi',`FCONDIS`='$fcondis' WHERE `IDF`=$idf";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

function updLog($idl,$cont,$dat){
    include 'bd.php';
//INSERT INTO `log`(`idl`, `idmv`, `conten`, `datelog`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

    $sql = "UPDATE `log` SET `conten`='$cont',`datelog`='$dat' WHERE `idmv`='$idl'";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updservice($id,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo){
    include 'bd.php';
//UPDATE `service` SET `ids`=[value-1],`ninea`=[value-2],`nom`=[value-3],`sigle`=[value-4],`email`=[value-5],`tel`=[value-6],`adress`=[value-7],`secteur_E`=[value-8],`type`=[value-9],`ca`=[value-10],`logo`=[value-11] WHERE 1

    $sql = "UPDATE `service` SET `ninea`='$ninea',`nom`='$nom',`sigle`='$sigle',`email`='$email',`tel`='$tel',`adress`='$adress',`secteur_E`='$secteur_E',`type`='$type',`ca`='$ca',`logo`='$logo'  WHERE `ids`=$id";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}
function updfrontend($libele,$cible,$section){
    include 'bd.php';
//UPDATE `frontend` SET `IDFR`=[value-1],`LIBELE`=[value-2],`CIBLE`=[value-3],`FSECTION`=[value-4] WHERE 1

    $sql = "UPDATE `frontend` SET `LIBELE`='$libele',`CIBLE`='$cible' WHERE `FSECTION`='$section'";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;
}

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/


?>