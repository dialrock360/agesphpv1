<?php
require_once'../model/include.php';
require_once '../assets/web/rooting.php';

if(isset($_POST['btnsave']) && !empty($_POST['btnsave'])){
    $type = $_POST['type'];
    $date = $_POST['date'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
//$base_url
    $url=  $base_url.'start.php?date='.$date;
    if($type==1){
         ?>
        <script>
            window.location.href='<?php echo $url; ?>';

        </script>
        <?php
    }
    else if($type==2){
       // header('Location: .?datedeb='.$debut.'&date='.$fin.'');
		    $url=  $base_url.'start.php?date='.$debut.'&datef='.$fin;

		  ?>
        <script>
            window.location.href='<?php echo $url; ?>';

        </script>
        <?php
    }
    else{
        header('Location: .?date='.$date.'');
    }

}
if(isset($_POST['btninvent']) && !empty($_POST['btninvent'])){
	
 $compta=$achat=$vente=$prdcmp=$regulateur="";
 $array = array('lastname', 'email', 'phone');
  // echo $famille = implode("," , $array);
  
     $Col1_Array = $_POST['famille']; 
//print_r($Col1_Array); 
foreach($Col1_Array as $selectValue){ 
//affichage des valeurs sélectionnées 

echo $selectValue."<br>"; 
}  
   print_r($_POST['famille']);
	
	/*
	if($_POST['achat']==1){
		$achat= "achat=1 and ";	
	}
	if($_POST['vente']==1){
		
		$vente= "vente=1 and ";
	}
	if($_POST['compta']==1){
		
		$compta= "COMPT=1 and ";
	}
	$regulateur=$achat.$vente.$compta;
		
    $typeProduit = $_POST['typeproduit'];
	
	if($typeProduit==1){
		
		$prdcmp= "and idp in (SELECT `IDP` FROM `produit_cmp`) ";
	}
	
    $dateinv = $_POST['dateinv'];
	
	if(($_POST['clauseqnt']) && !empty($_POST['clauseqnt'])){ 

		if(!empty($_POST['qnt'])){ 

		$operateur= "qnt".$_POST['clauseqnt'].$_POST['qnt'];
		} 
	} 
	$query="SELECT * FROM `v_prd_details` WHERE ".$prdcmp." ".$regulateur." idfa IN (".$famille.") ".prdcmp."  ";
//$base_url
    $url=  $base_url.'start.php?date='.$date;
    if($type==1){
         ?>
        <script>
            window.location.href='<?php echo $url; ?>';

        </script>
        <?php
    }
	*/
    

}