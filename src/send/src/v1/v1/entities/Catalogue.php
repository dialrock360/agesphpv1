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
    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/

        class Catalogue extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $ref_article;
        private  $type_article;
        private  $nom_article;
        private  $nom_service;
        private  $nom_famille;
        private  $nom_categorie;
        private  $nomenclature_article;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="catalogue";
                 $this->id = 'null' ;
                 $this->ref_article = "" ;
                 $this->type_article = "" ;
                 $this->nom_article = "" ;
                 $this->nom_service = "" ;
                 $this->nom_famille = "" ;
                 $this->nom_categorie = "" ;
                 $this->nomenclature_article = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getRef_article()
                 {
                     return $this->ref_article;
                 }

             public function getType_article()
                 {
                     return $this->type_article;
                 }

             public function getNom_article()
                 {
                     return $this->nom_article;
                 }

             public function getNom_service()
                 {
                     return $this->nom_service;
                 }

             public function getNom_famille()
                 {
                     return $this->nom_famille;
                 }

             public function getNom_categorie()
                 {
                     return $this->nom_categorie;
                 }

             public function getNomenclature_article()
                 {
                     return $this->nomenclature_article;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setRef_article($ref_article)
                 {
                      $this->ref_article = $ref_article;
                 }

             public function setType_article($type_article)
                 {
                      $this->type_article = $type_article;
                 }

             public function setNom_article($nom_article)
                 {
                      $this->nom_article = $nom_article;
                 }

             public function setNom_service($nom_service)
                 {
                      $this->nom_service = $nom_service;
                 }

             public function setNom_famille($nom_famille)
                 {
                      $this->nom_famille = $nom_famille;
                 }

             public function setNom_categorie($nom_categorie)
                 {
                      $this->nom_categorie = $nom_categorie;
                 }

             public function setNomenclature_article($nomenclature_article)
                 {
                      $this->nomenclature_article = $nomenclature_article;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count catalogue =====================*/
					public function countCatalogue(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get catalogue =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste catalogue =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("catalogue");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("catalogue");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("catalogue");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_catalogue = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If catalogue existe =====================*/
					public function ifCatalogueexiste($condition){
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
                       $this->ref_article = (!isset($ref_article) || empty($ref_article) )  ? '': $ref_article;
                       $this->type_article = (!isset($type_article) || empty($type_article) )  ? '': $type_article;
                       $this->nom_article = (!isset($nom_article) || empty($nom_article) )  ? '': $nom_article;
                       $this->nom_service = (!isset($nom_service) || empty($nom_service) )  ? '': $nom_service;
                       $this->nom_famille = (!isset($nom_famille) || empty($nom_famille) )  ? '': $nom_famille;
                       $this->nom_categorie = (!isset($nom_categorie) || empty($nom_categorie) )  ? '': $nom_categorie;
                       $this->nomenclature_article = (!isset($nomenclature_article) || empty($nomenclature_article) )  ? '': $nomenclature_article;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'ref_article'=>(!isset($this->ref_article) || empty($this->ref_article) )  ? $OldTable['ref_article']:$this->ref_article,
                                  'type_article'=>(!isset($this->type_article) || empty($this->type_article) )  ? $OldTable['type_article']:$this->type_article,
                                  'nom_article'=>(!isset($this->nom_article) || empty($this->nom_article) )  ? $OldTable['nom_article']:$this->nom_article,
                                  'nom_service'=>(!isset($this->nom_service) || empty($this->nom_service) )  ? $OldTable['nom_service']:$this->nom_service,
                                  'nom_famille'=>(!isset($this->nom_famille) || empty($this->nom_famille) )  ? $OldTable['nom_famille']:$this->nom_famille,
                                  'nom_categorie'=>(!isset($this->nom_categorie) || empty($this->nom_categorie) )  ? $OldTable['nom_categorie']:$this->nom_categorie,
                                  'nomenclature_article'=>(!isset($this->nomenclature_article) || empty($this->nomenclature_article) )  ? $OldTable['nomenclature_article']:$this->nomenclature_article					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'ref_article'=>"",
                                  'type_article'=>"",
                                  'nom_article'=>"",
                                  'nom_service'=>"",
                                  'nom_famille'=>"",
                                  'nom_categorie'=>"",
                                  'nomenclature_article'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



