
<?php


header('Content-type: application/json; charset=UTF-8');


require_once '../../../model/include.php';
require_once '../../../model/DB.php';

if (isset($_POST['itest']) && !empty($_POST['itest'])) {
    $line=strval($_POST['send']);
    $var= explode(",", $line);
    $section= $var[0]; // piece1
    $libele= $var[1]; // piece2
    updfrontend($libele,'appdseting',$section);
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
