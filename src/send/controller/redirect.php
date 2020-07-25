<?php
if(isset($_GET['login']) and isset($_GET['pass'])){
    session_start();
    $_SESSION['login'] = $_GET['login'];
   header("location:../start.php?file=page/dashboard");
}/*else{
    header("location:../index.php");
}
*/