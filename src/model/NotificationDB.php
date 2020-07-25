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
  use src\entities\Notification;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class NotificationDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count notification =====================*/
					public function countNotification(){
					                       return count($this->listeNotification());
					        }

				/*================== Get notification =====================*/
					public function getNotification($IDN){
					$sql = "SELECT * FROM notification WHERE notification.id = ".$IDN."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste notification =====================*/
					public function listeNotification(){
					                $sql = "SELECT * FROM notification";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one notification =====================*/

				/*================== One to many notification =====================*/

               public function addNotification($notification){
                        $sql = "INSERT INTO notification  VALUES(
                                     null
,
                                     '".$notification->getIdo()."'
,
                                     '".$notification->getOrigine()."'
,
                                     '".$notification->getCible()."'
,
                                     '".$notification->getLibele()."'
,
                                     '".$notification->getDatee()."'
,
                                     '".$notification->getEtat()."'
,
                                     '".$notification->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatenotification($notification){
                        $sql = "UPDATE notification  SET  notification.IDO =  '".$notification->getIdo()."' ,notification.ORIGINE =  '".$notification->getOrigine()."' ,notification.CIBLE =  '".$notification->getCible()."' ,notification.LIBELE =  '".$notification->getLibele()."' ,notification.DATEE =  '".$notification->getDatee()."' ,notification.ETAT =  '".$notification->getEtat()."' ,notification.FLAG =  '".$notification->getFlag()."'   WHERE   notification.IDN =  ".$notification->getIdn()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete notification =====================*/
					public function deleteNotification($IDN){
					$sql = "DELETE FROM notification WHERE notification.IDN = ".$IDN."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If notification existe =====================*/
					public function ifNotificationexiste($IDO){
					$sql = "SELECT * FROM notification WHERE IDO='".$IDO."' ";
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



