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
  use src\entities\Jour_ferier as Jour_ferierEntity;
  use src\model\Jour_ferierDB;

  use src\model\DB;

  use src\entities\Fiche_de_jours_ferier as Fiche_de_jours_ferierEntity;
  use src\model\Fiche_de_jours_ferierDB;


  class Jour_ferier extends Controller{

    /*==================Attribut list=====================*/
             private  $jour_ferier;
             private  $jour_ferierdb;
   private  $db;

             private  $fiche_de_jours_ferier;
             private  $fiche_de_jours_ferierdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->jour_ferier = new Jour_ferierEntity();
                 $this->jour_ferierdb = new Jour_ferierDB();
                  $this->db = new DB();
                 $this->fiche_de_jours_ferier = new Fiche_de_jours_ferierEntity();
                 $this->fiche_de_jours_ferierdb = new Fiche_de_jours_ferierDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("jour_ferier/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("jour_ferier/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->jour_ferier->setId($id);
       $this->jour_ferier->setId($id);
                    $data["jour_ferier"] = $this->jour_ferier->get();
                    return $this->view->load("jour_ferier/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["jour_feriers"] = $this->jour_ferier->liste();
                    return $this->view->load("jour_ferier/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["fiche_de_jours_feriers"] = $this->fiche_de_jours_ferier->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->jour_ferier->setPost($_POST,$_FILES);
                    $ok = $this->jour_ferier->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("jour_ferier/add", $data);
            }else{
                return $this->view->load("jour_ferier/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["fiche_de_jours_feriers"] = $this->fiche_de_jours_ferier->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->jour_ferier->setPost($_POST,$_FILES);
                    $ok = $this->jour_ferier->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("jour_ferier/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->jour_ferier->setId($id);
            			//Supression
            			$this->jour_ferier->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["fiche_de_jours_feriers"] = $this->fiche_de_jours_ferier->liste();
    /*=============================================================*/
       $this->jour_ferier->setId($id);
                    $data["jour_ferier"] = $this->jour_ferier->get();
            			//chargement de la vue edit.html
                    return $this->view->load("jour_ferier/edit", $data);
                }


                   



               }


            ?>

