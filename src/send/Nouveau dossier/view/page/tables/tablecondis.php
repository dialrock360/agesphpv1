    <div class="row">
        <div class="col-xs-12">

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                <h4 class="header smaller lighter white">Liste des Conditionements</h4>

            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table class="table table-bordered table-condensed table-hover table-striped">

                    <tr>
                        <th>#ID</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    require_once 'bd.php';
                    ///SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1
                    $query = "SELECT * FROM CONDIS WHERE FLAG=0 ORDER BY NOMC";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        ?>
                        <tr>
                            <td><?php echo $IDC; ?></td>
                            <td><?php echo $NOMC; ?></td>
                            <!--  <td><?php //echo $ID_CAT; ?></td>  -->
                            <td>

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDC; ?>" id="getCondis" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>

                                <a class="delete_condis" data-id="<?php echo $IDC; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                    <i class="glyphicon glyphicon-trash red"></i>
                                </a>
                                <input type="checkbox" name="chkcondis[]" class="chk-prd" value="<?php echo $IDC; ?>"  />
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </table>
    
    
            </div>
        </div>
    </div>