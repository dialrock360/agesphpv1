 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
 use libs\system\Controller;
  use src\entities\Users_roles as Users_rolesEntity;
  use src\model\Users_rolesDB;

  use src\model\DB;

  class Users_roles extends Controller{

    /*==================Attribut list=====================*/
             private  $users_roles;
             private  $users_rolesdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->users_roles = new Users_rolesEntity();
                 $this->users_rolesdb = new Users_rolesDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("users_roles/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id_role){
                    $data["id_role"] = $id_role;
                    return $this->view->load("users_roles/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id_role){
       $this->users_roles->setId($id);
       $this->users_roles->setId_user($id_user);
       $this->users_roles->setId_role($id_role);
                    $data["users_roles"] = $this->users_roles->get();
                    return $this->view->load("users_roles/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["users_roless"] = $this->users_roles->liste();
                    return $this->view->load("users_roles/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id_role"])) {
                    $this->users_roles->setPost($_POST,$_FILES);
                    $ok = $this->users_roles->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("users_roles/add", $data);
            }else{
                return $this->view->load("users_roles/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id_role"])) {
                    $this->users_roles->setPost($_POST,$_FILES);
                    $ok = $this->users_roles->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("users_roles/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id_role){
              //affectation de l'id 
       $this->users_roles->setId_user($id_user);
       $this->users_roles->setId_role($id_role);
            			//Supression
            			$this->users_roles->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id_role){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->users_roles->setId_user($id_user);
       $this->users_roles->setId_role($id_role);
                    $data["users_roles"] = $this->users_roles->get();
            			//chargement de la vue edit.html
                    return $this->view->load("users_roles/edit", $data);
                }


                   



               }


            ?>

