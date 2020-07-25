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
  use src\entities\Frontend;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class FrontendDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count frontend =====================*/
					public function countFrontend(){
					                       return count($this->listeFrontend());
					        }

				/*================== Get frontend =====================*/
					public function getFrontend($IDFR){
					$sql = "SELECT * FROM frontend WHERE frontend.id = ".$IDFR."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste frontend =====================*/
					public function listeFrontend(){
					                $sql = "SELECT * FROM frontend";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one frontend =====================*/

				/*================== One to many frontend =====================*/

               public function addFrontend($frontend){
                        $sql = "INSERT INTO frontend  VALUES(
                                     null
,
                                     '".$frontend->getLibele()."'
,
                                     '".$frontend->getCible()."'
,
                                     '".$frontend->getFsection()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefrontend($frontend){
                        $sql = "UPDATE frontend  SET  frontend.LIBELE =  '".$frontend->getLibele()."' ,frontend.CIBLE =  '".$frontend->getCible()."' ,frontend.FSECTION =  '".$frontend->getFsection()."'   WHERE   frontend.IDFR =  ".$frontend->getIdfr()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete frontend =====================*/
					public function deleteFrontend($IDFR){
					$sql = "DELETE FROM frontend WHERE frontend.IDFR = ".$IDFR."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If frontend existe =====================*/
					public function ifFrontendexiste($LIBELE){
					$sql = "SELECT * FROM frontend WHERE LIBELE='".$LIBELE."' ";
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



