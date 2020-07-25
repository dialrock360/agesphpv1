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

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
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
					public function getFrontend($id){
					$sql = "SELECT * FROM frontend WHERE frontend.id = ".$id."  ";
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
					public function listeFrontendByServiceId($id){
					$sql = "SELECT * FROM frontend WHERE  frontend.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many frontend =====================*/
					public function listeServiceByFrontendId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addFrontend($frontend){
                        $sql = "INSERT INTO frontend  VALUES(
                                     null
,
                                     ".$frontend->getId_service()."
,
                                     '".$frontend->getLibele()."'
,
                                     '".$frontend->getSlidebar()."'
,
                                     '".$frontend->getId_slidebar()."'
,
                                     '".$frontend->getClasse_slidebar()."'
,
                                     '".$frontend->getNmain()."'
,
                                     '".$frontend->getVmain()."'
,
                                     '".$frontend->getSkin()."'
,
                                     '".$frontend->getTheme()."'
,
                                     '".$frontend->getCible()."'
,
                                     '".$frontend->getSection()."'
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
                        $sql = "UPDATE frontend  SET  frontend.id_service =  '".$frontend->getId_service()."' ,frontend.libele =  '".$frontend->getLibele()."' ,frontend.slidebar =  '".$frontend->getSlidebar()."' ,frontend.id_slidebar =  '".$frontend->getId_slidebar()."' ,frontend.classe_slidebar =  '".$frontend->getClasse_slidebar()."' ,frontend.nmain =  '".$frontend->getNmain()."' ,frontend.vmain =  '".$frontend->getVmain()."' ,frontend.skin =  '".$frontend->getSkin()."' ,frontend.theme =  '".$frontend->getTheme()."' ,frontend.cible =  '".$frontend->getCible()."' ,frontend.section =  '".$frontend->getSection()."'   WHERE   frontend.id =  ".$frontend->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete frontend =====================*/
					public function deleteFrontend($id){
					$sql = "DELETE FROM frontend WHERE frontend.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If frontend existe =====================*/
					public function ifFrontendexiste($id_service){
					$sql = "SELECT * FROM frontend WHERE id_service='".$id_service."' ";
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



