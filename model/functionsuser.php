<?php


				  
				  	  					  function usergetter($sql,$returntype='all'){

                                              require_once 'DB.php';
                                              $db = new DB();
					                       return $db->getspecificQuery($sql,$returntype);
                                          }


/*

function login_process($post)
{

    $user = new Utilisateur();
    $user->setLogin(trim(htmlspecialchars(strval($post['login']))));
    $user->setPasse(trim(htmlspecialchars(strval($post['pass']))));
    $user->login();

    if($user->getPasse()==$post['pass']){

        echo 1; // log in
        $_SESSION['user_session'] = $user->getIdu();
    }
    else{

        echo "Mots de Pass ou Login Erroné."; // wrong details
    }
}
*/
function Select_idService()
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE STATUT='service'" ;
	$countCat = usergetter($resref,$returntype='all');
    if(count($countCat )> 0)
    {
		foreach($countCat as $cat)
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
     
    $resref =  "SELECT * FROM utilisateur WHERE NOM_USER='$nom' AND NUM_UER='$tel'" ;
   
	$countCat =  usergetter($resref, 'single'); 
    if($countCat != null) {
        extract($countCat);
            $idu=$IDU;

    }
    return $idu;

}
function Select_Four()
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='four' ORDER BY NOM_USER" ;
		$countCat = usergetter($resref, 'all'); 
	if($countCat != null) {
	 
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Fourref($idc)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU=$idc" ;
			$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			echo $rowCat['NOM_USER'];
		}
	}


}
/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


				//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `categorie` WHERE 1
	function Inter_Four($idc)
{

 
$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU!=$idc" ;
	$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
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
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


function Select_Cli()
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='cli' ORDER BY NOM_USER" ;
	$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Cliref($idc)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU=$idc" ;
		$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
		<?php
		}
	}


}
/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `categorie` WHERE 1
function Inter_Cli($idc)
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU!=$idc" ;
	$countref = $resref->num_rows;
			$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}


}


/*********************************************************************************************************************************************************************/
/****************************************************************************************FAMILLE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
function Select_Emp()
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='user' AND PASSE='' ORDER BY NOM_USER" ;
			$countCat = usergetter($resref, 'all'); 
	if($countCat != null)  
	{
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_User()
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND STATUT='user' AND PASSE!='' ORDER BY NOM_USER" ;
	$countCat = usergetter($resref, 'all'); 
	if($countCat != null) {
	 
		foreach($countCat as $rowCat)
        {

			?>
			<option value="<?php echo  $rowCat['IDU']; ?>"><?php echo $rowCat['NOM_USER']; ?></option>
			<?php
		}
	}

}

function Select_Userref($idc)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE IDU=$idc" ;
	$countCat = usergetter($resref, 'single'); 
	if($countCat != null) {
	 
		 

			echo $countCat['NOM_USER'];
		 
	}


}
function Select_Username($nom,$tel)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE  NOM_USER='$nom' AND NUM_UER='$tel'" ;
	$countCat = usergetter($resref, 'single'); 
	if($countCat != null) {
	 
		$ref=$countCat['IDU'];
	}
  return $ref;

}
/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `categorie` WHERE 1
function Inter_User($idc)
{

	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU!=$idc" ;
	$$countCat = usergetter($resref, 'single'); 
	if($countCat != null) {

			?>
			<option value="<?php echo  $countCat['IDU']; ?>"><?php echo $countCat['NOM_USER']; ?></option>
			<?php
		 
	}
}

/*********************************************************************************************************************************************************************/
	/**********************************************************SELECT CONDIS////////////////////////////////////////////////////***********************************************************************************************************/


/*********************************************************************************************************************************************************************/
/****************************************************************************************PRODUIT************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Shoe_userID1($login)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE LOGIN=$login" ;
	$$countCat = usergetter($resref, 'single'); 
	if($countCat != null) {
		 

	   echo  $countCat['IDU'];
		 
	}
	else
	{
		echo  0;
	}


}

function Shoe_userID($idc)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU=$idc" ;
		$countCat = usergetter($resref, 'single'); 
	if($countCat != null) {
	 	echo $countCat['LOGIN'];
	}
	else
	{
		echo ' ';
	}


}

function Service_info($val)
{
	$rt =''; 
	$resref =  "SELECT * FROM `service` WHERE ids=1" ;
		$countCat = usergetter($resref, 'single');

	if($countCat != null) {
	 	//echo $countCat['LOGIN'];
			extract($countCat);
			if ($val=='nom'){
			$rt = $nom;
			}
			if ($val=='sigle'){
			$rt = $sigle;
			}
			if ($val=='type'){
			$rt = $type;
			}
			if ($val=='logo'){
				$rt = $logo;

			}
			if ($val=='adres'){
				$rt = $adress;

			}
			if ($val=='tel'){
				$rt = $tel;

			}
			if ($val=='cni'){
				$rt = $ninea;

			}
			if ($val=='email'){
				$rt = $email;

			}
			if ($val=='ca'){
				$rt = $ca;

			}
			if ($val=='secteurE'){
				$rt = $secteur_E;

			}

		
	}
 return $rt ;
}


function User_info($val,$idu)
{
	 
	$resref =  "SELECT * FROM `utilisateur` WHERE FLAG=0 AND IDU='$idu'" ;
	
	$countCat = usergetter($resref, 'single'); 
		if($countCat != null) {
			extract($countCat);
			if ($val=='nom'){
				$rt =  $NOM_USER;
			}
			if ($val=='logo'){
				$rt =  $PHOTO;

			}
			if ($val=='adres'){
				$rt =  $ADRESS;

			}
			if ($val=='tel'){
				$rt =  $NUM_UER;

			}
			if ($val=='cni'){
				$rt =  $CNI;

			}
			if ($val=='email'){
				$rt =  $EMAIL;

			}
			if ($val=='sal'){
				$rt =  $SALAIRE;

			}
			if ($val=='statut'){
				$rt =  $STATUT;

			}

		 
	}

                return $rt;
}


function Log_info($val,$login)
{
     
    $resref =  "SELECT * FROM `utilisateur` WHERE LOGIN='$login'" ;
   	
	$countCat = usergetter($resref, 'single'); 
		if($countCat != null) {
			extract($countCat); 
            if ($val=='nom'){
                $rt =  $NOM_USER;
            }
            if ($val=='prenom'){
                $rt =  $PRENOM_USER;
            }
            if ($val=='id'){
                $rt =  $IDU;
            }
            if ($val=='photo'){
                $rt =  $PHOTO;

            }
            if ($val=='leveluser'){
                $rt =  $LEVESECURITY;

            }
            if ($val=='login'){
                $rt =  $LOGIN;

            }
            if ($val=='tel'){
                $rt =  $NUM_UER;

            }
            if ($val=='cni'){
                $rt =  $CNI;

            }
            if ($val=='email'){
                $rt =  $EMAIL;

            }
            if ($val=='ca'){
                $rt =  $SALAIRE;

            }

        
    }

                return $rt;
}
/*
$login=4;

Select_Famref($login);*/
/*********************************************************************************************************************************************************************/
/****************************************************************************************IDFACTURE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



?>