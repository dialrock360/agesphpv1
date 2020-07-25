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
  use src\entities\Image;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class ImageDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count image =====================*/
					public function countImage(){
					                       return count($this->listeImage());
					        }

				/*================== Get image =====================*/
					public function getImage($IDIMG){
					$sql = "SELECT * FROM image WHERE image.id = ".$IDIMG."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste image =====================*/
					public function listeImage(){
					                $sql = "SELECT * FROM image";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one image =====================*/

				/*================== One to many image =====================*/

               public function addImage($image){
                        $sql = "INSERT INTO image  VALUES(
                                     null
,
                                     '".$image->getIdo()."'
,
                                     '".$image->getLink()."'
,
                                     '".$image->getOrigin()."'
,
                                     '".$image->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateimage($image){
                        $sql = "UPDATE image  SET  image.IDO =  '".$image->getIdo()."' ,image.LINK =  '".$image->getLink()."' ,image.ORIGIN =  '".$image->getOrigin()."' ,image.FLAG =  '".$image->getFlag()."'   WHERE   image.IDIMG =  ".$image->getIdimg()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete image =====================*/
					public function deleteImage($IDIMG){
					$sql = "DELETE FROM image WHERE image.IDIMG = ".$IDIMG."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If image existe =====================*/
					public function ifImageexiste($IDO){
					$sql = "SELECT * FROM image WHERE IDO='".$IDO."' ";
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



