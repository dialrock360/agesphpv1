<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/22/17
 * Time: 1:26 PM
 */
require_once 'functionsTest.php';
require_once 'echotest.php';
require_once 'DB.php';

				  
				  	  					  function insert($insertData,$setTablename){
                                              $db = new DB();
					                         $db->setTablename($setTablename);
                                             return $db->insertTable($insertData);
                               }
							   
/*********************************************************************************************************************************************************************/
/**********************************************************INSERT USERS OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adress,$email,$tel,$userpic,$info,$cacher,$flag){
     $sql = "INSERT INTO `utilisateur`(`CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG`) VALUE ('$cni','$prenom','$nom','$login','$sexe','$poste',$salaire,'$statut','$daten','$datem',$secu,'$passe','$adress','$email','$tel','$userpic','$info','$cacher',0)";
 

	 $insertData = array(
        'IDU' => 'null' ,
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
        'FLAG' =>$flag  
    );
    return insert($insertData,'utilisateur');
 
}

/*********************************************************************************************************************************************************************/
/**********************************************************INSERT PRD OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addCat($idf,$nom,$ach,$vent,$compt){
 
 
//INSERT INTO `categorie`(`IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`,`COMPT`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
    $sql = "INSERT INTO ``
 VALUE (NULL,$idf,'$nom',$ach,$vent,$compt,0)";
 $insertData = array(
        'ID_CAT' => 'null' ,
        'IDFA' => $idf ,
        'NOM_CAT' => $nom,
        'ACHAT' => $ach ,
        'VENTE' =>$vent  ,
        'COMPT' =>$compt,
        'flag' =>0
    );
    return insert($insertData,'categorie');
}
function addFam($nom,$col){
    
 
//INSERT INTO `famille`(`IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `ACHAT`, `VENTE`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])

     $sql = "INSERT INTO `famille`(`DESI`, `COLOR`, `FLAG`)
         VALUE ('$nom','$col',0)";
  $insertData = array(
        'IDFA' => 'null' ,
        'DESI' => $nom ,
        'COLOR' => $col,
        'FLAG' => 0 
    );

     return insert($insertData,'famille');
   // $db = new DB();
   //return $db->updatespecificQuery($sql);
}
function addCaisse($mts){
    

//INSERT INTO `fond`(`id`, `capital`) VALUES ([value-1],[value-2]);

    $sql = "INSERT INTO `fond`
 VALUE (NULL, `$mts`)";
     $insertData = array(
        'id' => 'null' ,
        'capital' =>$mts  
    );
    return insert($insertData,'fond');
}

function addCondis($nom){
    

//INSERT INTO `condis`(`IDC`, `NOMC`, `FLAG`) VALUES ([value-1],[value-2],[value-3])
    $sql = "INSERT INTO `condis`(`NOMC`, `FLAG`)
 VALUE ('$nom',0)";
  
     $insertData = array(
        'IDC' => 'null' ,
        'NOMC' =>$nom  ,
        'FLAG' =>0  
    );
    return insert($insertData,'condis');
}
function addProd($idc,$cat,$desi,$img,$pa,$pv,$fiche){
 
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "INSERT INTO `produit`( `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`)
VALUES ($idc,$cat,'$desi','$img',$pa,$pv,0,'$fiche',0)";
 
     $insertData = array(
        'IDP' => 'null' ,
        'IDC' =>$idc  ,
        'ID_CAT' =>$cat  ,
        'DESI' =>$desi  ,
        'PHOTO' =>$img  ,
        'PRIXA' =>$pa  ,
        'PRIXV' =>$pv  ,
        'QNT' =>0  ,
        'FTECH' =>$fiche  ,
        'FLAG' =>0 
    );
    return insert($insertData,'produit');
}
/*********************************************************************************************************************************************************************/
/**********************************************************INSERT FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function addMouv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher)
{
 
//INSERT INTO `mouvement`(`IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15])
 
 
    $sql = "INSERT INTO `mouvement`(`IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG`)
 VALUES ($idmv,$idcom,'$nommv','$date','$obj','$cont','$totalht','$tva','$mtsch','$mtsltr','$reg','$avans','$reste','$cacher',0)";
  $insertData = array(
        'IDMV' => 'null' ,
        'IDU' =>$idcom  ,  
        'NOMMV' =>$nommv  ,  
        'DATE_DEL' =>$date  ,  
        'OBJET' =>$obj  ,  
        'CONTEN' =>$cont  ,  
        'TOTALHT' =>$totalht  ,  
        'TVA' =>$tva  ,  
        'MTSCH' =>$mtsch  ,  
        'MTSLTR' =>$mtsltr  ,  
        'REG' =>$reg  ,  
        'AVANS' =>$avans  ,  
        'RESTE' =>$reste  ,  
        'CACHER' =>$cacher  ,  
        'FLAG' =>0  ,  
    );
   return insert($insertData,'mouvement');
    
}


function addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis)
{
    
//INSERT INTO `facture`(`IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
     $sql = "INSERT INTO `facture`(`IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`)  VALUES (NULL,$idmv, $idp, $pu, $qnt, $mts, $i, '$fdesi', '$fcondis')";
     
	$insertData = array(
        'IDF' => 'null' ,
        'IDMV' =>$idmv ,  
        'IDP' =>$idp ,  
        'PU' =>$pu ,  
        'QNT' =>$qnt ,  
        'MTS' =>$mts ,  
        'ROW' =>$i ,  
        'FDESI' =>$fdesi ,  
        'FCONDIS' =>$fcondis ,  
    );
    return insert($insertData,'facture');
}
function addLog($mv,$cont,$dat){
    
//INSERT INTO `log`(`idl`, `idmv`, `conten`, `datelog`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
 
    $sql = "INSERT INTO `log`(`idmv`, `conten`, `datelog`, `flag`) VALUES ($mv,'$cont','$dat',0)";
        $insertData = array(
        'idl' => 'null' ,
        'IDMV' =>$mv  ,
        'conten' =>$cont  ,
        'datelog' =>$dat  ,
        'flag' => 0
    );
    return insert($insertData,'log');
}

function addRdv($typerdv,$nom,$email,$tel,$daterdv,$content,$statut){
   /* 

//INSERT INTO `rdv`(`idrdv`, `typerdv`, `nom`, `email`, `tel`, `daterdv`, `contenrdv`, `statut`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
    $sql = "INSERT INTO `rdv`( `typerdv`, `nom`, `email`, `tel`, `daterdv`, `contenrdv`, `statut`, `flag`) VALUES 
('$typerdv','$nom','$email','$tel','$daterdv','$content','$statut',0)";
    if (mysqli_query($base, $sql)) {
        // return 'Erreur d insertion recommensez svp';
        $sms=1;
    }
    else {

        $sms=0;

    }
    mysqli_close($base);
    return $sms;*/
}



