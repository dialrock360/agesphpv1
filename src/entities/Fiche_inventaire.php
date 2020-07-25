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
    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/

        class Fiche_inventaire extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idl;
        private  $ide;
        private  $conten;
        private  $datefiche;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="fiche_inventaire";
                 $this->idl = 'null' ;
                 $this->ide = 0 ;
                 $this->conten = "" ;
                 $this->datefiche = date("") ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdl()
                 {
                     return $this->idl;
                 }

             public function getIde()
                 {
                     return $this->ide;
                 }

             public function getConten()
                 {
                     return $this->conten;
                 }

             public function getDatefiche()
                 {
                     return $this->datefiche;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdl($idl)
                 {
                      $this->idl = $idl;
                 }

             public function setIde($ide)
                 {
                      $this->ide = $ide;
                 }

             public function setConten($conten)
                 {
                      $this->conten = $conten;
                 }

             public function setDatefiche($datefiche)
                 {
                      $this->datefiche = $datefiche;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count fiche_inventaire =====================*/
					public function countFiche_inventaire(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get fiche_inventaire =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("idl" =>$this->idl);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste fiche_inventaire =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("fiche_inventaire");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("fiche_inventaire");
					    $condition = array( 'idl'=>$this->idl );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("fiche_inventaire");
					    $condition = array( 'idl'=>$this->idl );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_fiche_inventaire = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If fiche_inventaire existe =====================*/
					public function ifFiche_inventaireexiste($condition){
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
                                                       $this->idl = (!isset($idl) || empty($idl) )  ? 0: $idl;
                       $this->ide = (!isset($ide) || empty($ide) )  ? 0: $ide;
                       $this->conten = (!isset($conten) || empty($conten) )  ? '': $conten;
                       $this->datefiche = (!isset($datefiche) || empty($datefiche) )  ? '': $datefiche;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'idl'=>($this->idl == 0 || $this->idl == 'null')  ? $OldTable['idl']:$this->idl,
                                  'IDE'=>($this->ide == 0 )  ? $OldTable['ide']:$this->ide,
                                  'conten'=>(!isset($this->conten) || empty($this->conten) )  ? $OldTable['conten']:$this->conten,
                                  'datefiche'=>($this->datefiche == null )  ? $OldTable['datefiche']:$this->datefiche,
                                  'flag'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'idl'=>'null',
                                  'IDE'=>0,
                                  'conten'=>"",
                                  'datefiche'=>date(""),
                                  'flag'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



