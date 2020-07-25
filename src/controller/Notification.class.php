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
  use src\entities\Notification as NotificationEntity;
  use src\model\NotificationDB;

  use src\model\DB;

  class Notification extends Controller{

    /*==================Attribut list=====================*/
             private  $notification;
             private  $notificationdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->notification = new NotificationEntity();
                 $this->notificationdb = new NotificationDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("notification/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDN){
                    $data["idn"] = $IDN;
                    return $this->view->load("notification/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDN){
       $this->notification->setId($id);
       $this->notification->setIdn($IDN);
                    $data["notification"] = $this->notification->get();
                    return $this->view->load("notification/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["notifications"] = $this->notification->liste();
                    return $this->view->load("notification/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDN"])) {
                    $this->notification->setPost($_POST,$_FILES);
                    $ok = $this->notification->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("notification/add", $data);
            }else{
                return $this->view->load("notification/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDN"])) {
                    $this->notification->setPost($_POST,$_FILES);
                    $ok = $this->notification->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("notification/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDN){
              //affectation de l'id 
       $this->notification->setIdn($IDN);
            			//Supression
            			$this->notification->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDN){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->notification->setIdn($IDN);
                    $data["notification"] = $this->notification->get();
            			//chargement de la vue edit.html
                    return $this->view->load("notification/edit", $data);
                }


                   



               }


            ?>

