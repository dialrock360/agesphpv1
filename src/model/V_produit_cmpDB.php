<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



     namespace src\model;
use libs\system\Model;
  use src\entities\V_produit_cmp;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_produit_cmpDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_produit_cmp =====================*/
					public function countV_produit_cmp(){
					                       return count($this->listeV_produit_cmp());
					        }

				/*================== Get v_produit_cmp =====================*/
					public function getV_produit_cmp($id){
					$sql = "SELECT * FROM v_produit_cmp WHERE v_produit_cmp.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_produit_cmp =====================*/
					public function listeV_produit_cmp(){
					                $sql = "SELECT * FROM v_produit_cmp";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_produit_cmp =====================*/

				/*================== One to many v_produit_cmp =====================*/

               public function addV_produit_cmp($v_produit_cmp){
                        $sql = "INSERT INTO v_produit_cmp  VALUES(
                                     '".$v_produit_cmp->getIdpcmp()."'
,
                                     '".$v_produit_cmp->getIdp()."'
,
                                     '".$v_produit_cmp->getTabidp()."'
,
                                     '".$v_produit_cmp->getTabqnt()."'
,
                                     '".$v_produit_cmp->getTabmts()."'
,
                                     '".$v_produit_cmp->getPrv()."'
,
                                     '".$v_produit_cmp->getIdc()."'
,
                                     '".$v_produit_cmp->getId_cat()."'
,
                                     '".$v_produit_cmp->getDesi()."'
,
                                     '".$v_produit_cmp->getPhoto()."'
,
                                     '".$v_produit_cmp->getPrixa()."'
,
                                     '".$v_produit_cmp->getPrixv()."'
,
                                     '".$v_produit_cmp->getQnt()."'
,
                                     '".$v_produit_cmp->getFtech()."'
,
                                     '".$v_produit_cmp->getFlag()."'
,
                                     '".$v_produit_cmp->getIdfa()."'
,
                                     '".$v_produit_cmp->getNom_cat()."'
,
                                     '".$v_produit_cmp->getAchat()."'
,
                                     '".$v_produit_cmp->getVente()."'
,
                                     '".$v_produit_cmp->getCompt()."'
,
                                     '".$v_produit_cmp->getNomf()."'
,
                                     '".$v_produit_cmp->getColor()."'
,
                                     '".$v_produit_cmp->getNomc()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_produit_cmp($v_produit_cmp){
                        $sql = "UPDATE v_produit_cmp  SET  v_produit_cmp.idpcmp =  '".$v_produit_cmp->getIdpcmp()."' ,v_produit_cmp.IDP =  '".$v_produit_cmp->getIdp()."' ,v_produit_cmp.tabidp =  '".$v_produit_cmp->getTabidp()."' ,v_produit_cmp.tabqnt =  '".$v_produit_cmp->getTabqnt()."' ,v_produit_cmp.tabmts =  '".$v_produit_cmp->getTabmts()."' ,v_produit_cmp.prv =  '".$v_produit_cmp->getPrv()."' ,v_produit_cmp.IDC =  '".$v_produit_cmp->getIdc()."' ,v_produit_cmp.ID_CAT =  '".$v_produit_cmp->getId_cat()."' ,v_produit_cmp.DESI =  '".$v_produit_cmp->getDesi()."' ,v_produit_cmp.PHOTO =  '".$v_produit_cmp->getPhoto()."' ,v_produit_cmp.PRIXA =  '".$v_produit_cmp->getPrixa()."' ,v_produit_cmp.PRIXV =  '".$v_produit_cmp->getPrixv()."' ,v_produit_cmp.QNT =  '".$v_produit_cmp->getQnt()."' ,v_produit_cmp.FTECH =  '".$v_produit_cmp->getFtech()."' ,v_produit_cmp.FLAG =  '".$v_produit_cmp->getFlag()."' ,v_produit_cmp.IDFA =  '".$v_produit_cmp->getIdfa()."' ,v_produit_cmp.NOM_CAT =  '".$v_produit_cmp->getNom_cat()."' ,v_produit_cmp.ACHAT =  '".$v_produit_cmp->getAchat()."' ,v_produit_cmp.VENTE =  '".$v_produit_cmp->getVente()."' ,v_produit_cmp.COMPT =  '".$v_produit_cmp->getCompt()."' ,v_produit_cmp.NOMF =  '".$v_produit_cmp->getNomf()."' ,v_produit_cmp.COLOR =  '".$v_produit_cmp->getColor()."' ,v_produit_cmp.NOMC =  '".$v_produit_cmp->getNomc()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_produit_cmp =====================*/
					public function deleteV_produit_cmp($id){
					$sql = "DELETE FROM v_produit_cmp WHERE v_produit_cmp.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_produit_cmp existe =====================*/
					public function ifV_produit_cmpexiste($idpcmp){
					$sql = "SELECT * FROM v_produit_cmp WHERE idpcmp='".$idpcmp."' ";
					if($this->db != null)
					      {
					       if($this->db->query($sql)->fetch() != null)
					         {
					                 return true;
					         }
					      } 
					return false;
					                }


           }
  
   



   ?>



