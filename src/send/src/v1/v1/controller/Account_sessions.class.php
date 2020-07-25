 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
 use libs\system\Controller;
  use src\entities\Account_sessions as Account_sessionsEntity;
  use src\model\Account_sessionsDB;

  use src\model\DB;

  use src\entities\Accounts as AccountsEntity;
  use src\model\AccountsDB;


  use src\entities\Accounts as AccountsEntity;
  use src\model\AccountsDB;


  class Account_sessions extends Controller{

    /*==================Attribut list=====================*/
             private  $account_sessions;
             private  $account_sessionsdb;
   private  $db;

             private  $accounts;
             private  $accountsdb;
             private  $accounts;
             private  $accountsdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->account_sessions = new Account_sessionsEntity();
                 $this->account_sessionsdb = new Account_sessionsDB();
                  $this->db = new DB();
                 $this->accounts = new AccountsEntity();
                 $this->accountsdb = new AccountsDB();
                 $this->accounts = new AccountsEntity();
                 $this->accountsdb = new AccountsDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("account_sessions/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $session_id){
                    $data["session_id"] = $session_id;
                    return $this->view->load("account_sessions/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($session_id){
       $this->account_sessions->setId($id);
       $this->account_sessions->setSession_id($session_id);
                    $data["account_sessions"] = $this->account_sessions->get();
                    return $this->view->load("account_sessions/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["account_sessionss"] = $this->account_sessions->liste();
                    return $this->view->load("account_sessions/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["accountss"] = $this->accounts->liste();
                    $data["accountss"] = $this->accounts->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["session_id"])) {
                    $this->account_sessions->setPost($_POST,$_FILES);
                    $ok = $this->account_sessions->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("account_sessions/add", $data);
            }else{
                return $this->view->load("account_sessions/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["accountss"] = $this->accounts->liste();
                    $data["accountss"] = $this->accounts->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["session_id"])) {
                    $this->account_sessions->setPost($_POST,$_FILES);
                    $ok = $this->account_sessions->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("account_sessions/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($session_id){
              //affectation de l'id 
       $this->account_sessions->setSession_id($session_id);
            			//Supression
            			$this->account_sessions->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($session_id){
	//initialisation des cle etrangeres
                    $data["accountss"] = $this->accounts->liste();
                    $data["accountss"] = $this->accounts->liste();
    /*=============================================================*/
       $this->account_sessions->setSession_id($session_id);
                    $data["account_sessions"] = $this->account_sessions->get();
            			//chargement de la vue edit.html
                    return $this->view->load("account_sessions/edit", $data);
                }


                   



               }


            ?>

