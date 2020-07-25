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
  use src\entities\Photo_article;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Photo_articleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count photo_article =====================*/
					public function countPhoto_article(){
					                       return count($this->listePhoto_article());
					        }

				/*================== Get photo_article =====================*/
					public function getPhoto_article($id){
					$sql = "SELECT * FROM photo_article WHERE photo_article.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste photo_article =====================*/
					public function listePhoto_article(){
					                $sql = "SELECT * FROM photo_article";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one photo_article =====================*/
					public function listePhoto_articleByArticleId($id){
					$sql = "SELECT * FROM photo_article WHERE  photo_article.id_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listePhoto_articleByServiceId($id){
					$sql = "SELECT * FROM photo_article WHERE  photo_article.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many photo_article =====================*/
					public function listeArticleByPhoto_articleId($id_article){
					$sql = "SELECT * FROM article WHERE  article.id_article = ".$id_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeServiceByPhoto_articleId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addPhoto_article($photo_article){
                        $sql = "INSERT INTO photo_article  VALUES(
                                     null
,
                                     ".$photo_article->getId_article()."
,
                                     ".$photo_article->getId_service()."
,
                                     '".$photo_article->getPath_photo()."'
,
                                     '".$photo_article->getMaster()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatephoto_article($photo_article){
                        $sql = "UPDATE photo_article  SET  photo_article.id_service =  '".$photo_article->getId_service()."' ,photo_article.id_article =  '".$photo_article->getId_article()."' ,photo_article.path_photo =  '".$photo_article->getPath_photo()."' ,photo_article.master =  '".$photo_article->getMaster()."'   WHERE   photo_article.id =  ".$photo_article->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete photo_article =====================*/
					public function deletePhoto_article($id){
					$sql = "DELETE FROM photo_article WHERE photo_article.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If photo_article existe =====================*/
					public function ifPhoto_articleexiste($id_service){
					$sql = "SELECT * FROM photo_article WHERE id_service='".$id_service."' ";
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



