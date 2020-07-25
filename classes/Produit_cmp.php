<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

require_once 'Produit.php';
        class Produit_cmp extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idpcmp;
        private  $idp;
        private  $tabidp;
        private  $tabqnt;
        private  $tabmts;
        private  $prv;
            private  $prd;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

                     $this->prd = new Produit();
         $this->tablename="produit_cmp";
                 $this->idpcmp = 'null' ;
                 $this->idp = 0 ;
                 $this->tabidp = "" ;
                 $this->tabqnt = "" ;
                 $this->tabmts = "" ;
                 $this->prv = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdpcmp()
                 {
                     return $this->idpcmp;
                 }

             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getTabidp()
                 {
                     return $this->tabidp;
                 }

             public function getTabqnt()
                 {
                     return $this->tabqnt;
                 }

             public function getTabmts()
                 {
                     return $this->tabmts;
                 }

             public function getPrv()
                 {
                     return $this->prv;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdpcmp($idpcmp)
                 {
                      $this->idpcmp = $idpcmp;
                 }

             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setTabidp($tabidp)
                 {
                      $this->tabidp = $tabidp;
                 }

             public function setTabqnt($tabqnt)
                 {
                      $this->tabqnt = $tabqnt;
                 }

             public function setTabmts($tabmts)
                 {
                      $this->tabmts = $tabmts;
                 }

             public function setPrv($prv)
                 {
                      $this->prv = $prv;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count produit_cmp =====================*/
					public function countProduit_cmp(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get produit_cmp =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("idpcmp" =>$this->idpcmp);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

					public function getByidp(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDP" =>$this->idp);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste produit_cmp =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }

                        public function get_composant($IDP){
                            $this->db->setTablename('v_produit');
                            $condition = array('IDP' =>$IDP  );
                            return $this->db->getRows(array('where'=>$condition, "return_type"=>"single"));
                        }
                        public function listeprdcmp($dispo=true){
                            $this->db->setTablename('v_produit_cmp');
                            return $this->db->getRows(array("return_type"=>"many"));
                            //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
                        }

					  public function insert(){
					    $this->setTablename("produit_cmp");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("produit_cmp");
					    $condition = array( 'idpcmp'=>$this->idpcmp );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("produit_cmp");
					    $condition = array( 'idpcmp'=>$this->idpcmp );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_produit_cmp = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If produit_cmp existe =====================*/
					public function ifProduit_cmpexiste($condition){
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
                                                       $this->idpcmp = (!isset($idpcmp) || empty($idpcmp) )  ? 0: $idpcmp;
                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->tabidp = (!isset($tabidp) || empty($tabidp) )  ? '': $tabidp;
                       $this->tabqnt = (!isset($tabqnt) || empty($tabqnt) )  ? '': $tabqnt;
                       $this->tabmts = (!isset($tabmts) || empty($tabmts) )  ? '': $tabmts;
                       $this->prv = (!isset($prv) || empty($prv) )  ? 0: $prv;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'idpcmp'=>($this->idpcmp == 0 || $this->idpcmp == 'null')  ? $OldTable['idpcmp']:$this->idpcmp,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'tabidp'=>(!isset($this->tabidp) || empty($this->tabidp) )  ? $OldTable['tabidp']:$this->tabidp,
                                  'tabqnt'=>(!isset($this->tabqnt) || empty($this->tabqnt) )  ? $OldTable['tabqnt']:$this->tabqnt,
                                  'tabmts'=>(!isset($this->tabmts) || empty($this->tabmts) )  ? $OldTable['tabmts']:$this->tabmts,
                                  'prv'=>($this->prv == 0 )  ? $OldTable['prv']:$this->prv					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'idpcmp'=>'null',
                                  'IDP'=>0,
                                  'tabidp'=>"",
                                  'tabqnt'=>"",
                                  'tabmts'=>"",
                                  'prv'=>0					     );
                                  return $Table;
                  }


            public  function updateQntStk($idp,$intert='add')
            {
                    $this->idp=$idp;

                    $olprdcmp = $this->getByidp() ;
                    $tabqnt = explode(",", $olprdcmp['tabqnt']);
                    $tabmts = explode(",", $olprdcmp['tabmts']);
                    $tabids = explode(",", $olprdcmp['tabidp']);
                    $i=0;
                    foreach( $tabids as $ids){

                        $this->prd->setIdp($ids);
                        $ololprd= $this->prd->get();
                         if($ololprd['COMPOSER']==0 ){
                             $Inqnt =$tabqnt[$i];
                             $Olqnt =$ololprd['QNT'];
                             $qntfinal=($intert=='add')? (doubleval($ololprd['QNT'])) - (doubleval($tabqnt[$i])): (doubleval($ololprd['QNT'])) + (doubleval($tabqnt[$i]));

                             $this->prd->setQnt($qntfinal);
                            /* echo $ids.' In => '.$Inqnt.'<br>';
                             echo $ids.' Old => '.$Olqnt.'<br>';
                             echo $ids.' => '.$qntfinal.'<hr>';*/
                         }
                       $this->prd->updateQnt();
                        $i++;
                    }


            }
    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



