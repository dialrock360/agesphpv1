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
  use src\entities\Utilisateur as UtilisateurEntity;
  use src\model\UtilisateurDB;

  use src\model\DB;

  class Utilisateur extends Controller{

    /*==================Attribut list=====================*/
             private  $utilisateur;
             private  $utilisateurdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->utilisateur = new UtilisateurEntity();
                 $this->utilisateurdb = new UtilisateurDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("utilisateur/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDU){
                    $data["idu"] = $IDU;
                    return $this->view->load("utilisateur/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDU){
       $this->utilisateur->setId($id);
       $this->utilisateur->setIdu($IDU);
                    $data["utilisateur"] = $this->utilisateur->get();
                    return $this->view->load("utilisateur/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["utilisateurs"] = $this->utilisateur->liste();
                    return $this->view->load("utilisateur/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDU"])) {
                    $this->utilisateur->setPost($_POST,$_FILES);
                    $ok = $this->utilisateur->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("utilisateur/add", $data);
            }else{
                return $this->view->load("utilisateur/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDU"])) {
                    $this->utilisateur->setPost($_POST,$_FILES);
                    $ok = $this->utilisateur->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("utilisateur/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDU){
              //affectation de l'id 
       $this->utilisateur->setIdu($IDU);
            			//Supression
            			$this->utilisateur->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDU){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->utilisateur->setIdu($IDU);
                    $data["utilisateur"] = $this->utilisateur->get();
            			//chargement de la vue edit.html
                    return $this->view->load("utilisateur/edit", $data);
                }


                   



               }


            ?>

