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
  use src\entities\Rubrique;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class RubriqueDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count rubrique =====================*/
					public function countRubrique(){
					                       return count($this->listeRubrique());
					        }

				/*================== Get rubrique =====================*/
					public function getRubrique($id){
					$sql = "SELECT * FROM rubrique WHERE rubrique.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste rubrique =====================*/
					public function listeRubrique(){
					                $sql = "SELECT * FROM rubrique";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one rubrique =====================*/
					public function listeRubriqueByServiceId($id){
					$sql = "SELECT * FROM rubrique WHERE  rubrique.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many rubrique =====================*/
					public function listeServiceByRubriqueId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addRubrique($rubrique){
                        $sql = "INSERT INTO rubrique  VALUES(
                                     null
,
                                     ".$rubrique->getId_service()."
,
                                     '".$rubrique->getId_model()."'
,
                                     '".$rubrique->getNom_rubrique()."'
,
                                     '".$rubrique->getValeur_rubrique()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updaterubrique($rubrique){
                        $sql = "UPDATE rubrique  SET  rubrique.id_model =  '".$rubrique->getId_model()."' ,rubrique.id_service =  '".$rubrique->getId_service()."' ,rubrique.nom_rubrique =  '".$rubrique->getNom_rubrique()."' ,rubrique.valeur_rubrique =  '".$rubrique->getValeur_rubrique()."'   WHERE   rubrique.id =  ".$rubrique->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete rubrique =====================*/
					public function deleteRubrique($id){
					$sql = "DELETE FROM rubrique WHERE rubrique.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If rubrique existe =====================*/
					public function ifRubriqueexiste($id_model){
					$sql = "SELECT * FROM rubrique WHERE id_model='".$id_model."' ";
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



