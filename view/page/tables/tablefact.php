



<?php

$tables =$listemvm;

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="row">
    <div class="col-sm-12" >



        <!-- Trigger the modal with a button -->

        <!-- Modal -->


        <input type="hidden" name="target" id="target" value="<?php echo $target; ?>" />

        <div class="table-responsive ">



            <table class='display'>
                <caption id="error"> </caption>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Objet</th>
                    <th>Montant</th>
                    <th>Jour</th>

                    <th>
                        <i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
                       <?php echo   $com; ?>
                        <i class="ace-icon fa fa-home bigger-110 hidden-480"></i>
                    </th>
                    <th class="hidden-480">Status</th>

                    <th>Action</th>
                </tr>
                </thead>
                <form method="post" name="frm">
                    <input type="hidden" id="number" name="number" required />
                    <tbody id="userData">
                    <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                        <tr>

                            <td class="hidden-480"><?php echo  $DATE_DEL; ?></td>
                            <td>
                                <a href="#" class="tooltip-default" data-toggle="modal" data-target="#view-modal3" data-id="<?php echo $IDMV; ?>" id="printfac" href="javascript:void(0)" data-toggle="tooltip" title="Imprimer">
                                    <?php echo $OBJET; ?></a>
                            </td>

                            <td><?php echo $MTSCH; ?></td>
                            <td class="hidden-480"><?php echo dateconverter($DATE_DEL); ?></td>
                            <td><?php Select_Userref($IDU); ?></td>

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

                                    <a href="#" class="tooltip-default" data-toggle="modal" data-target="#view-modal3" data-id="<?php echo $IDMV; ?>" id="printfac" href="javascript:void(0)" data-toggle="tooltip" title="Imprimer">
                                        <button class="btn btn-xs btn-default">
                                            <i class="ace-icon fa fa-print bigger-120"></i>
                                        </button>
                                    </a>
                                    <a href="#" class="tooltip-success" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDMV; ?>" id="getfac" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                        <button class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>
                                    </a>
                                    <?php
                                    if($MTSCH>0){
                                        ?>
                                        <i class="glyphicon glyphicon-trash black"></i>

                                        <?php
                                    }else{
                                        ?>

                                        <a   href="<?php echo $base_url; ?>/controller/Deletemouv.php?nommv=<?php echo $cible; ?>?id=<?php echo $IDMV; ?>"   title="Supprimer">
                                            <i class="glyphicon glyphicon-trash red"></i>
                                        </a>
                                      <!--  <a class="delete_doc" data-id="<?php echo $IDMV; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                            <i class="glyphicon glyphicon-trash red"></i>
                                        </a>
                                        -->
                                        <?php

                                    }
                                    ?>

                                </div>

                            </td>
                        </tr>

                        <?php  $count++; endforeach; else: ?>
                        <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
                    <?php endif; ?>
                    </tbody>
                </form>
            </table>

        </div>

    </div>
</div>