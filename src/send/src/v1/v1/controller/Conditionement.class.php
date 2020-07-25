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
  use src\entities\Conditionement as ConditionementEntity;
  use src\model\ConditionementDB;

  use src\model\DB;

  class Conditionement extends Controller{

    /*==================Attribut list=====================*/
             private  $conditionement;
             private  $conditionementdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->conditionement = new ConditionementEntity();
                 $this->conditionementdb = new ConditionementDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("conditionement/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("conditionement/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->conditionement->setId($id);
       $this->conditionement->setId($id);
                    $data["conditionement"] = $this->conditionement->get();
                    return $this->view->load("conditionement/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["conditionements"] = $this->conditionement->liste();
                    return $this->view->load("conditionement/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conditionement->setPost($_POST,$_FILES);
                    $ok = $this->conditionement->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("conditionement/add", $data);
            }else{
                return $this->view->load("conditionement/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conditionement->setPost($_POST,$_FILES);
                    $ok = $this->conditionement->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("conditionement/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->conditionement->setId($id);
            			//Supression
            			$this->conditionement->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->conditionement->setId($id);
                    $data["conditionement"] = $this->conditionement->get();
            			//chargement de la vue edit.html
                    return $this->view->load("conditionement/edit", $data);
                }


                   



               }


            ?>

