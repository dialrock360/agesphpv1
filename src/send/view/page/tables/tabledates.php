
<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>



            <table class='display'>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Depenses</th>
                    <th>Recettes</th>

                    <th>
                        <i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
                        Auteur
                        <i class="ace-icon fa fa-home bigger-110 hidden-480"></i>
                    </th>

                    <th>Action</th>
                </tr>
                </thead>


                <tbody>

                <?php
                include '../model/bd.php';
                $i=0;
                $query = "SELECT * FROM `MOUVEMENT` WHERE FLAG=0";
                $stmt = $db_con->prepare( $query );
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $i= $i+1;
                    extract($row);
                    if($doc=='facture' &&  $NOMMV=='facture'){
                        ?>

                        <tr>
                            <td >
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">

                                <div class="INTER">
                                    <a href="#" class="green bigger-140 show-details-btn" title="Show Details"  >
                                        <span class="glyphicon glyphicon-eye-open"></span>

                                    </a>
                                    <div class="mon_block2">

                                        <div class="responsive-table-line " style="margin:0px auto;max-width:700px;">


                                            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                                <thead>
                                                <tr>
                                                    <th>Libele</th>
                                                    <th>Prix</th>
                                                    <th>Qnte</th>

                                                    <th>
                                                        Montant
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <?php
                                                //SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
                                                //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
                                                $take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
                                                if($result=$base->query($take))
                                                {

                                                    while($ligne=mysqli_fetch_array($result))
                                                    {

                                                        extract($ligne);
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <a href="#"><?php Spref($IDP) ?></a>
                                                            </td>
                                                            <td><?php echo $PU; ?></td>
                                                            <td><?php echo $QNT; ?></td>
                                                            <td><?php echo $MTS; ?></td>
                                                        </tr>

                                                    <?php
                                                    }}
                                                ?>
                                                <hr/>
                                                </tbody>
                                            </table>                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="#"><?php echo $NOMMV.' N° '.$IDMV; ?></a>
                            </td>
                            <td><?php echo $MTSCH; ?></td>
                            <td class="hidden-480"><?php echo $DATE_DEL; ?></td>
                            <td><?php SUref($IDU); ?></td>

                            <td class="hidden-480">
                                <?php
                                if($RESTE==0){
                                    ?>
                                    <span class="label label-sm label-warning">

                                        P.Comtant

                                    </span>
                                <?php
                                }else{
                                    ?>
                                    <span class="label label-sm label-warning">

                                        Reste :  <?php  echo $RESTE;?>

                                    </span>
                                <?php
                                }
                                ?>

                            </td>

                            <td>
                                <div class="hidden-sm hidden-xs btn-group">

                                    <a href="#" class="tooltip-success" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDMV; ?>" id="getfac" href="javascript:void(0)" data-toggle="tooltip" title="Modifier"
                                    <button class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>
                                    </a>

                                </div>

                            </td>
                        </tr>
                    <?php

                    }
                    if($doc=='recu' &&  $NOMMV=='recu'){
                        ?>

                        <tr>
                            <td >
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>





                            <td class="center">

                                <div class="INTER">
                                    <a href="#" class="green bigger-140 show-details-btn" title="Show Details"  >
                                        <span class="glyphicon glyphicon-eye-open"></span>

                                    </a>
                                    <div class="mon_block2">

                                        <div class="responsive-table-line " style="margin:0px auto;max-width:700px;">


                                            <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                                <thead>
                                                <tr>
                                                    <th>Libele</th>
                                                    <th>Prix</th>
                                                    <th>Qnte</th>

                                                    <th>
                                                        Montant
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <?php
                                                //SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
                                                //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
                                                $take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
                                                if($result=$base->query($take))
                                                {

                                                    while($ligne=mysqli_fetch_array($result))
                                                    {

                                                        extract($ligne);
                                                        ?>

                                                        <tr>
                                                            <td>
                                                                <a href="#"><?php Spref($IDP) ?></a>
                                                            </td>
                                                            <td><?php echo $PU; ?></td>
                                                            <td><?php echo $QNT; ?></td>
                                                            <td><?php echo $MTS; ?></td>
                                                        </tr>

                                                    <?php
                                                    }}
                                                ?>
                                                <hr/>
                                                </tbody>
                                            </table>                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="#"><?php echo $NOMMV.' N° '.$IDMV; ?></a>
                            </td>
                            <td><?php echo $MTSCH; ?></td>
                            <td class="hidden-480"><?php echo $DATE_DEL; ?></td>
                            <td><?php SUref($IDU); ?></td>

                            <td class="hidden-480">
                                <?php
                                if($RESTE==0){
                                    ?>
                                    <span class="label label-sm label-warning">

                                        P.Comtant

                                    </span>
                                <?php
                                }else{
                                    ?>
                                    <span class="label label-sm label-warning">

                                        Reste :  <?php  echo $RESTE;?>

                                    </span>
                                <?php
                                }
                                ?>

                            </td>

                            <td>
                                <div class="hidden-sm hidden-xs btn-group">

                                    <a href="#" class="tooltip-success" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDMV; ?>" id="getfac" href="javascript:void(0)" data-toggle="tooltip" title="Modifier"
                                    <button class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </button>
                                    </a>
                                    <a href="#" class="tooltip-error"  data-id="<?php echo $IDMV; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">

                                        <button class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </button>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    <?php

                    }
                }
                ?>
                </tbody>
            </table>



        </div>
    </div>
</div>
