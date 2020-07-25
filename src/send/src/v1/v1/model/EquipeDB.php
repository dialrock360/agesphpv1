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
  use src\entities\Equipe;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class EquipeDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count equipe =====================*/
					public function countEquipe(){
					                       return count($this->listeEquipe());
					        }

				/*================== Get equipe =====================*/
					public function getEquipe($id){
					$sql = "SELECT * FROM equipe WHERE equipe.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste equipe =====================*/
					public function listeEquipe(){
					                $sql = "SELECT * FROM equipe";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one equipe =====================*/

				/*================== One to many equipe =====================*/

               public function addEquipe($equipe){
                        $sql = "INSERT INTO equipe  VALUES(
                                     null
,
                                     '".$equipe->getNom_equipe()."'
,
                                     '".$equipe->getDate_creation()."'
,
                                     '".$equipe->getCreate_by()."'
,
                                     '".$equipe->getFlag_equipe()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateequipe($equipe){
                        $sql = "UPDATE equipe  SET  equipe.nom_equipe =  '".$equipe->getNom_equipe()."' ,equipe.date_creation =  '".$equipe->getDate_creation()."' ,equipe.create_by =  '".$equipe->getCreate_by()."' ,equipe.flag_equipe =  '".$equipe->getFlag_equipe()."'   WHERE   equipe.id =  ".$equipe->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete equipe =====================*/
					public function deleteEquipe($id){
					$sql = "DELETE FROM equipe WHERE equipe.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If equipe existe =====================*/
					public function ifEquipeexiste($nom_equipe){
					$sql = "SELECT * FROM equipe WHERE nom_equipe='".$nom_equipe."' ";
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



