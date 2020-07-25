<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 25/02/2018
 * Time: 11:29
 */

  require_once 'DB.php';
				    
				  	  					  function frontendgetter($sql,$returntype='all'){ 
								 
										   $db = new DB();
											return $db->getspecificQuery($sql,$returntype); 
                                          }
function Show_frontend($val)
{
  
        $ret='';

    //SELECT `IDFR`, `LIBELE`, `SIBLE`, `SECTION`, `COLOR` FROM `frontend` WHERE 1
    $resref =  "SELECT * FROM `frontend` WHERE `CIBLE`='appdseting' and fSECTION='$val'" ;
   
	$$countCat = frontendgetter($resref, 'single'); 
	if($countCat != null) {
		

            extract($countCat);
            $ret=$LIBELE;

    } 
    return $ret;

}

function Show_service($val)
{
     
     $ret= "";

    //SELECT `id`, `ninea`, `nom`, `sigle`, `emmail`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`, `theme` FROM `service` WHERE 1
    $resref = "SELECT * FROM `service` WHERE `ids`=1";
	 $countCat = frontendgetter($resref, 'single'); 
	if($countCat != null) {
		

            extract($countCat);

            if($val=='id'){
                $ret=$id;

            }
            if($val=='ninea'){
                $ret=  $ninea;

            }
            if($val=='achat'){
                $ret=  $ACHAT;

            }
            if($val=='nom'){
                $ret=  $nom;

            }
            if($val=='sigle'){
                $ret=  $sigle;

            }
            if($val=='tel'){
                $ret=  $tel;

            }
            if($val=='adress'){
                $ret=  $adress;

            }    if($val=='secteur'){
                $ret=  $secteur_E;

            }
            if($val=='type'){
                 $ret=  $type;

            }
            if($val=='ca'){
                 $ret=  $ca;

            }
            if($val=='type'){
                 $ret=  $type;

            }
            if($val=='logo'){
                 $ret=  $logo;

            }
         

    }
	return $ret;

}
    function slidebar()
    {

    }
    function theme()
    {

    }

    function menu()
    {

    }

    function ithem()
    {

    }
    function boite()
    {

    }