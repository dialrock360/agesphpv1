 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
 use libs\system\Controller;
  use src\entities\Facture as FactureEntity;
  use src\model\FactureDB;

  use src\model\DB;

  class Facture extends Controller{

    /*==================Attribut list=====================*/
             private  $facture;
             private  $facturedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->facture = new FactureEntity();
                 $this->facturedb = new FactureDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("facture/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDF){
                    $data["idf"] = $IDF;
                    return $this->view->load("facture/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDF){
       $this->facture->setId($id);
       $this->facture->setIdf($IDF);
                    $data["facture"] = $this->facture->get();
                    return $this->view->load("facture/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["factures"] = $this->facture->liste();
                    return $this->view->load("facture/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDF"])) {
                    $this->facture->setPost($_POST,$_FILES);
                    $ok = $this->facture->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("facture/add", $data);
            }else{
                return $this->view->load("facture/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDF"])) {
                    $this->facture->setPost($_POST,$_FILES);
                    $ok = $this->facture->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("facture/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDF){
              //affectation de l'id 
       $this->facture->setIdf($IDF);
            			//Supression
            			$this->facture->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDF){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->facture->setIdf($IDF);
                    $data["facture"] = $this->facture->get();
            			//chargement de la vue edit.html
                    return $this->view->load("facture/edit", $data);
                }


                   



               }


            ?>

