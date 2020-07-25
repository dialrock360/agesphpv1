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
  use src\entities\Personne_status as Personne_statusEntity;
  use src\model\Personne_statusDB;

  use src\model\DB;

  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  use src\entities\Status as StatusEntity;
  use src\model\StatusDB;


  class Personne_status extends Controller{

    /*==================Attribut list=====================*/
             private  $personne_status;
             private  $personne_statusdb;
   private  $db;

             private  $personne;
             private  $personnedb;
             private  $status;
             private  $statusdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->personne_status = new Personne_statusEntity();
                 $this->personne_statusdb = new Personne_statusDB();
                  $this->db = new DB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 $this->status = new StatusEntity();
                 $this->statusdb = new StatusDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("personne_status/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $status_id){
                    $data["status_id"] = $status_id;
                    return $this->view->load("personne_status/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($status_id){
       $this->personne_status->setId($id);
       $this->personne_status->setPersonne_id($personne_id);
       $this->personne_status->setStatus_id($status_id);
                    $data["personne_status"] = $this->personne_status->get();
                    return $this->view->load("personne_status/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["personne_statuss"] = $this->personne_status->liste();
                    return $this->view->load("personne_status/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["status_id"])) {
                    $this->personne_status->setPost($_POST,$_FILES);
                    $ok = $this->personne_status->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("personne_status/add", $data);
            }else{
                return $this->view->load("personne_status/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["status_id"])) {
                    $this->personne_status->setPost($_POST,$_FILES);
                    $ok = $this->personne_status->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("personne_status/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($status_id){
              //affectation de l'id 
       $this->personne_status->setPersonne_id($personne_id);
       $this->personne_status->setStatus_id($status_id);
            			//Supression
            			$this->personne_status->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($status_id){
	//initialisation des cle etrangeres
                    $data["personnes"] = $this->personne->liste();
                    $data["statuss"] = $this->status->liste();
    /*=============================================================*/
       $this->personne_status->setPersonne_id($personne_id);
       $this->personne_status->setStatus_id($status_id);
                    $data["personne_status"] = $this->personne_status->get();
            			//chargement de la vue edit.html
                    return $this->view->load("personne_status/edit", $data);
                }


                   



               }


            ?>

