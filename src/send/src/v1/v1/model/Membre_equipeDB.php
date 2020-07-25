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
  use src\entities\Membre_equipe;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Membre_equipeDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count membre_equipe =====================*/
					public function countMembre_equipe(){
					                       return count($this->listeMembre_equipe());
					        }

				/*================== Get membre_equipe =====================*/
					public function getMembre_equipe($id){
					$sql = "SELECT * FROM membre_equipe WHERE membre_equipe.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste membre_equipe =====================*/
					public function listeMembre_equipe(){
					                $sql = "SELECT * FROM membre_equipe";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one membre_equipe =====================*/
					public function listeMembre_equipeByEquipeId($id){
					$sql = "SELECT * FROM membre_equipe WHERE  membre_equipe.id_equipe = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMembre_equipeByPersonneId($id){
					$sql = "SELECT * FROM membre_equipe WHERE  membre_equipe.id_membre = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many membre_equipe =====================*/
					public function listeEquipeByMembre_equipeId($id_equipe){
					$sql = "SELECT * FROM equipe WHERE  equipe.id_equipe = ".$id_equipe."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listePersonneByMembre_equipeId($id_membre){
					$sql = "SELECT * FROM personne WHERE  personne.id_membre = ".$id_membre."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addMembre_equipe($membre_equipe){
                        $sql = "INSERT INTO membre_equipe  VALUES(
                                     '".$membre_equipe->getId_membre()."'
,
                                     '".$membre_equipe->getId_equipe()."'
,
                                     ".$membre_equipe->getId_equipe()."
,
                                     ".$membre_equipe->getId_membre()."
,
                                     '".$membre_equipe->getCout_maindoeuve_membre()."'
,
                                     '".$membre_equipe->getInfo_membre()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatemembre_equipe($membre_equipe){
                        $sql = "UPDATE membre_equipe  SET  membre_equipe.id_membre: =  ".$membre_equipe->getId_membre()." ,membre_equipe.id_equipe: =  ".$membre_equipe->getId_equipe()." ,membre_equipe.cout_maindoeuve_membre =  '".$membre_equipe->getCout_maindoeuve_membre()."' ,membre_equipe.info_membre =  '".$membre_equipe->getInfo_membre()."'   WHERE   membre_equipe.id_membre: =  ".$membre_equipe->getId_membre()."  AND membre_equipe.id_equipe: =  ".$membre_equipe->getId_equipe()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete membre_equipe =====================*/
					public function deleteMembre_equipe($id){
					$sql = "DELETE FROM membre_equipe WHERE membre_equipe.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If membre_equipe existe =====================*/
					public function ifMembre_equipeexiste($cout_maindoeuve_membre){
					$sql = "SELECT * FROM membre_equipe WHERE cout_maindoeuve_membre='".$cout_maindoeuve_membre."' ";
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



