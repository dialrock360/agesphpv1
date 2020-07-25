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

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
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
					public function getFamille($IDFA){
					$sql = "SELECT * FROM famille WHERE famille.id = ".$IDFA."  ";
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

				/*================== One to many famille =====================*/

               public function addFamille($famille){
                        $sql = "INSERT INTO famille  VALUES(
                                     null
,
                                     '".$famille->getDesi()."'
,
                                     '".$famille->getColor()."'
,
                                     '".$famille->getFlag()."'
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
                        $sql = "UPDATE famille  SET  famille.DESI =  '".$famille->getDesi()."' ,famille.COLOR =  '".$famille->getColor()."' ,famille.FLAG =  '".$famille->getFlag()."'   WHERE   famille.IDFA =  ".$famille->getIdfa()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete famille =====================*/
					public function deleteFamille($IDFA){
					$sql = "DELETE FROM famille WHERE famille.IDFA = ".$IDFA."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If famille existe =====================*/
					public function ifFamilleexiste($DESI){
					$sql = "SELECT * FROM famille WHERE DESI='".$DESI."' ";
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



