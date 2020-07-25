<?php
$cible='recu';
$docTb='rec';
$fac='rec';
 if(isset($_GET['file'])) {
         switch ($_GET['file']) {
             case 'page/recu':
					require_once 'recu/reccontent.php';
                 break;
             case 'page/recu/table':
					require_once 'recu/tablereccontent.php';

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
