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
  use src\entities\V_select_produit_recu as V_select_produit_recuEntity;
  use src\model\V_select_produit_recuDB;

  use src\model\DB;

  class V_select_produit_recu extends Controller{

    /*==================Attribut list=====================*/
             private  $v_select_produit_recu;
             private  $v_select_produit_recudb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_select_produit_recu = new V_select_produit_recuEntity();
                 $this->v_select_produit_recudb = new V_select_produit_recuDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_select_produit_recu/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_select_produit_recu/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_select_produit_recu->setId($id);
                    $data["v_select_produit_recu"] = $this->v_select_produit_recu->get();
                    return $this->view->load("v_select_produit_recu/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_select_produit_recus"] = $this->v_select_produit_recu->liste();
                    return $this->view->load("v_select_produit_recu/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_select_produit_recu->setPost($_POST,$_FILES);
                    $ok = $this->v_select_produit_recu->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_select_produit_recu/add", $data);
            }else{
                return $this->view->load("v_select_produit_recu/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_select_produit_recu->setPost($_POST,$_FILES);
                    $ok = $this->v_select_produit_recu->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_select_produit_recu/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_select_produit_recu->setId($id);
            			//Supression
            			$this->v_select_produit_recu->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_select_produit_recu->setId($id);
                    $data["v_select_produit_recu"] = $this->v_select_produit_recu->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_select_produit_recu/edit", $data);
                }


                   



               }


            ?>

