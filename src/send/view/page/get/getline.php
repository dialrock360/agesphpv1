





<?php

header('Content-type: application/json; charset=UTF-8');

require_once '../../../model/include.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $line=intval($_POST['line']);
    $type=strval($_POST['type']);
    $id =$_POST['id'];


    if($type=='recu'){
        foreach ($id as $key => $value) {
            $i=$key;
            $query = "SELECT C.IDC idc, C.NOMC nomc,P.DESI desi,P.PHOTO img,P.IDP idp,P.IDC idcp, P.PRIXA pxa,P.PRIXV pxv,P.QNT qnt,P.FLAG flag
FROM CONDIS C
INNER JOIN PRODUIT P
ON C.IDC = P.IDC
WHERE   P.IDP=:id
ORDER BY desi ";
            $stmt = $db_con->prepare($query);
            $stmt->execute(array(':id' => $value));


            if ($line=='0') {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>

                    <tr>
                        <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$idp);?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $idp; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                        <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($idp); ?>" style="text-align:left;" class="form-control" /></td>
                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxa;?>" style="text-align:right;" class="form-control"/></td>
                        <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
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
                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxa;?>" style="text-align:right;" class="form-control"/></td>
                        <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="1,00"  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" /></td>
                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                    </tr>
                    <?php
                }
            }

        }

    }
    if($type=='facture'){
        foreach ($id as $key => $value) {
            $i=$key;
            $query = "SELECT C.IDC idc, C.NOMC nomc,P.DESI desi,P.PHOTO img,P.IDP idp,P.IDC idcp, P.PRIXA pxa,P.PRIXV pxv,P.QNT qnt,P.FLAG flag
FROM CONDIS C
INNER JOIN PRODUIT P
ON C.IDC = P.IDC
WHERE   P.IDP=:id
ORDER BY desi ";
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
                        <td><input type="number" step="0.5" min="0" max="<?php echo $qnt;?>" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="" placeholder="<?php echo $qnt;?>" style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" /></td>
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
                        <td><input type="number" step="0.5" min="0" max="<?php echo $qnt;?>" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="" placeholder="<?php echo $qnt;?>" style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" /></td>
                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                    </tr>
                    <?php
                }
            }

        }

    }
    if($type=='chambre'){
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
                        <td><input type="number" step="1" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="1"  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" /></td>
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
}






if (isset($_POST['idcmp']) && !empty($_POST['idcmp'])) {
    $line=intval($_POST['line']);
    $id =$_POST['idcmp'];


    foreach ($id as $key => $value) {
        $i=$key;
        $query = "SELECT C.IDC idc, C.NOMC nomc,P.DESI desi,P.PHOTO img,P.IDP idp,P.IDC idcp, P.PRIXA pxa,P.PRIXV pxv,P.QNT qnt,P.FLAG flag
FROM CONDIS C
INNER JOIN PRODUIT P
ON C.IDC = P.IDC
WHERE   P.IDP=:id
ORDER BY desi ";
        $stmt = $db_con->prepare($query);
        $stmt->execute(array(':id' => $value));


        if ($line=='0') {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$idp);?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $idp; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="hidden" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($idp); ?>" style="text-align:left;" class="form-control" /><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" required /></td>
                    <td><input type="hidden" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxa;?>" style="text-align:right;" class="form-control" readonly/><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" readonly /></td>
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
                    <td><input type="hidden" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($idp); ?>" style="text-align:left;" class="form-control" /><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="hidden" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $pxa;?>" style="text-align:right;" class="form-control" readonly/><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" readonly /></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php
            }
        }

    }

}

if (isset($_POST['fastrapport']) && !empty($_POST['fastrapport'])) {
    $line=intval($_POST['line']);
    $id =$_POST['idetat'];

    $i=0;
    $query = "SELECT * FROM `FAMILLE` order by `flag` asc ";
    $stmt = $db_con->prepare($query);
    $stmt->execute(array(':id' => $value));
// SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        ?>
        <?php
        if ($DESI!='CAISSE') {
            ?><tr>
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td>

            </tr><?php
        }else {

            ?><tr>
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;color: blue;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /></td>

            </tr><?php
        }
        ?>


        <?php

        $i++;

    }


}






if (isset($_POST['idetat']) && !empty($_POST['idetat'])) {
    $line=intval($_POST['line']);
    $id =$_POST['idetat'];

    $i=0;
    $query = "SELECT * FROM `FAMILLE` order by `flag` asc ";
    $stmt = $db_con->prepare($query);
    $stmt->execute(array(':id' => $value));
// SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        ?>
        <?php
        if ($DESI!='CAISSE') {
            ?><tr>
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td>

            </tr><?php
        }else {

            ?><tr>
            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $DESI ;?>" style="text-align:left;color: blue;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
            <td><input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control" required /></td>
            <td><input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="0" style="text-align:right;" class="form-control"  required /></td>
            <td><input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /></td>

            </tr><?php
        }
        ?>


        <?php

        $i++;

    }


}





?>


