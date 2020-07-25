<style>
    #user,#cli,#four,#formcli,#formfour{
        display: none;
    }
</style>
<?php

$fac='proforma';
?>

<form>
    <input type="hidden" id="curenpage" value="<?php echo current($result); ?>"/>

</form>
<div class="row">
    <div class="col-md-12">

        <div class="tabbable">
            <?php require_once 'view/page/menu/menufac.php';
            ?>

            <div class="tab-content">
                <div id="dropdown1" class="tab-pane fade in active">
                    <?php

                    $com='Client';
                    $doc='proforma';$docTb='proforma';
                    $target='?file=page/proforma/table';


                    $mvmdb = new Mouvement();
                    $listemvm  = $mvmdb->listebyname('proforma');
                    require_once 'view/page/tables/tablefact.php';
                    ?>
                </div>

                <div id="dropdown2" class="tab-pane fade">
                    <?php
                  
				//$doc='facture'; require_once 'view/page/tables/tablefact.php';
                    ?>
                </div>







                <style>
                    .modal .modal-body { /* Vertical scrollbar if necessary */
                        max-height: 480px;
                        overflow-y: auto;
                    }

                    body .modal-dialog { /* Width */
                        max-width: 100%;
                        width: auto !important;
                        display: inline-block;
                    }
                    .modal.in{
                        text-align: center;
                    }
                </style>
            </div><!-- /.page-content -->
        </div>
    </div>
</div><!-- /.row -->