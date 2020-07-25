<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/22/17
 * Time: 1:26 PM
 */
require_once 'functionsTest.php';
require_once 'echotest.php';

/*********************************************************************************************************************************************************************/
/**********************************************************INSERT USERS OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adress,$email,$tel,$userpic,$info,$cacher,$flag){
    include 'bd.php';


    $sql = "INSERT INTO `UTILISATEUR`(`CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG`) VALUE ('$cni','$prenom','$nom','$login','$sexe','$poste',$salaire,'$statut','$daten','$datem',$secu,'$passe','$adress','$email','$tel','$userpic','$info','$cacher',0)";
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
/**********************************************************INSERT PRD OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addCat($idf,$nom,$ach,$vent,$compt){
    include 'bd.php';

//INSERT INTO `categorie`(`IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`,`COMPT`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
    $sql = "INSERT INTO `categorie`
 VALUE (NULL,$idf,'$nom',$ach,$vent,$compt,0)";
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
function addFam($idn,$nom,$dep,$gain,$stk,$col){
    include 'bd.php';
 
//INSERT INTO `famille`(`IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `ACHAT`, `VENTE`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])

    $sql = "INSERT INTO `famille`(`DESI`, `COLOR`, `FLAG`)
 VALUE ('$nom','$col',0)";
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
function addCaisse($mts){
    include 'bd.php';

//INSERT INTO `fond`(`id`, `capital`) VALUES ([value-1],[value-2]);

    $sql = "INSERT INTO `fond`
 VALUE (NULL, `$mts`)";
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

function addCondis($nom){
    include 'bd.php';

//INSERT INTO `condis`(`IDC`, `NOMC`, `FLAG`) VALUES ([value-1],[value-2],[value-3])
    $sql = "INSERT INTO `condis`(`NOMC`, `FLAG`)
 VALUE ('$nom',0)";
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
function addProd($idc,$cat,$desi,$img,$pa,$pv,$fiche){
    include 'bd.php';
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "INSERT INTO `produit`( `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`)
VALUES ($idc,$cat,'$desi','$img',$pa,$pv,0,'$fiche',0)";
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
/**********************************************************INSERT FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addMouv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher)
{
    include 'bd.php';
//INSERT INTO `mouvement`(`IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15])

    $sql = "INSERT INTO `mouvement`(`IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG`)
 VALUES ($idmv,$idcom,'$nommv','$date','$obj','$cont','$totalht','$tva','$mtsch','$mtsltr','$reg','$avans','$reste','$cacher',0)";
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


function addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis)
{
    include 'bd.php';
//INSERT INTO `facture`(`IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
     $sql = "INSERT INTO `facture`(`IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`)  VALUES (NULL,$idmv, $idp, $pu, $qnt, $mts, $i, '$fdesi', '$fcondis')";
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
function addLog($mv,$cont,$dat){
    include 'bd.php';
//INSERT INTO `log`(`idl`, `idmv`, `conten`, `datelog`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

    $sql = "INSERT INTO `log`(`idmv`, `conten`, `datelog`, `flag`) VALUES ($mv,'$cont','$dat',0)";
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

function addRdv($typerdv,$nom,$email,$tel,$daterdv,$content,$statut){
    include 'bd.php';

//INSERT INTO `rdv`(`idrdv`, `typerdv`, `nom`, `email`, `tel`, `daterdv`, `contenrdv`, `statut`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
    $sql = "INSERT INTO `rdv`( `typerdv`, `nom`, `email`, `tel`, `daterdv`, `contenrdv`, `statut`, `flag`) VALUES 
('$typerdv','$nom','$email','$tel','$daterdv','$content','$statut',0)";
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



function addservice($ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo){
    include 'bd.php';

    //INSERT INTO `service`(`ids`, `ninea`, `nom`, `sigle`, `email`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    $sql = "INSERT INTO `service`(`ids`, `ninea`, `nom`, `sigle`, `email`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`) VALUES 
            (NULL ,'$ninea','$nom','$sigle','$email','$tel','$adress','$secteur_E','$type','$ca','$logo')";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    //testeserv('add',1,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);
    mysqli_close($base);
    return $sms;

}


function addproduitcmp($idcmp,$tabid,$tabqnt,$tabtms,$totalht){

    include 'bd.php';
//INSERT INTO `produit_cmp`(`idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])

    $sql = "INSERT INTO `produit_cmp`(`idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv`) VALUES 
            (NULL ,$idcmp,'$tabid','$tabqnt','$tabtms','$totalht')";
   if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    //testeserv('add',1,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);
    mysqli_close($base);
    return $sms;

}
function addetat($idfa,$idmv,$dep,$gain,$stock,$date){
    include 'bd.php';
	
$fdep = str_replace(",", ".", $dep);
$fgain = str_replace(",", ".", $gain);
$fstock = str_replace(",", ".", $stock);
//INSERT INTO `etat_compte`(`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
//  $sql = "INSERT INTO `etat_compte` VALUES (NULL,$idfa,$idmv,'$dep','$gain','$stock','$date')";
     $sql = "INSERT INTO `etat_compte` (`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES 
            (NULL,$idfa,$idmv,'$fdep','$fgain','$fstock','$date')";
   if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    //testeserv('add',1,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);
    mysqli_close($base);
    return $sms;

}
function Maddetat($tab){

$chaine=implode(",",$tab);
    include 'bd.php';
//INSERT INTO `etat_compte`(`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

     $sql = "INSERT INTO `etat_compte` (`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`)
VALUES 
         ".$chaine." ";
  if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    //testeserv('add',1,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);
    mysqli_close($base);
    return $sms; 

}
/*********************************************************************************************************************************************************************/
/**********************************************************INSERT MOUVEMENT OPTION////////////////////////////////////////////////////***********************************************************************************************************/


?>