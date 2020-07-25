<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Department extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $iddep;
        private  $ids;
        private  $nomd;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="department";
                 $this->iddep = 'null' ;
                 $this->ids = 0 ;
                 $this->nomd = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIddep()
                 {
                     return $this->iddep;
                 }

             public function getIds()
                 {
                     return $this->ids;
                 }

             public function getNomd()
                 {
                     return $this->nomd;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIddep($iddep)
                 {
                      $this->iddep = $iddep;
                 }

             public function setIds($ids)
                 {
                      $this->ids = $ids;
                 }

             public function setNomd($nomd)
                 {
                      $this->nomd = $nomd;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count department =====================*/
					public function countDepartment(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get department =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("iddep" =>$this->iddep);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste department =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("department");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("department");
					    $condition = array( 'iddep'=>$this->iddep );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("department");
					    $condition = array( 'iddep'=>$this->iddep );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_department = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If department existe =====================*/
					public function ifDepartmentexiste($condition){
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
                                                       $this->iddep = (!isset($iddep) || empty($iddep) )  ? 0: $iddep;
                       $this->ids = (!isset($ids) || empty($ids) )  ? 0: $ids;
                       $this->nomd = (!isset($nomd) || empty($nomd) )  ? '': $nomd;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'iddep'=>($this->iddep == 0 || $this->iddep == 'null')  ? $OldTable['iddep']:$this->iddep,
                                  'ids'=>($this->ids == 0 )  ? $OldTable['ids']:$this->ids,
                                  'NOMD'=>(!isset($this->nomd) || empty($this->nomd) )  ? $OldTable['nomd']:$this->nomd,
                                  'flag'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'iddep'=>'null',
                                  'ids'=>0,
                                  'NOMD'=>"",
                                  'flag'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



