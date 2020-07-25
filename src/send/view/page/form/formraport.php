<?php

if(isset($_GET['date']) && !empty($_GET['date'])){
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