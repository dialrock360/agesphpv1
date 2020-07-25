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
  use src\entities\Article;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
        class ArticleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count article =====================*/
					public function countArticle(){
					                       return count($this->listeArticle());
					        }

				/*================== Get article =====================*/
					public function getArticle($id){
					$sql = "SELECT * FROM article WHERE article.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste article =====================*/
					public function listeArticle(){
					                $sql = "SELECT * FROM article";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one article =====================*/
					public function listeArticleByCatalogueId($id){
					$sql = "SELECT * FROM article WHERE  article.id_catalogue = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeArticleByCategorieId($id){
					$sql = "SELECT * FROM article WHERE  article.id_categorie = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many article =====================*/
					public function listeCatalogueByArticleId($id_catalogue){
					$sql = "SELECT * FROM catalogue WHERE  catalogue.id_catalogue = ".$id_catalogue."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeCategorieByArticleId($id_categorie){
					$sql = "SELECT * FROM categorie WHERE  categorie.id_categorie = ".$id_categorie."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addArticle($article){
                        $sql = "INSERT INTO article  VALUES(
                                     null
,
                                     ".$article->getId_catalogue()."
,
                                     ".$article->getId_categorie()."
,
                                     '".$article->getType_article()."'
,
                                     '".$article->getFiche_technique()."'
,
                                     '".$article->getNbrstockage()."'
,
                                     '".$article->getTabidstock()."'
,
                                     '".$article->getValeur_article()."'
,
                                     '".$article->getFlag_article()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatearticle($article){
                        $sql = "UPDATE article  SET  article.type_article =  '".$article->getType_article()."' ,article.id_categorie =  '".$article->getId_categorie()."' ,article.id_catalogue =  '".$article->getId_catalogue()."' ,article.fiche_technique =  '".$article->getFiche_technique()."' ,article.nbrstockage =  '".$article->getNbrstockage()."' ,article.tabidstock =  '".$article->getTabidstock()."' ,article.valeur_article =  '".$article->getValeur_article()."' ,article.flag_article =  '".$article->getFlag_article()."'   WHERE   article.id =  ".$article->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete article =====================*/
					public function deleteArticle($id){
					$sql = "DELETE FROM article WHERE article.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If article existe =====================*/
					public function ifArticleexiste($type_article){
					$sql = "SELECT * FROM article WHERE type_article='".$type_article."' ";
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



