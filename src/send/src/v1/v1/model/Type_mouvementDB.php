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
  use src\entities\Type_mouvement;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class Type_mouvementDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count type_mouvement =====================*/
					public function countType_mouvement(){
					                       return count($this->listeType_mouvement());
					        }

				/*================== Get type_mouvement =====================*/
					public function getType_mouvement($id){
					$sql = "SELECT * FROM type_mouvement WHERE type_mouvement.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste type_mouvement =====================*/
					public function listeType_mouvement(){
					                $sql = "SELECT * FROM type_mouvement";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one type_mouvement =====================*/
					public function listeType_mouvementByServiceId($id){
					$sql = "SELECT * FROM type_mouvement WHERE  type_mouvement.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many type_mouvement =====================*/
					public function listeServiceByType_mouvementId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addType_mouvement($type_mouvement){
                        $sql = "INSERT INTO type_mouvement  VALUES(
                                     null
,
                                     ".$type_mouvement->getId_service()."
,
                                     '".$type_mouvement->getNom_typemouvement()."'
,
                                     '".$type_mouvement->getNavigation_typemouvement()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatetype_mouvement($type_mouvement){
                        $sql = "UPDATE type_mouvement  SET  type_mouvement.id_service =  '".$type_mouvement->getId_service()."' ,type_mouvement.nom_typemouvement =  '".$type_mouvement->getNom_typemouvement()."' ,type_mouvement.navigation_typemouvement =  '".$type_mouvement->getNavigation_typemouvement()."'   WHERE   type_mouvement.id =  ".$type_mouvement->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete type_mouvement =====================*/
					public function deleteType_mouvement($id){
					$sql = "DELETE FROM type_mouvement WHERE type_mouvement.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If type_mouvement existe =====================*/
					public function ifType_mouvementexiste($id_service){
					$sql = "SELECT * FROM type_mouvement WHERE id_service='".$id_service."' ";
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



