<?php
$cible='facture';
$titre='FACTURE';
$fac='fac';

$com='Client';
$docTb2='fac';
$docTb='fac';
$type='facture';

$mvmdb = new Mouvement();
$listemvm  = $mvmdb->listebyname($cible);

$prddb = new Produit();
$optionfacprd  = $prddb->optionProduit('fac');
$optioncmpprd  = $prddb->optionProduit('cmp');
$option1=$optionfacprd;
$option2=$optioncmpprd;

$target='?file=page/facture/table';

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

