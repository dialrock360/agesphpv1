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
  use src\entities\Nomenclature_article;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Nomenclature_articleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count nomenclature_article =====================*/
					public function countNomenclature_article(){
					                       return count($this->listeNomenclature_article());
					        }

				/*================== Get nomenclature_article =====================*/
					public function getNomenclature_article($id){
					$sql = "SELECT * FROM nomenclature_article WHERE nomenclature_article.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste nomenclature_article =====================*/
					public function listeNomenclature_article(){
					                $sql = "SELECT * FROM nomenclature_article";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one nomenclature_article =====================*/

				/*================== One to many nomenclature_article =====================*/

               public function addNomenclature_article($nomenclature_article){
                        $sql = "INSERT INTO nomenclature_article  VALUES(
                                     null
,
                                     '".$nomenclature_article->getRef_nomenclature_article()."'
,
                                     '".$nomenclature_article->getNom_nomenclature_article()."'
,
                                     '".$nomenclature_article->getCode_couleur()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatenomenclature_article($nomenclature_article){
                        $sql = "UPDATE nomenclature_article  SET  nomenclature_article.ref_nomenclature_article =  '".$nomenclature_article->getRef_nomenclature_article()."' ,nomenclature_article.nom_nomenclature_article =  '".$nomenclature_article->getNom_nomenclature_article()."' ,nomenclature_article.code_couleur =  '".$nomenclature_article->getCode_couleur()."'   WHERE   nomenclature_article.id =  ".$nomenclature_article->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete nomenclature_article =====================*/
					public function deleteNomenclature_article($id){
					$sql = "DELETE FROM nomenclature_article WHERE nomenclature_article.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If nomenclature_article existe =====================*/
					public function ifNomenclature_articleexiste($ref_nomenclature_article){
					$sql = "SELECT * FROM nomenclature_article WHERE ref_nomenclature_article='".$ref_nomenclature_article."' ";
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



