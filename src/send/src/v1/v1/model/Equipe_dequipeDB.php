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
  use src\entities\Equipe_dequipe;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Equipe_dequipeDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count equipe_dequipe =====================*/
					public function countEquipe_dequipe(){
					                       return count($this->listeEquipe_dequipe());
					        }

				/*================== Get equipe_dequipe =====================*/
					public function getEquipe_dequipe($id){
					$sql = "SELECT * FROM equipe_dequipe WHERE equipe_dequipe.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste equipe_dequipe =====================*/
					public function listeEquipe_dequipe(){
					                $sql = "SELECT * FROM equipe_dequipe";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one equipe_dequipe =====================*/

				/*================== One to many equipe_dequipe =====================*/

               public function addEquipe_dequipe($equipe_dequipe){
                        $sql = "INSERT INTO equipe_dequipe  VALUES(
                                     '".$equipe_dequipe->getId()."'
,
                                     '".$equipe_dequipe->getId_equipe_mere()."'
,
                                     '".$equipe_dequipe->getId_equipe_membre()."'
,
                                     '".$equipe_dequipe->getCout_equipe_dequipe()."'
,
                                     '".$equipe_dequipe->getInfo_equipe_dequipe()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateequipe_dequipe($equipe_dequipe){
                        $sql = "UPDATE equipe_dequipe  SET  equipe_dequipe.id =  '".$equipe_dequipe->getId()."' ,equipe_dequipe.id_equipe_mere =  '".$equipe_dequipe->getId_equipe_mere()."' ,equipe_dequipe.id_equipe_membre =  '".$equipe_dequipe->getId_equipe_membre()."' ,equipe_dequipe.cout_equipe_dequipe =  '".$equipe_dequipe->getCout_equipe_dequipe()."' ,equipe_dequipe.info_equipe_dequipe =  '".$equipe_dequipe->getInfo_equipe_dequipe()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete equipe_dequipe =====================*/
					public function deleteEquipe_dequipe($id){
					$sql = "DELETE FROM equipe_dequipe WHERE equipe_dequipe.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If equipe_dequipe existe =====================*/
					public function ifEquipe_dequipeexiste($id){
					$sql = "SELECT * FROM equipe_dequipe WHERE id='".$id."' ";
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



