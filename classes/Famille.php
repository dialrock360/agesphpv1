<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

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
					    $condition = array("IDFA" =>$this->idfa );
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }
					public function getcaisse(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("DESI" =>'CAISSE');
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste famille =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                      // return $this->db->getRows(array("return_type"=>"many"));
                                        $condition = array('FLAG' =>0  );
                                       return $this->db->getRows(array('where'=>$condition,'order_by'=>'desi asc',"return_type"=>"many"));
					                }

            public function listefamily(){
                $take='SELECT * FROM famille WHERE FLAG=0 and DESI!="CAISSE"';
                //echo '<hr>';
              //  return $this->db->getspecificQuery($take,"many" );
                return $this->db->getspecificQuery($take);
            }
					public function nbr_cat($IDFA){
					                     $this->db->setTablename('categorie');
                                        $condition = array('IDFA' =>$IDFA  );
                                       return $this->db->getRows(array('where'=>$condition, "return_type"=>"count"));
					                }

                        public function listefam($dispo=true){
                            $this->db->setTablename('famille');
                            $condition = array("FLAG" =>0);
                            return $this->db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                            //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
                        }
                        function listenamesfamactive($nom,$date)
                        {
                            $chaine='';
                            $tab =array();
                            $i=0;

                            $this->db->setTablename('v_facture');
                            $condition = array("NOMMV" =>$nom,"DATE_DEL" =>$date);
                            $countref =  $this->db->getRows(array("select"=>'  DISTINCT(`NOMF`)',"where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));


                            if($countref != null)
                            {
                                foreach($countref as $rowref )
                                {
                                    $tab[]='\''.$rowref['NOMF'].'\'' ;
                                    $i++;
                                }
                                $chaine=implode(",",$tab);
                            }
                            /*else{
                                $chaine="'CHARGE'" ;
                            }*/
                            return $chaine;
                        }

                        function listefamactive($nom,$date)
                        {

                            $this->db->setTablename('v_facture');
                            $condition = array("NOMMV" =>$nom,"DATE_DEL" =>$date);
                            return $this->db->getRows(array("select"=>'  DISTINCT(`NOMF`),IDFA,COLOR',"where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                        }

            public function insert(){
					    $this->setTablename("famille");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("famille");
					    $condition = array( 'IDFA'=>$this->idfa  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("famille");
					    $condition = array( 'IDFA'=>$this->idfa  );
                                       return $this->remove($condition);
                               }
                        public function fldelete(){
                            $this->setTablename("famille");
                            $Table= array('FLAG'=>1);
                            $condition = array( 'IDFA'=>$this->idfa );
                            $this->setTablearray($Table);
                            return   $this->put($condition);
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



