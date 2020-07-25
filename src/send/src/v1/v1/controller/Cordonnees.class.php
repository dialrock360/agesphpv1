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
  use src\entities\Cordonnees as CordonneesEntity;
  use src\model\CordonneesDB;

  use src\model\DB;

  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  class Cordonnees extends Controller{

    /*==================Attribut list=====================*/
             private  $cordonnees;
             private  $cordonneesdb;
   private  $db;

             private  $personne;
             private  $personnedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->cordonnees = new CordonneesEntity();
                 $this->cordonneesdb = new CordonneesDB();
                  $this->db = new DB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("cordonnees/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("cordonnees/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->cordonnees->setId($id);
       $this->cordonnees->setId($id);
                    $data["cordonnees"] = $this->cordonnees->get();
                    return $this->view->load("cordonnees/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["cordonneess"] = $this->cordonnees->liste();
                    return $this->view->load("cordonnees/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->cordonnees->setPost($_POST,$_FILES);
                    $ok = $this->cordonnees->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("cordonnees/add", $data);
            }else{
                return $this->view->load("cordonnees/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->cordonnees->setPost($_POST,$_FILES);
                    $ok = $this->cordonnees->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("cordonnees/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->cordonnees->setId($id);
            			//Supression
            			$this->cordonnees->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["personnes"] = $this->personne->liste();
    /*=============================================================*/
       $this->cordonnees->setId($id);
                    $data["cordonnees"] = $this->cordonnees->get();
            			//chargement de la vue edit.html
                    return $this->view->load("cordonnees/edit", $data);
                }


                   



               }


            ?>

