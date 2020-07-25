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
  use src\entities\Fiche_production;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Fiche_productionDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count fiche_production =====================*/
					public function countFiche_production(){
					                       return count($this->listeFiche_production());
					        }

				/*================== Get fiche_production =====================*/
					public function getFiche_production($id){
					$sql = "SELECT * FROM fiche_production WHERE fiche_production.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste fiche_production =====================*/
					public function listeFiche_production(){
					                $sql = "SELECT * FROM fiche_production";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one fiche_production =====================*/

				/*================== One to many fiche_production =====================*/

               public function addFiche_production($fiche_production){
                        $sql = "INSERT INTO fiche_production  VALUES(
                                     null
,
                                     '".$fiche_production->getId_projet()."'
,
                                     '".$fiche_production->getDate_fiche_production()."'
,
                                     '".$fiche_production->getUser_id()."'
,
                                     '".$fiche_production->getInfo_fiche_production()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefiche_production($fiche_production){
                        $sql = "UPDATE fiche_production  SET  fiche_production.id_projet =  '".$fiche_production->getId_projet()."' ,fiche_production.date_fiche_production =  '".$fiche_production->getDate_fiche_production()."' ,fiche_production.user_id =  '".$fiche_production->getUser_id()."' ,fiche_production.info_fiche_production =  '".$fiche_production->getInfo_fiche_production()."'   WHERE   fiche_production.id =  ".$fiche_production->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete fiche_production =====================*/
					public function deleteFiche_production($id){
					$sql = "DELETE FROM fiche_production WHERE fiche_production.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If fiche_production existe =====================*/
					public function ifFiche_productionexiste($id_projet){
					$sql = "SELECT * FROM fiche_production WHERE id_projet='".$id_projet."' ";
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



