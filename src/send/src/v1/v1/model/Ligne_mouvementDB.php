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
  use src\entities\Ligne_mouvement;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Ligne_mouvementDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count ligne_mouvement =====================*/
					public function countLigne_mouvement(){
					                       return count($this->listeLigne_mouvement());
					        }

				/*================== Get ligne_mouvement =====================*/
					public function getLigne_mouvement($id){
					$sql = "SELECT * FROM ligne_mouvement WHERE ligne_mouvement.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste ligne_mouvement =====================*/
					public function listeLigne_mouvement(){
					                $sql = "SELECT * FROM ligne_mouvement";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one ligne_mouvement =====================*/
					public function listeLigne_mouvementByArticleId($id){
					$sql = "SELECT * FROM ligne_mouvement WHERE  ligne_mouvement.id_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeLigne_mouvementByMouvementId($id){
					$sql = "SELECT * FROM ligne_mouvement WHERE  ligne_mouvement.id_mouvement = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many ligne_mouvement =====================*/
					public function listeArticleByLigne_mouvementId($id_article){
					$sql = "SELECT * FROM article WHERE  article.id_article = ".$id_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMouvementByLigne_mouvementId($id_mouvement){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_mouvement = ".$id_mouvement."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addLigne_mouvement($ligne_mouvement){
                        $sql = "INSERT INTO ligne_mouvement  VALUES(
                                     null
,
                                     ".$ligne_mouvement->getId_article()."
,
                                     ".$ligne_mouvement->getId_mouvement()."
,
                                     '".$ligne_mouvement->getPu_ligne_mouvement()."'
,
                                     '".$ligne_mouvement->getQnt_ligne_mouvement()."'
,
                                     '".$ligne_mouvement->getMts_ligne_mouvement()."'
,
                                     '".$ligne_mouvement->getPosition_ligne_mouvement()."'
,
                                     '".$ligne_mouvement->getDesignation_ligne_mouvement()."'
,
                                     '".$ligne_mouvement->getConditionement_ligne_mouvement()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateligne_mouvement($ligne_mouvement){
                        $sql = "UPDATE ligne_mouvement  SET  ligne_mouvement.id_mouvement =  '".$ligne_mouvement->getId_mouvement()."' ,ligne_mouvement.id_article =  '".$ligne_mouvement->getId_article()."' ,ligne_mouvement.pu_ligne_mouvement =  '".$ligne_mouvement->getPu_ligne_mouvement()."' ,ligne_mouvement.qnt_ligne_mouvement =  '".$ligne_mouvement->getQnt_ligne_mouvement()."' ,ligne_mouvement.mts_ligne_mouvement =  '".$ligne_mouvement->getMts_ligne_mouvement()."' ,ligne_mouvement.position_ligne_mouvement =  '".$ligne_mouvement->getPosition_ligne_mouvement()."' ,ligne_mouvement.designation_ligne_mouvement =  '".$ligne_mouvement->getDesignation_ligne_mouvement()."' ,ligne_mouvement.conditionement_ligne_mouvement =  '".$ligne_mouvement->getConditionement_ligne_mouvement()."'   WHERE   ligne_mouvement.id =  ".$ligne_mouvement->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete ligne_mouvement =====================*/
					public function deleteLigne_mouvement($id){
					$sql = "DELETE FROM ligne_mouvement WHERE ligne_mouvement.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If ligne_mouvement existe =====================*/
					public function ifLigne_mouvementexiste($id_mouvement){
					$sql = "SELECT * FROM ligne_mouvement WHERE id_mouvement='".$id_mouvement."' ";
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



