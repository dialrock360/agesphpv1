 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
 use libs\system\Controller;
  use src\entities\V_account_sessions as V_account_sessionsEntity;
  use src\model\V_account_sessionsDB;

  use src\model\DB;

  class V_account_sessions extends Controller{

    /*==================Attribut list=====================*/
             private  $v_account_sessions;
             private  $v_account_sessionsdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_account_sessions = new V_account_sessionsEntity();
                 $this->v_account_sessionsdb = new V_account_sessionsDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_account_sessions/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_account_sessions/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_account_sessions->setId($id);
                    $data["v_account_sessions"] = $this->v_account_sessions->get();
                    return $this->view->load("v_account_sessions/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_account_sessionss"] = $this->v_account_sessions->liste();
                    return $this->view->load("v_account_sessions/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_account_sessions->setPost($_POST,$_FILES);
                    $ok = $this->v_account_sessions->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_account_sessions/add", $data);
            }else{
                return $this->view->load("v_account_sessions/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_account_sessions->setPost($_POST,$_FILES);
                    $ok = $this->v_account_sessions->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_account_sessions/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_account_sessions->setId($id);
            			//Supression
            			$this->v_account_sessions->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_account_sessions->setId($id);
                    $data["v_account_sessions"] = $this->v_account_sessions->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_account_sessions/edit", $data);
                }


                   



               }


            ?>

