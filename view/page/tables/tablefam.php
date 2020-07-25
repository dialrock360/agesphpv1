    <div class="row">
        <div class="col-xs-12">

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                <h4 class="header smaller lighter white">Liste des Fammilles d'Articles</h4>
                <input type="hidden" id="numberfam" name="numberfam" required />

            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div>
                <table class="table table-bordered table-condensed table-hover table-striped">

                    <tr>
                        <th>#ID</th>
                        <th>Nom</th>
                        <th>DETAILS</th>
                        <?php
                        if($leveluser>=3){

                            ?>


                            <th>Action:
                                <input type="checkbox"  id="checkAllf">
                                <a id="getMFam" onclick="getMfam()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit green"></i></span> </a>
                                <a id="getDFam" onclick="getDFam()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash red"></i></span></a>

                            </th>
                            <?
                        }
                        ?>

                    </tr>


                    <?php
                    require_once 'bd.php';
                    ///SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
                    $query = "SELECT * FROM FAMILLE WHERE FLAG=0 ORDER BY DESI ";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        ?>
                        <tr>
                            <td><?php echo $IDFA; ?></td>
                            <td><?php echo $DESI; ?></td>
                            <td><?php echo $NATURE; ?></td>
                            <!--  <td><?php //echo $ID_CAT; ?></td>  -->
                            <?php
                            if($leveluser>=3){

                                ?>


                                <td>
                                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDFA; ?>" id="getFam" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>

                                    <a class="delete_fam" data-id="<?php echo $IDFA; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                        <i class="glyphicon glyphicon-trash red"></i>
                                    </a>
                                    <input type="checkbox" name="chkfam[]"  class="checkf" value="<?php echo $IDFA; ?>"  />

                                </td>
                                <?
                            }
                            ?>

                        </tr>
                        <?php
                    }
                    ?>


                </table>
    
    
            </div>
        </div>
    </div>