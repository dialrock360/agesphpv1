<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/22/17
 * Time: 1:26 PM
 */
require_once 'DB.php';

                  
				  
				  	    function inupdatequery($sql){
							     $db = new DB(); 
                                 return $db->updatespecificQuery($sql);
                               }
							   
				  
				  	    function inupdate($rowarray,$setTablename,$condition){
							    $db = new DB() ;
                                 $db->setTablename($setTablename); 
                                return $db->updateTable($rowarray,array('where'=>$condition));
                               }
							   
							   
				  	 
/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE OPTION////////////////////////////////////////////////////***********************************************************************************************************/

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE USERS OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adress,$email,$tel,$userpic,$info,$idu){
    


    $sql = "UPDATE `utilisateur` SET `CNI`='$cni',`PRENOM_USER`='$prenom',`NOM_USER`='$nom',`LOGIN`='$login',`SEXE_USER`='$sexe',
    `POSTE`='$poste',`SALAIRE`='$salaire',`STATUT`='$statut',`DATNAIS`='$daten',`DATEM`='$datem',`LEVESECURITY`='$secu',
    `PASSE`='$passe',`ADRESS`='$adress',`EMAIL`='$email',`NUM_UER`='$tel',`PHOTO`='$userpic',`INFOS`='$info' WHERE `IDU`='$idu'";

	 $insertData = array(
        'IDU' => $idu ,
        'CNI' => $cni ,
        'PRENOM_USER' => $prenom,
        'NOM_USER' => $nom ,
        'LOGIN' =>$login  ,
        'SEXE_USER' =>$sexe,
        'POSTE' =>$poste,
        'SALAIRE' => $salaire ,
        'STATUT' =>$statut  ,
        'DATNAIS' => $daten ,
        'DATEM' =>$datem  ,
        'LEVESECURITY' =>$secu  ,
        'PASSE' =>$passe  ,
        'ADRESS' =>$adress  ,
        'EMAIL' =>$email  ,
        'NUM_UER' =>$tel  ,
        'PHOTO' =>$userpic  ,
        'INFOS' =>$info  ,
        'CACHER' =>$cacher  ,
        'FLAG' =>0  
    );
          
    return  inupdatequery($sql);
}

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE PRD OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updCat($cat,$idf,$nom,$ach,$vent,$compt){
    

//UPDATE `categorie` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`NOM_CAT`=[value-3],`ACHAT`=[value-4],`VENTE`=[value-5],`FLAG`=[value-6] WHERE 1
    $sql = "UPDATE `categorie` SET `IDFA`='$idf',
`NOM_CAT`='$nom',`ACHAT`=$ach,`VENTE`=$vent,`COMPT`=$compt WHERE ID_CAT=$cat";
 $insertData = array(
        'ID_CAT' => $cat ,
        'IDFA' => $idf ,
        'NOM_CAT' => $nom,
        'ACHAT' => $ach ,
        'VENTE' =>$vent  ,
        'COMPT' =>$compt,
        'flag' =>0
    );
 $condition = array('ID_CAT' =>$idu); return inupdate($rowarray,'categorie', $condition);
}

function FiupdFam($ifa,$dep,$gain){
    

//UPDATE `famille` SET `IDFA`=[value-1],`DESI`=[value-2],`DEPENSE`=[value-3],`GAINS`=[value-4],`STOCK`=[value-5],`COLOR`=[value-6],`FLAG`=[value-7] WHERE 1

    $sql = "UPDATE `famille` SET `DEPENSE`='$dep',`GAINS`='$gain' WHERE `IDFA`=$ifa";
	
    return  inupdatequery($sql); 
}
function updCaisse($mts){
    
//INSERT INTO `fond`(`id`, `capital`) VALUES ([value-1],[value-2]);

    $sql = "UPDATE `fond` SET `capital`='$mts' WHERE `id`=1";
    return  inupdatequery($sql);
}
function updFam($ifa,$nom,$col){
    

//UPDATE `famille` SET `IDFA`=[value-1],`DESI`=[value-2],`DEPENSE`=[value-3],`GAINS`=[value-4],`STOCK`=[value-5],`COLOR`=[value-6],`FLAG`=[value-7] WHERE 1

    $sql = "UPDATE `famille` SET `DESI`='$nom',
`COLOR`='$col' WHERE `IDFA`=$ifa";
 
    return  inupdatequery($sql);
}

function updCondis($nom,$idc){
    

//UPDATE `condis` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
    $sql = "UPDATE `condis` SET `NOMC`='$nom' WHERE `IDC`=$idc";
 
    return  inupdatequery($sql);
}

function updProd($idp,$idc,$cat,$desi,$img,$pa,$pv,$qnt,$fiche){
    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `IDC`=$idc,`ID_CAT`=$cat,`DESI`='$desi',`PHOTO`='$img',
`PRIXA`='$pa',`PRIXV`='$pv',`QNT`='$qnt',`FTECH`='$fiche' WHERE `IDP`=$idp";
 
    return  inupdatequery($sql);
}
function updEtat($ide,$dep,$gain,$stock,$date){
    
//UPDATE `etat_compte` SET `IDE`=[value-1],`IDFA`=[value-2],`IDMOUV`=[value-3],`DEPENSE`=[value-4],`GAINS`=[value-5],`STOCK`=[value-6],`DATEE`=[value-7] WHERE 1

    $sql = "UPDATE `etat_compte` SET `DEPENSE`='$dep',`GAINS`='$gain',`STOCK`='$stock',`DATEE`='$date'  WHERE `IDE`=$ide";

 
    return  inupdatequery($sql);
}
function FiupdProd($idp,$qnt){
    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `QNT`='$qnt' WHERE `IDP`=$idp";
 
    return  inupdatequery($sql);
}

