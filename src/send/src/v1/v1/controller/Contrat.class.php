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
  use src\entities\Contrat as ContratEntity;
  use src\model\ContratDB;

  use src\model\DB;

  use src\entities\Departement as DepartementEntity;
  use src\model\DepartementDB;


  use src\entities\Modalite_contrat as Modalite_contratEntity;
  use src\model\Modalite_contratDB;


  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  use src\entities\Type_contrat as Type_contratEntity;
  use src\model\Type_contratDB;


  class Contrat extends Controller{

    /*==================Attribut list=====================*/
             private  $contrat;
             private  $contratdb;
   private  $db;

             private  $departement;
             private  $departementdb;
             private  $modalite_contrat;
             private  $modalite_contratdb;
             private  $personne;
             private  $personnedb;
             private  $type_contrat;
             private  $type_contratdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->contrat = new ContratEntity();
                 $this->contratdb = new ContratDB();
                  $this->db = new DB();
                 $this->departement = new DepartementEntity();
                 $this->departementdb = new DepartementDB();
                 $this->modalite_contrat = new Modalite_contratEntity();
                 $this->modalite_contratdb = new Modalite_contratDB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 $this->type_contrat = new Type_contratEntity();
                 $this->type_contratdb = new Type_contratDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("contrat/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("contrat/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->contrat->setId($id);
       $this->contrat->setId($id);
                    $data["contrat"] = $this->contrat->get();
                    return $this->view->load("contrat/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["contrats"] = $this->contrat->liste();
                    return $this->view->load("contrat/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["departements"] = $this->departement->liste();
                    $data["modalite_contrats"] = $this->modalite_contrat->liste();
                    $data["personnes"] = $this->personne->liste();
                    $data["type_contrats"] = $this->type_contrat->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->contrat->setPost($_POST,$_FILES);
                    $ok = $this->contrat->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("contrat/add", $data);
            }else{
                return $this->view->load("contrat/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["departements"] = $this->departement->liste();
                    $data["modalite_contrats"] = $this->modalite_contrat->liste();
                    $data["personnes"] = $this->personne->liste();
                    $data["type_contrats"] = $this->type_contrat->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->contrat->setPost($_POST,$_FILES);
                    $ok = $this->contrat->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("contrat/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->contrat->setId($id);
            			//Supression
            			$this->contrat->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["departements"] = $this->departement->liste();
                    $data["modalite_contrats"] = $this->modalite_contrat->liste();
                    $data["personnes"] = $this->personne->liste();
                    $data["type_contrats"] = $this->type_contrat->liste();
    /*=============================================================*/
       $this->contrat->setId($id);
                    $data["contrat"] = $this->contrat->get();
            			//chargement de la vue edit.html
                    return $this->view->load("contrat/edit", $data);
                }


                   



               }


            ?>

