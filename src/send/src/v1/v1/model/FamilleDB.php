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
  use src\entities\Famille;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class FamilleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count famille =====================*/
					public function countFamille(){
					                       return count($this->listeFamille());
					        }

				/*================== Get famille =====================*/
					public function getFamille($id){
					$sql = "SELECT * FROM famille WHERE famille.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste famille =====================*/
					public function listeFamille(){
					                $sql = "SELECT * FROM famille";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one famille =====================*/
					public function listeFamilleByServiceId($id){
					$sql = "SELECT * FROM famille WHERE  famille.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many famille =====================*/
					public function listeServiceByFamilleId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addFamille($famille){
                        $sql = "INSERT INTO famille  VALUES(
                                     null
,
                                     ".$famille->getId_service()."
,
                                     '".$famille->getNom_famille()."'
,
                                     '".$famille->getColor_famille()."'
,
                                     '".$famille->getNbr_categorie_famille()."'
,
                                     '".$famille->getValeur_famille()."'
,
                                     '".$famille->getFlag_famille()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefamille($famille){
                        $sql = "UPDATE famille  SET  famille.id_service =  '".$famille->getId_service()."' ,famille.nom_famille =  '".$famille->getNom_famille()."' ,famille.color_famille =  '".$famille->getColor_famille()."' ,famille.nbr_categorie_famille =  '".$famille->getNbr_categorie_famille()."' ,famille.valeur_famille =  '".$famille->getValeur_famille()."' ,famille.flag_famille =  '".$famille->getFlag_famille()."'   WHERE   famille.id =  ".$famille->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete famille =====================*/
					public function deleteFamille($id){
					$sql = "DELETE FROM famille WHERE famille.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If famille existe =====================*/
					public function ifFamilleexiste($id_service){
					$sql = "SELECT * FROM famille WHERE id_service='".$id_service."' ";
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



