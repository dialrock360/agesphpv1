<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Condis extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idc;
        private  $nomc;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="condis";
                 $this->idc = 'null' ;
                 $this->nomc = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdc()
                 {
                     return $this->idc;
                 }

             public function getNomc()
                 {
                     return $this->nomc;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdc($idc)
                 {
                      $this->idc = $idc;
                 }

             public function setNomc($nomc)
                 {
                      $this->nomc = $nomc;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count condis =====================*/
					public function countCondis(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get condis =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDC" =>$this->idc);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste condis =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }

            public function nbr_usin_prd($IDC){
                $this->db->setTablename('v_facture');
                $condition = array('idc' =>$IDC  );
                return $this->db->getRows(array('where'=>$condition, "return_type"=>"count"));
            }

            public function listecondis($dispo=true){
                $this->db->setTablename('condis');
                $condition = array("FLAG" =>0);
                return $this->db->getRows(array("where"=>$condition,"order_by"=>"NOMC asc","return_type"=>"many"));
                //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
            }












					  public function insert(){
					    $this->setTablename("condis");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("condis");
					    $condition = array( 'IDC'=>$this->idc );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("condis");
					    $condition = array( 'IDC'=>$this->idc );
                                       return $this->remove($condition);
                               }

                        public function fldelete(){
                            $this->setTablename("condis");
                            $Table= array('FLAG'=>1);
                            $condition = array( 'IDC'=>$this->idc );
                            $this->setTablearray($Table);
                            return   $this->put($condition);
                        }

				/*================== If condis existe =====================*/
					public function ifCondisexiste($condition){
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
                                                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->nomc = (!isset($nomc) || empty($nomc) )  ? '': $nomc;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDC'=>($this->idc == 0 || $this->idc == 'null')  ? $OldTable['idc']:$this->idc,
                                  'NOMC'=>(!isset($this->nomc) || empty($this->nomc) )  ? $OldTable['nomc']:$this->nomc,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDC'=>'null',
                                  'NOMC'=>"",
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



