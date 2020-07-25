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
  use src\entities\Condis;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
        class CondisDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count condis =====================*/
					public function countCondis(){
					                       return count($this->listeCondis());
					        }

				/*================== Get condis =====================*/
					public function getCondis($IDC){
					$sql = "SELECT * FROM condis WHERE condis.id = ".$IDC."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste condis =====================*/
					public function listeCondis(){
					                $sql = "SELECT * FROM condis";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one condis =====================*/

				/*================== One to many condis =====================*/

               public function addCondis($condis){
                        $sql = "INSERT INTO condis  VALUES(
                                     null
,
                                     '".$condis->getNomc()."'
,
                                     '".$condis->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatecondis($condis){
                        $sql = "UPDATE condis  SET  condis.NOMC =  '".$condis->getNomc()."' ,condis.FLAG =  '".$condis->getFlag()."'   WHERE   condis.IDC =  ".$condis->getIdc()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete condis =====================*/
					public function deleteCondis($IDC){
					$sql = "DELETE FROM condis WHERE condis.IDC = ".$IDC."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If condis existe =====================*/
					public function ifCondisexiste($NOMC){
					$sql = "SELECT * FROM condis WHERE NOMC='".$NOMC."' ";
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



