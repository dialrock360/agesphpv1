<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';

/*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Categorie extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id_cat;
        private  $idfa;
        private  $nom_cat;
        private  $achat;
        private  $vente;
        private  $compt;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="categorie";
                 $this->id_cat = 'null' ;
                 $this->idfa = 0 ;
                 $this->nom_cat = "" ;
                 $this->achat = 0 ;
                 $this->vente = 0 ;
                 $this->compt = 0 ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId_cat()
                 {
                     return $this->id_cat;
                 }

             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getNom_cat()
                 {
                     return $this->nom_cat;
                 }

             public function getAchat()
                 {
                     return $this->achat;
                 }

             public function getVente()
                 {
                     return $this->vente;
                 }

             public function getCompt()
                 {
                     return $this->compt;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId_cat($id_cat)
                 {
                      $this->id_cat = $id_cat;
                 }

             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setNom_cat($nom_cat)
                 {
                      $this->nom_cat = $nom_cat;
                 }

             public function setAchat($achat)
                 {
                      $this->achat = $achat;
                 }

             public function setVente($vente)
                 {
                      $this->vente = $vente;
                 }

             public function setCompt($compt)
                 {
                      $this->compt = $compt;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count categorie =====================*/
					public function countCategorie(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get categorie =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("ID_CAT" =>$this->id_cat);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste categorie =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }

            public function getcatcmptabilisable($IDFA){
                $this->db->setTablename('v_categorie');
                $condition = array("IDFA" =>$IDFA);
                $lscat = $this->db->getRows(array("where"=>$condition,"order_by"=>"NOM_CAT asc","return_type"=>"many"));
                 $ret=0;
                  foreach($lscat as $row ) {
                      extract($row);
                      if ($COMPT>0){$ret=1;break;}
                  }
                  return $ret;
            }
            public function nbr_prd($ID_CAT){
                $this->db->setTablename('produit');
                $condition = array('ID_CAT' =>$ID_CAT  );
                return $this->db->getRows(array('where'=>$condition, "return_type"=>"count"));
            }

            public function listecat($dispo=true){
                $this->db->setTablename('v_categorie');
                $condition = array("flag" =>0);
                return $this->db->getRows(array("where"=>$condition,"order_by"=>"NOM_CAT asc","return_type"=>"many"));
                //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
            }



					  public function insert(){
					    $this->setTablename("categorie");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("categorie");
					    $condition = array( 'ID_CAT'=>$this->id_cat );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("categorie");
					    $condition = array( 'ID_CAT'=>$this->id_cat );
                                       return $this->remove($condition);
                               }
				 
            public function fldelete(){
                $this->setTablename("categorie");
                $Table= array('flag'=>1);
                $condition = array( 'ID_CAT'=>$this->id_cat );
                $this->setTablearray($Table);
                return   $this->put($condition);
            }
				/*================== If categorie existe =====================*/
					public function ifCategorieexiste($condition){
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
                                                       $this->id_cat = (!isset($id_cat) || empty($id_cat) )  ? 0: $id_cat;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->nom_cat = (!isset($nom_cat) || empty($nom_cat) )  ? '': $nom_cat;
                       $this->achat = (!isset($achat) || empty($achat) )  ? 0: $achat;
                       $this->vente = (!isset($vente) || empty($vente) )  ? 0: $vente;
                       $this->compt = (!isset($compt) || empty($compt) )  ? 0: $compt;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'ID_CAT'=>($this->id_cat == 0 || $this->id_cat == 'null')  ? $OldTable['id_cat']:$this->id_cat,
                                  'IDFA'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'NOM_CAT'=>(!isset($this->nom_cat) || empty($this->nom_cat) )  ? $OldTable['nom_cat']:$this->nom_cat,
                                  'ACHAT'=>($this->achat == 0 )  ? $OldTable['achat']:$this->achat,
                                  'VENTE'=>($this->vente == 0 )  ? $OldTable['vente']:$this->vente,
                                  'COMPT'=>($this->compt == 0 )  ? $OldTable['compt']:$this->compt,
                                  'flag'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'ID_CAT'=>'null',
                                  'IDFA'=>0,
                                  'NOM_CAT'=>"",
                                  'ACHAT'=>0,
                                  'VENTE'=>0,
                                  'COMPT'=>0,
                                  'flag'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



