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
  use src\entities\Equipe_projet;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Equipe_projetDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count equipe_projet =====================*/
					public function countEquipe_projet(){
					                       return count($this->listeEquipe_projet());
					        }

				/*================== Get equipe_projet =====================*/
					public function getEquipe_projet($id){
					$sql = "SELECT * FROM equipe_projet WHERE equipe_projet.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste equipe_projet =====================*/
					public function listeEquipe_projet(){
					                $sql = "SELECT * FROM equipe_projet";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one equipe_projet =====================*/
					public function listeEquipe_projetByPersonneId($id){
					$sql = "SELECT * FROM equipe_projet WHERE  equipe_projet.id_chef_equipe = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeEquipe_projetByEquipeId($id){
					$sql = "SELECT * FROM equipe_projet WHERE  equipe_projet.id_equipe = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeEquipe_projetByProjetId($id){
					$sql = "SELECT * FROM equipe_projet WHERE  equipe_projet.id_projet = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many equipe_projet =====================*/
					public function listePersonneByEquipe_projetId($id_chef_equipe){
					$sql = "SELECT * FROM personne WHERE  personne.id_chef_equipe = ".$id_chef_equipe."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeEquipeByEquipe_projetId($id_equipe){
					$sql = "SELECT * FROM equipe WHERE  equipe.id_equipe = ".$id_equipe."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeProjetByEquipe_projetId($id_projet){
					$sql = "SELECT * FROM projet WHERE  projet.id_projet = ".$id_projet."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addEquipe_projet($equipe_projet){
                        $sql = "INSERT INTO equipe_projet  VALUES(
                                     null
,
                                     ".$equipe_projet->getId_chef_equipe()."
,
                                     ".$equipe_projet->getId_equipe()."
,
                                     ".$equipe_projet->getId_projet()."
,
                                     '".$equipe_projet->getNbr_membre()."'
,
                                     '".$equipe_projet->getCout_equipe()."'
,
                                     '".$equipe_projet->getInfo_equipe()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateequipe_projet($equipe_projet){
                        $sql = "UPDATE equipe_projet  SET  equipe_projet.id_projet =  '".$equipe_projet->getId_projet()."' ,equipe_projet.id_equipe =  '".$equipe_projet->getId_equipe()."' ,equipe_projet.nbr_membre =  '".$equipe_projet->getNbr_membre()."' ,equipe_projet.cout_equipe =  '".$equipe_projet->getCout_equipe()."' ,equipe_projet.info_equipe =  '".$equipe_projet->getInfo_equipe()."' ,equipe_projet.id_chef_equipe =  '".$equipe_projet->getId_chef_equipe()."'   WHERE   equipe_projet.id =  ".$equipe_projet->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete equipe_projet =====================*/
					public function deleteEquipe_projet($id){
					$sql = "DELETE FROM equipe_projet WHERE equipe_projet.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If equipe_projet existe =====================*/
					public function ifEquipe_projetexiste($id_projet){
					$sql = "SELECT * FROM equipe_projet WHERE id_projet='".$id_projet."' ";
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



