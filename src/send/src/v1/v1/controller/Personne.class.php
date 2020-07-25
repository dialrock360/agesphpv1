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
  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;

  use src\model\DB;

  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


  class Personne extends Controller{

    /*==================Attribut list=====================*/
             private  $personne;
             private  $personnedb;
   private  $db;

             private  $service;
             private  $servicedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                  $this->db = new DB();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("personne/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("personne/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->personne->setId($id);
       $this->personne->setId($id);
                    $data["personne"] = $this->personne->get();
                    return $this->view->load("personne/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["personnes"] = $this->personne->liste();
                    return $this->view->load("personne/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->personne->setPost($_POST,$_FILES);
                    $ok = $this->personne->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("personne/add", $data);
            }else{
                return $this->view->load("personne/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->personne->setPost($_POST,$_FILES);
                    $ok = $this->personne->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("personne/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->personne->setId($id);
            			//Supression
            			$this->personne->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["services"] = $this->service->liste();
    /*=============================================================*/
       $this->personne->setId($id);
                    $data["personne"] = $this->personne->get();
            			//chargement de la vue edit.html
                    return $this->view->load("personne/edit", $data);
                }


                   



               }


            ?>

