<?php
require_once'../model/include.php';

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
                                <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >


<?PHP

      $x=0;
foreach($_GET['dates'] as $date)
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
									   
									    if($NOMMV== $rec)
                                  {
                                          $ttd=$ttd+$MTS;
									   
								  }
								   if($NOMMV== $fac)
								  {
									  
                                          $ttg=$ttg+$MTS;
								  }
																	}
																	
															?>
									<tr>
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttd;?>" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttg;?>" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td>

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
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="CAISSE" style="text-align:left;color: blue;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo Show_Caisse("id"); ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttds;  $ttds=0;?>" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttgs; $ttgs=0;?>" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="<?php echo $res; $capital=$res;?>" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /></td>

            </tr>
											
															</table>
															</div>
															


																	<?PHP	
																	
									   }
									   
		
									   $res=0;
									   $x++;
									   				

}

?>
  <input type="nbrreg" type="hidden" class="form-control" value="<?php echo $x-1;?>">
  <button  type="submit"  value="getdatee" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-download-alt"></i>ENREGISTRER</button>


</form> 
</p> 
</div>

</body>
</html>

<?PHP


}