<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE MODELE.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
namespace libs\system;
use libs\system\View;

class Controller{
        protected $view;
        public function __construct(){
            $this->view = new View();
            session_start();
        }
    //connecte l'utilisateur donné et redirige vers la page d'acceuil
    protected function login($member){
        $_SESSION["user"] = $member;
        session_write_close();
    }

    //déconnecte l'utilisateur et redirige vers l'accueil
    protected function logout(){
        $_SESSION = array();
        session_destroy();
    }
    }
?>