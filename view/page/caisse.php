

<?php

$fondb = new Fond();
$listefond  = $fondb->liste();
$etatcmptdb = new Etat_compte();
$listeetatcmpt = $etatcmptdb->listeVetat();

require_once 'caisse/caissecontent.php';
?>
<?php
require_once 'bloc/scriptcaisse.php';
?>
