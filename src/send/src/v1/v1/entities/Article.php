<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



     namespace src\entities;
      use libs\system\Entitie;
    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/

        class Article extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $id_categorie;
        private  $id_catalogue;
        private  $type_article;
        private  $fiche_technique;
        private  $nbrstockage;
        private  $tabidstock;
        private  $valeur_article;
        private  $flag_article;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="article";
                 $this->id = 'null' ;
                 $this->id_categorie = 0 ;
                 $this->id_catalogue = 0 ;
                 $this->type_article = "" ;
                 $this->fiche_technique = "" ;
                 $this->nbrstockage = 0 ;
                 $this->tabidstock = "" ;
                 $this->valeur_article = 0 ;
                 $this->flag_article = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getId_categorie()
                 {
                     return $this->id_categorie;
                 }

             public function getId_catalogue()
                 {
                     return $this->id_catalogue;
                 }

             public function getType_article()
                 {
                     return $this->type_article;
                 }

             public function getFiche_technique()
                 {
                     return $this->fiche_technique;
                 }

             public function getNbrstockage()
                 {
                     return $this->nbrstockage;
                 }

             public function getTabidstock()
                 {
                     return $this->tabidstock;
                 }

             public function getValeur_article()
                 {
                     return $this->valeur_article;
                 }

             public function getFlag_article()
                 {
                     return $this->flag_article;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setId_categorie($id_categorie)
                 {
                      $this->id_categorie = $id_categorie;
                 }

             public function setId_catalogue($id_catalogue)
                 {
                      $this->id_catalogue = $id_catalogue;
                 }

             public function setType_article($type_article)
                 {
                      $this->type_article = $type_article;
                 }

             public function setFiche_technique($fiche_technique)
                 {
                      $this->fiche_technique = $fiche_technique;
                 }

             public function setNbrstockage($nbrstockage)
                 {
                      $this->nbrstockage = $nbrstockage;
                 }

             public function setTabidstock($tabidstock)
                 {
                      $this->tabidstock = $tabidstock;
                 }

             public function setValeur_article($valeur_article)
                 {
                      $this->valeur_article = $valeur_article;
                 }

             public function setFlag_article($flag_article)
                 {
                      $this->flag_article = $flag_article;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count article =====================*/
					public function countArticle(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get article =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste article =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("article");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("article");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("article");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_article = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If article existe =====================*/
					public function ifArticleexiste($condition){
					    $this->db->setTablename($this->tablename);
	$existe=$this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					if($existe != null)
					      {
					                 return 1;
					      } 
					return 0;
					                }
					  public function setPost($post,$file=array()){
					     extract($post);
                                                       $this->id = (!isset($id) || empty($id) )  ? 0: $id;
                       $this->id_categorie = (!isset($id_categorie) || empty($id_categorie) )  ? 0: $id_categorie;
                       $this->id_catalogue = (!isset($id_catalogue) || empty($id_catalogue) )  ? 0: $id_catalogue;
                       $this->type_article = (!isset($type_article) || empty($type_article) )  ? '': $type_article;
                       $this->fiche_technique = (!isset($fiche_technique) || empty($fiche_technique) )  ? '': $fiche_technique;
                       $this->nbrstockage = (!isset($nbrstockage) || empty($nbrstockage) )  ? 0: $nbrstockage;
                       $this->tabidstock = (!isset($tabidstock) || empty($tabidstock) )  ? '': $tabidstock;
                       $this->valeur_article = (!isset($valeur_article) || empty($valeur_article) )  ? 0: $valeur_article;
                       $this->flag_article = (!isset($flag_article) || empty($flag_article) )  ? 0: $flag_article;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'id_categorie'=>($this->id_categorie == 0 )  ? $OldTable['id_categorie']:$this->id_categorie,
                                  'id_catalogue'=>($this->id_catalogue == 0 )  ? $OldTable['id_catalogue']:$this->id_catalogue,
                                  'type_article'=>(!isset($this->type_article) || empty($this->type_article) )  ? $OldTable['type_article']:$this->type_article,
                                  'fiche_technique'=>(!isset($this->fiche_technique) || empty($this->fiche_technique) )  ? $OldTable['fiche_technique']:$this->fiche_technique,
                                  'nbrstockage'=>($this->nbrstockage == 0 )  ? $OldTable['nbrstockage']:$this->nbrstockage,
                                  'tabidstock'=>(!isset($this->tabidstock) || empty($this->tabidstock) )  ? $OldTable['tabidstock']:$this->tabidstock,
                                  'valeur_article'=>($this->valeur_article == 0 )  ? $OldTable['valeur_article']:$this->valeur_article,
                                  'flag_article'=>($this->flag_article == 0 )  ? $OldTable['flag_article']:$this->flag_article					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'id_categorie'=>0,
                                  'id_catalogue'=>0,
                                  'type_article'=>"",
                                  'fiche_technique'=>"",
                                  'nbrstockage'=>0,
                                  'tabidstock'=>"",
                                  'valeur_article'=>0,
                                  'flag_article'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



