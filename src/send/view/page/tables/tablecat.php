



    <div class="row">
        <div class="col-xs-12">








            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                <h4 class="header smaller lighter white">Liste des Categorie</h4>

            </div>

            <!-- div.dataTables_borderWrap -->
            <div>

                <form method="post" name="frm">
                    <input type="hidden" id="numbercat" name="numbercat" required />


                    <table class='display'>

                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nom</th>
                            <th>Famille</th>
                            <?php
                            if($leveluser>=3){

                                ?>



                                <th>Action
                                    <input type="checkbox"  id="checkAllcat">
                                    <a id="getMCat" onclick="getMCat()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit green"></i></span> </a>

                                    <a id="getDCat" onclick="getDCat()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash red"></i></span></a>

                                </th>
                                <?
                            }
                            ?>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        require_once 'bd.php';
                        ///SELECT `ID_CAT`, `IDFA`, `DATE_CAT`, `NOM_CAT`, `FLAG` FROM `CATEGORIE` WHERE 1
                        $query = "SELECT * FROM CATEGORIE WHERE FLAG=0 ORDER BY NOM_CAT ";
                        $stmt = $db_con->prepare( $query );
                        $stmt->execute();
                        while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                            extract($row);
                            ?>
                            <tr>
                                <td><?php echo $ID_CAT; ?></td>
                                <td><?php echo $NOM_CAT; ?></td>
                                <td><?php Select_Famcatref($ID_CAT); ?></td>
                                <?php
                                if($leveluser>=3){

                                    ?>



                                    <td>
                                        <input type="checkbox" name="chkprd[]"  class="checkcat" value="<?php echo $ID_CAT; ?>"  />

                                        <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $ID_CAT; ?>" id="getCat" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <a class="delete_cat" data-id="<?php echo $ID_CAT; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                            <i class="glyphicon glyphicon-trash red"></i>
                                        </a>
                                    </td>
                                    <?
                                }
                                ?>


                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>