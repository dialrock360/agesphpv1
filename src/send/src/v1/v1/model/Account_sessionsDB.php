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
  use src\entities\Account_sessions;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
        class Account_sessionsDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count account_sessions =====================*/
					public function countAccount_sessions(){
					                       return count($this->listeAccount_sessions());
					        }

				/*================== Get account_sessions =====================*/
					public function getAccount_sessions($id){
					$sql = "SELECT * FROM account_sessions WHERE account_sessions.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste account_sessions =====================*/
					public function listeAccount_sessions(){
					                $sql = "SELECT * FROM account_sessions";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one account_sessions =====================*/
					public function listeAccount_sessionsByAccountsId($id){
					$sql = "SELECT * FROM account_sessions WHERE  account_sessions.account_id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeAccount_sessionsByAccountsId($id){
					$sql = "SELECT * FROM account_sessions WHERE  account_sessions.account_id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many account_sessions =====================*/
					public function listeAccountsByAccount_sessionsId($account_id){
					$sql = "SELECT * FROM accounts WHERE  accounts.account_id = ".$account_id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeAccountsByAccount_sessionsId($account_id){
					$sql = "SELECT * FROM accounts WHERE  accounts.account_id = ".$account_id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addAccount_sessions($account_sessions){
                        $sql = "INSERT INTO account_sessions  VALUES(
                                     '".$account_sessions->getSession_id()."'
,
                                     ".$account_sessions->getAccount_id()."
,
                                     ".$account_sessions->getAccount_id()."
,
                                     '".$account_sessions->getAccount_token()."'
,
                                     '".$account_sessions->getLogin_time()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateaccount_sessions($account_sessions){
                        $sql = "UPDATE account_sessions  SET  account_sessions.session_id: =  ".$account_sessions->getSession_id()." ,account_sessions.account_id =  '".$account_sessions->getAccount_id()."' ,account_sessions.account_token =  '".$account_sessions->getAccount_token()."' ,account_sessions.login_time =  '".$account_sessions->getLogin_time()."'   WHERE   account_sessions.session_id: =  ".$account_sessions->getSession_id()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete account_sessions =====================*/
					public function deleteAccount_sessions($id){
					$sql = "DELETE FROM account_sessions WHERE account_sessions.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If account_sessions existe =====================*/
					public function ifAccount_sessionsexiste($account_id){
					$sql = "SELECT * FROM account_sessions WHERE account_id='".$account_id."' ";
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



