<style>
    #user,#cli,#four,#formcli,#formfour{
        display: none;
    }
</style>
<?php
$fac='prof';
?>
<form>
    <input type="hidden" id="curenpage" value="<?php echo current($result); ?>"/>

</form>
<div class="row">
    <div class="col-md-12">
        <div class="tabbable">
            <?php

                   require_once 'view/page/menu/menufac.php';
            ?>

            <div class="tab-content">
                <div id="dropdown1" class="tab-pane fade ">
                    <?php
                    $com='Fournisseur';
                    $doc='demande';$docTb='dem';
                    $target='?file=page/proforma/table';
                    $mvmdb = new Mouvement();
                    $listemvm  = $mvmdb->listebyname($doc);
                    include 'view/page/tables/tablefact.php';
                    ?>
                </div>

                <div id="dropdown2" class="tab-pane fade">
                    <?php

                    $com='Client';
                    $doc='proforma';$docTb='proforma';
                    $target='?file=page/proforma/table';


                    $mvmdb = new Mouvement();
                    $listemvm  = $mvmdb->listebyname($doc);
                    include 'view/page/tables/tablefact.php';

                    ?>                                    </div>
                <div id="dropdown3" class="tab-pane fade">
                    <?php
                    require_once 'view/page/form/formDpro.php';
                    ?>
                </div>

                <div id="dropdown4" class="tab-pane fade in active">

                    <?php
                    require_once 'view/page/form/formFpro.php';
                    ?>
                </div>




            </div><!-- /.page-content -->
        </div>
    </div>
</div><!-- /.row -->