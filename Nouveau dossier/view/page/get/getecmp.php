

<?php
require_once '../../../model/include.php';
require_once '../../../assets/web/rooting.php';
$log='admin';
if (isset($_REQUEST['idcmp'])) {

    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idcmp = intval($_REQUEST['idcmp']);
    $chk = $_REQUEST['chk'];

        $i=1;
        $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE IDP='$idcmp'");
        $countref = $resref->num_rows;
        if($countref > 0)
        {
            if($row=$resref->fetch_array())
            {
                extract($row);

                ?>
                <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title" align="center"> <i class="icon-certificate"></i>
                                <strong><i class="fa fa-gavel"></i>PRODUIT DE FACTURATION INDUSTRIELLE</strong>

                            </h2>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-info">

                                <div class="widget-box">


                                    <div class="widget-body">
                                        <div class="widget-main">


                                            <div id="contencmpt">

                                                <div class="element">

                                                    <div>
                                                        <label for="form-field-select-3">Articles et Services</label>

                                                        <br />
                                                        <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choix du Produit..." name="idcmp">
                                                            <option value="">  </option>
                                                            <?php    Select_Prdcmpose();?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="element">
                                                    <div>
                                                        <label for="form-field-select-3">Composants</label>

                                                        <br />

                                                        <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produit "  id="uid" style="width:70%;">
                                                            <optgroup label="Articles et Services"><?php    $val='all';   Select_Prd($val);?></optgroup>
                                                        </select>
                                                        <a href="#"  id="getpcmp"  class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="panel panel-default">


                                            </div>

                                            <div class="table-responsive table-bordered">
                                                <h5><strong>produit de composition</strong></h5>
                                                <table class="table">
                                                    <thead id="titleCalcul"  >
                                                    <tr>
                                                        <th>Designation</th>
                                                        <th>Quantite</th>
                                                        <th>Montant</th>
                                                        <th> <!--<a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>-->
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="manligneCalcul" style="clear:both">


                                                    </tbody>
                                                    <tfoot>


                                                    <tr>

                                                        <td >
                                                            <input type="hidden" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />

                                                            <input type="hidden" id="valTVA_stand" value="0"  class="form-control"  />

                                                            <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                                                            <input name="ligne"   type="hidden" id="ligne" />
                                                        </td>

                                                        <td colspan="3">
                                                            <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                                                            <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reg" readonly/>
                                                            <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reste" readonly/>
                                                            <input  type="hidden" class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                            <input name="lettr"  type="hidden" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                                                            <input name="number"   type="hidden" value="" id="lignenombre" />

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Prix De Revient : </label>

                                                                <div class="col-sm-8">
                                                                    <input type="text" id="valTotalTTC_stand" value="0" name="totalttc"   class="form-control"  readonly required />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tfoot>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>









                                <input type="submit" name="savecmp" value="ENREGISTER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                            </div>
                        </div>
                    </div>
                </form>

                <?php
            }
        }


}
if(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $idp = $_POST['id'];

    // SELECT `IDE`, `IDFA`, `FLUX`, `MONTANT`, `DATEE` FROM `etat_compte` WHERE 1
    $sql = "DELETE FROM `etat_compte` WHERE `IDE`=$idp";
    $delete = $base->query($sql);

    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'produit supprimer avec success.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Problème de suppression essayer encore...'
        );
    }

    echo json_encode($returnData);
}




if (isset($_POST['ide']) && !empty($_POST['ide'])) {
    $line=intval($_POST['line']);
    $id =$_POST['ide'];
    foreach ($id as $key => $value) {
        $i=$key;
        //SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1
        $query = "SELECT * FROM `famille` WHERE   IDFA=:id ";
        $stmt = $db_con->prepare($query);
        $stmt->execute(array(':id' => $value));


        if ($line=='0') {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <tr>
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
                    <td><input type="text" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>"  style="text-align:right;" class="form-control"/></td>

                   <?php   if ($DESI=='CAISSE') {
                       ?>
                       <td><input type="text" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" style="text-align:right;" class="form-control" /></td>
                       <?php
                   }else{
                       ?>
                       <td><input type="text" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" style="text-align:right;" class="form-control" readonly/></td>

                       <?php

                   }?>

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
                    <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $DESI;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td>
                    <td><input type="text" name="dep_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" style="text-align:left;" class="form-control" /></td>
                    <td><input type="text" name="gain_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>"  style="text-align:right;" class="form-control"/></td>

                    <?php   if ($DESI=='CAISSE') {
                        ?>
                        <td><input type="text" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" style="text-align:right;" class="form-control" /></td>
                        <?php
                    }else{
                        ?>
                        <td><input type="text" name="stock_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" style="text-align:right;" class="form-control" readonly/></td>

                        <?php

                    }?>

                    <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                </tr>
                <?php
            }
        }

    }


}

?>





