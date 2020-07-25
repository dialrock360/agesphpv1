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
  use src\entities\Module;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class ModuleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count module =====================*/
					public function countModule(){
					                       return count($this->listeModule());
					        }

				/*================== Get module =====================*/
					public function getModule($id){
					$sql = "SELECT * FROM module WHERE module.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste module =====================*/
					public function listeModule(){
					                $sql = "SELECT * FROM module";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one module =====================*/

				/*================== One to many module =====================*/

               public function addModule($module){
                        $sql = "INSERT INTO module  VALUES(
                                     null
,
                                     '".$module->getRef_module()."'
,
                                     '".$module->getNom_module()."'
,
                                     '".$module->getActif()."'
,
                                     '".$module->getModule_principal()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatemodule($module){
                        $sql = "UPDATE module  SET  module.ref_module =  '".$module->getRef_module()."' ,module.nom_module =  '".$module->getNom_module()."' ,module.actif =  '".$module->getActif()."' ,module.module_principal =  '".$module->getModule_principal()."'   WHERE   module.id =  ".$module->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete module =====================*/
					public function deleteModule($id){
					$sql = "DELETE FROM module WHERE module.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If module existe =====================*/
					public function ifModuleexiste($ref_module){
					$sql = "SELECT * FROM module WHERE ref_module='".$ref_module."' ";
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



