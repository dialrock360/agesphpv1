
<?php
function dateconverter($originalDate,$day=0){
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

    return  $newDate =($day==0) ? strftime("%A %d %B %Y",strtotime($originalDate)) :
        $newDate =($day==1) ? strftime(" %d %B %Y",strtotime($originalDate)) : strftime("%B %Y",strtotime($originalDate));
}
  $dburl='model/DB.php';
require_once 'classes/classeinclude.php';

require_once 'model/functions.php';
require_once 'model/functionsPrd.php';
require_once 'model/functionsuser.php';
require_once 'model/functionfrontend.php';
require_once 'model/functionsCount.php';
require_once 'model/functionsfac.php';
session_start();
if (!isset($_SESSION['login']))

{
    header ('Location:index.php');
    exit();
}

?>
<?php


$log=htmlspecialchars(trim($_SESSION['login']));

require_once'model/logininfo.php';

require_once 'assets/web/rooting.php';

require_once 'assets/web/template.php';


?>

