 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
 use libs\system\Controller;
  use src\entities\Projet as ProjetEntity;
  use src\model\ProjetDB;

  use src\model\DB;

  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  use src\entities\Programme as ProgrammeEntity;
  use src\model\ProgrammeDB;


  class Projet extends Controller{

    /*==================Attribut list=====================*/
             private  $projet;
             private  $projetdb;
   private  $db;

             private  $personne;
             private  $personnedb;
             private  $programme;
             private  $programmedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->projet = new ProjetEntity();
                 $this->projetdb = new ProjetDB();
                  $this->db = new DB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 $this->programme = new ProgrammeEntity();
                 $this->programmedb = new ProgrammeDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("projet/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("projet/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->projet->setId($id);
       $this->projet->setId($id);
                    $data["projet"] = $this->projet->get();
                    return $this->view->load("projet/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["projets"] = $this->projet->liste();
                    return $this->view->load("projet/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["programmes"] = $this->programme->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->projet->setPost($_POST,$_FILES);
                    $ok = $this->projet->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("projet/add", $data);
            }else{
                return $this->view->load("projet/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["programmes"] = $this->programme->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->projet->setPost($_POST,$_FILES);
                    $ok = $this->projet->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("projet/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->projet->setId($id);
            			//Supression
            			$this->projet->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["personnes"] = $this->personne->liste();
                    $data["programmes"] = $this->programme->liste();
    /*=============================================================*/
       $this->projet->setId($id);
                    $data["projet"] = $this->projet->get();
            			//chargement de la vue edit.html
                    return $this->view->load("projet/edit", $data);
                }


                   



               }


            ?>

