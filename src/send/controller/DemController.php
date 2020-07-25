<?php

require_once'../model/bd.php';
require_once'../model/functions.php';
require_once'../model/modelfac.php';
require_once'../model/echotest.php';
require_once'../model/functionsTest.php';
require_once'../model/functionsInsert.php';
require_once'../model/include.php';

if(isset($_POST['btnsave'])&& !empty($_POST['btnsave'])){
    require_once'SaveMouvExtractor.php';

    $Ldate = $sdate->format('D-M-Y H:i:s');
    $log = '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <caption>ENREGISTREMENT DE TRANSACTIONS DU ' . $Ldate . ' </caption> <thead> <tr> <th scope="col">##</th> <th scope="col"><strong>MOUVEMENT</strong></th> <th scope="col"><strong>MONTANT</strong></th> <th scope="col"><strong>CLI/FOUR</strong></th> <th scope="col"><strong>OBJET</strong></th> <th scope="col"><strong>DATE</strong></th> </tr> </thead> 
<tbody> <tr> <td>' . $idmv . '</td> <td>' . $nommv . '</td> <td>' . $mtsch . '</td> <td>' . $nom . '</td> <td>MODIFIER ' . $obj . '</td> <td>' . $fdate . '</td> </tr> </tbody> </table> <p>&nbsp;</p>';

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
        }
        else{
            $idcom=Select_idService();
        }

        echo $Test_user.' idc => '.$idcom.'<br>';

    }


    //$idcom=controluser($cni,$nom,$tel,$cacher,$statut,$idacom,$opt);


    if($nommv=='demande'){
        $target='?file=page/proforma';
        require_once'DemExtractor.php';
        $testmv= Test_fpro($date,$nommv,$obj,$cont);

        $insertmv=insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);

    }
    if($nommv=='proforma'){
        $target='?file=page/proforma';
        require_once'FacproExtractor.php';
        $testmv= Test_fpro($date,$nommv,$obj,$cont);

        $insertmv=insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);

    }
    if($nommv=='facture' || $nommv=='recu'){

        if($nommv=='recu'){
            $target='?file=page/recu';

        }
        if($nommv=='facture'){
            $target='?file=page/facture';

        }
        require_once'FacExtractor.php';
        $testmv=Test_fac($date,$nommv,$obj,$mtsch,$cont);
        $insertmv=insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);

    }
    /*
    if($nommv=='facture' || $nommv=='recu'){

        if($nommv=='recu'){
            $target='?file=page/recu';

        }
        if($nommv=='facture'){
            $target='?file=page/facture';

        }
        require_once'FacExtractor.php';
        $testmv=Test_fac($date,$nommv,$obj,$mtsch,$cont);
        //$insertmv=insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);

    }
    if ($testmv == 0){
        $sql=addMouv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);
        $sql=2;
        if ($sql == 1){
            $insert=1;
        }
    }else{
        $insert=0;
    }
    */
    /*  echo '<hr><hr>test '.$testmv.'<hr><hr>';
      echo '<hr><hr>nsert '.$insert.'<hr><hr>';
      testechomuv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher,$opt);
    */

    if ($insertmv == 1){
        if($nommv!="demande" ){
            for($i = 0; $i < $number; $i++) {
                $fdesi=$_POST['nom_'.$i];
                $fcondis=$_POST['condis_'.$i];
                $idp= $_POST['idp_' . $i];
                $qnt= $_POST['qnte_' . $i];
                $pu = $_POST['prix_' . $i];
                $mts= $_POST['ptotal_' . $i];

                // testechofac($idmv, $idp, $idfaM, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, $achat, $vente);
                $insertfact=insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);


            }
            addLog($idmv,$cont,$date);
            // $insertfact=6;
            if($insertfact==1 ) {

                ?>
                <script>
                    alert('<?php echo $nommv." Enregistrée Avec Succès!.!!!"; ?>');
                    window.location.href='../start.php<?php echo $target; ?>';
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert('<?php echo " Erreur ".$nommv." Non Enregistré"; ?>');
                    window.location.href='../start.php<?php echo $target; ?>';
                </script>
                <?php
            }

        }
        else{

            ?>
            <script>
                alert('<?php echo $nommv." Enregistrée Avec Succès!.!!!"; ?>');
                window.location.href='../start.php<?php echo $target; ?>';
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert('<?php echo " Erreur Document Non Enregistré"; ?>');
            window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }

}

