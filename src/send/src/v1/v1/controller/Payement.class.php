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
  use src\entities\Payement as PayementEntity;
  use src\model\PayementDB;

  use src\model\DB;

  use src\entities\Mouvement as MouvementEntity;
  use src\model\MouvementDB;


  class Payement extends Controller{

    /*==================Attribut list=====================*/
             private  $payement;
             private  $payementdb;
   private  $db;

             private  $mouvement;
             private  $mouvementdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->payement = new PayementEntity();
                 $this->payementdb = new PayementDB();
                  $this->db = new DB();
                 $this->mouvement = new MouvementEntity();
                 $this->mouvementdb = new MouvementDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("payement/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("payement/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->payement->setId($id);
       $this->payement->setId($id);
                    $data["payement"] = $this->payement->get();
                    return $this->view->load("payement/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["payements"] = $this->payement->liste();
                    return $this->view->load("payement/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->payement->setPost($_POST,$_FILES);
                    $ok = $this->payement->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("payement/add", $data);
            }else{
                return $this->view->load("payement/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->payement->setPost($_POST,$_FILES);
                    $ok = $this->payement->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("payement/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->payement->setId($id);
            			//Supression
            			$this->payement->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["mouvements"] = $this->mouvement->liste();
    /*=============================================================*/
       $this->payement->setId($id);
                    $data["payement"] = $this->payement->get();
            			//chargement de la vue edit.html
                    return $this->view->load("payement/edit", $data);
                }


                   



               }


            ?>

