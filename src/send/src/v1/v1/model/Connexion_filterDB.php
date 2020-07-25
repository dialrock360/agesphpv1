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
  use src\entities\Connexion_filter;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Connexion_filterDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count connexion_filter =====================*/
					public function countConnexion_filter(){
					                       return count($this->listeConnexion_filter());
					        }

				/*================== Get connexion_filter =====================*/
					public function getConnexion_filter($id){
					$sql = "SELECT * FROM connexion_filter WHERE connexion_filter.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste connexion_filter =====================*/
					public function listeConnexion_filter(){
					                $sql = "SELECT * FROM connexion_filter";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one connexion_filter =====================*/

				/*================== One to many connexion_filter =====================*/

               public function addConnexion_filter($connexion_filter){
                        $sql = "INSERT INTO connexion_filter  VALUES(
                                     '".$connexion_filter->getIp()."'
,
                                     '".$connexion_filter->getNbr_failled_conexion()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateconnexion_filter($connexion_filter){
                        $sql = "UPDATE connexion_filter  SET  connexion_filter.ip: =  ".$connexion_filter->getIp()." ,connexion_filter.nbr_failled_conexion =  '".$connexion_filter->getNbr_failled_conexion()."'   WHERE   connexion_filter.ip: =  ".$connexion_filter->getIp()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete connexion_filter =====================*/
					public function deleteConnexion_filter($id){
					$sql = "DELETE FROM connexion_filter WHERE connexion_filter.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If connexion_filter existe =====================*/
					public function ifConnexion_filterexiste($nbr_failled_conexion){
					$sql = "SELECT * FROM connexion_filter WHERE nbr_failled_conexion='".$nbr_failled_conexion."' ";
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



