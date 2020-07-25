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

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
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
					public function getEtat_compte($IDE){
					$sql = "SELECT * FROM etat_compte WHERE etat_compte.id = ".$IDE."  ";
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
					public function listeEtat_compteByFamilleId($IDFA){
					$sql = "SELECT * FROM etat_compte WHERE  etat_compte.IDFA = ".$IDFA."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many etat_compte =====================*/
					public function listeFamilleByEtat_compteId($IDFA){
					$sql = "SELECT * FROM famille WHERE  famille.IDFA = ".$IDFA."  ";
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
                                     ".$etat_compte->getIdfa()."
,
                                     '".$etat_compte->getIdmouv()."'
,
                                     '".$etat_compte->getDepense()."'
,
                                     '".$etat_compte->getGains()."'
,
                                     '".$etat_compte->getStock()."'
,
                                     '".$etat_compte->getDatee()."'
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
                        $sql = "UPDATE etat_compte  SET  etat_compte.IDFA =  '".$etat_compte->getIdfa()."' ,etat_compte.IDMOUV =  '".$etat_compte->getIdmouv()."' ,etat_compte.DEPENSE =  '".$etat_compte->getDepense()."' ,etat_compte.GAINS =  '".$etat_compte->getGains()."' ,etat_compte.STOCK =  '".$etat_compte->getStock()."' ,etat_compte.DATEE =  '".$etat_compte->getDatee()."'   WHERE   etat_compte.IDE =  ".$etat_compte->getIde()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete etat_compte =====================*/
					public function deleteEtat_compte($IDE){
					$sql = "DELETE FROM etat_compte WHERE etat_compte.IDE = ".$IDE."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If etat_compte existe =====================*/
					public function ifEtat_compteexiste($IDFA){
					$sql = "SELECT * FROM etat_compte WHERE IDFA='".$IDFA."' ";
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



