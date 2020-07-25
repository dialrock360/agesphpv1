<?php

//SELECT `IDU`, `IDMV`, `NOMMV`, `TYPE`, `OBJET`, `CONTEN`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `DATE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1
//SELECT `IDP`, `IDMV`, `DESI`, `CONDIS`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1

function Test_fac($date,$nommv,$obj,$mtsch,$cont)
{
	include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM MOUVEMENT WHERE FLAG=0 AND DATE_DEL='$date' AND NOMMV='$nommv'  AND OBJET='$obj' AND MTSCH='$mtsch' AND CONTEN='$cont'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }



}

function Test_fpro($date,$nommv,$obj,$cont)
{
	include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM MOUVEMENT WHERE FLAG=0 AND DATE_DEL='$date' AND NOMMV='$nommv'  AND OBJET='$obj' AND CONTEN='$cont'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }


}




function Test_rdv($typerdv,$nom,$statut,$email,$content)
{
//SELECT `idrdv`, `typerdv`, `nom`, `email`, `tel`, `daterdv`, `contenrdv`, `statut`, `flag` FROM `rdv` WHERE 1
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `idrdv` WHERE typerdv='$typerdv' AND nom='$nom' AND email='$email' AND emailcli='$email' AND contenrdv='$content' AND contenrdv='$statut'");
    $countref = $resref->num_rows;

    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }
}

function Test_factref($id)
{

    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT IDF FROM `facture` WHERE IDF='$id'");
    $countref = $resref->num_rows;

    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }
}
function Test_facture($idp,$idmv,$qnt,$pu,$mts,$i)
{
    include 'bd.php';

    //SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1

  $resref = $MySQLiconn->query("SELECT IDF FROM `facture` WHERE `IDMV`=$idmv and `ROW`=$i and `IDP`=$idp and `PU`='$pu' and `QNT`=$qnt and `MTS`='$mts' ");
  $countref = $resref->num_rows;
  if($countref > 0)
    {
		
        return 1;
    }else{
        return 0;
    }
}
//SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1















