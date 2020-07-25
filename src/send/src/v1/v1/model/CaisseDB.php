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
  use src\entities\Caisse;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class CaisseDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count caisse =====================*/
					public function countCaisse(){
					                       return count($this->listeCaisse());
					        }

				/*================== Get caisse =====================*/
					public function getCaisse($id){
					$sql = "SELECT * FROM caisse WHERE caisse.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste caisse =====================*/
					public function listeCaisse(){
					                $sql = "SELECT * FROM caisse";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one caisse =====================*/
					public function listeCaisseByServiceId($id){
					$sql = "SELECT * FROM caisse WHERE  caisse.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many caisse =====================*/
					public function listeServiceByCaisseId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addCaisse($caisse){
                        $sql = "INSERT INTO caisse  VALUES(
                                     null
,
                                     ".$caisse->getId_service()."
,
                                     '".$caisse->getDate_caisse()."'
,
                                     '".$caisse->getSolde_caisse()."'
,
                                     '".$caisse->getDepense_caisse()."'
,
                                     '".$caisse->getGain_caisse()."'
,
                                     '".$caisse->getFlag_caisse()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatecaisse($caisse){
                        $sql = "UPDATE caisse  SET  caisse.id_service =  '".$caisse->getId_service()."' ,caisse.date_caisse =  '".$caisse->getDate_caisse()."' ,caisse.solde_caisse =  '".$caisse->getSolde_caisse()."' ,caisse.depense_caisse =  '".$caisse->getDepense_caisse()."' ,caisse.gain_caisse =  '".$caisse->getGain_caisse()."' ,caisse.flag_caisse =  '".$caisse->getFlag_caisse()."'   WHERE   caisse.id =  ".$caisse->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete caisse =====================*/
					public function deleteCaisse($id){
					$sql = "DELETE FROM caisse WHERE caisse.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If caisse existe =====================*/
					public function ifCaisseexiste($id_service){
					$sql = "SELECT * FROM caisse WHERE id_service='".$id_service."' ";
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



