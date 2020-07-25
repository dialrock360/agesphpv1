<?php
$cible='facture';
$fac='fac';

$docTb2='fac';
$docTb='fac';

 if(isset($_GET['file'])) {
         switch ($_GET['file']) {
             case 'page/facture':
					require_once 'facture/faccontent.php';
                 break;
             case 'page/facture/table':
					require_once 'facture/tablefaccontent.php';

                 break;
             default:
                 header("location:$base_url");
                 break;
         }
         }
?>
<?php
require_once 'bloc/scriptfac.php';



?>
