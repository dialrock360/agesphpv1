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
  use src\entities\Users_roles;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class Users_rolesDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count users_roles =====================*/
					public function countUsers_roles(){
					                       return count($this->listeUsers_roles());
					        }

				/*================== Get users_roles =====================*/
					public function getUsers_roles($id){
					$sql = "SELECT * FROM users_roles WHERE users_roles.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste users_roles =====================*/
					public function listeUsers_roles(){
					                $sql = "SELECT * FROM users_roles";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one users_roles =====================*/

				/*================== One to many users_roles =====================*/

               public function addUsers_roles($users_roles){
                        $sql = "INSERT INTO users_roles  VALUES(
                                     '".$users_roles->getId_user()."'
,
                                     '".$users_roles->getId_role()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateusers_roles($users_roles){
                        $sql = "UPDATE users_roles  SET  users_roles.id_user: =  ".$users_roles->getId_user()." ,users_roles.id_role: =  ".$users_roles->getId_role()."   WHERE   users_roles.id_user: =  ".$users_roles->getId_user()."  AND users_roles.id_role: =  ".$users_roles->getId_role()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete users_roles =====================*/
					public function deleteUsers_roles($id){
					$sql = "DELETE FROM users_roles WHERE users_roles.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If users_roles existe =====================*/
					public function ifUsers_rolesexiste($){
					$sql = "SELECT * FROM users_roles WHERE ='".$."' ";
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



