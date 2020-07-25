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
  use src\entities\Modepaie as ModepaieEntity;
  use src\model\ModepaieDB;

  use src\model\DB;

  use src\entities\Salarier as SalarierEntity;
  use src\model\SalarierDB;


  class Modepaie extends Controller{

    /*==================Attribut list=====================*/
             private  $modepaie;
             private  $modepaiedb;
   private  $db;

             private  $salarier;
             private  $salarierdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->modepaie = new ModepaieEntity();
                 $this->modepaiedb = new ModepaieDB();
                  $this->db = new DB();
                 $this->salarier = new SalarierEntity();
                 $this->salarierdb = new SalarierDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("modepaie/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("modepaie/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->modepaie->setId($id);
       $this->modepaie->setId($id);
                    $data["modepaie"] = $this->modepaie->get();
                    return $this->view->load("modepaie/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["modepaies"] = $this->modepaie->liste();
                    return $this->view->load("modepaie/liste", $data);
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
                    $this->modepaie->setPost($_POST,$_FILES);
                    $ok = $this->modepaie->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("modepaie/add", $data);
            }else{
                return $this->view->load("modepaie/add", $data);
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
                    $this->modepaie->setPost($_POST,$_FILES);
                    $ok = $this->modepaie->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("modepaie/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->modepaie->setId($id);
            			//Supression
            			$this->modepaie->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["salariers"] = $this->salarier->liste();
    /*=============================================================*/
       $this->modepaie->setId($id);
                    $data["modepaie"] = $this->modepaie->get();
            			//chargement de la vue edit.html
                    return $this->view->load("modepaie/edit", $data);
                }


                   



               }


            ?>

