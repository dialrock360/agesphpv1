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
  use src\entities\Log;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class LogDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count log =====================*/
					public function countLog(){
					                       return count($this->listeLog());
					        }

				/*================== Get log =====================*/
					public function getLog($idl){
					$sql = "SELECT * FROM log WHERE log.id = ".$idl."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste log =====================*/
					public function listeLog(){
					                $sql = "SELECT * FROM log";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one log =====================*/

				/*================== One to many log =====================*/

               public function addLog($log){
                        $sql = "INSERT INTO log  VALUES(
                                     null
,
                                     '".$log->getIdmv()."'
,
                                     '".$log->getConten()."'
,
                                     '".$log->getDatelog()."'
,
                                     '".$log->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatelog($log){
                        $sql = "UPDATE log  SET  log.IDMV =  '".$log->getIdmv()."' ,log.conten =  '".$log->getConten()."' ,log.datelog =  '".$log->getDatelog()."' ,log.flag =  '".$log->getFlag()."'   WHERE   log.idl =  ".$log->getIdl()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete log =====================*/
					public function deleteLog($idl){
					$sql = "DELETE FROM log WHERE log.idl = ".$idl."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If log existe =====================*/
					public function ifLogexiste($IDMV){
					$sql = "SELECT * FROM log WHERE IDMV='".$IDMV."' ";
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



