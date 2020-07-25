<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Mouvement extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idmv;
        private  $idu;
        private  $nommv;
        private  $date_del;
        private  $objet;
        private  $conten;
        private  $totalht;
        private  $tva;
        private  $mtsch;
        private  $mtsltr;
        private  $reg;
        private  $avans;
        private  $reste;
        private  $cacher;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="mouvement";
                 $this->idmv = 0 ;
                 $this->idu = 0 ;
                 $this->nommv = "" ;
                 $this->date_del = date("") ;
                 $this->objet = "" ;
                 $this->conten = "" ;
                 $this->totalht = 0 ;
                 $this->tva = 0 ;
                 $this->mtsch = 0 ;
                 $this->mtsltr = "" ;
                 $this->reg = "" ;
                 $this->avans = 0 ;
                 $this->reste = 0 ;
                 $this->cacher = 0 ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdmv()
                 {
                     return $this->idmv;
                 }

             public function getIdu()
                 {
                     return $this->idu;
                 }

             public function getNommv()
                 {
                     return $this->nommv;
                 }

             public function getDate_del()
                 {
                     return $this->date_del;
                 }

             public function getObjet()
                 {
                     return $this->objet;
                 }

             public function getConten()
                 {
                     return $this->conten;
                 }

             public function getTotalht()
                 {
                     return $this->totalht;
                 }

             public function getTva()
                 {
                     return $this->tva;
                 }

             public function getMtsch()
                 {
                     return $this->mtsch;
                 }

             public function getMtsltr()
                 {
                     return $this->mtsltr;
                 }

             public function getReg()
                 {
                     return $this->reg;
                 }

             public function getAvans()
                 {
                     return $this->avans;
                 }

             public function getReste()
                 {
                     return $this->reste;
                 }

             public function getCacher()
                 {
                     return $this->cacher;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdmv($idmv)
                 {
                      $this->idmv = $idmv;
                 }

             public function setIdu($idu)
                 {
                      $this->idu = $idu;
                 }

             public function setNommv($nommv)
                 {
                      $this->nommv = $nommv;
                 }

             public function setDate_del($date_del)
                 {
                      $this->date_del = $date_del;
                 }

             public function setObjet($objet)
                 {
                      $this->objet = $objet;
                 }

             public function setConten($conten)
                 {
                      $this->conten = $conten;
                 }

             public function setTotalht($totalht)
                 {
                      $this->totalht = $totalht;
                 }

             public function setTva($tva)
                 {
                      $this->tva = $tva;
                 }

             public function setMtsch($mtsch)
                 {
                      $this->mtsch = $mtsch;
                 }

             public function setMtsltr($mtsltr)
                 {
                      $this->mtsltr = $mtsltr;
                 }

             public function setReg($reg)
                 {
                      $this->reg = $reg;
                 }

             public function setAvans($avans)
                 {
                      $this->avans = $avans;
                 }

             public function setReste($reste)
                 {
                      $this->reste = $reste;
                 }

             public function setCacher($cacher)
                 {
                      $this->cacher = $cacher;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count mouvement =====================*/
					public function countMouvement(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get mouvement =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDMV" =>$this->idmv );
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste mouvement =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }

                        public function listebyname($nommv){
                            $this->db->setTablename($this->tablename);
                            // return $this->db->getRows(array("return_type"=>"many"));
                            $condition = array('FLAG' =>0,'NOMMV' =>$nommv  );
                            return $this->db->getRows(array('where'=>$condition,'order_by'=>'DATE_DEL DESC',"return_type"=>"many",'limit'=>100));
                        }
					  public function insert(){
					    $this->setTablename("mouvement");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("mouvement");
					    $condition = array( 'IDMV'=>$this->idmv  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("mouvement");
					    $condition = array( 'IDMV'=>$this->idmv  );
                                       return $this->remove($condition);
                               }

                        public function fldelete(){
                            $this->setTablename("mouvement");
                            $Table= array('FLAG'=>1);
                            $condition = array( 'IDMV'=>$this->idmv );
                            $this->setTablearray($Table);
                            return   $this->put($condition);
                        }

				/*================== If mouvement existe =====================*/
					public function ifMouvementexiste($condition){
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
                                                       $this->idmv = (!isset($idmv) || empty($idmv) )  ? 0: $idmv;
                       $this->idu = (!isset($idu) || empty($idu) )  ? 0: $idu;
                       $this->nommv = (!isset($nommv) || empty($nommv) )  ? '': $nommv;
                       $this->date_del = (!isset($date_del) || empty($date_del) )  ? '': $date_del;
                       $this->objet = (!isset($objet) || empty($objet) )  ? '': $objet;
                       $this->conten = (!isset($conten) || empty($conten) )  ? '': $conten;
                       $this->totalht = (!isset($totalht) || empty($totalht) )  ? 0: $totalht;
                       $this->tva = (!isset($tva) || empty($tva) )  ? 0: $tva;
                       $this->mtsch = (!isset($mtsch) || empty($mtsch) )  ? 0: $mtsch;
                       $this->mtsltr = (!isset($mtsltr) || empty($mtsltr) )  ? '': $mtsltr;
                       $this->reg = (!isset($reg) || empty($reg) )  ? '': $reg;
                       $this->avans = (!isset($avans) || empty($avans) )  ? 0: $avans;
                       $this->reste = (!isset($reste) || empty($reste) )  ? 0: $reste;
                       $this->cacher = (!isset($cacher) || empty($cacher) )  ? 0: $cacher;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['idmv']:$this->idmv,
                                  'IDU'=>($this->idu == 0 )  ? $OldTable['idu']:$this->idu,
                                  'NOMMV'=>(!isset($this->nommv) || empty($this->nommv) )  ? $OldTable['nommv']:$this->nommv,
                                  'DATE_DEL'=>($this->date_del == null )  ? $OldTable['date_del']:$this->date_del,
                                  'OBJET'=>(!isset($this->objet) || empty($this->objet) )  ? $OldTable['objet']:$this->objet,
                                  'CONTEN'=>(!isset($this->conten) || empty($this->conten) )  ? $OldTable['conten']:$this->conten,
                                  'TOTALHT'=>($this->totalht == 0 )  ? $OldTable['totalht']:$this->totalht,
                                  'TVA'=>($this->tva == 0 )  ? $OldTable['tva']:$this->tva,
                                  'MTSCH'=>($this->mtsch == 0 )  ? $OldTable['mtsch']:$this->mtsch,
                                  'MTSLTR'=>(!isset($this->mtsltr) || empty($this->mtsltr) )  ? $OldTable['mtsltr']:$this->mtsltr,
                                  'REG'=>(!isset($this->reg) || empty($this->reg) )  ? $OldTable['reg']:$this->reg,
                                  'AVANS'=>($this->avans == 0 )  ? $OldTable['avans']:$this->avans,
                                  'RESTE'=>($this->reste == 0 )  ? $OldTable['reste']:$this->reste,
                                  'CACHER'=>($this->cacher == 0 )  ? $OldTable['cacher']:$this->cacher,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDMV'=>0,
                                  'IDU'=>0,
                                  'NOMMV'=>"",
                                  'DATE_DEL'=>date(""),
                                  'OBJET'=>"",
                                  'CONTEN'=>"",
                                  'TOTALHT'=>0,
                                  'TVA'=>0,
                                  'MTSCH'=>0,
                                  'MTSLTR'=>"",
                                  'REG'=>"",
                                  'AVANS'=>0,
                                  'RESTE'=>0,
                                  'CACHER'=>0,
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



