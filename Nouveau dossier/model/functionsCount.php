<?php

	/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1


/*function Count_table($table)
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM '.$table.' WHERE FLAG=0 " );
	$countCat = $resCat->num_rows;
	return $countCat;

}*/
function Count_Fam()
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 " );
	$countCat = $resCat->num_rows;
	return $countCat;

}
function Count_Prod()
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE ID_CAT IN
 (SELECT `ID_CAT` FROM `CATEGORIE` WHERE VENTE=1) " );
	$countCat = $resCat->num_rows;
	return $countCat;

}
function Count_Cat()
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE FLAG=0 " );
	$countCat = $resCat->num_rows;
	return $countCat;

}

function Count_Condis()
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 " );
	$countCat = $resCat->num_rows;
	return $countCat;

}

function Count_Cmp()
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `produit_cmp` " );
	$countCat = $resCat->num_rows;
	return $countCat;

}


function Count_Mvm($val)
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `MOUVEMENT` WHERE NOMMV='$val' AND FLAG=0 " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Fac($val)
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `FCONDIS`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `facture` WHERE TYPEF='$val' AND FLAG=0 " );
    $countCat = $resCat->num_rows;
    return $countCat;

}
function Newid_Fac()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `MOUVEMENT` " );
    $countCat = $resCat->num_rows;
    echo $countCat+1;

}
function Count_Facp()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `MOUVEMENT` WHERE NOMMV='proforma' AND FLAG=0 " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Facd()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `MOUVEMENT` WHERE NOMMV='demande' AND FLAG=0" );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Facr()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='recu' AND FLAG=0 " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Facf()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='facture' AND VENTE=1" );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Famfac()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 " );
    $countCat = $resCat->num_rows;
    return $countCat;

}

function Count_Log()
{
    //SELECT `IDF`, `IDMV`, `IDP`, `IDFA`, `PU`, `QNT`, `MTS`, `TYPEF`, `DATEF`, `ROW`, `FDESI`, `FCONDIS`, `ACHAT`, `VENTE`, `FLAG` FROM `facture` WHERE 1
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `log` WHERE FLAG=0 " );
    $countCat = $resCat->num_rows;
    return $countCat;

}

/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1


function Count_Four()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='four' " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_cli()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='cli'  " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_Emp()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' AND LEVESECURITY=1 " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}

function Count_WUser()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE STATUT='user' AND LEVESECURITY>1" );
    $countCat = $resCat->num_rows;
    echo $countCat;

}

function Count_User()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}


function Count_Service()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `service` " );
    $countCat = $resCat->num_rows;
    return $countCat;

}

function Count_Prest()
{
    include "bd.php";
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='presta' " );
    $countCat = $resCat->num_rows;
    echo $countCat;

}
function Count_All()
{
    include "bd.php";
    $resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` " );
    $countCat = $resCat->num_rows;
    echo $countCat+1;

}

?>