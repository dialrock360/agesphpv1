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
  use src\entities\Personne_presente as Personne_presenteEntity;
  use src\model\Personne_presenteDB;

  use src\model\DB;

  use src\entities\Fiche_de_presense as Fiche_de_presenseEntity;
  use src\model\Fiche_de_presenseDB;


  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  class Personne_presente extends Controller{

    /*==================Attribut list=====================*/
             private  $personne_presente;
             private  $personne_presentedb;
   private  $db;

             private  $fiche_de_presense;
             private  $fiche_de_presensedb;
             private  $personne;
             private  $personnedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->personne_presente = new Personne_presenteEntity();
                 $this->personne_presentedb = new Personne_presenteDB();
                  $this->db = new DB();
                 $this->fiche_de_presense = new Fiche_de_presenseEntity();
                 $this->fiche_de_presensedb = new Fiche_de_presenseDB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("personne_presente/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("personne_presente/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->personne_presente->setId($id);
       $this->personne_presente->setId($id);
                    $data["personne_presente"] = $this->personne_presente->get();
                    return $this->view->load("personne_presente/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["personne_presentes"] = $this->personne_presente->liste();
                    return $this->view->load("personne_presente/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["fiche_de_presenses"] = $this->fiche_de_presense->liste();
                    $data["personnes"] = $this->personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->personne_presente->setPost($_POST,$_FILES);
                    $ok = $this->personne_presente->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("personne_presente/add", $data);
            }else{
                return $this->view->load("personne_presente/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["fiche_de_presenses"] = $this->fiche_de_presense->liste();
                    $data["personnes"] = $this->personne->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->personne_presente->setPost($_POST,$_FILES);
                    $ok = $this->personne_presente->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("personne_presente/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->personne_presente->setId($id);
            			//Supression
            			$this->personne_presente->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["fiche_de_presenses"] = $this->fiche_de_presense->liste();
                    $data["personnes"] = $this->personne->liste();
    /*=============================================================*/
       $this->personne_presente->setId($id);
                    $data["personne_presente"] = $this->personne_presente->get();
            			//chargement de la vue edit.html
                    return $this->view->load("personne_presente/edit", $data);
                }


                   



               }


            ?>

