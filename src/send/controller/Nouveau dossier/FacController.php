<?php
require_once'../model/include.php';
if($_POST['btnsave']){
    $titre='ENREGISTREMENT';
}else{
    $titre='MODIFICATION';
}


if(isset($_POST['mudatefond']) && !empty($_POST['mudatefond'])){
	$target='?file=page/caisse';
    $date = $_POST['datee'];
	
	
}




if(isset($_POST['btnsave']) && !empty($_POST['btnsave'])){
    require_once'SaveMouvExtractor.php';

    if($nommv=='demande'){
        $target='?file=page/proforma';
        require_once'DemExtractor.php';



    }
    if($nommv=='proforma'){
        $target='?file=page/proforma';
        require_once'FacproExtractor.php';

    }
    if($nommv=='facture' || $nommv=='recu'){

        if($nommv=='recu'){
            $target='?file=page/recu';

        }
        if($nommv=='facture'){
            $target='?file=page/facture';

        }
        require_once'FacExtractor.php';

    }

if ($nommv=="demande" ){
    $insertmv=insertmv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);

}else{
            if ($nommv!="demande" ){
                if($nommv=="proforma" ) {

                    $testmv= Test_fpro($date,$nommv,$obj,$cont);
                }else{

                    $testmv=Test_fac($date,$nommv,$obj,$mtsch,$cont);
                }

                if ($testmv == 0){
                    for($i = 0; $i < $number; $i++) {
$testfac=0;
                        $fdesi=$_POST['nom_'.$i];
                        $fcondis=$_POST['condis_'.$i];
                        $idp= $_POST['idp_' . $i];
                        $qnt= $_POST['qnte_' . $i];
                        $pu = $_POST['prix_' . $i];
                        $mts= $_POST['ptotal_' . $i];
                        // testechofac($idmv, $idp, 0, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, 0, 0);
                        //$testfac=Test_facture($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);
                        $testfac=Test_facture($idp,$idmv,$qnt,$pu,$mts,$i);

                            
							 if ( Test_prdcmpbyid($idp) == true){
                                 if (Prdcmp_testdispo($idp) < $qnt){
                                 $ret='un des produits a une quantite superieur au stock disponible';
                                 break;
								} 
                             }
                        if ($testfac == 1){
                            $ret='cette facture existe deja';

                            break;
                        }
                    }
                    if ($testfac == 0){
                        for($i = 0; $i < $number; $i++) {
                            $fdesi=$_POST['nom_'.$i];
                            $fcondis=$_POST['condis_'.$i];
                            $idp= $_POST['idp_' . $i];
                            $qnt= $_POST['qnte_' . $i];
                            $pu = $_POST['prix_' . $i];
                            $mts= $_POST['ptotal_' . $i];

                            //testechofac($idmv, $idp, 0, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, 0, 0);
                            $addfact=insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);
                            if ($addfact == 0){
                                $addfact=0;
                                $ret='problemme d\'insertion a la base de donnee';

                                break;
                            }
                        }
                    }
                }
                if ($addfact == 1){
                     $insertmv = addMouv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher);
                }
            }
    }

