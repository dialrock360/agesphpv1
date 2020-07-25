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
  use src\entities\Famille as FamilleEntity;
  use src\model\FamilleDB;

  use src\model\DB;

  class Famille extends Controller{

    /*==================Attribut list=====================*/
             private  $famille;
             private  $familledb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->famille = new FamilleEntity();
                 $this->familledb = new FamilleDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("famille/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDFA){
                    $data["idfa"] = $IDFA;
                    return $this->view->load("famille/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDFA){
       $this->famille->setId($id);
       $this->famille->setIdfa($IDFA);
                    $data["famille"] = $this->famille->get();
                    return $this->view->load("famille/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["familles"] = $this->famille->liste();
                    return $this->view->load("famille/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDFA"])) {
                    $this->famille->setPost($_POST,$_FILES);
                    $ok = $this->famille->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("famille/add", $data);
            }else{
                return $this->view->load("famille/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDFA"])) {
                    $this->famille->setPost($_POST,$_FILES);
                    $ok = $this->famille->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("famille/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDFA){
              //affectation de l'id 
       $this->famille->setIdfa($IDFA);
            			//Supression
            			$this->famille->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDFA){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->famille->setIdfa($IDFA);
                    $data["famille"] = $this->famille->get();
            			//chargement de la vue edit.html
                    return $this->view->load("famille/edit", $data);
                }


                   



               }


            ?>

