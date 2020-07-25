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

        class V_produit_cmp extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idpcmp;
        private  $idp;
        private  $tabidp;
        private  $tabqnt;
        private  $tabmts;
        private  $prv;
        private  $idc;
        private  $id_cat;
        private  $desi;
        private  $photo;
        private  $prixa;
        private  $prixv;
        private  $qnt;
        private  $ftech;
        private  $flag;
        private  $idfa;
        private  $nom_cat;
        private  $achat;
        private  $vente;
        private  $compt;
        private  $nomf;
        private  $color;
        private  $nomc;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_produit_cmp";
                 $this->idpcmp = 0 ;
                 $this->idp = 0 ;
                 $this->tabidp = "" ;
                 $this->tabqnt = "" ;
                 $this->tabmts = "" ;
                 $this->prv = 0 ;
                 $this->idc = 0 ;
                 $this->id_cat = 0 ;
                 $this->desi = "" ;
                 $this->photo = "" ;
                 $this->prixa = 0 ;
                 $this->prixv = 0 ;
                 $this->qnt = 0 ;
                 $this->ftech = "" ;
                 $this->flag = 0 ;
                 $this->idfa = 0 ;
                 $this->nom_cat = "" ;
                 $this->achat = 0 ;
                 $this->vente = 0 ;
                 $this->compt = 0 ;
                 $this->nomf = "" ;
                 $this->color = "" ;
                 $this->nomc = "" ;
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

             public function getIdc()
                 {
                     return $this->idc;
                 }

             public function getId_cat()
                 {
                     return $this->id_cat;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

             public function getPhoto()
                 {
                     return $this->photo;
                 }

             public function getPrixa()
                 {
                     return $this->prixa;
                 }

             public function getPrixv()
                 {
                     return $this->prixv;
                 }

             public function getQnt()
                 {
                     return $this->qnt;
                 }

             public function getFtech()
                 {
                     return $this->ftech;
                 }

             public function getFlag()
                 {
                     return $this->flag;
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

             public function getNomf()
                 {
                     return $this->nomf;
                 }

             public function getColor()
                 {
                     return $this->color;
                 }

             public function getNomc()
                 {
                     return $this->nomc;
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

             public function setIdc($idc)
                 {
                      $this->idc = $idc;
                 }

             public function setId_cat($id_cat)
                 {
                      $this->id_cat = $id_cat;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

             public function setPhoto($photo)
                 {
                      $this->photo = $photo;
                 }

             public function setPrixa($prixa)
                 {
                      $this->prixa = $prixa;
                 }

             public function setPrixv($prixv)
                 {
                      $this->prixv = $prixv;
                 }

             public function setQnt($qnt)
                 {
                      $this->qnt = $qnt;
                 }

             public function setFtech($ftech)
                 {
                      $this->ftech = $ftech;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
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

             public function setNomf($nomf)
                 {
                      $this->nomf = $nomf;
                 }

             public function setColor($color)
                 {
                      $this->color = $color;
                 }

             public function setNomc($nomc)
                 {
                      $this->nomc = $nomc;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count v_produit_cmp =====================*/
					public function countV_produit_cmp(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get v_produit_cmp =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    ;
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste v_produit_cmp =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("v_produit_cmp");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("v_produit_cmp");
					    $condition = array(  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("v_produit_cmp");
					    $condition = array(  );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_v_produit_cmp = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If v_produit_cmp existe =====================*/
					public function ifV_produit_cmpexiste($condition){
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
                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->id_cat = (!isset($id_cat) || empty($id_cat) )  ? 0: $id_cat;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->photo = (!isset($photo) || empty($photo) )  ? '': $photo;
                       $this->prixa = (!isset($prixa) || empty($prixa) )  ? 0: $prixa;
                       $this->prixv = (!isset($prixv) || empty($prixv) )  ? 0: $prixv;
                       $this->qnt = (!isset($qnt) || empty($qnt) )  ? 0: $qnt;
                       $this->ftech = (!isset($ftech) || empty($ftech) )  ? '': $ftech;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->nom_cat = (!isset($nom_cat) || empty($nom_cat) )  ? '': $nom_cat;
                       $this->achat = (!isset($achat) || empty($achat) )  ? 0: $achat;
                       $this->vente = (!isset($vente) || empty($vente) )  ? 0: $vente;
                       $this->compt = (!isset($compt) || empty($compt) )  ? 0: $compt;
                       $this->nomf = (!isset($nomf) || empty($nomf) )  ? '': $nomf;
                       $this->color = (!isset($color) || empty($color) )  ? '': $color;
                       $this->nomc = (!isset($nomc) || empty($nomc) )  ? '': $nomc;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'idpcmp'=>($this->idpcmp == 0 )  ? $OldTable['idpcmp']:$this->idpcmp,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'tabidp'=>(!isset($this->tabidp) || empty($this->tabidp) )  ? $OldTable['tabidp']:$this->tabidp,
                                  'tabqnt'=>(!isset($this->tabqnt) || empty($this->tabqnt) )  ? $OldTable['tabqnt']:$this->tabqnt,
                                  'tabmts'=>(!isset($this->tabmts) || empty($this->tabmts) )  ? $OldTable['tabmts']:$this->tabmts,
                                  'prv'=>($this->prv == 0 )  ? $OldTable['prv']:$this->prv,
                                  'IDC'=>($this->idc == 0 )  ? $OldTable['idc']:$this->idc,
                                  'ID_CAT'=>($this->id_cat == 0 )  ? $OldTable['id_cat']:$this->id_cat,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'PHOTO'=>(!isset($this->photo) || empty($this->photo) )  ? $OldTable['photo']:$this->photo,
                                  'PRIXA'=>($this->prixa == 0 )  ? $OldTable['prixa']:$this->prixa,
                                  'PRIXV'=>($this->prixv == 0 )  ? $OldTable['prixv']:$this->prixv,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'FTECH'=>(!isset($this->ftech) || empty($this->ftech) )  ? $OldTable['ftech']:$this->ftech,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag,
                                  'IDFA'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'NOM_CAT'=>(!isset($this->nom_cat) || empty($this->nom_cat) )  ? $OldTable['nom_cat']:$this->nom_cat,
                                  'ACHAT'=>($this->achat == 0 )  ? $OldTable['achat']:$this->achat,
                                  'VENTE'=>($this->vente == 0 )  ? $OldTable['vente']:$this->vente,
                                  'COMPT'=>($this->compt == 0 )  ? $OldTable['compt']:$this->compt,
                                  'NOMF'=>(!isset($this->nomf) || empty($this->nomf) )  ? $OldTable['nomf']:$this->nomf,
                                  'COLOR'=>(!isset($this->color) || empty($this->color) )  ? $OldTable['color']:$this->color,
                                  'NOMC'=>(!isset($this->nomc) || empty($this->nomc) )  ? $OldTable['nomc']:$this->nomc					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'idpcmp'=>0,
                                  'IDP'=>0,
                                  'tabidp'=>"",
                                  'tabqnt'=>"",
                                  'tabmts'=>"",
                                  'prv'=>0,
                                  'IDC'=>0,
                                  'ID_CAT'=>0,
                                  'DESI'=>"",
                                  'PHOTO'=>"",
                                  'PRIXA'=>0,
                                  'PRIXV'=>0,
                                  'QNT'=>0,
                                  'FTECH'=>"",
                                  'FLAG'=>0,
                                  'IDFA'=>0,
                                  'NOM_CAT'=>"",
                                  'ACHAT'=>0,
                                  'VENTE'=>0,
                                  'COMPT'=>0,
                                  'NOMF'=>"",
                                  'COLOR'=>"",
                                  'NOMC'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



