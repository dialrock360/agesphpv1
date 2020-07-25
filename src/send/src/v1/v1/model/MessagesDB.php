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
  use src\entities\Messages;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class MessagesDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count messages =====================*/
					public function countMessages(){
					                       return count($this->listeMessages());
					        }

				/*================== Get messages =====================*/
					public function getMessages($id){
					$sql = "SELECT * FROM messages WHERE messages.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste messages =====================*/
					public function listeMessages(){
					                $sql = "SELECT * FROM messages";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one messages =====================*/
					public function listeMessagesByServiceId($id){
					$sql = "SELECT * FROM messages WHERE  messages.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many messages =====================*/
					public function listeServiceByMessagesId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addMessages($messages){
                        $sql = "INSERT INTO messages  VALUES(
                                     null
,
                                     ".$messages->getId_service()."
,
                                     '".$messages->getDate_message()."'
,
                                     '".$messages->getObject_message()."'
,
                                     '".$messages->getPj_message()."'
,
                                     '".$messages->getOrigine_message()."'
,
                                     '".$messages->getCible_message()."'
,
                                     '".$messages->getAttribute_10()."'
,
                                     '".$messages->getAttribute_11()."'
,
                                     '".$messages->getId_origine()."'
,
                                     '".$messages->getId_sible()."'
,
                                     '".$messages->getContent_message()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatemessages($messages){
                        $sql = "UPDATE messages  SET  messages.id_service =  '".$messages->getId_service()."' ,messages.date_message =  '".$messages->getDate_message()."' ,messages.object_message =  '".$messages->getObject_message()."' ,messages.pj_message =  '".$messages->getPj_message()."' ,messages.origine_message =  '".$messages->getOrigine_message()."' ,messages.cible_message =  '".$messages->getCible_message()."' ,messages.Attribute_10 =  '".$messages->getAttribute_10()."' ,messages.Attribute_11 =  '".$messages->getAttribute_11()."' ,messages.id_origine =  '".$messages->getId_origine()."' ,messages.id_sible =  '".$messages->getId_sible()."' ,messages.content_message =  '".$messages->getContent_message()."'   WHERE   messages.id =  ".$messages->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete messages =====================*/
					public function deleteMessages($id){
					$sql = "DELETE FROM messages WHERE messages.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If messages existe =====================*/
					public function ifMessagesexiste($id_service){
					$sql = "SELECT * FROM messages WHERE id_service='".$id_service."' ";
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



