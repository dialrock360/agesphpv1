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
  use src\entities\Fiche_paie as Fiche_paieEntity;
  use src\model\Fiche_paieDB;

  use src\model\DB;

  use src\entities\Salarier as SalarierEntity;
  use src\model\SalarierDB;


  class Fiche_paie extends Controller{

    /*==================Attribut list=====================*/
             private  $fiche_paie;
             private  $fiche_paiedb;
   private  $db;

             private  $salarier;
             private  $salarierdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->fiche_paie = new Fiche_paieEntity();
                 $this->fiche_paiedb = new Fiche_paieDB();
                  $this->db = new DB();
                 $this->salarier = new SalarierEntity();
                 $this->salarierdb = new SalarierDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("fiche_paie/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("fiche_paie/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->fiche_paie->setId($id);
       $this->fiche_paie->setId($id);
                    $data["fiche_paie"] = $this->fiche_paie->get();
                    return $this->view->load("fiche_paie/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["fiche_paies"] = $this->fiche_paie->liste();
                    return $this->view->load("fiche_paie/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["salariers"] = $this->salarier->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_paie->setPost($_POST,$_FILES);
                    $ok = $this->fiche_paie->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("fiche_paie/add", $data);
            }else{
                return $this->view->load("fiche_paie/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["salariers"] = $this->salarier->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_paie->setPost($_POST,$_FILES);
                    $ok = $this->fiche_paie->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("fiche_paie/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->fiche_paie->setId($id);
            			//Supression
            			$this->fiche_paie->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["salariers"] = $this->salarier->liste();
    /*=============================================================*/
       $this->fiche_paie->setId($id);
                    $data["fiche_paie"] = $this->fiche_paie->get();
            			//chargement de la vue edit.html
                    return $this->view->load("fiche_paie/edit", $data);
                }


                   



               }


            ?>

