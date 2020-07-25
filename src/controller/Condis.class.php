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
  use src\entities\Condis as CondisEntity;
  use src\model\CondisDB;

  use src\model\DB;

  class Condis extends Controller{

    /*==================Attribut list=====================*/
             private  $condis;
             private  $condisdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->condis = new CondisEntity();
                 $this->condisdb = new CondisDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("condis/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDC){
                    $data["idc"] = $IDC;
                    return $this->view->load("condis/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDC){
       $this->condis->setId($id);
       $this->condis->setIdc($IDC);
                    $data["condis"] = $this->condis->get();
                    return $this->view->load("condis/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["condiss"] = $this->condis->liste();
                    return $this->view->load("condis/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDC"])) {
                    $this->condis->setPost($_POST,$_FILES);
                    $ok = $this->condis->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("condis/add", $data);
            }else{
                return $this->view->load("condis/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDC"])) {
                    $this->condis->setPost($_POST,$_FILES);
                    $ok = $this->condis->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("condis/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDC){
              //affectation de l'id 
       $this->condis->setIdc($IDC);
            			//Supression
            			$this->condis->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDC){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->condis->setIdc($IDC);
                    $data["condis"] = $this->condis->get();
            			//chargement de la vue edit.html
                    return $this->view->load("condis/edit", $data);
                }


                   



               }


            ?>