if(isset($_POST['update'])&& !empty($_POST['update'])){
    require_once'SaveMouvExtractor.php';
    $idcom = $idacom;
    $Ldate = $sdate->format('D-M-Y H:i:s');
    $log = '<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <caption>MODIFICATION DE TRANSACTIONS DU ' . $Ldate . ' </caption> <thead> <tr> <th scope="col">##</th> <th scope="col"><strong>MOUVEMENT</strong></th> <th scope="col"><strong>MONTANT</strong></th> <th scope="col"><strong>CLI/FOUR</strong></th> <th scope="col"><strong>OBJET</strong></th> <th scope="col"><strong>DATE</strong></th> </tr> </thead> 
<tbody> <tr> <td>' . $idmv . '</td> <td>' . $nommv . '</td> <td>' . $mtsch . '</td> <td>' . $nom . '</td> <td>MODIFIER ' . $obj . '</td> <td>' . $fdate . '</td> </tr> </tbody> </table> <p>&nbsp;</p>';

    //$idcom=controluser($cni,$nom,$tel,$cacher,$statut,$idacom,$opt);
    if($nommv=='proforma'){
        $target='?file=page/proforma';
        require_once'FacproExtractor.php';


    }
    if($nommv=='demande'){
        require_once'DemExtractor.php';
        $target='?file=page/proforma';



    }
    if($nommv=='recu'|| $nommv=='facture'){
        require_once'FacExtractor.php';
        if($nommv=='recu'){
            $target='?file=page/recu';

        }
        if($nommv=='facture'){
            $target='?file=page/facture';

        }


    }
    $valTHT='tht'; $totalhtI=Show_Mvmref($valTHT,$idmv);
    $valTVA='tva'; $tvaI=Show_Mvmref($valTVA,$idmv);
    $valTTC='ttc'; $mtschI=Show_Mvmref($valTTC,$idmv);
    $valLTR='ltr'; $mtsltrI=Show_Mvmref($valLTR,$idmv);
    $valAVANS='avans'; $avansI=Show_Mvmref($valAVANS,$idmv);
    $valREST='reste'; $resteI=Show_Mvmref($valREST,$idmv);
    // testechomuv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher,$opt);
    // echo '<hr>'.$updMouv;

    $updfc=updMouv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste);

    if ($updfc == 1){
        if($nommv!="demande" ){
            for($i = 0; $i < $number; $i++) {
                if($nommv=="recu" || $nommv=="facture") {
                    $idp= $_POST['idp_'.$i];
                    $fdesi='...';
                    $fcondis='...';
                }
                if($nommv=="proforma" ){
                    $fdesi=$_POST['nom_'.$i];
                    $fcondis=$_POST['condis_'.$i];
                    $idp=-1;
                }

                $idf= $_POST['idfac_'.$i];
                $qnt= $_POST['qnte_'.$i];
                $pu = $_POST['prix_'.$i];
                $mts= $_POST['ptotal_'.$i];

                $Test_factref=Test_factref($idf);

                if($Test_factref==1){


                    $valmts='mts';
                    $valqnt='qnt';
                    $valmtsI=Show_Facref($valmts,$idf);
                    $valqntI=Show_Facref($valqnt,$idf);




                    // ECHO $valmtsI.' => '.$mts.'<BR>';


                    //testechofac2($idmv, $idp, $idfaM, $pu, $qnt,$qntI,$qntF, $mts,$mtsI,$mtsF,$nommv, $date, $i, $fdesi, $fcondis,$ndep, $ngain, $fDEPENSE, $fGAINS,$fdepCS, $fgainsCS,$fstockCS, $desif, $ndepCS, $ngainCS, $nstockCS);


                    if($valmtsI!=$mts || $valqntI!=$qnt){

                        $updfc= updatefact($idf,$idp,$fdesi,$fcondis,$nommv,$date,$i,$qnt,$pu,$mts);

                    }else{
                        $updfc=1;
                    }
                }
                else{

                    $updfc=insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);

                }
                // testechofac($idmv, $idp, $idfaM, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, $achat, $vente);


            }
            addLog($idmv,$cont,$date);
        }
        ?>
        <script>
            alert('<?php echo $nommv." Mis à Jour Avec Succès!.!!!"; ?>');
            window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('<?php echo " Erreur Document Non Mis à Jour"; ?>');
            window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }


}
if(isset($_POST['savecmp'])&& !empty($_POST['savecmp'])){

}
?>