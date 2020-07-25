
<?php
require_once 'model/include.php';
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