if ($insertmv == 1){
    addLog($idmv,$cnt,$Ldate);

    ?>
    <script>
        alert('<?php echo $nommv." Enregistrée Avec Succès!.!!!"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}
else if ($insertmv == 9){
    ?>
    <script>
        alert('<?php echo " Erreur ".$nommv." existe deja"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}else{
    ?>
    <script>
        alert('<?php echo " Erreur ".$nommv." Non Enregistré"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}



}




if(isset($_POST['update'])&& !empty($_POST['update'])){

    require_once'SaveMouvExtractor.php';
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

    //updLog($idmv,$cnt,$Ldate);
    // echo '<hr>'.$updMouv;
if ($nommv=="demande" ){
    $updfc=updMouv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste);
}else{
	 if($nommv!="demande" ){
		   for($i = 0; $i < $number; $i++) {
                if($nommv=="proforma" ){
                    $fdesi=$_POST['nom_'.$i];
                    $fcondis=$_POST['condis_'.$i];
                    $idp=-1;
                }else {
                    $idp= $_POST['idp_'.$i];
                    $fdesi='...';
                    $fcondis='...';
                }

                if(isset($_POST['idfac_'.$i])){

                    $idf= $_POST['idfac_'.$i];
                }
                else{
                    $idf=-1;
                }
                $qnt= $_POST['qnte_'.$i];
                $pu = $_POST['prix_'.$i];
                $mts= $_POST['ptotal_'.$i];

                $Test_factref=Test_factref($idf);

                if($Test_factref==1){
                       

                    $valmtsI=Show_Facref('mts',$idf);
                    $valqntI=Show_Facref('qnt',$idf);




                    //ECHO $valmtsI.' => '.$mts.' => '.$valdateI.'<BR>';


                    //testechofac2($idmv, $idp, $idfaM, $pu, $qnt,$qntI,$qntF, $mts,$mtsI,$mtsF,$nommv, $date, $i, $fdesi, $fcondis,$ndep, $ngain, $fDEPENSE, $fGAINS,$fdepCS, $fgainsCS,$fstockCS, $desif, $ndepCS, $ngainCS, $nstockCS);
				    $updfc=($valmtsI!=$mts)? updatefact($idmv,$idf,$idp,$fdesi,$fcondis,$nommv,$date,$i,$qnt,$pu,$mts):1;

                }
                else{
                      $testfac=Test_facture($idp,$idmv,$qnt,$pu,$mts,$i);

                            
							 if ( Test_prdcmpbyid($idp) == true){
                                 if (Prdcmp_testdispo($idp) < $qnt){
                                 $ret='un des produits a une quantite superieur au stock disponible';
                                 break;
								} 
                             }
                        if ($testfac == 1){
                            $ret='cette facture existe deja';

                            break;
                        }
                            $updfc=insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);

                }
                // testechofac($idmv, $idp, $idfaM, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, $achat, $vente);


            }
			if ($updfc==1 ){
				$updfc=updMouv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste);
			}
			 
}
} 
  
if ($updfc == 1){
    addLog($idmv,$cnt,$Ldate);

    ?>
    <script>
        alert('<?php echo $nommv." Mis à Jour Avec Succès!.!!!"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}else{
    ?>
    <script>
        alert('<?php echo " Erreur ".$nommv." Non Mis à Jour"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}

}



if(isset($_POST['savecmp'])&& !empty($_POST['savecmp'])){
    $target='?file=page/stock';
    $totalht = $_POST['totalht'];
    $number = $_POST['ligne'];
    $idcmp = $_POST['idcmp'];
    $tabqnt='';
    $tabid='';
    for($i = 0; $i < $number; $i++) {
        $fdesi=$_POST['nom_'.$i];
        $fcondis=$_POST['condis_'.$i];
        $idp= $_POST['idp_' . $i];
        $qnt= $_POST['qnte_' . $i];
        $pu = $_POST['prix_' . $i];
        $mts= $_POST['ptotal_' . $i];
        //$tabid=$tabid.','.$idp;
        $sep = ($i > 0)?', ':'';
        $tabid = $tabid.$sep.$idp;
        $tabqnt = $tabqnt.$sep.$qnt;
        $tabtms = $tabtms.$sep.$mts;
   // testechofac($idcmp, $idp, 1, $pu, $qnt, $mts,'cmp', $date, $i, $fdesi, $fcondis, 0, 0);

    }


if(Test_prdcmp($idcmp)==0)
{
    if (addproduitcmp($idcmp,$tabid,$tabqnt,$tabtms,$totalht)){
        ?>
        <script>
            alert('<?php echo " Composition réussi !.!!!"; ?>');
            window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('<?php echo " Erreur produit Non composé..!"; ?>');
            window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }
}else{
    ?>
    <script>
        alert('<?php echo " Erreur ce produit est deja composé..!!"; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}



   // echo  $number.' tt '.$totalht.' id'.$idcmp;

}


if(isset($_POST['updatecmp'])&& !empty($_POST['updatecmp'])){
    $target='?file=page/stock';
    $id = $_POST['id'];
    $totalht = $_POST['totalht'];
    $number = $_POST['ligne'];
    $idcmp = $_POST['idcmp'];
    for($i = 0; $i < $number; $i++) {
        $fdesi=$_POST['nom_'.$i];
        $fcondis=$_POST['condis_'.$i];
        $idp= $_POST['idp_' . $i];
        $qnt= $_POST['qnte_' . $i];
        $pu = $_POST['prix_' . $i];
        $mts= $_POST['ptotal_' . $i];
        //$tabid=$tabid.','.$idp;
        $sep = ($i > 0)?', ':'';
        $tabid = $tabid.$sep.$idp;
        $tabqnt = $tabqnt.$sep.$qnt;
        // testechofac($idcmp, $idp, 1, $pu, $qnt, $mts,'cmp', $date, $i, $fdesi, $fcondis, 0, 0);
        //$insertfact=insertfact($idp,$fdesi,$fcondis,$nommv,$idmv,$date,$i,$qnt,$pu,$mts);

    }
    //  $number.' tt '.$totalht.' id'.$idcmp;

}



if(isset($_POST['saveetat'])&& !empty($_POST['saveetat'])){
    $target='?file=page/caisse';
    $date = $_POST['datee'];
    $target='?file=page/caisse';
    $date = $_POST['datee'];
     $nbrreg= $_POST['nbrreg'];
    if($nbrreg==0)
    {
        ?>
        <script>
            alert('<?php echo " liste vide !."; ?>');
           window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }
	$x=0;
for($j = 0; $j < $nbrreg; $j++) {
    $number=$_POST['ligne_'.$j];
       $date=$_POST['date_'.$j];
	   $datealpha="3019-03-15";
	    $mts=0;
    $cpt1=0;
    $cpt2=0;
    $str='';
    if($number==0)
    {
        ?>
        <script>
            alert('<?php echo " etat vide !."; ?>');
              window.location.href='../start.php<?php echo $target; ?>';
        </script>
        <?php
    }
    for($i = 0; $i < $number+1; $i++) {
		
        $desi=$_POST['nom_'.$j.'_'.$i].'<hr>';
        $idfa=$_POST['idfa_'.$j.'_'.$i];
        $dep=$_POST['dep_'.$j.'_'.$i];
        $gain= $_POST['gain_' .$j.'_'.$i];
        $stock= $_POST['stock_' .$j.'_'.$i];
       
        if(Test_etat($date,0,$idfa)==0)
        {
			 $tchaine[$x]="(NULL,".$idfa.",0,'".$dep."','".$gain."','".$stock."','".$date."')<hr>";
			;
			
			//if(Maddetat(tri_bulle($tchaine))>0)
				//$insert=addetat($idfa,0,$dep,$gain,$stock,$date);
			if(addetat($idfa,0,$dep,$gain,$stock,$date))
				{
					$cpt1++;
					
				}
          if($date<$datealpha && $stock!=0)
			{
			  $datealpha=$date;
			   $mts=$stock;
				
			}  
        }else{
            $str.=$desi.', ';
            $cpt2++;
        }

        // testechofac($idcmp, $idp, 1, $pu, $qnt, $mts,'cmp', $date, $i, $fdesi, $fcondis, 0, 0);
		$x++;

    } 

	
	
			

}

    if($cpt1>0)
    {
        if($cpt2>0)
        {
            $sms=$str.' sont deja enregister pour cette date mais '.$cpt1.'enregistrement on reussi ';
        }else{
			$insert=updCaisse($mts);
            $sms= $cpt1." Composition réussi !.!!!";
        }

    }else{
        $sms=  " Erreur etat(s) de compte Non enregistré(s)..!";
    }

    ?>
    <script>
        alert('<?php echo $sms; ?>');
       window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php


    // echo  $number.' tt '.$totalht.' id'.$idcmp;

}


if(isset($_POST['updatetat'])&& !empty($_POST['updatetat'])){
    $target='?file=page/caisse';
    $date = $_POST['datee'];
   echo $number = $_POST['ligne'];
if($number==0)
{
    ?>
    <script>
        alert('<?php echo " etat vide !."; ?>');
       window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}
    $cpt1=0;
    $cpt2=0;
    $str='';
    for($i = 0; $i < $number; $i++) {
	
        $desi=$_POST['nom_'.$i];
        $idfa=$_POST['idfa_'.$i];
        $dep=$_POST['dep_'.$i];
        $gain= $_POST['gain_' . $i];
        $stock= $_POST['stock_' . $i];

        $ide=Show_Etatref('ide',$date,$idfa);
        $idmv=Show_Etatref('idmv',$date,$idfa);
        $Asdep=Show_Etatref('dep',$date,$idfa);
        $Asgain=Show_Etatref('gain',$date,$idfa);
        $Asstock= Show_Etatref('stock',$date,$idfa);

        $insert=updateflux($ide,$idfa,$idmv,$dep,$gain,$stock,$date,1);

        if($insert==1)
        {
            $cpt1++;
        }else{
            $cpt2++;
        }

        // testechofac($idcmp, $idp, 1, $pu, $qnt, $mts,'cmp', $date, $i, $fdesi, $fcondis, 0, 0);

    }
if($cpt1>0)
{
    if($cpt2>0)
    {
        $sms=$str.' sont deja enregister pour cette date mais '.$cpt1.'enregistrement on reussi ';
    }else{
        $sms= $cpt1." Composition réussi !.!!!";
    }

}else{
    $sms=  " Erreur etat(s) de compte Non enregistré(s)..!";
}

    ?>
    <script>
        alert('<?php echo $sms; ?>');
       window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php


    // echo  $number.' tt '.$totalht.' id'.$idcmp;

}




if(isset($_GET['dates'])&& !empty($_GET['dates'])){
	echo 'Fonds = '.$capital=Get_fond();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>PAGE DE CONFIGURATION</h1>
  <p>
                                <form action="FacController.php" method="post" >


<?PHP

      $x=0;
	  $tab=tri_bulle($_GET['dates']);
foreach($tab as $date)
{
      $ttd=0;
      $ttg=0;
				   $fac='facture';
				   $rec='recu';
				   $charge='CHARGES';
				   $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 ');
				   $countref = $resref->num_rows;
				   if($countref > 0) {
 ?>
			<div class="container">
			
			  <h2>Journée du <?php echo dateconverter($date); ?></h2>

  <table class="table table-striped">
    <thead>
      <tr>
			<th>Desi</th>
			<th>Depense</th>
			<th>Gain</th>
			<th>Stock</th>
      </tr>
    </thead>
 
									  <?PHP
				   for($i=0;$i<$countref;$i++) {
				   $row = $resref->fetch_array();
				   extract($row);
				   
									   
							 $take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'   AND 	DATE_DEL="'.$date.' " ';
                                  if($result=$base->query($take))
                                  {
									  $y=0;
									 

                                      while($ligne=mysqli_fetch_array($result)) {

                                          extract($ligne);	
										  if($NOMMV== $rec){ $ttd=$ttd+$MTS; }
								          if($NOMMV== $fac){$ttg=$ttg+$MTS; }
																	}
																	
															?>
									<tr>
            <td><input type="text" name="nom_<?php echo $x;?>_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $x;?>_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="text" name="dep_<?php echo $x;?>_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttd;?>" style="text-align:right;" class="form-control" required /></td>
            <td><input type="text" name="gain_<?php echo $x;?>_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttg;?>" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" name="stock_<?php echo $x;?>_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td>

            </tr>

																	<?PHP
																	
                                          $ttds=$ttds+$ttd;
                                          $ttgs=$ttgs+$ttg;
										  $res=$ttgs-$ttds+$capital;
 $ttd=0; $ttg=0;																	
																	
												       }
					   
													}
													
												?>
						 
										<tr class="danger">
          
            <td><input type="text" name="nom_<?php echo $x;?>_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="CAISSE" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $x;?>_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo Show_Caisse("id");?>"/></td>
            <td><input type="text" name="dep_<?php echo $x;?>_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttds;  $ttds=0;?>" style="text-align:right;" class="form-control" required /></td>
            <td><input type="text" name="gain_<?php echo $x;?>_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttgs; $ttgs=0;?>"  style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" name="stock_<?php echo $x;?>_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="<?php echo $res; $capital=$res;?>" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /><input name="ligne_<?php echo $x;?>"   type="hidden" readonly value="<?php echo $i;?>" id="lignenombre" required /><input name="date_<?php echo $x;?>"   type="hidden" value="<?php echo $date;?>"  readonly required /></td>


            </tr>
											
															</table>
															</div>
															


																	<?PHP	
																	
									   }
									   
		
									   $res=0;
									   $x++;
									   				

}

?>
  <input name="nbrreg" type="text" class="form-control" value="<?php echo $x;?>">
                                                        <input type="submit" name="saveetat" value="ENREGISTER"  class="btn btn-success " onmouseover="setline(this)" id="DEFLTR" >


</form> 
</p> 
</div>

</body>
</html>

<?PHP


}










?>
