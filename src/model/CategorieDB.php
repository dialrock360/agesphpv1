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
  use src\entities\Categorie;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
        class CategorieDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count categorie =====================*/
					public function countCategorie(){
					                       return count($this->listeCategorie());
					        }

				/*================== Get categorie =====================*/
					public function getCategorie($ID_CAT){
					$sql = "SELECT * FROM categorie WHERE categorie.id = ".$ID_CAT."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste categorie =====================*/
					public function listeCategorie(){
					                $sql = "SELECT * FROM categorie";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one categorie =====================*/

				/*================== One to many categorie =====================*/

               public function addCategorie($categorie){
                        $sql = "INSERT INTO categorie  VALUES(
                                     null
,
                                     '".$categorie->getIdfa()."'
,
                                     '".$categorie->getNom_cat()."'
,
                                     '".$categorie->getAchat()."'
,
                                     '".$categorie->getVente()."'
,
                                     '".$categorie->getCompt()."'
,
                                     '".$categorie->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatecategorie($categorie){
                        $sql = "UPDATE categorie  SET  categorie.IDFA =  '".$categorie->getIdfa()."' ,categorie.NOM_CAT =  '".$categorie->getNom_cat()."' ,categorie.ACHAT =  '".$categorie->getAchat()."' ,categorie.VENTE =  '".$categorie->getVente()."' ,categorie.COMPT =  '".$categorie->getCompt()."' ,categorie.flag =  '".$categorie->getFlag()."'   WHERE   categorie.ID_CAT =  ".$categorie->getId_cat()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete categorie =====================*/
					public function deleteCategorie($ID_CAT){
					$sql = "DELETE FROM categorie WHERE categorie.ID_CAT = ".$ID_CAT."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If categorie existe =====================*/
					public function ifCategorieexiste($IDFA){
					$sql = "SELECT * FROM categorie WHERE IDFA='".$IDFA."' ";
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



