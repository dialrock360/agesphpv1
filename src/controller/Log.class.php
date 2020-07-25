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
  use src\entities\Log as LogEntity;
  use src\model\LogDB;

  use src\model\DB;

  class Log extends Controller{

    /*==================Attribut list=====================*/
             private  $log;
             private  $logdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->log = new LogEntity();
                 $this->logdb = new LogDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("log/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $idl){
                    $data["idl"] = $idl;
                    return $this->view->load("log/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($idl){
       $this->log->setId($id);
       $this->log->setIdl($idl);
                    $data["log"] = $this->log->get();
                    return $this->view->load("log/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["logs"] = $this->log->liste();
                    return $this->view->load("log/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idl"])) {
                    $this->log->setPost($_POST,$_FILES);
                    $ok = $this->log->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("log/add", $data);
            }else{
                return $this->view->load("log/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idl"])) {
                    $this->log->setPost($_POST,$_FILES);
                    $ok = $this->log->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("log/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($idl){
              //affectation de l'id 
       $this->log->setIdl($idl);
            			//Supression
            			$this->log->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($idl){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->log->setIdl($idl);
                    $data["log"] = $this->log->get();
            			//chargement de la vue edit.html
                    return $this->view->load("log/edit", $data);
                }


                   



               }


            ?>

