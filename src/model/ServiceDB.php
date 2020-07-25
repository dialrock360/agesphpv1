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
  use src\entities\Service;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class ServiceDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count service =====================*/
					public function countService(){
					                       return count($this->listeService());
					        }

				/*================== Get service =====================*/
					public function getService($ids){
					$sql = "SELECT * FROM service WHERE service.id = ".$ids."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste service =====================*/
					public function listeService(){
					                $sql = "SELECT * FROM service";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one service =====================*/

				/*================== One to many service =====================*/

               public function addService($service){
                        $sql = "INSERT INTO service  VALUES(
                                     null
,
                                     '".$service->getNinea()."'
,
                                     '".$service->getNom()."'
,
                                     '".$service->getSigle()."'
,
                                     '".$service->getEmail()."'
,
                                     '".$service->getTel()."'
,
                                     '".$service->getAdress()."'
,
                                     '".$service->getSecteur_e()."'
,
                                     '".$service->getType()."'
,
                                     '".$service->getCa()."'
,
                                     '".$service->getLogo()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateservice($service){
                        $sql = "UPDATE service  SET  service.ninea =  '".$service->getNinea()."' ,service.nom =  '".$service->getNom()."' ,service.sigle =  '".$service->getSigle()."' ,service.email =  '".$service->getEmail()."' ,service.tel =  '".$service->getTel()."' ,service.adress =  '".$service->getAdress()."' ,service.secteur_E =  '".$service->getSecteur_e()."' ,service.type =  '".$service->getType()."' ,service.ca =  '".$service->getCa()."' ,service.logo =  '".$service->getLogo()."'   WHERE   service.ids =  ".$service->getIds()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete service =====================*/
					public function deleteService($ids){
					$sql = "DELETE FROM service WHERE service.ids = ".$ids."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If service existe =====================*/
					public function ifServiceexiste($ninea){
					$sql = "SELECT * FROM service WHERE ninea='".$ninea."' ";
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



