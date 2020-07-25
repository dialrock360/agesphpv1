<?php

require_once 'assets/web/rooting.php';

if(isset($_GET['ok'])==1) {
    require_once 'model/include.php';
    session_start();
    if (!isset($_SESSION['login']))

    {
        header ('Location:start.php');
        exit();
    }
    $log=htmlspecialchars(trim($_SESSION['login']));

    require_once'model/logininfo.php';
    require_once 'assets/web/template.php';
}else{
    require_once 'assets/web/start.php';
}


?>

