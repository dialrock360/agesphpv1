<?php

	/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1


/*function Count_table($table)
{
	 
	$resCat =  "SELECT * FROM '.$table.' WHERE FLAG=0 " ;
	
	return   countgetter($resCat);

}*/
  require_once 'DB.php';
										function countgetter($sql){ 
								 
										   $db = new DB();
										   $ret =$db->getspecificQuery($sql,'count');
										   
											return   $ret; 
                                          }
 
function Count_Fam()
{
	 
	$resCat =  "SELECT * FROM `FAMILLE` WHERE FLAG=0 "  ; 
	return   countgetter($resCat);

}
function Count_Prod()
{
	 
	$resCat =  "SELECT * FROM `PRODUIT` WHERE ID_CAT IN
 (SELECT `ID_CAT` FROM `CATEGORIE` WHERE VENTE=1) " ;
	
	return   countgetter($resCat);

}
function Count_Cat()
{
	 
	$resCat =  "SELECT * FROM `CATEGORIE` WHERE FLAG=0 " ;
	
	return   countgetter($resCat);

}

function Count_Condis()
{
	 
	$resCat =  "SELECT * FROM `CONDIS` WHERE FLAG=0 " ;
	
	return   countgetter($resCat);

}

function Count_Cmp()
{
	 
	$resCat =  "SELECT * FROM `produit_cmp` " ;
	
	return   countgetter($resCat);

}


function Count_Mvm($val)
{
     
    $resCat =  "SELECT * FROM `MOUVEMENT` WHERE NOMMV='$val' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Fac($val)
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `FCONDIS`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
     
    $resCat =  "SELECT * FROM `facture` WHERE TYPEF='$val' AND FLAG=0 " ;
    
    return   countgetter($resCat);

}
function Newid_Fac()
{
     
    $resCat =  "SELECT * FROM `MOUVEMENT` " ;
    
    echo $countCat+1;

}
function Count_Facp()
{
     
    $resCat =  "SELECT * FROM `MOUVEMENT` WHERE NOMMV='proforma' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Facd()
{
     
    $resCat =  "SELECT * FROM `MOUVEMENT` WHERE NOMMV='demande' AND FLAG=0" ;
    
    echo    countgetter($resCat);

}
function Count_Facr()
{
     
    $resCat =  "SELECT * FROM `FACTURE` WHERE TYPEF='recu' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Facf()
{
     
    $resCat =  "SELECT * FROM `FACTURE` WHERE TYPEF='facture' AND VENTE=1" ;
    
    echo    countgetter($resCat);

}
function Count_Famfac()
{
     
    $resCat =  "SELECT * FROM `FAMILLE` WHERE FLAG=0 " ;
    
    return   countgetter($resCat);

}

function Count_Log()
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `FCONDIS`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
     
    $resCat =  "SELECT * FROM `log` WHERE FLAG=0 " ;
    
    return   countgetter($resCat);

}

/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1


function Count_Four()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='four' " ;
    
    echo    countgetter($resCat);

}
function Count_cli()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='cli'  " ;
    
    echo    countgetter($resCat);

}
function Count_Emp()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' AND LEVESECURITY=1 " ;
    
    echo    countgetter($resCat);

}

function Count_WUser()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE STATUT='user' AND LEVESECURITY>1" ;
    
    echo    countgetter($resCat);

}

function Count_User()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' " ;
    
    echo    countgetter($resCat);

}


function Count_Service()
{
     
    $resCat =  "SELECT * FROM `service` " ;
    
    return   countgetter($resCat);

}

function Count_Prest()
{
     
     
    $resCat =  "SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='presta' " ;
    
    echo    countgetter($resCat);

}
function Count_All()
{
     
    $resCat =  "SELECT * FROM `UTILISATEUR` " ;
    
    echo $countCat+1;

}

?>