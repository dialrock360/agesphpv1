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
  use src\entities\Personne_presente;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Personne_presenteDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count personne_presente =====================*/
					public function countPersonne_presente(){
					                       return count($this->listePersonne_presente());
					        }

				/*================== Get personne_presente =====================*/
					public function getPersonne_presente($id){
					$sql = "SELECT * FROM personne_presente WHERE personne_presente.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste personne_presente =====================*/
					public function listePersonne_presente(){
					                $sql = "SELECT * FROM personne_presente";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one personne_presente =====================*/
					public function listePersonne_presenteByFiche_de_presenseId($id){
					$sql = "SELECT * FROM personne_presente WHERE  personne_presente.id_fiche = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listePersonne_presenteByPersonneId($id){
					$sql = "SELECT * FROM personne_presente WHERE  personne_presente.id_personne = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many personne_presente =====================*/
					public function listeFiche_de_presenseByPersonne_presenteId($id_fiche){
					$sql = "SELECT * FROM fiche_de_presense WHERE  fiche_de_presense.id_fiche = ".$id_fiche."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listePersonneByPersonne_presenteId($id_personne){
					$sql = "SELECT * FROM personne WHERE  personne.id_personne = ".$id_personne."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addPersonne_presente($personne_presente){
                        $sql = "INSERT INTO personne_presente  VALUES(
                                     null
,
                                     ".$personne_presente->getId_fiche()."
,
                                     ".$personne_presente->getId_personne()."
,
                                     '".$personne_presente->getHeur_depart()."'
,
                                     '".$personne_presente->getHeur_arrive()."'
,
                                     '".$personne_presente->getNbr_heur()."'
,
                                     '".$personne_presente->getPresent()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatepersonne_presente($personne_presente){
                        $sql = "UPDATE personne_presente  SET  personne_presente.id_fiche =  '".$personne_presente->getId_fiche()."' ,personne_presente.id_personne =  '".$personne_presente->getId_personne()."' ,personne_presente.heur_depart =  '".$personne_presente->getHeur_depart()."' ,personne_presente.heur_arrive =  '".$personne_presente->getHeur_arrive()."' ,personne_presente.nbr_heur =  '".$personne_presente->getNbr_heur()."' ,personne_presente.present =  '".$personne_presente->getPresent()."'   WHERE   personne_presente.id =  ".$personne_presente->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete personne_presente =====================*/
					public function deletePersonne_presente($id){
					$sql = "DELETE FROM personne_presente WHERE personne_presente.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If personne_presente existe =====================*/
					public function ifPersonne_presenteexiste($id_fiche){
					$sql = "SELECT * FROM personne_presente WHERE id_fiche='".$id_fiche."' ";
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



