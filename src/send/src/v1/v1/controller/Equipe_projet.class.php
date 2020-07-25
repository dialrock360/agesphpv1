 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
 use libs\system\Controller;
  use src\entities\Equipe_projet as Equipe_projetEntity;
  use src\model\Equipe_projetDB;

  use src\model\DB;

  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  use src\entities\Equipe as EquipeEntity;
  use src\model\EquipeDB;


  use src\entities\Projet as ProjetEntity;
  use src\model\ProjetDB;


  class Equipe_projet extends Controller{

    /*==================Attribut list=====================*/
             private  $equipe_projet;
             private  $equipe_projetdb;
   private  $db;

             private  $personne;
             private  $personnedb;
             private  $equipe;
             private  $equipedb;
             private  $projet;
             private  $projetdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->equipe_projet = new Equipe_projetEntity();
                 $this->equipe_projetdb = new Equipe_projetDB();
                  $this->db = new DB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 $this->equipe = new EquipeEntity();
                 $this->equipedb = new EquipeDB();
                 $this->projet = new ProjetEntity();
                 $this->projetdb = new ProjetDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("equipe_projet/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("equipe_projet/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->equipe_projet->setId($id);
       $this->equipe_projet->setId($id);
                    $data["equipe_projet"] = $this->equipe_projet->get();
                    return $this->view->load("equipe_projet/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["equipe_projets"] = $this->equipe_projet->liste();
                    return $this->view->load("equipe_projet/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["equipes"] = $this->equipe->liste();
                    $data["projets"] = $this->projet->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe_projet->setPost($_POST,$_FILES);
                    $ok = $this->equipe_projet->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("equipe_projet/add", $data);
            }else{
                return $this->view->load("equipe_projet/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["equipes"] = $this->equipe->liste();
                    $data["projets"] = $this->projet->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe_projet->setPost($_POST,$_FILES);
                    $ok = $this->equipe_projet->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("equipe_projet/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->equipe_projet->setId($id);
            			//Supression
            			$this->equipe_projet->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["personnes"] = $this->personne->liste();
                    $data["equipes"] = $this->equipe->liste();
                    $data["projets"] = $this->projet->liste();
    /*=============================================================*/
       $this->equipe_projet->setId($id);
                    $data["equipe_projet"] = $this->equipe_projet->get();
            			//chargement de la vue edit.html
                    return $this->view->load("equipe_projet/edit", $data);
                }


                   



               }


            ?>

