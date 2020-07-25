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
  use src\entities\Roles;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class RolesDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count roles =====================*/
					public function countRoles(){
					                       return count($this->listeRoles());
					        }

				/*================== Get roles =====================*/
					public function getRoles($id){
					$sql = "SELECT * FROM roles WHERE roles.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste roles =====================*/
					public function listeRoles(){
					                $sql = "SELECT * FROM roles";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one roles =====================*/

				/*================== One to many roles =====================*/

               public function addRoles($roles){
                        $sql = "INSERT INTO roles  VALUES(
                                     '".$roles->getId()."'
,
                                     '".$roles->getNom_role()."'
,
                                     '".$roles->getNbr_users()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateroles($roles){
                        $sql = "UPDATE roles  SET  roles.id =  '".$roles->getId()."' ,roles.nom_role =  '".$roles->getNom_role()."' ,roles.nbr_users =  '".$roles->getNbr_users()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete roles =====================*/
					public function deleteRoles($id){
					$sql = "DELETE FROM roles WHERE roles.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If roles existe =====================*/
					public function ifRolesexiste($id){
					$sql = "SELECT * FROM roles WHERE id='".$id."' ";
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



