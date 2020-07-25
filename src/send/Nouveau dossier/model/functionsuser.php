<?php

function Select_idService()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE STATUT='service'" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		if($rowCat=$resCat->fetch_array())
		{
			$ids=$rowCat['IDU'];
			return $ids;

		}
	}

}
/*********************************************************************************************************************************************************************/
/**********************************************************SELECT OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function Show_quickidu($tel,$nom)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM UTILISATEUR WHERE NOM_USER='$nom' AND NUM_UER='$tel'");
    $countref = $resref->num_rows;
    if($countref > 0) {
        if ($row = $resref->fetch_array()) {
            extract($row);
            $idu=$IDU;
        }

    }
    return $idu;

}
function Select_Four()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='four' ORDER BY NOM_USER" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		while($rowCat=$resCat->fetch_array())
		{

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Fourref($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			echo $rowref['NOM_USER'];
		}
	}


}
/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


				//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1
	function Inter_Four($idc)
{

include 'bd.php';
$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU!=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			?>
			<option value="<?php echo  $rowref['IDU']; ?>"><?php echo $rowref['NOM_USER']; ?></option>
			<?php
		}
	}
	else
	{
		?>
        			<option ><?php echo 'Liste vide'; ?></option>
        <?php
	}


}


	/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


function Select_Cli()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='cli' ORDER BY NOM_USER" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		while($rowCat=$resCat->fetch_array())
		{

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Cliref($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			?>
			<option value="<?php echo  $rowref['IDU']; ?>"><?php echo $rowref['NOM_USER']; ?></option>
		<?php
		}
	}


}
/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1
function Inter_Cli($idc)
{

	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU!=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			?>
			<option value="<?php echo  $rowref['IDU']; ?>"><?php echo $rowref['NOM_USER']; ?></option>
			<?php
		}
	}


}


/*********************************************************************************************************************************************************************/
/****************************************************************************************FAMILLE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
function Select_Emp()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' AND PASSE='' ORDER BY NOM_USER" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		while($rowCat=$resCat->fetch_array())
		{

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_User()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='user' AND PASSE!='' ORDER BY NOM_USER" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		while($rowCat=$resCat->fetch_array())
		{

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Userref($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE IDU=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref=$resref->fetch_array())
		{

			echo $rowref['NOM_USER'];
		}
	}


}
function Select_Username($nom,$tel)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE  NOM_USER='$nom' AND NUM_UER='$tel'");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			$ref=$rowref['IDU'];
		}
	}
  return $ref;

}
/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1
function Inter_User($idc)
{

	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU!=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			?>
			<option value="<?php echo  $rowref['IDU']; ?>"><?php echo $rowref['NOM_USER']; ?></option>
			<?php
		}
	}
}

/*********************************************************************************************************************************************************************/
	/**********************************************************SELECT CONDIS////////////////////////////////////////////////////***********************************************************************************************************/


/*********************************************************************************************************************************************************************/
/****************************************************************************************PRODUIT************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Shoe_userID1($login)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE LOGIN=$login");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref=$resref->fetch_array())
		{

			echo  $rowref['IDU'];
		}
	}
	else
	{
		echo  0;
	}


}

function Shoe_userID($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		while($rowref=$resref->fetch_array())
		{

			echo $rowref['LOGIN'];
		}
	}
	else
	{
		echo ' ';
	}


}

function Service_info($val)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='service'");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref1=$resref->fetch_array())
		{
			extract($rowref1);
			if ($val=='nom'){
			return $NOM_USER;
			}
			if ($val=='logo'){
				return $PHOTO;

			}
			if ($val=='adres'){
				return $ADRESS;

			}
			if ($val=='tel'){
				return $NUM_UER;

			}
			if ($val=='cni'){
				return $CNI;

			}
			if ($val=='email'){
				return $EMAIL;

			}
			if ($val=='ca'){
				return $SALAIRE;

			}

		}
	}

}


function User_info($val,$idu)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND IDU='$idu'");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref1=$resref->fetch_array())
		{
			extract($rowref1);
			if ($val=='nom'){
				return $NOM_USER;
			}
			if ($val=='logo'){
				return $PHOTO;

			}
			if ($val=='adres'){
				return $ADRESS;

			}
			if ($val=='tel'){
				return $NUM_UER;

			}
			if ($val=='cni'){
				return $CNI;

			}
			if ($val=='email'){
				return $EMAIL;

			}
			if ($val=='sal'){
				return $SALAIRE;

			}
			if ($val=='statut'){
				return $STATUT;

			}

		}
	}

}


function Log_info($val,$login)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE LOGIN='$login'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {

        if($rowref1=$resref->fetch_array())
        {
            extract($rowref1);
            if ($val=='nom'){
                return $NOM_USER;
            }
            if ($val=='prenom'){
                return $PRENOM_USER;
            }
            if ($val=='id'){
                return $IDU;
            }
            if ($val=='photo'){
                return $PHOTO;

            }
            if ($val=='leveluser'){
                return $LEVESECURITY;

            }
            if ($val=='login'){
                return $LOGIN;

            }
            if ($val=='tel'){
                return $NUM_UER;

            }
            if ($val=='cni'){
                return $CNI;

            }
            if ($val=='email'){
                return $EMAIL;

            }
            if ($val=='ca'){
                return $SALAIRE;

            }

        }
    }

}
/*
$login=4;

Select_Famref($login);*/
/*********************************************************************************************************************************************************************/
/****************************************************************************************IDFACTURE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



?>