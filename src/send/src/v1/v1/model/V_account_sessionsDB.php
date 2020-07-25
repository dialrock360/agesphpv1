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
  use src\entities\V_account_sessions;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class V_account_sessionsDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_account_sessions =====================*/
					public function countV_account_sessions(){
					                       return count($this->listeV_account_sessions());
					        }

				/*================== Get v_account_sessions =====================*/
					public function getV_account_sessions($id){
					$sql = "SELECT * FROM v_account_sessions WHERE v_account_sessions.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_account_sessions =====================*/
					public function listeV_account_sessions(){
					                $sql = "SELECT * FROM v_account_sessions";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_account_sessions =====================*/

				/*================== One to many v_account_sessions =====================*/

               public function addV_account_sessions($v_account_sessions){
                        $sql = "INSERT INTO v_account_sessions  VALUES(
                                     '".$v_account_sessions->getSession_id()."'
,
                                     '".$v_account_sessions->getAccount_id()."'
,
                                     '".$v_account_sessions->getAccount_token()."'
,
                                     '".$v_account_sessions->getLogin_time()."'
,
                                     '".$v_account_sessions->getLogin()."'
,
                                     '".$v_account_sessions->getEnabled()."'
,
                                     '".$v_account_sessions->getLevelsecurity()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_account_sessions($v_account_sessions){
                        $sql = "UPDATE v_account_sessions  SET  v_account_sessions.session_id =  '".$v_account_sessions->getSession_id()."' ,v_account_sessions.account_id =  '".$v_account_sessions->getAccount_id()."' ,v_account_sessions.account_token =  '".$v_account_sessions->getAccount_token()."' ,v_account_sessions.login_time =  '".$v_account_sessions->getLogin_time()."' ,v_account_sessions.login =  '".$v_account_sessions->getLogin()."' ,v_account_sessions.enabled =  '".$v_account_sessions->getEnabled()."' ,v_account_sessions.levelsecurity =  '".$v_account_sessions->getLevelsecurity()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_account_sessions =====================*/
					public function deleteV_account_sessions($id){
					$sql = "DELETE FROM v_account_sessions WHERE v_account_sessions.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_account_sessions existe =====================*/
					public function ifV_account_sessionsexiste($session_id){
					$sql = "SELECT * FROM v_account_sessions WHERE session_id='".$session_id."' ";
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



