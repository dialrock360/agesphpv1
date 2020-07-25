 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
 use libs\system\Controller;
  use src\entities\Frontend as FrontendEntity;
  use src\model\FrontendDB;

  use src\model\DB;

  class Frontend extends Controller{

    /*==================Attribut list=====================*/
             private  $frontend;
             private  $frontenddb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->frontend = new FrontendEntity();
                 $this->frontenddb = new FrontendDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("frontend/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDFR){
                    $data["idfr"] = $IDFR;
                    return $this->view->load("frontend/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDFR){
       $this->frontend->setId($id);
       $this->frontend->setIdfr($IDFR);
                    $data["frontend"] = $this->frontend->get();
                    return $this->view->load("frontend/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["frontends"] = $this->frontend->liste();
                    return $this->view->load("frontend/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDFR"])) {
                    $this->frontend->setPost($_POST,$_FILES);
                    $ok = $this->frontend->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("frontend/add", $data);
            }else{
                return $this->view->load("frontend/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDFR"])) {
                    $this->frontend->setPost($_POST,$_FILES);
                    $ok = $this->frontend->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("frontend/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDFR){
              //affectation de l'id 
       $this->frontend->setIdfr($IDFR);
            			//Supression
            			$this->frontend->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDFR){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->frontend->setIdfr($IDFR);
                    $data["frontend"] = $this->frontend->get();
            			//chargement de la vue edit.html
                    return $this->view->load("frontend/edit", $data);
                }


                   



               }


            ?>

