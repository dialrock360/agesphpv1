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
  use src\entities\Fiche_production as Fiche_productionEntity;
  use src\model\Fiche_productionDB;

  use src\model\DB;

  class Fiche_production extends Controller{

    /*==================Attribut list=====================*/
             private  $fiche_production;
             private  $fiche_productiondb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->fiche_production = new Fiche_productionEntity();
                 $this->fiche_productiondb = new Fiche_productionDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("fiche_production/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("fiche_production/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->fiche_production->setId($id);
       $this->fiche_production->setId($id);
                    $data["fiche_production"] = $this->fiche_production->get();
                    return $this->view->load("fiche_production/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["fiche_productions"] = $this->fiche_production->liste();
                    return $this->view->load("fiche_production/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_production->setPost($_POST,$_FILES);
                    $ok = $this->fiche_production->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("fiche_production/add", $data);
            }else{
                return $this->view->load("fiche_production/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_production->setPost($_POST,$_FILES);
                    $ok = $this->fiche_production->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("fiche_production/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->fiche_production->setId($id);
            			//Supression
            			$this->fiche_production->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->fiche_production->setId($id);
                    $data["fiche_production"] = $this->fiche_production->get();
            			//chargement de la vue edit.html
                    return $this->view->load("fiche_production/edit", $data);
                }


                   



               }


            ?>

