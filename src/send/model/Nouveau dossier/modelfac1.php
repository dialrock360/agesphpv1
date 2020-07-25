<?php


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////****** MODEL ETUDIANT ET NOTE******///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///
//
function controluser($cni,$nom,$tel,$cacher,$statut,$idacom,$opt)
{
    require_once'include.php';
    if($opt==1) {


        $idcom = $idacom;
    }
    if($opt==0){

        $idcom=Select_idService();

    }
    if($opt==2){
        $Test_user= Test_user($tel,$nom);
        if($Test_user==0){
            $idcom=insertuser($cni,$nom,$tel,$cacher,$statut,$idacom);
        }else{
            $idcom=Select_idService();
        }
    }

    return $idcom;
}
function insertuser($cni,$nom,$tel,$cacher,$statut,$idacom)
{
    require_once'include.php';
    include "bd.php";

    $flag=0;
    $info='...';
    $secu=0;
    $prenom=0;
    $poste=0;
    $login='.';
    $salaire=0;
    $datem=date("Y/m/d");
    $daten=date("Y/m/d");
    $passe=0;
    $adresse=0;
    $sexe="AUTRE";
    $email='...';
    $userpic='...';

    $insert=addUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info,$cacher,$flag);

    if( $insert==1) {
        $idcom=$idcom=Show_quickidu($tel,$nom);

    }
    else{
        $idcom=$idacom;
    }
    return $idcom;
}

function insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher)
{
    require_once'include.php';


    $insert=0;
    if($nommv=="proforma" || $nommv=="demande" ) {

        $testmv=Test_fac($date,$nommv,$obj,$mtsch,$cont);
    }else{
        $testmv= Test_fpro($date,$nommv,$obj,$cont);
    }
    if ($testmv == 0){
        $sql=addMouv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);
        if ($sql == 1){
            $insert=1;
        }
    }

    return $insert ;
}


function insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts)
{
    require_once'include.php';


    if($nommv=="proforma") {
        $idfaM=0;
        $vente=0;
        $achat=0;
        $idp=-1;

    }
    else{
        $valqnt='qnt';
        $qntI = Show_Prodref($valqnt,$idp);

        //////////INFOS CAISSES //////////////

        $desif='CAISSE';
        $val2='gain';  $gainsCS=Show_Caisse($val2);
        $val3='stock'; $stockCS=Show_Caisse($val3);
        $val4='dep';   $depCS =Show_Caisse($val4);

        //////////INFOS CAISSES //////////////

        //////////INFOS FAMILLE //////////////

        $prod='prod';  $idfaM=Show_FAref($prod,$idp);
        $gain='gain';  $GAINS=Show_FAref($gain,$idfaM);
        $dep='dep'; $DEPENSE =Show_FAref($dep,$idfaM);

        //////////INFOS FAMILLE //////////////

        $fcondis='...';
        $fdesi='...';
        $vnt='vente';$vente=Souselect_Cat($vnt,$idp);
        $cht='achat';$achat=Souselect_Cat($cht,$idp);

        if($nommv=="facture" ) {

            $ngain=$GAINS+$mts;
            $ngainCS=$gainsCS+$mts;
            $nstockCS=$stockCS+$mts;


            $ndep=$DEPENSE;
            $ndepCS=$depCS;

            $qntF=$qntI-$qnt;
        }
        if($nommv=="recu" ) {


            $ndep=$DEPENSE+$mts;
            $ndepCS=$depCS+$mts;
            $nstockCS=$stockCS-$mts;

            $ngain=$GAINS;
            $ngainCS=$gainsCS;


            $qntF=$qntI+$qnt;

        }
    }

    $sql = addFac($idmv, $idp, $idfaM, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, $achat, $vente);
    if($sql==1){
        if($nommv=="proforma") {
            $sql=1;
        }
        else{

            $sql = FiupdFam($idfaM,$ndep,$ngain);

            if($sql==1)
            {
                $sql = updCaisse($desif,$ndepCS,$ngainCS,$nstockCS);
                if($sql==1){
                    $sql = FiupdProd($idp,$qntF);
                    if($sql==1){
                        $sql=1;

                    };

                }

            }
        }
    }
    return $sql ;
}

function updatefact($idf,$idp,$fdesi,$fcondis,$nommv,$date,$i,$qnt,$pu,$mts)
{
    require_once'includedao.php';


    if($nommv=="proforma") {
        $idfaM=0;
        $qntF =$qnt;
        $mtsF=$mts;

    }
    else{
        $valqnt='qnt';
        $valmts='mts';
        $qntI = Show_Prodref($valqnt,$idp);
        $mtsI = Show_Facref($valmts,$idp);

        //////////INFOS CAISSES //////////////

        $desif='CAISSE';
        $val2='gain';  $fgainsCS=Show_Caisse($val2);
        $val3='stock'; $fstockCS=Show_Caisse($val3);
        $val4='dep';   $fdepCS =Show_Caisse($val4);

        //////////INFOS CAISSES //////////////

        //////////INFOS FAMILLE //////////////

        $prod='prod';  $idfaM=Show_FAref($prod,$idp);
        $gain='gain';  $fGAINS=Show_FAref($gain,$idfaM);
        $dep='dep'; $fDEPENSE =Show_FAref($dep,$idfaM);

        //////////INFOS FAMILLE //////////////

        $fcondis='';
        $fdesi='';

        if ($qntI!=$qnt) {

            $qntT = $qnt- $qntI;
            $qntF = $qntI + ($qntT );

            $mtsF = $qntF*$pu;
            $stockCS=$fstockCS-$mtsI;

        }
        if ($qntI==$qnt) {

            $qntF =$qnt;
            $mtsF=$mts;
        }

        if($nommv=="facture" ) {
            if ($qntI<$qnt) {
                $qntF = $qnt;
                $mtsF = $qntF*$pu;
                $stockCS=$fstockCS-$mtsI;

            }
            $GAINS=$fGAINS-$mtsI;
            $gainsCS=$fgainsCS-$mtsI;

            $ngain=$GAINS+$mtsF;
            $ngainCS=$gainsCS+$mtsF;
            $nstockCS=$stockCS+$mtsF;


            $ndep=$fDEPENSE;
            $ndepCS=$fdepCS;

        }
        if($nommv=="recu" ) {



            $DEPENSE=$fDEPENSE-$mtsI;
            $depCS =$fdepCS-$mtsI;

            $ndep=$DEPENSE+$mtsF;
            $ndepCS=$depCS+$mtsF;
            $nstockCS=$stockCS+$mtsF;

            $ngain=$GAINS;
            $ngainCS=$gainsCS;


            $qntF=$qntI+$qnt;

        }
    }

    $sql = updFac($idf,$pu,$qntF,$mtsF,$date,$i,$fdesi,$fcondis);
    if($sql==1){
        if($nommv=="proforma") {
            $sql=1;
        }
        else{

            $sql = FiupdFam($idfaM,$ndep,$ngain);

            if($sql==1)
            {
                $sql = updCaisse($desif,$ndepCS,$ngainCS,$nstockCS);
                if($sql==1){
                    $sql = FiupdProd($idp,$qntF);
                    if($sql==1){
                        $sql=1;

                    };

                }

            }
        }
    }
    return $sql ;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


