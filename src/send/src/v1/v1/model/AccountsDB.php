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
  use src\entities\Accounts;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
        class AccountsDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count accounts =====================*/
					public function countAccounts(){
					                       return count($this->listeAccounts());
					        }

				/*================== Get accounts =====================*/
					public function getAccounts($id){
					$sql = "SELECT * FROM accounts WHERE accounts.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste accounts =====================*/
					public function listeAccounts(){
					                $sql = "SELECT * FROM accounts";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one accounts =====================*/
					public function listeAccountsByServiceId($id){
					$sql = "SELECT * FROM accounts WHERE  accounts.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many accounts =====================*/
					public function listeServiceByAccountsId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addAccounts($accounts){
                        $sql = "INSERT INTO accounts  VALUES(
                                     null
,
                                     ".$accounts->getId_service()."
,
                                     '".$accounts->getNom()."'
,
                                     '".$accounts->getAvatar()."'
,
                                     '".$accounts->getLogin()."'
,
                                     '".$accounts->getPassword()."'
,
                                     '".$accounts->getEnabled()."'
,
                                     '".$accounts->getLevelsecurity()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateaccounts($accounts){
                        $sql = "UPDATE accounts  SET  accounts.id_service =  '".$accounts->getId_service()."' ,accounts.nom =  '".$accounts->getNom()."' ,accounts.avatar =  '".$accounts->getAvatar()."' ,accounts.login =  '".$accounts->getLogin()."' ,accounts.password =  '".$accounts->getPassword()."' ,accounts.enabled =  '".$accounts->getEnabled()."' ,accounts.levelsecurity =  '".$accounts->getLevelsecurity()."'   WHERE   accounts.id =  ".$accounts->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete accounts =====================*/
					public function deleteAccounts($id){
					$sql = "DELETE FROM accounts WHERE accounts.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If accounts existe =====================*/
					public function ifAccountsexiste($id_service){
					$sql = "SELECT * FROM accounts WHERE id_service='".$id_service."' ";
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



