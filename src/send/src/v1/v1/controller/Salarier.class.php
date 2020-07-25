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
  use src\entities\Salarier as SalarierEntity;
  use src\model\SalarierDB;

  use src\model\DB;

  use src\entities\Contrat as ContratEntity;
  use src\model\ContratDB;


  class Salarier extends Controller{

    /*==================Attribut list=====================*/
             private  $salarier;
             private  $salarierdb;
   private  $db;

             private  $contrat;
             private  $contratdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->salarier = new SalarierEntity();
                 $this->salarierdb = new SalarierDB();
                  $this->db = new DB();
                 $this->contrat = new ContratEntity();
                 $this->contratdb = new ContratDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("salarier/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("salarier/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->salarier->setId($id);
       $this->salarier->setId($id);
                    $data["salarier"] = $this->salarier->get();
                    return $this->view->load("salarier/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["salariers"] = $this->salarier->liste();
                    return $this->view->load("salarier/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["contrats"] = $this->contrat->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->salarier->setPost($_POST,$_FILES);
                    $ok = $this->salarier->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("salarier/add", $data);
            }else{
                return $this->view->load("salarier/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["contrats"] = $this->contrat->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->salarier->setPost($_POST,$_FILES);
                    $ok = $this->salarier->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("salarier/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->salarier->setId($id);
            			//Supression
            			$this->salarier->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["contrats"] = $this->contrat->liste();
    /*=============================================================*/
       $this->salarier->setId($id);
                    $data["salarier"] = $this->salarier->get();
            			//chargement de la vue edit.html
                    return $this->view->load("salarier/edit", $data);
                }


                   



               }


            ?>

