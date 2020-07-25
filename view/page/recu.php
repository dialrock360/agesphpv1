<?php
$cible='recu';
$docTb='rec';
$fac='rec';
$com='Fournisseur';

$mvmdb = new Mouvement();
$listemvm  = $mvmdb->listebyname($cible);


$prddb = new Produit();
$optionrecprd  = $prddb->optionProduit('rec');
$optionchargeprd  = $prddb->optionProduit('charge');
$lsprd  = $prddb->listeprd( );
$jsonprd  = json_encode($lsprd);

function js_array($array)
{
    $temp = array_map('js_str', $array);
    return '[' . implode(',', $temp) . ']';
}
/*
$new_array = array(); // create a new array
foreach ($lsprd as $prd ) {
    extract($prd);


    $new_array[] = json_encode($prd);
    $optionlsprd  .= '<tr>';
    $optionlsprd  .= '<td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>';
    $optionlsprd  .= '<td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>';
    $optionlsprd  .= '<td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXA;?>" style="text-align:right;" class="form-control"/></td>';
    $optionlsprd  .= '<td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>';
    $optionlsprd  .= '<td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>';
    $optionlsprd  .= '<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>';

    $optionlsprd  .= '</tr>';



}
*/

$target='?file=page/recu/table';


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
