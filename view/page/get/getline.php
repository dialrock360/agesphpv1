





<?php

require_once '../../../model/include.php';
require_once '../../../model/DB.php';

//error_reporting(0);
function getlineoperator($sql,$returntype='all'){

    $db = new DB();
    $ret =$db->getspecificQuery($sql,$returntype);

    return   $ret;
}
function getlineoperatorparam( $condition,$returntype='many',$setTablename='v_produit'){

    $db = new DB();

    $db->setTablename($setTablename);
    return  $db->getRows(array("where"=>$condition,"return_type"=>$returntype));

}

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


            $condition = array("IDP" =>$value);
            $countref=getlineoperatorparam($condition,'single');



            if ($line=='0') {
            if ($countref!=null) {
                    extract($countref);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXA;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php


                }
            }else{
                $i=$key+$line;
                if ($countref!=null) {
                    extract($countref);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXA;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
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


            $condition = array("IDP" =>$value);
            $countref=getlineoperatorparam($condition,'single');



            if ($line=='0') {
            if ($countref!=null) {
                    extract($countref);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>"  value="<?php echo $PRIXV;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="0.5" min="0" max="<?php echo $QNT;?>" placeholder=" <?php echo $QNT;?>" name="qnte_<?php echo $i;?>"  id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php


                }
            }else{
                $i=$key+$line;
                if ($countref!=null) {
                    extract($countref);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                    <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXV;?>" style="text-align:right;" class="form-control"/></td>
                    <td><input type="number" step="0.5" min="0" max="<?php echo $QNT;?>" placeholder=" <?php echo $QNT;?>" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                    <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
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
            $query = "SELECT C.IDC idc, C.NOMC nomc,P.DESI desi,P.PHOTO img,P.IDP idp,P.IDC idcp, P.PRIXA pxa,P.PRIXV pxv,P.QNT qnt,P.FLAG flag
FROM CONDIS C
INNER JOIN PRODUIT P
ON C.IDC = P.IDC
WHERE   P.IDP=:id
ORDER BY desi ";


            $condition = array("IDP" =>$value);
            $countref=getlineoperatorparam($condition,'single');



            if ($line=='0') {
                if ($countref!=null) {
                    extract($countref);
                    ?>

                    <tr>
                        <td>
                            <input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/>
                            <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/>
                            <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/>
                            <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/>
                        </td>
                        <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXV; ?>" style="text-align:right;" class="form-control"/></td>
                        <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                    </tr>
                    <?php


                }
            }else{
                $i=$key+$line;
                if ($countref!=null) {
                    extract($countref);
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/>
                            <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/>
                            <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/>
                            <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/>
                        </td>
                        <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php  echo $NOMC;?>" style="text-align:left;" class="form-control" /></td>
                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXV; ?>" style="text-align:right;" class="form-control"/></td>
                        <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value=""  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="1,00" style="text-align:right;" class="form-control" /></td>
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

        $condition = array("IDP" =>$value);
        $countref=getlineoperatorparam($condition,'single');



        if ($line=='0') {

            if ($countref!=null) {
                extract($countref);
                ?>

                <tr>
                    <td>
                        <input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/>
                        <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/>
                        <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/>
                        <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/>
                        <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php echo $NOMC;?>"/>
                    </td>
                     <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="0"  style="text-align:right;" class="form-control" /></td>

                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXA;?>" style="text-align:right;" class="form-control"/></td>
                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php


            }
        }else{
            $i=$key+$line;
            if ($countref!=null) {
                extract($row);

                ?>

                <tr>
                    <td>
                        <input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php  echo $DESI;?>" style="text-align:left;" class="form-control"/>
                        <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/>
                        <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="-1"/>
                        <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/>
                        <input type="hidden" name="row_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php echo $NOMC;?>"/>
                    </td>
                    <td><input type="number" step="0.5" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="0"  style="text-align:right;" class="form-control" /></td>

                    <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PRIXA;?>" style="text-align:right;" class="form-control"/></td>
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
    $datee =strval($_POST['idetat']);

    $i=0;
    $query = "SELECT * FROM `FAMILLE` order by `flag` asc ";

// SELECT ``, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

    $condition = array("DATEE" =>$datee);
    $countref=getlineoperatorparam($condition,'many','etat_compte');

    foreach ($countref as $row ) {
        extract($row);
        ?>
        <?php
        if ($STOCK!=0) {

            ?>
            <tr>
            <td>
                <input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo Schose_Famref('desi',$IDFA) ;?>" style="text-align:left;" class="form-control" readonly/>
                <input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/>
                <input type="hidden" name="idmv_<?php echo $i;?>" id="Champ2Idmv_<?php echo $i;?>" value="<?php echo $IDMOUV; ?>"/>
                <input type="hidden" name="datee_<?php echo $i;?>" id="Champ2datee_<?php echo $i;?>" value="<?php echo $DATEE; ?>"/>
            </td>
            <td>
                <input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $DEPENSE ;?>" style="text-align:right;" class="form-control" required />
            </td>
            <td>
                <input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $GAINS ;?>" style="text-align:right;" class="form-control"  required />
            </td>
            <td>
                <input type="text" type="number" step="0.0001" min="0" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="<?php echo $STOCK ;?>" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly />
            </td>

            </tr>
            <?php
        }else {

            ?>
            <tr>
                <td>
                    <input type="text" name="nom_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo Schose_Famref('desi',$IDFA) ;?>"  style="text-align:left;" class="form-control" readonly/>
                    <input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/>
                    <input type="hidden" name="idmv_<?php echo $i;?>" id="Champ2Idmv_<?php echo $i;?>" value="<?php echo $IDMOUV; ?>"/>
                    <input type="hidden" name="datee_<?php echo $i;?>" id="Champ2datee_<?php echo $i;?>" value="<?php echo $DATEE; ?>"/>
                </td>
                <td>
                    <input type="number" step="0.0001" min="0" max="" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $DEPENSE ;?>" style="text-align:right;" class="form-control" required />
                </td>
                <td>
                    <input type="number" step="0.0001" min="0" max="" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $GAINS ;?>" style="text-align:right;" class="form-control"  required />
                </td>
                <td>
                 </td>

            </tr>
            <?php
        }
        ?>


        <?php

        $i++;

    }


}




?>


