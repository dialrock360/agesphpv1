<?php

//load and initialize database class

$db = new Db();

//get users from database
$tables = $db->getRows('produit_cmp',array('order_by'=>'idp DESC'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>



<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-xs-12">


                <div class="table-header">
                    Fiche des produits composés
                </div>
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                    <tr>

                        <th>
                            Produits
                        </th>
                        <th>
                            Composants
                        </th>
                        <th>
                            Valeurs
                        </th>
                        <th>

                        </th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>

                        <tr id="<?php echo $table['idpcmp']; ?>">

                            <td>
                                <a href="#"><?php $val='desi';echo Show_Prodref($val,$IDP); ?></a>
                            </td>
                            <td class="center">
                                <div class="action-buttons">
                                    <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                        <i class="ace-icon fa fa-angle-double-down"></i>
                                        <span class="sr-only">Details</span>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="#"><?php echo $prv ?></a>
                            </td>

                            <td class="hidden-480">

                                <div class="btn-group btn-group-sm">
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="cancelBtnPrdcmp" title="anuller" style="display: none">
                                        <i class="glyphicon glyphicon-remove red"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="confirmBtnPrdcmp" title="valider" style="display: none">
                                        <i class="glyphicon glyphicon-ok green"></i>
                                    </a>
                                </div>





                                <!--  <a data-toggle="modal" data-target="#view-modal" data-id="<?php //echo $IDP; ?>"   class="getPrdcmp" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a> -->
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="<?php echo $idpcmp; ?>"   class="deletePrdcmp"  title="Supprimer">
                                    <i class="glyphicon glyphicon-trash red"></i>
                                </a>




                            </td>
                        <?php
                           //SELECT `idpcmp`, `IDP`, `tabidp`, `tabqnt`, `tabmts`, `prv` FROM `produit_cmp` WHERE 1

                            //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1


                        ?>

                        </tr>
                        <tr class="detail-row">
                            <td colspan="8">
                                <div class="table-detail">
                                    <div class="row" style="display: block">
                                        <div class="col-xs-12">
                                            <?php
                                            $qnt = explode(",", $tabqnt);
                                            $mts = explode(",", $tabmts);



                                            $detail = $db->getspecificQuery("SELECT * FROM `produit` WHERE IDP IN ($tabidp)"); ?>

                                            <!-- div.table-responsive -->

                                            <!-- div.dataTables_borderWrap -->
                                            <div>
                                                <table class="table table-striped table-bordered table-hover" >
                                                    <thead>
                                                    <tr>
                                                        <th>Desi</th>
                                                        <th>Prix</th>
                                                        <th class="hidden-480">qnt</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php  $i=0; if(!empty( $detail)): foreach( $detail as $champ): ?>

                                                        <tr>
                                                            <td class="center">
                                                                <a href="#"><?php $val='desi';echo Show_Prodref($val,$champ['IDP']); ?></a>
                                                            </td>

                                                            <td>
                                                                <a href="#"><?php echo $mts[$i]; ?></a>
                                                            </td>
                                                            <td><?php echo $qnt[$i]; ?></td>

                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; else: ?>
                                                        <tr><td colspan="6">Aucune ligne(s) trouvé......</td></tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>

                                                <table id="dynamic-table" class="table table-striped table-bordered table-hover" >

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; else: ?>
                        <tr><td colspan="4">Aucune ligne(s) trouvé......</td></tr>
                    <?php endif; ?>






                    </tbody>
                </table>
            </div><!-- /.span -->
        </div><!-- /.row -->


        <div class="hr hr-18 dotted hr-double"></div>




        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
