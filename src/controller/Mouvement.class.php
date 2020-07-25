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
  use src\entities\Mouvement as MouvementEntity;
  use src\model\MouvementDB;

  use src\model\DB;

  class Mouvement extends Controller{

    /*==================Attribut list=====================*/
             private  $mouvement;
             private  $mouvementdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->mouvement = new MouvementEntity();
                 $this->mouvementdb = new MouvementDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("mouvement/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDMV){
                    $data["idmv"] = $IDMV;
                    return $this->view->load("mouvement/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDMV){
       $this->mouvement->setId($id);
       $this->mouvement->setIdmv($IDMV);
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
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDMV"])) {
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
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDMV"])) {
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
                
            public function delete($IDMV){
              //affectation de l'id 
       $this->mouvement->setIdmv($IDMV);
            			//Supression
            			$this->mouvement->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDMV){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->mouvement->setIdmv($IDMV);
                    $data["mouvement"] = $this->mouvement->get();
            			//chargement de la vue edit.html
                    return $this->view->load("mouvement/edit", $data);
                }


                   



               }


            ?>

