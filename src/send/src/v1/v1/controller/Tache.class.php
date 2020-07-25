 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
 use libs\system\Controller;
  use src\entities\Tache as TacheEntity;
  use src\model\TacheDB;

  use src\model\DB;

  use src\entities\Projet as ProjetEntity;
  use src\model\ProjetDB;


  use src\entities\Ligne_equipe_personne as Ligne_equipe_personneEntity;
  use src\model\Ligne_equipe_personneDB;


  class Tache extends Controller{

    /*==================Attribut list=====================*/
             private  $tache;
             private  $tachedb;
   private  $db;

             private  $projet;
             private  $projetdb;
             private  $ligne_equipe_personne;
             private  $ligne_equipe_personnedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->tache = new TacheEntity();
                 $this->tachedb = new TacheDB();
                  $this->db = new DB();
                 $this->projet = new ProjetEntity();
                 $this->projetdb = new ProjetDB();
                 $this->ligne_equipe_personne = new Ligne_equipe_personneEntity();
                 $this->ligne_equipe_personnedb = new Ligne_equipe_personneDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("tache/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("tache/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->tache->setId($id);
       $this->tache->setId($id);
                    $data["tache"] = $this->tache->get();
                    return $this->view->load("tache/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["taches"] = $this->tache->liste();
                    return $this->view->load("tache/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["projets"] = $this->projet->liste();
                    $data["ligne_equipe_personnes"] = $this->ligne_equipe_personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->tache->setPost($_POST,$_FILES);
                    $ok = $this->tache->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("tache/add", $data);
            }else{
                return $this->view->load("tache/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["projets"] = $this->projet->liste();
                    $data["ligne_equipe_personnes"] = $this->ligne_equipe_personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->tache->setPost($_POST,$_FILES);
                    $ok = $this->tache->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("tache/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->tache->setId($id);
            			//Supression
            			$this->tache->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["projets"] = $this->projet->liste();
                    $data["ligne_equipe_personnes"] = $this->ligne_equipe_personne->liste();
    /*=============================================================*/
       $this->tache->setId($id);
                    $data["tache"] = $this->tache->get();
            			//chargement de la vue edit.html
                    return $this->view->load("tache/edit", $data);
                }


                   



               }


            ?>

