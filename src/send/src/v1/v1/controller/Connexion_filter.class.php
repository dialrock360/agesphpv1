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
  use src\entities\Connexion_filter as Connexion_filterEntity;
  use src\model\Connexion_filterDB;

  use src\model\DB;

  class Connexion_filter extends Controller{

    /*==================Attribut list=====================*/
             private  $connexion_filter;
             private  $connexion_filterdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->connexion_filter = new Connexion_filterEntity();
                 $this->connexion_filterdb = new Connexion_filterDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("connexion_filter/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $ip){
                    $data["ip"] = $ip;
                    return $this->view->load("connexion_filter/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($ip){
       $this->connexion_filter->setId($id);
       $this->connexion_filter->setIp($ip);
                    $data["connexion_filter"] = $this->connexion_filter->get();
                    return $this->view->load("connexion_filter/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["connexion_filters"] = $this->connexion_filter->liste();
                    return $this->view->load("connexion_filter/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["ip"])) {
                    $this->connexion_filter->setPost($_POST,$_FILES);
                    $ok = $this->connexion_filter->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("connexion_filter/add", $data);
            }else{
                return $this->view->load("connexion_filter/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["ip"])) {
                    $this->connexion_filter->setPost($_POST,$_FILES);
                    $ok = $this->connexion_filter->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("connexion_filter/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($ip){
              //affectation de l'id 
       $this->connexion_filter->setIp($ip);
            			//Supression
            			$this->connexion_filter->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($ip){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->connexion_filter->setIp($ip);
                    $data["connexion_filter"] = $this->connexion_filter->get();
            			//chargement de la vue edit.html
                    return $this->view->load("connexion_filter/edit", $data);
                }


                   



               }


            ?>

