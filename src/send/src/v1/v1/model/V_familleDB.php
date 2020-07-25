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
  use src\entities\V_famille;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class V_familleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_famille =====================*/
					public function countV_famille(){
					                       return count($this->listeV_famille());
					        }

				/*================== Get v_famille =====================*/
					public function getV_famille($id){
					$sql = "SELECT * FROM v_famille WHERE v_famille.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_famille =====================*/
					public function listeV_famille(){
					                $sql = "SELECT * FROM v_famille";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_famille =====================*/

				/*================== One to many v_famille =====================*/

               public function addV_famille($v_famille){
                        $sql = "INSERT INTO v_famille  VALUES(
                                     '".$v_famille->getId()."'
,
                                     '".$v_famille->getId_service()."'
,
                                     '".$v_famille->getNom_famille()."'
,
                                     '".$v_famille->getColor_famille()."'
,
                                     '".$v_famille->getNbr_categorie_famille()."'
,
                                     '".$v_famille->getValeur_famille()."'
,
                                     '".$v_famille->getFlag_famille()."'
,
                                     '".$v_famille->getNom_service()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_famille($v_famille){
                        $sql = "UPDATE v_famille  SET  v_famille.id =  '".$v_famille->getId()."' ,v_famille.id_service =  '".$v_famille->getId_service()."' ,v_famille.nom_famille =  '".$v_famille->getNom_famille()."' ,v_famille.color_famille =  '".$v_famille->getColor_famille()."' ,v_famille.nbr_categorie_famille =  '".$v_famille->getNbr_categorie_famille()."' ,v_famille.valeur_famille =  '".$v_famille->getValeur_famille()."' ,v_famille.flag_famille =  '".$v_famille->getFlag_famille()."' ,v_famille.nom_service =  '".$v_famille->getNom_service()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_famille =====================*/
					public function deleteV_famille($id){
					$sql = "DELETE FROM v_famille WHERE v_famille.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_famille existe =====================*/
					public function ifV_familleexiste($id){
					$sql = "SELECT * FROM v_famille WHERE id='".$id."' ";
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



