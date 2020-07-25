<?php
/*
function login($Password,$login){
    $base = mysqli_connect('localhost','root','','senbd') or die('Conection Rat�e: PB de BD');//conection � la bd

    //Requette pour verifier le couple login / pass dans la bd
    $sql="SELECT count(*) FROM UTILISATEUR WHERE 	PASSE='$Password' AND LOGIN='$login' AND 	LEVESECURITY IN (2,3,4)";
    // on envoie la requÃªte
    $req = $base->query($sql);

    $data =  mysqli_fetch_array($req);

    mysqli_free_result($req);
    //mysql_close();

    // Si RÃ¯Â¿Åponse, alors login:
    if ($data[0] == 1)
    {
        $success = 'ok';
        return $success;
    }if ($data[0] == 0){
        $erreur = 'Mots de Pass ou Login Erroné!';
        return $erreur;
    }else{
        $erreur = 'Problème de base de données : Contacter Aministrateur!!!';
        return $erreur;
    }

}
*/

require_once'../model/DB.php';

if(isset($_POST['login']))
{
  $db = new DB();
    $login=trim(htmlspecialchars(strval($_POST['login'])));
    $pass=trim(htmlspecialchars(strval($_POST['pass'])));

 
              $db->setTablename("utilisateur");
              $condition = array('LOGIN' =>$login, 'PASSE' =>$pass);
              $usr=$db->getRows(array('where'=>$condition,'return_type'=>'single'));
			  
       if($usr['PASSE']==$pass){

            echo 1; // log in
            $_SESSION['user_session'] = $usr['IDU'];
        }
        else{

            echo "Mots de Pass ou Login Erroné."; // wrong details
        }
}













/*

if(isset($_POST['btn-login'])){
    require_once'../model/bd.php';
    extract($_POST);
    $ok=login($password,$login);
    if ($ok == 'ok')
    {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        header("location:functionfrontend.php?action=login");

    }else{

        header("location:../index.php?ok=$ok");
    }
    exit();
}
*/

?>