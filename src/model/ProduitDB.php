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
  use src\entities\Produit;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class ProduitDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count produit =====================*/
					public function countProduit(){
					                       return count($this->listeProduit());
					        }

				/*================== Get produit =====================*/
					public function getProduit($IDP){
					$sql = "SELECT * FROM produit WHERE produit.id = ".$IDP."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste produit =====================*/
					public function listeProduit(){
					                $sql = "SELECT * FROM produit";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one produit =====================*/

				/*================== One to many produit =====================*/

               public function addProduit($produit){
                        $sql = "INSERT INTO produit  VALUES(
                                     null
,
                                     '".$produit->getIdc()."'
,
                                     '".$produit->getId_cat()."'
,
                                     '".$produit->getDesi()."'
,
                                     '".$produit->getPhoto()."'
,
                                     '".$produit->getPrixa()."'
,
                                     '".$produit->getPrixv()."'
,
                                     '".$produit->getQnt()."'
,
                                     '".$produit->getComposer()."'
,
                                     '".$produit->getFtech()."'
,
                                     '".$produit->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateproduit($produit){
                        $sql = "UPDATE produit  SET  produit.IDC =  '".$produit->getIdc()."' ,produit.ID_CAT =  '".$produit->getId_cat()."' ,produit.DESI =  '".$produit->getDesi()."' ,produit.PHOTO =  '".$produit->getPhoto()."' ,produit.PRIXA =  '".$produit->getPrixa()."' ,produit.PRIXV =  '".$produit->getPrixv()."' ,produit.QNT =  '".$produit->getQnt()."' ,produit.COMPOSER =  '".$produit->getComposer()."' ,produit.FTECH =  '".$produit->getFtech()."' ,produit.FLAG =  '".$produit->getFlag()."'   WHERE   produit.IDP =  ".$produit->getIdp()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete produit =====================*/
					public function deleteProduit($IDP){
					$sql = "DELETE FROM produit WHERE produit.IDP = ".$IDP."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If produit existe =====================*/
					public function ifProduitexiste($IDC){
					$sql = "SELECT * FROM produit WHERE IDC='".$IDC."' ";
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



