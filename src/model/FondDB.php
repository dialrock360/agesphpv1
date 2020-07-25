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
  use src\entities\Fond;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class FondDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count fond =====================*/
					public function countFond(){
					                       return count($this->listeFond());
					        }

				/*================== Get fond =====================*/
					public function getFond($id){
					$sql = "SELECT * FROM fond WHERE fond.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste fond =====================*/
					public function listeFond(){
					                $sql = "SELECT * FROM fond";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one fond =====================*/

				/*================== One to many fond =====================*/

               public function addFond($fond){
                        $sql = "INSERT INTO fond  VALUES(
                                     null
,
                                     '".$fond->getCapital()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefond($fond){
                        $sql = "UPDATE fond  SET  fond.capital =  '".$fond->getCapital()."'   WHERE   fond.id =  ".$fond->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete fond =====================*/
					public function deleteFond($id){
					$sql = "DELETE FROM fond WHERE fond.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If fond existe =====================*/
					public function ifFondexiste($capital){
					$sql = "SELECT * FROM fond WHERE capital='".$capital."' ";
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



