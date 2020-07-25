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

        class Utilisateur extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idu;
        private  $cni;
        private  $prenom_user;
        private  $nom_user;
        private  $login;
        private  $sexe_user;
        private  $poste;
        private  $salaire;
        private  $statut;
        private  $datnais;
        private  $datem;
        private  $levesecurity;
        private  $passe;
        private  $adress;
        private  $email;
        private  $num_uer;
        private  $photo;
        private  $infos;
        private  $cacher;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="utilisateur";
                 $this->idu = 'null' ;
                 $this->cni = "" ;
                 $this->prenom_user = "" ;
                 $this->nom_user = "" ;
                 $this->login = "" ;
                 $this->sexe_user = "" ;
                 $this->poste = "" ;
                 $this->salaire = 0 ;
                 $this->statut = "" ;
                 $this->datnais = date("") ;
                 $this->datem = date("") ;
                 $this->levesecurity = 0 ;
                 $this->passe = "" ;
                 $this->adress = "" ;
                 $this->email = "" ;
                 $this->num_uer = "" ;
                 $this->photo = "" ;
                 $this->infos = "" ;
                 $this->cacher = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdu()
                 {
                     return $this->idu;
                 }

             public function getCni()
                 {
                     return $this->cni;
                 }

             public function getPrenom_user()
                 {
                     return $this->prenom_user;
                 }

             public function getNom_user()
                 {
                     return $this->nom_user;
                 }

             public function getLogin()
                 {
                     return $this->login;
                 }

             public function getSexe_user()
                 {
                     return $this->sexe_user;
                 }

             public function getPoste()
                 {
                     return $this->poste;
                 }

             public function getSalaire()
                 {
                     return $this->salaire;
                 }

             public function getStatut()
                 {
                     return $this->statut;
                 }

             public function getDatnais()
                 {
                     return $this->datnais;
                 }

             public function getDatem()
                 {
                     return $this->datem;
                 }

             public function getLevesecurity()
                 {
                     return $this->levesecurity;
                 }

             public function getPasse()
                 {
                     return $this->passe;
                 }

             public function getAdress()
                 {
                     return $this->adress;
                 }

             public function getEmail()
                 {
                     return $this->email;
                 }

             public function getNum_uer()
                 {
                     return $this->num_uer;
                 }

             public function getPhoto()
                 {
                     return $this->photo;
                 }

             public function getInfos()
                 {
                     return $this->infos;
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
             public function setIdu($idu)
                 {
                      $this->idu = $idu;
                 }

             public function setCni($cni)
                 {
                      $this->cni = $cni;
                 }

             public function setPrenom_user($prenom_user)
                 {
                      $this->prenom_user = $prenom_user;
                 }

             public function setNom_user($nom_user)
                 {
                      $this->nom_user = $nom_user;
                 }

             public function setLogin($login)
                 {
                      $this->login = $login;
                 }

             public function setSexe_user($sexe_user)
                 {
                      $this->sexe_user = $sexe_user;
                 }

             public function setPoste($poste)
                 {
                      $this->poste = $poste;
                 }

             public function setSalaire($salaire)
                 {
                      $this->salaire = $salaire;
                 }

             public function setStatut($statut)
                 {
                      $this->statut = $statut;
                 }

             public function setDatnais($datnais)
                 {
                      $this->datnais = $datnais;
                 }

             public function setDatem($datem)
                 {
                      $this->datem = $datem;
                 }

             public function setLevesecurity($levesecurity)
                 {
                      $this->levesecurity = $levesecurity;
                 }

             public function setPasse($passe)
                 {
                      $this->passe = $passe;
                 }

             public function setAdress($adress)
                 {
                      $this->adress = $adress;
                 }

             public function setEmail($email)
                 {
                      $this->email = $email;
                 }

             public function setNum_uer($num_uer)
                 {
                      $this->num_uer = $num_uer;
                 }

             public function setPhoto($photo)
                 {
                      $this->photo = $photo;
                 }

             public function setInfos($infos)
                 {
                      $this->infos = $infos;
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



				/*================== Count utilisateur =====================*/
					public function countUtilisateur(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get utilisateur =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDU" =>$this->IDU);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste utilisateur =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("utilisateur");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("utilisateur");
					    $condition = array( 'IDU'=>$this->IDU );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("utilisateur");
					    $condition = array( 'IDU'=>$this->IDU );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_utilisateur = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If utilisateur existe =====================*/
					public function ifUtilisateurexiste($condition){
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
                                                       $this->idu = (!isset($idu) || empty($idu) )  ? 0: $idu;
                       $this->cni = (!isset($cni) || empty($cni) )  ? '': $cni;
                       $this->prenom_user = (!isset($prenom_user) || empty($prenom_user) )  ? '': $prenom_user;
                       $this->nom_user = (!isset($nom_user) || empty($nom_user) )  ? '': $nom_user;
                       $this->login = (!isset($login) || empty($login) )  ? '': $login;
                       $this->sexe_user = (!isset($sexe_user) || empty($sexe_user) )  ? '': $sexe_user;
                       $this->poste = (!isset($poste) || empty($poste) )  ? '': $poste;
                       $this->salaire = (!isset($salaire) || empty($salaire) )  ? 0: $salaire;
                       $this->statut = (!isset($statut) || empty($statut) )  ? '': $statut;
                       $this->datnais = (!isset($datnais) || empty($datnais) )  ? '': $datnais;
                       $this->datem = (!isset($datem) || empty($datem) )  ? '': $datem;
                       $this->levesecurity = (!isset($levesecurity) || empty($levesecurity) )  ? 0: $levesecurity;
                       $this->passe = (!isset($passe) || empty($passe) )  ? '': $passe;
                       $this->adress = (!isset($adress) || empty($adress) )  ? '': $adress;
                       $this->email = (!isset($email) || empty($email) )  ? '': $email;
                       $this->num_uer = (!isset($num_uer) || empty($num_uer) )  ? '': $num_uer;
                       $this->photo = (!isset($photo) || empty($photo) )  ? '': $photo;
                       $this->infos = (!isset($infos) || empty($infos) )  ? '': $infos;
                       $this->cacher = (!isset($cacher) || empty($cacher) )  ? '': $cacher;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDU'=>($this->idu == 0 || $this->idu == 'null')  ? $OldTable['idu']:$this->idu,
                                  'CNI'=>(!isset($this->cni) || empty($this->cni) )  ? $OldTable['cni']:$this->cni,
                                  'PRENOM_USER'=>(!isset($this->prenom_user) || empty($this->prenom_user) )  ? $OldTable['prenom_user']:$this->prenom_user,
                                  'NOM_USER'=>(!isset($this->nom_user) || empty($this->nom_user) )  ? $OldTable['nom_user']:$this->nom_user,
                                  'LOGIN'=>(!isset($this->login) || empty($this->login) )  ? $OldTable['login']:$this->login,
                                  'SEXE_USER'=>(!isset($this->sexe_user) || empty($this->sexe_user) )  ? $OldTable['sexe_user']:$this->sexe_user,
                                  'POSTE'=>(!isset($this->poste) || empty($this->poste) )  ? $OldTable['poste']:$this->poste,
                                  'SALAIRE'=>($this->salaire == 0 )  ? $OldTable['salaire']:$this->salaire,
                                  'STATUT'=>(!isset($this->statut) || empty($this->statut) )  ? $OldTable['statut']:$this->statut,
                                  'DATNAIS'=>($this->datnais == null )  ? $OldTable['datnais']:$this->datnais,
                                  'DATEM'=>($this->datem == null )  ? $OldTable['datem']:$this->datem,
                                  'LEVESECURITY'=>($this->levesecurity == 0 )  ? $OldTable['levesecurity']:$this->levesecurity,
                                  'PASSE'=>(!isset($this->passe) || empty($this->passe) )  ? $OldTable['passe']:$this->passe,
                                  'ADRESS'=>(!isset($this->adress) || empty($this->adress) )  ? $OldTable['adress']:$this->adress,
                                  'EMAIL'=>(!isset($this->email) || empty($this->email) )  ? $OldTable['email']:$this->email,
                                  'NUM_UER'=>(!isset($this->num_uer) || empty($this->num_uer) )  ? $OldTable['num_uer']:$this->num_uer,
                                  'PHOTO'=>(!isset($this->photo) || empty($this->photo) )  ? $OldTable['photo']:$this->photo,
                                  'INFOS'=>(!isset($this->infos) || empty($this->infos) )  ? $OldTable['infos']:$this->infos,
                                  'CACHER'=>(!isset($this->cacher) || empty($this->cacher) )  ? $OldTable['cacher']:$this->cacher,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDU'=>'null',
                                  'CNI'=>"",
                                  'PRENOM_USER'=>"",
                                  'NOM_USER'=>"",
                                  'LOGIN'=>"",
                                  'SEXE_USER'=>"",
                                  'POSTE'=>"",
                                  'SALAIRE'=>0,
                                  'STATUT'=>"",
                                  'DATNAIS'=>date(""),
                                  'DATEM'=>date(""),
                                  'LEVESECURITY'=>0,
                                  'PASSE'=>"",
                                  'ADRESS'=>"",
                                  'EMAIL'=>"",
                                  'NUM_UER'=>"",
                                  'PHOTO'=>"",
                                  'INFOS'=>"",
                                  'CACHER'=>"",
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



