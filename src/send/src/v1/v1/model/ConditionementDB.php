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
  use src\entities\Conditionement;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class ConditionementDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count conditionement =====================*/
					public function countConditionement(){
					                       return count($this->listeConditionement());
					        }

				/*================== Get conditionement =====================*/
					public function getConditionement($id){
					$sql = "SELECT * FROM conditionement WHERE conditionement.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste conditionement =====================*/
					public function listeConditionement(){
					                $sql = "SELECT * FROM conditionement";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one conditionement =====================*/

				/*================== One to many conditionement =====================*/

               public function addConditionement($conditionement){
                        $sql = "INSERT INTO conditionement  VALUES(
                                     null
,
                                     '".$conditionement->getNom_conditionement()."'
,
                                     '".$conditionement->getNbr_utilisation()."'
,
                                     '".$conditionement->getFlag_conditionement()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateconditionement($conditionement){
                        $sql = "UPDATE conditionement  SET  conditionement.nom_conditionement =  '".$conditionement->getNom_conditionement()."' ,conditionement.nbr_utilisation =  '".$conditionement->getNbr_utilisation()."' ,conditionement.flag_conditionement =  '".$conditionement->getFlag_conditionement()."'   WHERE   conditionement.id =  ".$conditionement->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete conditionement =====================*/
					public function deleteConditionement($id){
					$sql = "DELETE FROM conditionement WHERE conditionement.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If conditionement existe =====================*/
					public function ifConditionementexiste($nom_conditionement){
					$sql = "SELECT * FROM conditionement WHERE nom_conditionement='".$nom_conditionement."' ";
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