function addservice($ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo){
 $insertData = array(
        'ids' => 'null' ,
        'ninea' => $ninea ,
        'nom' => $nom,
        'sigle' => $sigle ,
        'email' =>$email  ,
        'tel' =>$tel,
        'adress' =>$adress,
        'secteur_E' => $secteur_E ,
        'type' =>$type  ,
        'ca' => $ca ,
        'logo' =>$logo  ,
    );
    return insert($insertData,'service');
}


function addproduitcmp($idcmp,$tabid,$tabqnt,$tabtms,$totalht){

    
//INSERT INTO `produit_cmp`(`idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])

    $sql = "INSERT INTO `produit_cmp`(`idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv`) VALUES 
            (NULL ,$idcmp,'$tabid','$tabqnt','$tabtms','$totalht')"; 
      $insertData = array(
        'idpcmp' => 'null' ,
        'tabid' =>$tabid  ,
        'tabqnt' =>$tabqnt   , 
        'tabtms' =>$tabtms    ,
        'totalht' =>$totalht    
    );
    return insert($insertData,'produit_cmp');

}
function addetat($idfa,$idmv,$dep,$gain,$stock,$date){
    
	
$fdep = str_replace(",", ".", $dep);
$fgain = str_replace(",", ".", $gain);
$fstock = str_replace(",", ".", $stock);
//INSERT INTO `etat_compte`(`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
//  $sql = "INSERT INTO `etat_compte` VALUES (NULL,$idfa,$idmv,'$dep','$gain','$stock','$date')";
     $sql = "INSERT INTO `etat_compte` (`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES 
            (NULL,$idfa,$idmv,'$fdep','$fgain','$fstock','$date')";

   $insertData = array(
        'IDE' => 'null' ,
        'IDFA' =>$idfa   ,
        'IDMOUV' =>$idmv   ,
        'DEPENSE' =>$dep   ,
        'GAINS' =>$gain   ,
        'STOCK' =>$stock   ,
        'DATEE' =>$date   
    );
    return insert($insertData,'etat_compte');

}
function Maddetat($tab){

$chaine=implode(",",$tab);
    
//INSERT INTO `etat_compte`(`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

     $sql = "INSERT INTO `etat_compte` (`IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE`)
VALUES 
         ".$chaine." ";

  
    return $db->updatespecificQuery($sql);

}
/*********************************************************************************************************************************************************************/
/**********************************************************INSERT MOUVEMENT OPTION////////////////////////////////////////////////////***********************************************************************************************************/


?>