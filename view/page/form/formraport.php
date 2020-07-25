<?php

$prddb = new Produit();
$catdb = new Categorie();
$condisdb = new Condis();
$famdb = new Famille();
$facdb = new Facture();
$mouvdb = new Mouvement();
$etadb = new Etat_compte();
$etastkdb = new Etat_stock();
if(isset($_GET['date']) && !empty($_GET['date'])){
$test=$etadb->testEtatbydate($_GET['date']);
if($test==1){


if(isset($_GET['date']) && isset($_GET['datef'])){
	
	$datedeb = $date; // Année non bissextile
    $date = $_GET['datef']; // Année non bissextile
	require_once 'formrangeraport.php';

	
}else if(isset($_GET['date']) && !(isset($_GET['datef'])))	{
	require_once 'formsingleraport.php';

	
}else{
	require_once 'formsingleraport.php';

	
}
	
}

    if($test==0){
        $message404 =" IL N' EXISTE PAS DE RAPPORT POUR CETTE DATE ";
        require_once 'fom404.php';

      }
}