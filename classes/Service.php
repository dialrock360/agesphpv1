<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Service extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $ids;
        private  $ninea;
        private  $nom;
        private  $sigle;
        private  $email;
        private  $tel;
        private  $adress;
        private  $secteur_e;
        private  $type;
        private  $ca;
        private  $logo;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="service";
                 $this->ids = 'null' ;
                 $this->ninea = "" ;
                 $this->nom = "" ;
                 $this->sigle = "" ;
                 $this->email = "" ;
                 $this->tel = "" ;
                 $this->adress = "" ;
                 $this->secteur_e = "" ;
                 $this->type = "" ;
                 $this->ca = "" ;
                 $this->logo = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIds()
                 {
                     return $this->ids;
                 }

             public function getNinea()
                 {
                     return $this->ninea;
                 }

             public function getNom()
                 {
                     return $this->nom;
                 }

             public function getSigle()
                 {
                     return $this->sigle;
                 }

             public function getEmail()
                 {
                     return $this->email;
                 }

             public function getTel()
                 {
                     return $this->tel;
                 }

             public function getAdress()
                 {
                     return $this->adress;
                 }

             public function getSecteur_e()
                 {
                     return $this->secteur_e;
                 }

             public function getType()
                 {
                     return $this->type;
                 }

             public function getCa()
                 {
                     return $this->ca;
                 }

             public function getLogo()
                 {
                     return $this->logo;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIds($ids)
                 {
                      $this->ids = $ids;
                 }

             public function setNinea($ninea)
                 {
                      $this->ninea = $ninea;
                 }

             public function setNom($nom)
                 {
                      $this->nom = $nom;
                 }

             public function setSigle($sigle)
                 {
                      $this->sigle = $sigle;
                 }

             public function setEmail($email)
                 {
                      $this->email = $email;
                 }

             public function setTel($tel)
                 {
                      $this->tel = $tel;
                 }

             public function setAdress($adress)
                 {
                      $this->adress = $adress;
                 }

             public function setSecteur_e($secteur_e)
                 {
                      $this->secteur_e = $secteur_e;
                 }

             public function setType($type)
                 {
                      $this->type = $type;
                 }

             public function setCa($ca)
                 {
                      $this->ca = $ca;
                 }

             public function setLogo($logo)
                 {
                      $this->logo = $logo;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count service =====================*/
					public function countService(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get service =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("ids" =>$this->ids);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }
            public function Show_service($val)
            {

                $this->db->setTablename($this->tablename);
                $ret= "";

                $condition = array('ids' =>1);
                $countCat =  $this->db->getRows(array('where'=>$condition,'return_type'=>'single'));
                if($countCat != null) {


                    extract($countCat);

                    if($val=='id'){
                        $ret=$id;

                    }
                    if($val=='ninea'){
                        $ret=  $ninea;

                    }
                    if($val=='achat'){
                        $ret=  $ACHAT;

                    }
                    if($val=='nom'){
                        $ret=  $nom;

                    }
                    if($val=='sigle'){
                        $ret=  $sigle;

                    }
                    if($val=='tel'){
                        $ret=  $tel;

                    }
                    if($val=='adress'){
                        $ret=  $adress;

                    }    if($val=='secteur'){
                        $ret=  $secteur_E;

                    }
                    if($val=='type'){
                        $ret=  $type;

                    }
                    if($val=='ca'){
                        $ret=  $ca;

                    }
                    if($val=='type'){
                        $ret=  $type;

                    }
                    if($val=='logo'){
                        $ret=  $logo;

                    }


                }
                return $ret;

            }
				/*================== Liste service =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("service");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("service");
					    $condition = array( 'ids'=>$this->ids );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("service");
					    $condition = array( 'ids'=>$this->ids );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_service = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If service existe =====================*/
					public function ifServiceexiste($condition){
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
                                                       $this->ids = (!isset($ids) || empty($ids) )  ? 0: $ids;
                       $this->ninea = (!isset($ninea) || empty($ninea) )  ? '': $ninea;
                       $this->nom = (!isset($nom) || empty($nom) )  ? '': $nom;
                       $this->sigle = (!isset($sigle) || empty($sigle) )  ? '': $sigle;
                       $this->email = (!isset($email) || empty($email) )  ? '': $email;
                       $this->tel = (!isset($tel) || empty($tel) )  ? '': $tel;
                       $this->adress = (!isset($adress) || empty($adress) )  ? '': $adress;
                       $this->secteur_e = (!isset($secteur_e) || empty($secteur_e) )  ? '': $secteur_e;
                       $this->type = (!isset($type) || empty($type) )  ? '': $type;
                       $this->ca = (!isset($ca) || empty($ca) )  ? '': $ca;
                       $this->logo = (!isset($logo) || empty($logo) )  ? '': $logo;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'ids'=>($this->ids == 0 || $this->ids == 'null')  ? $OldTable['ids']:$this->ids,
                                  'ninea'=>(!isset($this->ninea) || empty($this->ninea) )  ? $OldTable['ninea']:$this->ninea,
                                  'nom'=>(!isset($this->nom) || empty($this->nom) )  ? $OldTable['nom']:$this->nom,
                                  'sigle'=>(!isset($this->sigle) || empty($this->sigle) )  ? $OldTable['sigle']:$this->sigle,
                                  'email'=>(!isset($this->email) || empty($this->email) )  ? $OldTable['email']:$this->email,
                                  'tel'=>(!isset($this->tel) || empty($this->tel) )  ? $OldTable['tel']:$this->tel,
                                  'adress'=>(!isset($this->adress) || empty($this->adress) )  ? $OldTable['adress']:$this->adress,
                                  'secteur_E'=>(!isset($this->secteur_e) || empty($this->secteur_e) )  ? $OldTable['secteur_e']:$this->secteur_e,
                                  'type'=>(!isset($this->type) || empty($this->type) )  ? $OldTable['type']:$this->type,
                                  'ca'=>(!isset($this->ca) || empty($this->ca) )  ? $OldTable['ca']:$this->ca,
                                  'logo'=>(!isset($this->logo) || empty($this->logo) )  ? $OldTable['logo']:$this->logo					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'ids'=>'null',
                                  'ninea'=>"",
                                  'nom'=>"",
                                  'sigle'=>"",
                                  'email'=>"",
                                  'tel'=>"",
                                  'adress'=>"",
                                  'secteur_E'=>"",
                                  'type'=>"",
                                  'ca'=>"",
                                  'logo'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