/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Test_cat($val,$nom)
{
//SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `FLAG` FROM `categorie` WHERE 1
    include 'bd.php';
    if($val=='fam'){
        $resref = $MySQLiconn->query("SELECT * FROM `categorie` WHERE IDFA='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='nom'){
        $resref = $MySQLiconn->query("SELECT * FROM `categorie` WHERE  NOM_CAT='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='achat'){
        $resref = $MySQLiconn->query("SELECT * FROM `categorie` WHERE  ACHAT=1 AND  ID_CAT='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='vente'){
        $resref = $MySQLiconn->query("SELECT * FROM `categorie` WHERE VENTE=1 AND  ID_CAT='$nom'");
        $countref = $resref->num_rows;

    }
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }


}









	/*********************************************************************************************************************************************************************/
/****************************************************************************************FAMILLE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

				
				//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

				
				function Test_fam($val,$nom)
{

include 'bd.php';

    if($val=='idfa'){
        $resref = $MySQLiconn->query("SELECT * FROM FAMILLE WHERE IDFA='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='nom'){
        $resref = $MySQLiconn->query("SELECT * FROM FAMILLE WHERE  DESI='$nom'");
        $countref = $resref->num_rows;

    }

    if($val=='color'){
        $resref = $MySQLiconn->query("SELECT * FROM FAMILLE WHERE  COLOR='$nom'");
        $countref = $resref->num_rows;

    }

    if($val=='stock'){
        $resref = $MySQLiconn->query("SELECT * FROM FAMILLE WHERE  STOCK='$nom'");
        $countref = $resref->num_rows;

    }


    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }


}
					

	/*********************************************************************************************************************************************************************/
	/**********************************************************SELECT CONDIS////////////////////////////////////////////////////***********************************************************************************************************/


//
//	SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1

function Test_condis($val,$nom)
	{

	include 'bd.php';
        if($val=='idc'){

            $resref = $MySQLiconn->query("SELECT * FROM CONDIS WHERE FLAG=0 AND IDC='$nom'");
            $countref = $resref->num_rows;

        }
        if($val=='nom'){

            $resref = $MySQLiconn->query("SELECT * FROM CONDIS WHERE FLAG=0 AND NOMC='$nom'");
            $countref = $resref->num_rows;

        }
        if($countref > 0)
        {
            return 1;
        }else{
            return 0;
        }
}

//SELECT `idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv` FROM `produit_cmp` WHERE 1
function Test_prdcmp($idp)
	{

	include 'bd.php';
        $resref = $MySQLiconn->query("SELECT idpcmp FROM `produit_cmp` WHERE `IDP`=$idp");
        $countref = $resref->num_rows;
        if($countref > 0)
        {
            return 1;
        }else{
            return 0;
        }
}
function Test_datemv($DATEE)
	{
//SELECT `IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `mouvement` WHERE 1
	include 'bd.php';
        $resref = $MySQLiconn->query("SELECT IDMV FROM `mouvement` WHERE `DATE_DEL`='$DATEE'");
        $countref = $resref->num_rows;
        if($countref > 0)
        {
            return 1;
        }else{
            return 0;
        }
}



/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//	SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1


/*********************************************************************************************************************************************************************/
/****************************************************************************************PRODUIT************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Test_prd($val,$nom)
{
    //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1
    include 'bd.php';
    if($val=='cat'){
        $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE FLAG=0 AND ID_CAT='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='nom'){
        $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE  DESI='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='idc'){
        $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE  IDC='$nom'");
        $countref = $resref->num_rows;

    }
    if($val=='qnt'){
        $resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE IDP='$nom' ");
        $countref = $resref->num_rows;
        if($countref > 0) {

            if ($row = $resref->fetch_array()) {

                extract($row);
                if($QNT > 0)
                {
                    $countref= 1;
                }else{
                    $countref= 0;
                }
            }

        }



    }
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }


}



/*********************************************************************************************************************************************************************/
/****************************************************************************************IMG PRODUIT************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/




/*********************************************************************************************************************************************************************/
/****************************************************************************************UTILISATEUR************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
/*
*/

function Test_user($tel,$nom)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM UTILISATEUR WHERE NOM_USER='$nom' AND NUM_UER='$tel'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }

}
function Test_useref($id)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM UTILISATEUR WHERE IDU='$id'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }

}
function Test_login($login)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM UTILISATEUR WHERE LOGIN='$login'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }

}
function Test_com($tel,$nom,$stat)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM UTILISATEUR WHERE NOM_USER='$nom' AND NUM_UER='$tel' AND STATUT='$stat'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        $row = $resref->fetch_array();
        extract($row);
        return $IDU;
    }else{
        return 0;
    }

}

function Test_etat($date,$idmv,$id)
{

//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT IDE FROM `etat_compte` WHERE `DATEE` ='$date' AND `IDFA` =$id AND `IDMOUV` =$idmv ");
    $countref = $resref->num_rows;

    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }

}


function Test_prdcmpbyid($idp)
{

//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
    include 'bd.php';
    $ret=false;

    $resref = $MySQLiconn->query("SELECT * FROM `produit_cmp` WHERE idp=$idp");
    $countref = $resref->num_rows;
    if($countref > 0)
    {

        $ret=true;
    }
    return $ret;

}



function Test_ifetat_exist($date,$idfa)
{
//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT IDE FROM `etat_compte` WHERE `DATEE` ='$date' AND `IDFA` ='$idfa' ");
    $countref = $resref->num_rows;

    if($countref > 0)
    {
        return 1;
    }else{
        return 0;
    }
}


/*********************************************************************************************************************************************************************/
/****************************************************************************************UTILISATEUR CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



function name_fonction ($params1, $params2)
{
	if($params1==1 & $params2=2 ){

	}
	// code de la fonction

	return true; // facultatif
}

/*
$login='dial';
$var1=1;
$var2=2;


$test=Test_login($login);
if($test==true){
echo 'BIGO';
}else{
	echo '!!!!!!!!!!!';
}
/*********************************************************************************************************************************************************************/
/****************************************************************************************IDFACTURE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


?>