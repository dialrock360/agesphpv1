<?php

require_once 'includemodel.php';


function updatecaisse($idmv,$dep,$gain,$date,$nommv){
    $insert=0;
    $stock=0;

    $idcaisse=Show_Caisse("id");

    if(Test_ifetat_exist($date,$idcaisse)==1) {
      // echo '<hr/> caisse existe ';

        //////////INFOS CAISSES //////////////


        $ide=Show_Etatref('ide',$date,$idcaisse);
        $AsgainsCS=Show_Etatref('gain',$date,$idcaisse);
        $AsdepCS=Show_Etatref('dep',$date,$idcaisse);
        $AsstockCS=Show_Etatref('stock',$date,$idcaisse);

        //testeetat($idfa,$idmv,$dep,$gain,$stock,$date);
        $gainf=0;
        $stockf=0;
        $depf=0;
        if($nommv=="facture" ) {

            $gainf=$AsgainsCS+$gain;
            $stockf=$AsstockCS+$gain;
            $depf=$AsdepCS;
        }
        if($nommv=="recu" ) {
            $depf=$AsdepCS+$dep;
            $stockf=$AsstockCS-$dep;

            $gainf=$AsgainsCS;


        }
        $insert=updEtat($ide,$depf,$gainf,$stockf,$date);
        /////
/*
        testeetat($idcaisse,$idmv,$AsdepCS,$AsgainsCS,$AsstockCS,$date);
        echo '<hr/> ';
        testeetat(0,0,$dep,$gain,0,0);

        echo '<hr/> ';
        testeetat($idcaisse,$idmv,$depf,$gainf,$stockf,$date);

        echo '<hr/> ';
        echo '<hr/> ';
*/
        //$insert=updEtat($ide,$dep,$gain,$stock,$date);
    }else{
    //  echo '<hr/> caisse n exste pas';
        $stock=($nommv=="facture" )? 0+$gain :0-$dep;

        $insert=  addetat($idcaisse,$idmv,$dep,$gain,$stock,$date);
    }

    return $insert;
}

function updateflux($idfa,$idmv,$nommv,$dep,$gain,$date){



        if($nommv=="facture") {
            $dep=0;
        }else{

            $gain=0;
        }

    if(Test_ifetat_exist($date,$idfa)==1) {
      // echo '<hr/> etat existe ';

        $ide=Show_Etatref('ide',$date,$idfa);
        //////////INFOS FAMILLE //////////////
        $AsGAINS=Show_Etatref('gain',$date,$idfa);
        $AsDEPENSE=Show_Etatref('dep',$date,$idfa);
        $AsDATE=Show_Etatref('date',$date,$idfa);
        $AsIDMV=Show_Etatref('idmv',$date,$idfa);

        //testeetat($idfa,$idmv,$dep,$gain,$stock,$date);
        $gainf=0;
        $depf=0;
        $update=false;
        if($nommv=="facture" ) {

            $AsGAINS=$AsGAINS+$gain;
            $depf=$AsDEPENSE;

            $update=true;
        }
        if($nommv=="recu" ) {
            $depf=$AsDEPENSE+$dep;
            $gainf=$AsGAINS;
            $update=true;


        }

        if(Test_etat($date,$idmv,$idfa)==1) {

       


          //  echo '<hr/> etat trouver';

            //  testeetat($idfa,$idmv,$depf,$gainf,0,$date);

            if($update==true ) {

                $insert=updEtat($ide,$depf,$gainf,0,$date);

                if($insert==1 ) {
                    $insert=updatecaisse($idmv,$dep,$gain,$date,$nommv);
                }
            }else{
				
                $insert=5;
            }
        }
        else{

          // echo '<hr/> etat absent';
            $insert=  addetat($idfa,$idmv,$dep,$gain,0,$date);

            if($insert==1 ) {
                $insert=updatecaisse($idmv,$dep,$gain,$date,$nommv);
            }        }
    }
    else{


      //echo '<hr/> etat n exste pas';
        $insert=  addetat($idfa,$idmv,$dep,$gain,0,$date);
        if($insert==1 ) {
            $insert=updatecaisse($idmv,$dep,$gain,$date,$nommv);
        }
    }


        return $insert;
    }



function Catcher($idp,$objet,$pfqnt)
{
    $selult=0;
    /*  ("SELECT `tabqnt`,`QNT`
  FROM   `produit_cmp` C
          JOIN `PRODUIT` p
              ON C.`IDP` = p.`IDP`
  WHERE   $idp IN (`tabidp`)")*/
    //SELECT `idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv` FROM `produit_cmp` WHERE 1
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM   `produit_cmp` WHERE  `IDP`=$idp");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        $catch= 0;
        if ($row = $resref->fetch_array()) {
            extract($row);

            $qnt = explode(",", $tabqnt);
            $id = explode(",", $tabidp);
            $i=0;
            foreach ($qnt as &$value) {
                //echo $value.' <br>';
                $qntI = Show_Prodref('qnt',$id[$i]);
                $qntF = ($objet=='add')? $qntI+($value*$pfqnt):$qntI-($value*$pfqnt);
                //echo $id[$i].'-- '.$qntF.' <br>';
                $query = FiupdProd($id[$i],$qntF);
                if($query==1){
                    $catch=1;

                };
                $i++;

            }
        }


    }else{
        $catch= 1;
    }
    return $catch;
}




function insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts)
{
    require_once'include.php';
    $idfaM=Souselect_Cat('id',$idp);

    if($nommv=="proforma") {
        $idp=-1;
        $sql = addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis);

    }
    else{
        $valqnt='qnt';
        $qntI = Show_Prodref($valqnt,$idp);
        $qntF=0;
        //////////INFOS CAISSES //////////////

        $desif='CAISSE';

        $idcaisse=Show_Caisse("id");

        $ide=Show_Etatref('ide',$date,$idfaM);
        $AsgainsCS=Show_Etatref('gain',$date,$idfaM);


        //////////INFOS FAMILLE //////////////

        $fcondis='...';
        $fdesi='...';
        $vnt='vente';$vente=Souselect_Cat($vnt,$idp);
        $cht='achat';$achat=Souselect_Cat($cht,$idp);
        $cmp=Souselect_Cat('compta',$idp);
        $idfaM=Souselect_Cat('id',$idp);

        if($nommv=="facture" ) {

            $ngain=$mts;

            $ndep=0;

            $qntF=$qntI-$qnt;
        }
        if($nommv=="recu" ) {


            $ndep=$mts;

            $ngain=0;


            $qntF=$qntI+$qnt;

        }

       // $sql =updateflux($idfaM,$idmv,$nommv,$ndep,$ngain,$date);
	           $sql =1;
        if($sql!=0){

                $sql = addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis);

                if($sql==1){
                    if($cmp==1){
                        $sql = FiupdProd($idp,$qntF);
                    }
                    if($sql==1){
                        if($nommv=="facture") {
                            if(Test_prdcmpbyid($idp)==true) {
                                $sql=Catcher($idp,'remov',$qnt);
                            }else {
                                $sql=1;
                            }
                        }else{
                            $sql=1;
                        }


                    };

                }

        }
        else{
            $sql=0;

        }
       return $sql;
    }






    return $sql ;

}

function updatefact($idmv,$idf,$idp,$fdesi,$fcondis,$nommv,$date,$i,$qnt,$pu,$mts)
{
    require_once'include.php';

    $idfaM=Souselect_Cat('id',$idp);


    if($nommv=="proforma") {
        $idfaM=0;
        $qntF =$qnt;
        $mtsF=$mts;
        $sql = updFac($idf,$pu,$qntF,$mtsF,$date,$i,$fdesi,$fcondis);

    }else{


        $valqnt='qnt';
        $qntI = Show_Prodref($valqnt,$idp);
        $qntF=0;
        //////////INFOS CAISSES //////////////

        $desif='CAISSE';

        $idcaisse=Show_Caisse("id");

        $ide=Show_Etatref('ide',$date,$idfaM);
        $AsgainsCS=Show_Etatref('gain',$date,$idfaM);


        //////////INFOS FAMILLE //////////////

        $fcondis='...';
        $fdesi='...';
        $vnt='vente';$vente=Souselect_Cat($vnt,$idp);
        $cht='achat';$achat=Souselect_Cat($cht,$idp);
        $cmp=Souselect_Cat('compta',$idp);
        $idfaM=Souselect_Cat('id',$idp);


        if($nommv=="facture" ) {
            $qntF = $qntI+$qntT;

            $ngain=$mts;

            $ndep=0;
        }
        if($nommv=="recu" ) {


            $ndep=$mts;

            $ngain=0;


        }
        $idfaM=Souselect_Cat('id',$idp);

        $cmp=Souselect_Cat('compta',$idp);

       // $sql =($nommv=="proforma")?1:updateflux($idfaM,$idmv,$nommv,$ndep,$ngain,$date);
        $sql =1;
        if($sql==1){
			
            if($nommv=="proforma") {
                $sql = updFac($idf,$pu,$qnt,$mts,$date,$i,$fdesi,$fcondis);
				
            }else{
               $sql = updFac($idf,$pu,$qnt,$mts,$date,$i,'...','...');

                    if($sql==1){

                        if($cmp==1){
							
                            $sql = FiupdProd($idp,$qntF);
                        }
                        if($sql==1){

                            if($nommv=="facture") {
                                if(Test_prdcmpbyid($idp)==true) {
                                    $qntic = ($qntIF<$qnt)? $qnt-$qntIF:$qntIF-$qnt;
                                    $sql = ($qntIF<$qnt)? Catcher($idp,'remov',$qntic):Catcher($idp,'add',$qntic);
                                }else {
                                    $sql=1;
                                }

                            }else{
                                $sql=1;
                            }

                        };

                    }

                }
            


        }
    }

    return $sql ;
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


