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

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
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
					public function getProduit($id){
					$sql = "SELECT * FROM produit WHERE produit.id = ".$id."  ";
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
                                     '".$produit->getNom_produit()."'
,
                                     '".$produit->getType_produit()."'
,
                                     '".$produit->getCout_produit()."'
,
                                     '".$produit->getValeur_produit()."'
,
                                     '".$produit->getPoids_produit()."'
,
                                     '".$produit->getTaille_produit()."'
,
                                     '".$produit->getLongueur_produit()."'
,
                                     '".$produit->getLargeur_produit()."'
,
                                     '".$produit->getVolume_produit()."'
,
                                     '".$produit->getDeitail_produit()."'
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
                        $sql = "UPDATE produit  SET  produit.nom_produit =  '".$produit->getNom_produit()."' ,produit.type_produit =  '".$produit->getType_produit()."' ,produit.cout_produit =  '".$produit->getCout_produit()."' ,produit.valeur_produit =  '".$produit->getValeur_produit()."' ,produit.poids_produit =  '".$produit->getPoids_produit()."' ,produit.taille_produit =  '".$produit->getTaille_produit()."' ,produit.longueur_produit =  '".$produit->getLongueur_produit()."' ,produit.largeur_produit =  '".$produit->getLargeur_produit()."' ,produit.volume_produit =  '".$produit->getVolume_produit()."' ,produit.deitail_produit =  '".$produit->getDeitail_produit()."'   WHERE   produit.id =  ".$produit->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete produit =====================*/
					public function deleteProduit($id){
					$sql = "DELETE FROM produit WHERE produit.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If produit existe =====================*/
					public function ifProduitexiste($nom_produit){
					$sql = "SELECT * FROM produit WHERE nom_produit='".$nom_produit."' ";
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



