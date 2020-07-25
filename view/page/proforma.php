<?php



if(isset($_GET['file'])) {
    switch ($_GET['file']) {
        case 'page/proforma':
            require_once 'proforma/fprocontent.php';
            break;
        case 'page/proforma/table':
            require_once 'proforma/tablefaccontent.php';

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

