<?php

	/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `cartegorie` WHERE 1


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
	 
	$resCat =  "SELECT * FROM `famille` WHERE FLAG=0 "  ; 
	return   countgetter($resCat);

}
function Count_Prod()
{
	 
	$resCat =  "SELECT * FROM `v_produit`   WHERE FLAG=0  AND VENTE=1  " ;
	
	return   countgetter($resCat);

}
function Count_AllProd()
{

	$resCat =  "SELECT * FROM `produit`   WHERE FLAG=0   " ;

	return   countgetter($resCat);

}
function Count_Cat()
{
	 
	$resCat =  "SELECT * FROM `v_categorie` WHERE flag=0 " ;
	
	return   countgetter($resCat);

}

function Count_Condis()
{
	 
	$resCat =  "SELECT * FROM `condis` WHERE FLAG=0 " ;
	
	return   countgetter($resCat);

}

function Count_Cmp()
{
	 
	$resCat =  "SELECT * FROM `v_produit_cmp` " ;
	
	return   countgetter($resCat);

}


function Count_Mvm($val)
{
     
    $resCat =  "SELECT * FROM `mouvement` WHERE NOMMV='$val' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Fac($val)
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `Fcondis`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
     
    $resCat =  "SELECT * FROM `facture` WHERE TYPEF='$val' AND FLAG=0 " ;
    
    return   countgetter($resCat);

}
function Newid_Fac()
{
     
    $resCat =  "SELECT * FROM `mouvement` " ;
    
    echo $countCat+1;

}
function Count_Facp()
{
     
    $resCat =  "SELECT * FROM `mouvement` WHERE NOMMV='proforma' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Facd()
{
     
    $resCat =  "SELECT * FROM `mouvement` WHERE NOMMV='demande' AND FLAG=0" ;
    
    echo    countgetter($resCat);

}
function Count_Facr()
{
     
    $resCat =  "SELECT * FROM `facture` WHERE TYPEF='recu' AND FLAG=0 " ;
    
    echo    countgetter($resCat);

}
function Count_Facf()
{
     
    $resCat =  "SELECT * FROM `facture` WHERE TYPEF='facture' AND VENTE=1" ;
    
    echo    countgetter($resCat);

}
function Count_Famfac()
{
     
    $resCat =  "SELECT * FROM `famille` WHERE FLAG=0 " ;
    
    return   countgetter($resCat);

}

function Count_Log()
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `Fcondis`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
     
    $resCat =  "SELECT * FROM `log` WHERE FLAG=0 " ;
    
    return   countgetter($resCat);

}

/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `cartegorie` WHERE 1


function Count_Four()
{
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='four' " ;
    
    echo    countgetter($resCat);

}
function Count_cli()
{
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='cli'  " ;
    
    echo    countgetter($resCat);

}
function Count_Emp()
{
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='user' AND LEVESECURITY=1 " ;
    
    echo    countgetter($resCat);

}

function Count_WUser()
{
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE STATUT='user' AND LEVESECURITY>1" ;
    
    echo    countgetter($resCat);

}

function Count_User()
{
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='user' " ;
    
    echo    countgetter($resCat);

}


function Count_Service()
{
     
    $resCat =  "SELECT * FROM `service` " ;
    
    return   countgetter($resCat);

}

function Count_Prest()
{
     
     
    $resCat =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='presta' " ;
    
    echo    countgetter($resCat);

}
function Count_All()
{
     
    $resCat =  "SELECT * FROM `utilisateur` " ;
    
    echo $countCat+1;

}

?>