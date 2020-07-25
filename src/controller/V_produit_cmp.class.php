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
  use src\entities\V_produit_cmp as V_produit_cmpEntity;
  use src\model\V_produit_cmpDB;

  use src\model\DB;

  class V_produit_cmp extends Controller{

    /*==================Attribut list=====================*/
             private  $v_produit_cmp;
             private  $v_produit_cmpdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_produit_cmp = new V_produit_cmpEntity();
                 $this->v_produit_cmpdb = new V_produit_cmpDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_produit_cmp/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_produit_cmp/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_produit_cmp->setId($id);
                    $data["v_produit_cmp"] = $this->v_produit_cmp->get();
                    return $this->view->load("v_produit_cmp/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_produit_cmps"] = $this->v_produit_cmp->liste();
                    return $this->view->load("v_produit_cmp/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_produit_cmp->setPost($_POST,$_FILES);
                    $ok = $this->v_produit_cmp->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_produit_cmp/add", $data);
            }else{
                return $this->view->load("v_produit_cmp/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_produit_cmp->setPost($_POST,$_FILES);
                    $ok = $this->v_produit_cmp->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_produit_cmp/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_produit_cmp->setId($id);
            			//Supression
            			$this->v_produit_cmp->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_produit_cmp->setId($id);
                    $data["v_produit_cmp"] = $this->v_produit_cmp->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_produit_cmp/edit", $data);
                }


                   



               }


            ?>