function Roomcleaner(){
    Chargecleaner();
    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    //SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flag` FROM `categorie` WHERE 1
$sms='';

							     $db = new DB(); 
    $sql =  "SELECT * FROM `produit` WHERE ID_CAT IN ( SELECT `ID_CAT` FROM `CATEGORIE` WHERE `ACHAT`=0 and VENTE=1 and `COMPT`=0)"  ;
    $countCat = $db->getspecificQuery($sql);
    if(count($countCat )> 0)
    {
		foreach($countCat as $cat)
        {
            extract($cat);

            $sms= FiupdProd($IDP,1);
        }
    }
    return $sms;
}
function Chargecleaner(){
    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
    //SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flag` FROM `categorie` WHERE 1


    $sql = "SELECT * FROM `produit` WHERE ID_CAT IN ( SELECT `ID_CAT` FROM `CATEGORIE` WHERE `ACHAT`=1 and VENTE=0 and `COMPT`=0)" ;
    
   
							$db = new DB();   
              $countCat=$db->getspecificQuery($sql,'all'); 
    if(count($countCat )> 0)
    {
		foreach($countCat as $rowCat)
        {
            extract($rowCat);

            $sms= FiupdProd($IDP,1);
        }
    }
    return $sms;
}
function EupdProd($idp,$qnt){

    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `QNT`='$qnt' WHERE `IDP`=$idp";
 
    return  inupdatequery($sql);
}
/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function updMouv($idmv,$idcom,$nommv,$date,$obj,$updcont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste)
{
    
//UPDATE `mouvement` SET `IDMV`=[value-1],`IDU`=[value-2],`NOMMV`=[value-3],`DATE_DEL`=[value-4],`OBJET`=[value-5],`CONTEN`=[value-6],`TOTALHT`=[value-7],`TVA`=[value-8],`MTSCH`=[value-9],`MTSLTR`=[value-10],`REG`=[value-11],`AVANS`=[value-12],`RESTE`=[value-13],`CACHER`=[value-14],`FLAG`=[value-15] WHERE 1

    $sql = "UPDATE `mouvement` SET `IDU`=$idcom,`NOMMV`='$nommv',`DATE_DEL`='$date',`OBJET`='$obj',`CONTEN`='$updcont',
    `TOTALHT`='$totalht',`TVA`=$tva,`MTSCH`='$mtsch',`MTSLTR`='$mtsltr',`REG`='$reg',`AVANS`='$avans',
    `RESTE`='$reste' WHERE `IDMV`=$idmv ";
   
    return  inupdatequery($sql);
}
function updFac($idf, $pu, $qnt, $mts, $i, $fdesi, $fcondis)
{
    
//UPDATE `facture` SET `IDF`=[value-1],`IDMV`=[value-2],`IDP`=[value-3],`IDFA`=[value-4],`PU`=[value-5],`QNT`=[value-6],`MTS`=[value-7],`TYPEF`=[value-8],`DATEF`=[value-9],`ROW`=[value-10],`FDESI`=[value-11],`FCONDIS`=[value-12],`ACHAT`=[value-13],`VENTE`=[value-14],`FLAG`=[value-15] WHERE 1

    $sql = "UPDATE `facture` SET `PU`='$pu',`QNT`='$qnt',
`MTS`='$mts',`ROW`=$i,
`FDESI`='$fdesi',`FCONDIS`='$fcondis' WHERE `IDF`=$idf";
 
    return  inupdatequery($sql);
}

function updLog($idl,$cont,$dat){
    
//INSERT INTO `log`(`idl`, `idmv`, `conten`, `datelog`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

    $sql = "UPDATE `log` SET `conten`='$cont',`datelog`='$dat' WHERE `idmv`='$idl'";
 
    return  inupdatequery($sql);
}
function updservice($id,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo){
    
//UPDATE `service` SET `ids`=[value-1],`ninea`=[value-2],`nom`=[value-3],`sigle`=[value-4],`email`=[value-5],`tel`=[value-6],`adress`=[value-7],`secteur_E`=[value-8],`type`=[value-9],`ca`=[value-10],`logo`=[value-11] WHERE 1

    $sql = "UPDATE `service` SET `ninea`='$ninea',`nom`='$nom',`sigle`='$sigle',`email`='$email',`tel`='$tel',`adress`='$adress',`secteur_E`='$secteur_E',`type`='$type',`ca`='$ca',`logo`='$logo'  WHERE `ids`=$id";
 
    return  inupdatequery($sql);
}
function updfrontend($libele,$cible,$section){
    
//UPDATE `frontend` SET `IDFR`=[value-1],`LIBELE`=[value-2],`CIBLE`=[value-3],`FSECTION`=[value-4] WHERE 1

    $sql = "UPDATE `frontend` SET `LIBELE`='$libele',`CIBLE`='$cible' WHERE `FSECTION`='$section'";
 
    return  inupdatequery($sql);
}

/*********************************************************************************************************************************************************************/
/**********************************************************UPDATE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/


?>