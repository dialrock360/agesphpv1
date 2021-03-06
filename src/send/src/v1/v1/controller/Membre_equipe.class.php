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
  use src\entities\Membre_equipe as Membre_equipeEntity;
  use src\model\Membre_equipeDB;

  use src\model\DB;

  use src\entities\Equipe as EquipeEntity;
  use src\model\EquipeDB;


  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  class Membre_equipe extends Controller{

    /*==================Attribut list=====================*/
             private  $membre_equipe;
             private  $membre_equipedb;
   private  $db;

             private  $equipe;
             private  $equipedb;
             private  $personne;
             private  $personnedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->membre_equipe = new Membre_equipeEntity();
                 $this->membre_equipedb = new Membre_equipeDB();
                  $this->db = new DB();
                 $this->equipe = new EquipeEntity();
                 $this->equipedb = new EquipeDB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("membre_equipe/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id_equipe){
                    $data["id_equipe"] = $id_equipe;
                    return $this->view->load("membre_equipe/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id_equipe){
       $this->membre_equipe->setId($id);
       $this->membre_equipe->setId_membre($id_membre);
       $this->membre_equipe->setId_equipe($id_equipe);
                    $data["membre_equipe"] = $this->membre_equipe->get();
                    return $this->view->load("membre_equipe/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["membre_equipes"] = $this->membre_equipe->liste();
                    return $this->view->load("membre_equipe/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id_equipe"])) {
                    $this->membre_equipe->setPost($_POST,$_FILES);
                    $ok = $this->membre_equipe->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("membre_equipe/add", $data);
            }else{
                return $this->view->load("membre_equipe/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id_equipe"])) {
                    $this->membre_equipe->setPost($_POST,$_FILES);
                    $ok = $this->membre_equipe->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("membre_equipe/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id_equipe){
              //affectation de l'id 
       $this->membre_equipe->setId_membre($id_membre);
       $this->membre_equipe->setId_equipe($id_equipe);
            			//Supression
            			$this->membre_equipe->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id_equipe){
	//initialisation des cle etrangeres
                    $data["equipes"] = $this->equipe->liste();
                    $data["personnes"] = $this->personne->liste();
    /*=============================================================*/
       $this->membre_equipe->setId_membre($id_membre);
       $this->membre_equipe->setId_equipe($id_equipe);
                    $data["membre_equipe"] = $this->membre_equipe->get();
            			//chargement de la vue edit.html
                    return $this->view->load("membre_equipe/edit", $data);
                }


                   



               }


            ?>

