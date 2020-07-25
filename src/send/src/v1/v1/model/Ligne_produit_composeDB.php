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
  use src\entities\Ligne_produit_compose;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Ligne_produit_composeDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count ligne_produit_compose =====================*/
					public function countLigne_produit_compose(){
					                       return count($this->listeLigne_produit_compose());
					        }

				/*================== Get ligne_produit_compose =====================*/
					public function getLigne_produit_compose($id){
					$sql = "SELECT * FROM ligne_produit_compose WHERE ligne_produit_compose.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste ligne_produit_compose =====================*/
					public function listeLigne_produit_compose(){
					                $sql = "SELECT * FROM ligne_produit_compose";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one ligne_produit_compose =====================*/
					public function listeLigne_produit_composeByArticleId($id){
					$sql = "SELECT * FROM ligne_produit_compose WHERE  ligne_produit_compose.id_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeLigne_produit_composeByArticleId($id){
					$sql = "SELECT * FROM ligne_produit_compose WHERE  ligne_produit_compose.id_produit = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many ligne_produit_compose =====================*/
					public function listeArticleByLigne_produit_composeId($id_article){
					$sql = "SELECT * FROM article WHERE  article.id_article = ".$id_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeArticleByLigne_produit_composeId($id_produit){
					$sql = "SELECT * FROM article WHERE  article.id_produit = ".$id_produit."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addLigne_produit_compose($ligne_produit_compose){
                        $sql = "INSERT INTO ligne_produit_compose  VALUES(
                                     null
,
                                     ".$ligne_produit_compose->getId_article()."
,
                                     ".$ligne_produit_compose->getId_produit()."
,
                                     '".$ligne_produit_compose->getPxa_ligne_produit_compose()."'
,
                                     '".$ligne_produit_compose->getQnt_ligne_produit_compose()."'
,
                                     '".$ligne_produit_compose->getMts_ligne_produit_compose()."'
,
                                     '".$ligne_produit_compose->getPosition_ligne_produit_compose()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateligne_produit_compose($ligne_produit_compose){
                        $sql = "UPDATE ligne_produit_compose  SET  ligne_produit_compose.id_produit =  '".$ligne_produit_compose->getId_produit()."' ,ligne_produit_compose.id_article =  '".$ligne_produit_compose->getId_article()."' ,ligne_produit_compose.pxa_ligne_produit_compose =  '".$ligne_produit_compose->getPxa_ligne_produit_compose()."' ,ligne_produit_compose.qnt_ligne_produit_compose =  '".$ligne_produit_compose->getQnt_ligne_produit_compose()."' ,ligne_produit_compose.mts_ligne_produit_compose =  '".$ligne_produit_compose->getMts_ligne_produit_compose()."' ,ligne_produit_compose.position_ligne_produit_compose =  '".$ligne_produit_compose->getPosition_ligne_produit_compose()."'   WHERE   ligne_produit_compose.id =  ".$ligne_produit_compose->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete ligne_produit_compose =====================*/
					public function deleteLigne_produit_compose($id){
					$sql = "DELETE FROM ligne_produit_compose WHERE ligne_produit_compose.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If ligne_produit_compose existe =====================*/
					public function ifLigne_produit_composeexiste($id_produit){
					$sql = "SELECT * FROM ligne_produit_compose WHERE id_produit='".$id_produit."' ";
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



