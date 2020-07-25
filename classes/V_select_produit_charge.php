<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:18=====================*/

        class V_select_produit_charge extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idp;
        private  $desi;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_select_produit_charge";
                 $this->idp = 0 ;
                 $this->desi = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count v_select_produit_charge =====================*/
					public function countV_select_produit_charge(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get v_select_produit_charge =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    ;
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste v_select_produit_charge =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("v_select_produit_charge");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("v_select_produit_charge");
					    $condition = array(  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("v_select_produit_charge");
					    $condition = array(  );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_v_select_produit_charge = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If v_select_produit_charge existe =====================*/
					public function ifV_select_produit_chargeexiste($condition){
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
                                                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDP'=>0,
                                  'DESI'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



