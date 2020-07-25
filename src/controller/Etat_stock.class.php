 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
 use libs\system\Controller;
  use src\entities\Etat_stock as Etat_stockEntity;
  use src\model\Etat_stockDB;

  use src\model\DB;

  use src\entities\Facture as FactureEntity;
  use src\model\FactureDB;


  class Etat_stock extends Controller{

    /*==================Attribut list=====================*/
             private  $etat_stock;
             private  $etat_stockdb;
   private  $db;

             private  $facture;
             private  $facturedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->etat_stock = new Etat_stockEntity();
                 $this->etat_stockdb = new Etat_stockDB();
                  $this->db = new DB();
                 $this->facture = new FactureEntity();
                 $this->facturedb = new FactureDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("etat_stock/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("etat_stock/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->etat_stock->setId($id);
       $this->etat_stock->setId($id);
                    $data["etat_stock"] = $this->etat_stock->get();
                    return $this->view->load("etat_stock/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["etat_stocks"] = $this->etat_stock->liste();
                    return $this->view->load("etat_stock/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["factures"] = $this->facture->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->etat_stock->setPost($_POST,$_FILES);
                    $ok = $this->etat_stock->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("etat_stock/add", $data);
            }else{
                return $this->view->load("etat_stock/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["factures"] = $this->facture->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->etat_stock->setPost($_POST,$_FILES);
                    $ok = $this->etat_stock->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("etat_stock/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->etat_stock->setId($id);
            			//Supression
            			$this->etat_stock->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["factures"] = $this->facture->liste();
    /*=============================================================*/
       $this->etat_stock->setId($id);
                    $data["etat_stock"] = $this->etat_stock->get();
            			//chargement de la vue edit.html
                    return $this->view->load("etat_stock/edit", $data);
                }


                   



               }


            ?>

