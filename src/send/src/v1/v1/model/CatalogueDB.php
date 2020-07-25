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
  use src\entities\Catalogue;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class CatalogueDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count catalogue =====================*/
					public function countCatalogue(){
					                       return count($this->listeCatalogue());
					        }

				/*================== Get catalogue =====================*/
					public function getCatalogue($id){
					$sql = "SELECT * FROM catalogue WHERE catalogue.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste catalogue =====================*/
					public function listeCatalogue(){
					                $sql = "SELECT * FROM catalogue";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one catalogue =====================*/

				/*================== One to many catalogue =====================*/

               public function addCatalogue($catalogue){
                        $sql = "INSERT INTO catalogue  VALUES(
                                     null
,
                                     '".$catalogue->getRef_article()."'
,
                                     '".$catalogue->getType_article()."'
,
                                     '".$catalogue->getNom_article()."'
,
                                     '".$catalogue->getNom_service()."'
,
                                     '".$catalogue->getNom_famille()."'
,
                                     '".$catalogue->getNom_categorie()."'
,
                                     '".$catalogue->getNomenclature_article()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatecatalogue($catalogue){
                        $sql = "UPDATE catalogue  SET  catalogue.ref_article =  '".$catalogue->getRef_article()."' ,catalogue.type_article =  '".$catalogue->getType_article()."' ,catalogue.nom_article =  '".$catalogue->getNom_article()."' ,catalogue.nom_service =  '".$catalogue->getNom_service()."' ,catalogue.nom_famille =  '".$catalogue->getNom_famille()."' ,catalogue.nom_categorie =  '".$catalogue->getNom_categorie()."' ,catalogue.nomenclature_article =  '".$catalogue->getNomenclature_article()."'   WHERE   catalogue.id =  ".$catalogue->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete catalogue =====================*/
					public function deleteCatalogue($id){
					$sql = "DELETE FROM catalogue WHERE catalogue.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If catalogue existe =====================*/
					public function ifCatalogueexiste($ref_article){
					$sql = "SELECT * FROM catalogue WHERE ref_article='".$ref_article."' ";
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



