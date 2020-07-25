




            <div class="row">
                <div class="col-xs-12">








                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                        <h4 class="header smaller lighter white">Modificateur de Quantites</h4>
                        <input type="hidden" id="number" name="number" required />
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <strong>  <small>Toute Modification Faite Ici Se Sera Pas Suivit par le livre de Compte</small></strong>
                            
                        </div>

                    </div>



                    <!-- div.dataTables_borderWrap -->
                    <div>

                        <form method="post" name="frm">
                            <input type="hidden" id="snumber" name="snumber" required />

                            <table class='display'>

                                <thead>
                                <tr>
                                    <th class="center">
                                        <label class="pos-rel">
                                            Image
                                        </label>
                                    </th>
                                    <th>Désignation</th>
                                    <th>
                                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                        Quantité
                                    </th>
                                    <th class="hidden-480">

                                        <span style="word-spacing:normal;"> Action : </span>
                                        <input type="checkbox" class="checkqp" id="checkAllqp">
                                        <a id="getMPrd" onclick="getMQpro()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit green"></i></span> </a>

                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require_once 'dbc.php';
                                ///SELECT `IDP`, `IDU`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1
                                $query = "SELECT * FROM PRODUIT WHERE FLAG=0 ORDER BY DESI";
                                $stmt = $db_con->prepare( $query );
                                $stmt->execute();
                                $cpt=0;
                                while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                                    extract($row);
                                    $vente=Select_famvente($IDP);
                                    $achat=Select_catachat($IDP);
                                    if($achat==1) {
                                        $achat=0;
                                        if($vente==1) {
                                            $vente=0;

                                            ?>

                                            <tr>
                                                <td class="center">
                                                    <img class="lesImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="32" height="32">

                                                </td>

                                                <td>
                                                    <a href="#"><?php echo $DESI; ?></a>
                                                </td>
                                                <td><?php echo $QNT; ?></td>

                                                <td class="hidden-480">


                                                    <?php   echo '<input id="'.$IDP.'" type="checkbox" name="checkp" class="checkp" value="'.$IDP.'" />';?>


                                                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDP; ?>" id="getQPrd" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                            <?php
                                            $cpt=$cpt+1;


                                        }

                                    }
                                }
                                ?>
                                </tbody>
                            </table>

                        </form>

                    </div>
                </div>
            </div>
