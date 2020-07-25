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

        class Famille extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idfa;
        private  $desi;
        private  $color;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="famille";
                 $this->idfa = 'null' ;
                 $this->desi = "" ;
                 $this->color = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

             public function getColor()
                 {
                     return $this->color;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

             public function setColor($color)
                 {
                      $this->color = $color;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count famille =====================*/
					public function countFamille(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get famille =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDFA" =>$this->IDFA);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste famille =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("famille");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("famille");
					    $condition = array( 'IDFA'=>$this->IDFA );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("famille");
					    $condition = array( 'IDFA'=>$this->IDFA );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_famille = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If famille existe =====================*/
					public function ifFamilleexiste($condition){
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
                                                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->color = (!isset($color) || empty($color) )  ? '': $color;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDFA'=>($this->idfa == 0 || $this->idfa == 'null')  ? $OldTable['idfa']:$this->idfa,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'COLOR'=>(!isset($this->color) || empty($this->color) )  ? $OldTable['color']:$this->color,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDFA'=>'null',
                                  'DESI'=>"",
                                  'COLOR'=>"",
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



