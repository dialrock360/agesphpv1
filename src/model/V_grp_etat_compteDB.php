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
  use src\entities\V_grp_etat_compte;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_grp_etat_compteDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_grp_etat_compte =====================*/
					public function countV_grp_etat_compte(){
					                       return count($this->listeV_grp_etat_compte());
					        }

				/*================== Get v_grp_etat_compte =====================*/
					public function getV_grp_etat_compte($id){
					$sql = "SELECT * FROM v_grp_etat_compte WHERE v_grp_etat_compte.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_grp_etat_compte =====================*/
					public function listeV_grp_etat_compte(){
					                $sql = "SELECT * FROM v_grp_etat_compte";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_grp_etat_compte =====================*/

				/*================== One to many v_grp_etat_compte =====================*/

               public function addV_grp_etat_compte($v_grp_etat_compte){
                        $sql = "INSERT INTO v_grp_etat_compte  VALUES(
                                     '".$v_grp_etat_compte->getIde()."'
,
                                     '".$v_grp_etat_compte->getIdfa()."'
,
                                     '".$v_grp_etat_compte->getIdmouv()."'
,
                                     '".$v_grp_etat_compte->getDepense()."'
,
                                     '".$v_grp_etat_compte->getGains()."'
,
                                     '".$v_grp_etat_compte->getStock()."'
,
                                     '".$v_grp_etat_compte->getDatee()."'
,
                                     '".$v_grp_etat_compte->getDesi()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_grp_etat_compte($v_grp_etat_compte){
                        $sql = "UPDATE v_grp_etat_compte  SET  v_grp_etat_compte.IDE =  '".$v_grp_etat_compte->getIde()."' ,v_grp_etat_compte.IDFA =  '".$v_grp_etat_compte->getIdfa()."' ,v_grp_etat_compte.IDMOUV =  '".$v_grp_etat_compte->getIdmouv()."' ,v_grp_etat_compte.DEPENSE =  '".$v_grp_etat_compte->getDepense()."' ,v_grp_etat_compte.GAINS =  '".$v_grp_etat_compte->getGains()."' ,v_grp_etat_compte.STOCK =  '".$v_grp_etat_compte->getStock()."' ,v_grp_etat_compte.DATEE =  '".$v_grp_etat_compte->getDatee()."' ,v_grp_etat_compte.DESI =  '".$v_grp_etat_compte->getDesi()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_grp_etat_compte =====================*/
					public function deleteV_grp_etat_compte($id){
					$sql = "DELETE FROM v_grp_etat_compte WHERE v_grp_etat_compte.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_grp_etat_compte existe =====================*/
					public function ifV_grp_etat_compteexiste($IDE){
					$sql = "SELECT * FROM v_grp_etat_compte WHERE IDE='".$IDE."' ";
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



