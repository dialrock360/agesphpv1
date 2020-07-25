<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Poste extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $libelle;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="poste";
                 $this->id = 'null' ;
                 $this->libelle = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getLibelle()
                 {
                     return $this->libelle;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setLibelle($libelle)
                 {
                      $this->libelle = $libelle;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count poste =====================*/
					public function countPoste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get poste =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste poste =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("poste");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("poste");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("poste");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_poste = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If poste existe =====================*/
					public function ifPosteexiste($condition){
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
                       $this->libelle = (!isset($libelle) || empty($libelle) )  ? '': $libelle;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'libelle'=>(!isset($this->libelle) || empty($this->libelle) )  ? $OldTable['libelle']:$this->libelle					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'libelle'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



