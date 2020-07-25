<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/22/17
 * Time: 1:26 PM
 */
  require_once 'DB.php';
										function deletesetter($sql){ 
								 
										   $db = new DB();
										   $ret =$db->updatespecificQuery($sql);
										   
											return   $ret; 
                                          }
/*********************************************************************************************************************************************************************/
/**********************************************************DELETE USERS OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function delUser($idu){
    


    $sql = "UPDATE `utilisateur` SET `FLAG`=1 WHERE `IDU`='$idu'";
    deletesetter($sql);
}
function delUser2($idu){
    


    $sql = "UPDATE `utilisateur` SET `FLAG`=2 WHERE `IDU`='$idu'";
    deletesetter($sql);
}

/*********************************************************************************************************************************************************************/
/**********************************************************DELETE PRD OPTION////////////////////////////////////////////////////***********************************************************************************************************/

function delMouv($idmv){
    
//UPDATE `mouvement` SET `IDMV`=[value-1],`IDU`=[value-2],`NOMMV`=[value-3],`DATE_DEL`=[value-4],`OBJET`=[value-5],`CONTEN`=[value-6],`TOTALHT`=[value-7],`TVA`=[value-8],`MTSCH`=[value-9],`MTSLTR`=[value-10],`REG`=[value-11],`AVANS`=[value-12],`RESTE`=[value-13],`CACHER`=[value-14],`FLAG`=[value-15] WHERE 1
    $sql = "UPDATE `mouvement` SET `FLAG`=1 WHERE `IDMV`='$idmv'";
      deletesetter($sql);
}

function delCat($cat){
    
    //UPDATE `categorie` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`NOM_CAT`=[value-3],`ACHAT`=[value-4],`VENTE`=[value-5],`FLAG`=[value-6] WHERE 1
    $sql = "UPDATE `categorie` SET `FLAG`=1 WHERE ID_CAT='$cat'";
      deletesetter($sql);
}
function delFam($ifa){
    
    $sql = "UPDATE `famille` SET `FLAG`=1 WHERE `IDFA`='$ifa'";
      deletesetter($sql);
}
function delCondis($idc){
    

//UPDATE `condis` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
    $sql = "UPDATE `condis` SET `FLAG`=1 WHERE `IDC`='$idc'";
       deletesetter($sql);
}
function delProd($idp){
    

    $sql = "UPDATE `produit` SET `FLAG`=1 WHERE `IDP`='$idp'";
      deletesetter($sql);
}

function delMouv2($idmv){
    
//UPDATE `mouvement` SET `IDMV`=[value-1],`IDU`=[value-2],`NOMMV`=[value-3],`DATE_DEL`=[value-4],`OBJET`=[value-5],`CONTEN`=[value-6],`TOTALHT`=[value-7],`TVA`=[value-8],`MTSCH`=[value-9],`MTSLTR`=[value-10],`REG`=[value-11],`AVANS`=[value-12],`RESTE`=[value-13],`CACHER`=[value-14],`FLAG`=[value-15] WHERE 1
    $sql = "UPDATE `mouvement` SET `FLAG`=2 WHERE `IDMV`='$idmv'";
      deletesetter($sql);
}
function delCat2($cat){
    
    //UPDATE `categorie` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`NOM_CAT`=[value-3],`ACHAT`=[value-4],`VENTE`=[value-5],`FLAG`=[value-6] WHERE 1
    $sql = "UPDATE `categorie` SET `FLAG`=2 WHERE ID_CAT='$cat'";
       deletesetter($sql);
}
function delFam2($ifa){
    
    $sql = "UPDATE `famille` SET `FLAG`=2 WHERE `IDFA`='$ifa'";
      deletesetter($sql);
}
function delCondis2($idc){
    

//UPDATE `condis` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
    $sql = "UPDATE `condis` SET `FLAG`=2 WHERE `IDC`='$idc'";
       deletesetter($sql);
}
function delProd2($idp){
    
//INSERT INTO `produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

    $sql = "UPDATE `produit` SET `FLAG`=2 WHERE `IDP`='$idp'";
      deletesetter($sql);
}


/*********************************************************************************************************************************************************************/
/**********************************************************DELETE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
/**********************************************************DELETE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function restorMouv($idp){
    

    $sql = "UPDATE `mouvement` SET `FLAG`=0 WHERE `IDMV`='$idp'";
      deletesetter($sql);
}
function restorCat($cat){
    
    //UPDATE `categorie` SET `ID_CAT`=[value-1],`IDFA`=[value-2],`NOM_CAT`=[value-3],`ACHAT`=[value-4],`VENTE`=[value-5],`FLAG`=[value-6] WHERE 1
    $sql = "UPDATE `categorie` SET `FLAG`=0 WHERE ID_CAT='$cat'";
      deletesetter($sql);
}
function restorFam($ifa){
    
    $sql = "UPDATE `famille` SET `FLAG`=0 WHERE `IDFA`='$ifa'";
      deletesetter($sql);
}
function restorCondis($idc){
    

//UPDATE `condis` SET `IDC`=[value-1],`NOMC`=[value-2],`FLAG`=[value-3] WHERE 1
    $sql = "UPDATE `condis` SET `FLAG`=0 WHERE `IDC`='$idc'";
       deletesetter($sql);
}
function restorProd($idp){
    

    $sql = "UPDATE `produit` SET `FLAG`=0 WHERE `IDP`='$idp'";
      deletesetter($sql);
}








/**********************************************************DELETE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
/**********************************************************DELETE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/
/**********************************************************DELETE FAC OPTION////////////////////////////////////////////////////***********************************************************************************************************/

function delFac($idf)
{
    
//UPDATE `facture` SET `IDF`=[value-1],`IDMV`=[value-2],`IDP`=[value-3],`IDFA`=[value-4],`PU`=[value-5],`QNT`=[value-6],`MTS`=[value-7],`TYPEF`=[value-8],`DATEF`=[value-9],`ROW`=[value-10],`FDESI`=[value-11],`FCONDIS`=[value-12],`ACHAT`=[value-13],`VENTE`=[value-14],`FLAG`=[value-15] WHERE 1

    $sql = "DELETE FROM `facture` WHERE `IDF`='$idf'";
  
      deletesetter($sql);
}
function delLog($idl){
    
//INSERT INTO `log`(`idl`, `idmv`, `conten`, `datelog`, `flag`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

    $sql = "UPDATE `log` SET `flag`=1 WHERE `idl`='$idl'";
       deletesetter($sql);
}











function UpdateMontanltr($idmv,$mtsltr)
{
    

    $sql = "UPDATE `mouvement` SET `MTSLTR`='$mtsltr' WHERE `IDMV`='$idmv'";
 
      deletesetter($sql);
}























?>