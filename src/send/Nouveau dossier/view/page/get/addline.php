
<?php


header('Content-type: application/json; charset=UTF-8');

require_once '../../../model/include.php';

if (isset($_POST['itest']) && !empty($_POST['itest'])) {
    $line=strval($_POST['send']);
    $var= explode(",", $line);
    $section= $var[0]; // piece1
    $libele= $var[1]; // piece2
    updfrontend($libele,'appdseting',$section);
}





if (isset($_POST['id']) && !empty($_POST['id'])) {
    $line=intval($_POST['line']);
    $id =$_POST['id'];
    foreach ($id as $key => $value) {
        $i=$key;
        $query = "SELECT C.NOMC nomc,P.DESI nom,P.IDP idp,P.PRIXV pxv
FROM CONDIS C
INNER JOIN PRODUIT P
ON C.IDC = P.IDC
WHERE   P.IDP=:id ";
        $stmt = $db_con->prepare($query);
        $stmt->execute(array(':id' => $value));


        if ($line=='0') {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$idp);?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $idp; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($idp); ?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxv;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="1" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1" style="text-align:right;" class="form-control" /></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php




            }
        }else{
            $i=$key+$line;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$idp);?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $idp; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($idp); ?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxv;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="1" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="1"  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" /></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php
            }
        }

    }


}

