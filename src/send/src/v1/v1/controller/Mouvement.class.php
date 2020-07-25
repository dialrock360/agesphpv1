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
  use src\entities\Mouvement as MouvementEntity;
  use src\model\MouvementDB;

  use src\model\DB;

  use src\entities\Personne as PersonneEntity;
  use src\model\PersonneDB;


  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


  use src\entities\Type_mouvement as Type_mouvementEntity;
  use src\model\Type_mouvementDB;


  use src\entities\Accounts as AccountsEntity;
  use src\model\AccountsDB;


  class Mouvement extends Controller{

    /*==================Attribut list=====================*/
             private  $mouvement;
             private  $mouvementdb;
   private  $db;

             private  $personne;
             private  $personnedb;
             private  $service;
             private  $servicedb;
             private  $type_mouvement;
             private  $type_mouvementdb;
             private  $accounts;
             private  $accountsdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->mouvement = new MouvementEntity();
                 $this->mouvementdb = new MouvementDB();
                  $this->db = new DB();
                 $this->personne = new PersonneEntity();
                 $this->personnedb = new PersonneDB();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 $this->type_mouvement = new Type_mouvementEntity();
                 $this->type_mouvementdb = new Type_mouvementDB();
                 $this->accounts = new AccountsEntity();
                 $this->accountsdb = new AccountsDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("mouvement/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("mouvement/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->mouvement->setId($id);
       $this->mouvement->setId($id);
                    $data["mouvement"] = $this->mouvement->get();
                    return $this->view->load("mouvement/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["mouvements"] = $this->mouvement->liste();
                    return $this->view->load("mouvement/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["services"] = $this->service->liste();
                    $data["type_mouvements"] = $this->type_mouvement->liste();
                    $data["accountss"] = $this->accounts->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->mouvement->setPost($_POST,$_FILES);
                    $ok = $this->mouvement->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("mouvement/add", $data);
            }else{
                return $this->view->load("mouvement/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["personnes"] = $this->personne->liste();
                    $data["services"] = $this->service->liste();
                    $data["type_mouvements"] = $this->type_mouvement->liste();
                    $data["accountss"] = $this->accounts->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->mouvement->setPost($_POST,$_FILES);
                    $ok = $this->mouvement->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("mouvement/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->mouvement->setId($id);
            			//Supression
            			$this->mouvement->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["personnes"] = $this->personne->liste();
                    $data["services"] = $this->service->liste();
                    $data["type_mouvements"] = $this->type_mouvement->liste();
                    $data["accountss"] = $this->accounts->liste();
    /*=============================================================*/
       $this->mouvement->setId($id);
                    $data["mouvement"] = $this->mouvement->get();
            			//chargement de la vue edit.html
                    return $this->view->load("mouvement/edit", $data);
                }


                   



               }


            ?>

