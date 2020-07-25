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

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
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
					public function getCategorie($id){
					$sql = "SELECT * FROM categorie WHERE categorie.id = ".$id."  ";
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
					public function listeCategorieByFamilleId($id){
					$sql = "SELECT * FROM categorie WHERE  categorie.id_famille = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeCategorieByNomenclature_articleId($id){
					$sql = "SELECT * FROM categorie WHERE  categorie.id_nomenclature_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many categorie =====================*/
					public function listeFamilleByCategorieId($id_famille){
					$sql = "SELECT * FROM famille WHERE  famille.id_famille = ".$id_famille."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeNomenclature_articleByCategorieId($id_nomenclature_article){
					$sql = "SELECT * FROM nomenclature_article WHERE  nomenclature_article.id_nomenclature_article = ".$id_nomenclature_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addCategorie($categorie){
                        $sql = "INSERT INTO categorie  VALUES(
                                     null
,
                                     ".$categorie->getId_famille()."
,
                                     ".$categorie->getId_nomenclature_article()."
,
                                     '".$categorie->getNom_categorie()."'
,
                                     '".$categorie->getNbr_produit_categorie()."'
,
                                     '".$categorie->getValeur_categorie()."'
,
                                     '".$categorie->getFlag_categorie()."'
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
                        $sql = "UPDATE categorie  SET  categorie.id_famille =  '".$categorie->getId_famille()."' ,categorie.nom_categorie =  '".$categorie->getNom_categorie()."' ,categorie.nbr_produit_categorie =  '".$categorie->getNbr_produit_categorie()."' ,categorie.valeur_categorie =  '".$categorie->getValeur_categorie()."' ,categorie.id_nomenclature_article =  '".$categorie->getId_nomenclature_article()."' ,categorie.flag_categorie =  '".$categorie->getFlag_categorie()."'   WHERE   categorie.id =  ".$categorie->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete categorie =====================*/
					public function deleteCategorie($id){
					$sql = "DELETE FROM categorie WHERE categorie.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If categorie existe =====================*/
					public function ifCategorieexiste($id_famille){
					$sql = "SELECT * FROM categorie WHERE id_famille='".$id_famille."' ";
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



