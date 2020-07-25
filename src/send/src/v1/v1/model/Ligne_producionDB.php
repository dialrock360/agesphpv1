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
  use src\entities\Ligne_producion;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Ligne_producionDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count ligne_producion =====================*/
					public function countLigne_producion(){
					                       return count($this->listeLigne_producion());
					        }

				/*================== Get ligne_producion =====================*/
					public function getLigne_producion($id){
					$sql = "SELECT * FROM ligne_producion WHERE ligne_producion.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste ligne_producion =====================*/
					public function listeLigne_producion(){
					                $sql = "SELECT * FROM ligne_producion";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one ligne_producion =====================*/
					public function listeLigne_producionByProduitId($id){
					$sql = "SELECT * FROM ligne_producion WHERE  ligne_producion.id_produit = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeLigne_producionByTacheId($id){
					$sql = "SELECT * FROM ligne_producion WHERE  ligne_producion.id_tache = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many ligne_producion =====================*/
					public function listeProduitByLigne_producionId($id_produit){
					$sql = "SELECT * FROM produit WHERE  produit.id_produit = ".$id_produit."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeTacheByLigne_producionId($id_tache){
					$sql = "SELECT * FROM tache WHERE  tache.id_tache = ".$id_tache."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addLigne_producion($ligne_producion){
                        $sql = "INSERT INTO ligne_producion  VALUES(
                                     null
,
                                     ".$ligne_producion->getId_produit()."
,
                                     ".$ligne_producion->getId_tache()."
,
                                     '".$ligne_producion->getPxa_ligne_producion()."'
,
                                     '".$ligne_producion->getQnt_ligne_producion()."'
,
                                     '".$ligne_producion->getMts_ligne_producion()."'
,
                                     '".$ligne_producion->getPosition_ligne_producion()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateligne_producion($ligne_producion){
                        $sql = "UPDATE ligne_producion  SET  ligne_producion.id_produit =  '".$ligne_producion->getId_produit()."' ,ligne_producion.id_tache =  '".$ligne_producion->getId_tache()."' ,ligne_producion.pxa_ligne_producion =  '".$ligne_producion->getPxa_ligne_producion()."' ,ligne_producion.qnt_ligne_producion =  '".$ligne_producion->getQnt_ligne_producion()."' ,ligne_producion.mts_ligne_producion =  '".$ligne_producion->getMts_ligne_producion()."' ,ligne_producion.position_ligne_producion =  '".$ligne_producion->getPosition_ligne_producion()."'   WHERE   ligne_producion.id =  ".$ligne_producion->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete ligne_producion =====================*/
					public function deleteLigne_producion($id){
					$sql = "DELETE FROM ligne_producion WHERE ligne_producion.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If ligne_producion existe =====================*/
					public function ifLigne_producionexiste($id_produit){
					$sql = "SELECT * FROM ligne_producion WHERE id_produit='".$id_produit."' ";
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



