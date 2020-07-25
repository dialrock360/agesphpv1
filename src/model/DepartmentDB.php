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
  use src\entities\Department;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
        class DepartmentDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count department =====================*/
					public function countDepartment(){
					                       return count($this->listeDepartment());
					        }

				/*================== Get department =====================*/
					public function getDepartment($iddep){
					$sql = "SELECT * FROM department WHERE department.id = ".$iddep."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste department =====================*/
					public function listeDepartment(){
					                $sql = "SELECT * FROM department";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one department =====================*/

				/*================== One to many department =====================*/

               public function addDepartment($department){
                        $sql = "INSERT INTO department  VALUES(
                                     null
,
                                     '".$department->getIds()."'
,
                                     '".$department->getNomd()."'
,
                                     '".$department->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatedepartment($department){
                        $sql = "UPDATE department  SET  department.ids =  '".$department->getIds()."' ,department.NOMD =  '".$department->getNomd()."' ,department.flag =  '".$department->getFlag()."'   WHERE   department.iddep =  ".$department->getIddep()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete department =====================*/
					public function deleteDepartment($iddep){
					$sql = "DELETE FROM department WHERE department.iddep = ".$iddep."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If department existe =====================*/
					public function ifDepartmentexiste($ids){
					$sql = "SELECT * FROM department WHERE ids='".$ids."' ";
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



