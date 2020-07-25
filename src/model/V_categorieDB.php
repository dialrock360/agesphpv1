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
  use src\entities\V_categorie;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_categorieDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_categorie =====================*/
					public function countV_categorie(){
					                       return count($this->listeV_categorie());
					        }

				/*================== Get v_categorie =====================*/
					public function getV_categorie($id){
					$sql = "SELECT * FROM v_categorie WHERE v_categorie.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_categorie =====================*/
					public function listeV_categorie(){
					                $sql = "SELECT * FROM v_categorie";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_categorie =====================*/

				/*================== One to many v_categorie =====================*/

               public function addV_categorie($v_categorie){
                        $sql = "INSERT INTO v_categorie  VALUES(
                                     '".$v_categorie->getId_cat()."'
,
                                     '".$v_categorie->getIdfa()."'
,
                                     '".$v_categorie->getNom_cat()."'
,
                                     '".$v_categorie->getAchat()."'
,
                                     '".$v_categorie->getVente()."'
,
                                     '".$v_categorie->getCompt()."'
,
                                     '".$v_categorie->getFlag()."'
,
                                     '".$v_categorie->getDesi()."'
,
                                     '".$v_categorie->getColor()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_categorie($v_categorie){
                        $sql = "UPDATE v_categorie  SET  v_categorie.ID_CAT =  '".$v_categorie->getId_cat()."' ,v_categorie.IDFA =  '".$v_categorie->getIdfa()."' ,v_categorie.NOM_CAT =  '".$v_categorie->getNom_cat()."' ,v_categorie.ACHAT =  '".$v_categorie->getAchat()."' ,v_categorie.VENTE =  '".$v_categorie->getVente()."' ,v_categorie.COMPT =  '".$v_categorie->getCompt()."' ,v_categorie.flag =  '".$v_categorie->getFlag()."' ,v_categorie.DESI =  '".$v_categorie->getDesi()."' ,v_categorie.COLOR =  '".$v_categorie->getColor()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_categorie =====================*/
					public function deleteV_categorie($id){
					$sql = "DELETE FROM v_categorie WHERE v_categorie.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_categorie existe =====================*/
					public function ifV_categorieexiste($ID_CAT){
					$sql = "SELECT * FROM v_categorie WHERE ID_CAT='".$ID_CAT."' ";
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



