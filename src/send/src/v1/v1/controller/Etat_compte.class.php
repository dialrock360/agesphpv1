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
  use src\entities\Etat_compte as Etat_compteEntity;
  use src\model\Etat_compteDB;

  use src\model\DB;

  use src\entities\Famille as FamilleEntity;
  use src\model\FamilleDB;


  use src\entities\Mouvement as MouvementEntity;
  use src\model\MouvementDB;


  class Etat_compte extends Controller{

    /*==================Attribut list=====================*/
             private  $etat_compte;
             private  $etat_comptedb;
   private  $db;

             private  $famille;
             private  $familledb;
             private  $mouvement;
             private  $mouvementdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->etat_compte = new Etat_compteEntity();
                 $this->etat_comptedb = new Etat_compteDB();
                  $this->db = new DB();
                 $this->famille = new FamilleEntity();
                 $this->familledb = new FamilleDB();
                 $this->mouvement = new MouvementEntity();
                 $this->mouvementdb = new MouvementDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("etat_compte/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("etat_compte/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->etat_compte->setId($id);
       $this->etat_compte->setId($id);
                    $data["etat_compte"] = $this->etat_compte->get();
                    return $this->view->load("etat_compte/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["etat_comptes"] = $this->etat_compte->liste();
                    return $this->view->load("etat_compte/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["familles"] = $this->famille->liste();
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->etat_compte->setPost($_POST,$_FILES);
                    $ok = $this->etat_compte->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("etat_compte/add", $data);
            }else{
                return $this->view->load("etat_compte/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["familles"] = $this->famille->liste();
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->etat_compte->setPost($_POST,$_FILES);
                    $ok = $this->etat_compte->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("etat_compte/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->etat_compte->setId($id);
            			//Supression
            			$this->etat_compte->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["familles"] = $this->famille->liste();
                    $data["mouvements"] = $this->mouvement->liste();
    /*=============================================================*/
       $this->etat_compte->setId($id);
                    $data["etat_compte"] = $this->etat_compte->get();
            			//chargement de la vue edit.html
                    return $this->view->load("etat_compte/edit", $data);
                }


                   



               }


            ?>

