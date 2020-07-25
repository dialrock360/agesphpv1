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
  use src\entities\V_produit;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_produitDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_produit =====================*/
					public function countV_produit(){
					                       return count($this->listeV_produit());
					        }

				/*================== Get v_produit =====================*/
					public function getV_produit($id){
					$sql = "SELECT * FROM v_produit WHERE v_produit.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_produit =====================*/
					public function listeV_produit(){
					                $sql = "SELECT * FROM v_produit";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_produit =====================*/

				/*================== One to many v_produit =====================*/

               public function addV_produit($v_produit){
                        $sql = "INSERT INTO v_produit  VALUES(
                                     '".$v_produit->getIdp()."'
,
                                     '".$v_produit->getIdc()."'
,
                                     '".$v_produit->getId_cat()."'
,
                                     '".$v_produit->getDesi()."'
,
                                     '".$v_produit->getPhoto()."'
,
                                     '".$v_produit->getPrixa()."'
,
                                     '".$v_produit->getPrixv()."'
,
                                     '".$v_produit->getQnt()."'
,
                                     '".$v_produit->getComposer()."'
,
                                     '".$v_produit->getFtech()."'
,
                                     '".$v_produit->getFlag()."'
,
                                     '".$v_produit->getIdfa()."'
,
                                     '".$v_produit->getNom_cat()."'
,
                                     '".$v_produit->getAchat()."'
,
                                     '".$v_produit->getVente()."'
,
                                     '".$v_produit->getCompt()."'
,
                                     '".$v_produit->getNomf()."'
,
                                     '".$v_produit->getColor()."'
,
                                     '".$v_produit->getNomc()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_produit($v_produit){
                        $sql = "UPDATE v_produit  SET  v_produit.IDP =  '".$v_produit->getIdp()."' ,v_produit.IDC =  '".$v_produit->getIdc()."' ,v_produit.ID_CAT =  '".$v_produit->getId_cat()."' ,v_produit.DESI =  '".$v_produit->getDesi()."' ,v_produit.PHOTO =  '".$v_produit->getPhoto()."' ,v_produit.PRIXA =  '".$v_produit->getPrixa()."' ,v_produit.PRIXV =  '".$v_produit->getPrixv()."' ,v_produit.QNT =  '".$v_produit->getQnt()."' ,v_produit.COMPOSER =  '".$v_produit->getComposer()."' ,v_produit.FTECH =  '".$v_produit->getFtech()."' ,v_produit.FLAG =  '".$v_produit->getFlag()."' ,v_produit.IDFA =  '".$v_produit->getIdfa()."' ,v_produit.NOM_CAT =  '".$v_produit->getNom_cat()."' ,v_produit.ACHAT =  '".$v_produit->getAchat()."' ,v_produit.VENTE =  '".$v_produit->getVente()."' ,v_produit.COMPT =  '".$v_produit->getCompt()."' ,v_produit.NOMF =  '".$v_produit->getNomf()."' ,v_produit.COLOR =  '".$v_produit->getColor()."' ,v_produit.NOMC =  '".$v_produit->getNomc()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_produit =====================*/
					public function deleteV_produit($id){
					$sql = "DELETE FROM v_produit WHERE v_produit.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_produit existe =====================*/
					public function ifV_produitexiste($IDP){
					$sql = "SELECT * FROM v_produit WHERE IDP='".$IDP."' ";
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



