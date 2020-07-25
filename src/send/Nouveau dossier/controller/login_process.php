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

require_once'../model/bd.php';

if(isset($_POST['login']))
{

    $login=trim(htmlspecialchars(strval($_POST['login'])));
    $pass=trim(htmlspecialchars(strval($_POST['pass'])));


    //$user_name = $_POST['user_name'];
    //$login = trim($_POST['user_email']);
  //  $pass = trim($_POST['password']);

    //$password = md5($user_password);

    try
    {
       // SELECT count(*) FROM UTILISATEUR WHERE 	PASSE='$Password' AND LOGIN='$login' AND 	LEVESECURITY IN (2,3,4)
        $stmt = $db_con->prepare("SELECT * FROM UTILISATEUR WHERE LOGIN=:login");
        $stmt->execute(array(":login"=>$login));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if($row['PASSE']==$pass){

            echo 1; // log in
            $_SESSION['user_session'] = $row['IDU'];
        }
        else{

            echo "Mots de Pass ou Login Erroné."; // wrong details
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
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