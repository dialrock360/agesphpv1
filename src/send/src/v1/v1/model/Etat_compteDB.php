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
  use src\entities\Etat_compte;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Etat_compteDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count etat_compte =====================*/
					public function countEtat_compte(){
					                       return count($this->listeEtat_compte());
					        }

				/*================== Get etat_compte =====================*/
					public function getEtat_compte($id){
					$sql = "SELECT * FROM etat_compte WHERE etat_compte.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste etat_compte =====================*/
					public function listeEtat_compte(){
					                $sql = "SELECT * FROM etat_compte";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one etat_compte =====================*/
					public function listeEtat_compteByFamilleId($id){
					$sql = "SELECT * FROM etat_compte WHERE  etat_compte.id_famille = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeEtat_compteByMouvementId($id){
					$sql = "SELECT * FROM etat_compte WHERE  etat_compte.id_mouvement = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many etat_compte =====================*/
					public function listeFamilleByEtat_compteId($id_famille){
					$sql = "SELECT * FROM famille WHERE  famille.id_famille = ".$id_famille."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMouvementByEtat_compteId($id_mouvement){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_mouvement = ".$id_mouvement."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addEtat_compte($etat_compte){
                        $sql = "INSERT INTO etat_compte  VALUES(
                                     null
,
                                     ".$etat_compte->getId_famille()."
,
                                     ".$etat_compte->getId_mouvement()."
,
                                     '".$etat_compte->getDate_etat_compte()."'
,
                                     '".$etat_compte->getDepense_etat_compte()."'
,
                                     '".$etat_compte->getGain_etat_compte()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateetat_compte($etat_compte){
                        $sql = "UPDATE etat_compte  SET  etat_compte.id_famille =  '".$etat_compte->getId_famille()."' ,etat_compte.id_mouvement =  '".$etat_compte->getId_mouvement()."' ,etat_compte.date_etat_compte =  '".$etat_compte->getDate_etat_compte()."' ,etat_compte.depense_etat_compte =  '".$etat_compte->getDepense_etat_compte()."' ,etat_compte.gain_etat_compte =  '".$etat_compte->getGain_etat_compte()."'   WHERE   etat_compte.id =  ".$etat_compte->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete etat_compte =====================*/
					public function deleteEtat_compte($id){
					$sql = "DELETE FROM etat_compte WHERE etat_compte.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If etat_compte existe =====================*/
					public function ifEtat_compteexiste($id_famille){
					$sql = "SELECT * FROM etat_compte WHERE id_famille='".$id_famille."' ";
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



