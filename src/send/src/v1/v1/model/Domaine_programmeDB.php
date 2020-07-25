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
  use src\entities\Domaine_programme;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Domaine_programmeDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count domaine_programme =====================*/
					public function countDomaine_programme(){
					                       return count($this->listeDomaine_programme());
					        }

				/*================== Get domaine_programme =====================*/
					public function getDomaine_programme($id){
					$sql = "SELECT * FROM domaine_programme WHERE domaine_programme.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste domaine_programme =====================*/
					public function listeDomaine_programme(){
					                $sql = "SELECT * FROM domaine_programme";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one domaine_programme =====================*/

				/*================== One to many domaine_programme =====================*/

               public function addDomaine_programme($domaine_programme){
                        $sql = "INSERT INTO domaine_programme  VALUES(
                                     null
,
                                     '".$domaine_programme->getNom_domaine_programme()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatedomaine_programme($domaine_programme){
                        $sql = "UPDATE domaine_programme  SET  domaine_programme.nom_domaine_programme =  '".$domaine_programme->getNom_domaine_programme()."'   WHERE   domaine_programme.id =  ".$domaine_programme->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete domaine_programme =====================*/
					public function deleteDomaine_programme($id){
					$sql = "DELETE FROM domaine_programme WHERE domaine_programme.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If domaine_programme existe =====================*/
					public function ifDomaine_programmeexiste($nom_domaine_programme){
					$sql = "SELECT * FROM domaine_programme WHERE nom_domaine_programme='".$nom_domaine_programme."' ";
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



