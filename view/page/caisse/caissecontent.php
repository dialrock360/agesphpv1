<style>
    /* #user,#cli,#four,#formcli,#formfour{
         display: none;
     }*/
</style>
<div class="row">
    <div class="col-xs-12">

        <div class="tabbable">
            <?php

            require_once 'menucaisse.php';
            ?>

            <div class="tab-content">
                <div id="dropdown1" class="tab-pane fade ">
                    <?php
                  require_once 'view/page/form/formstock.php';
                    ?>
                </div>

                <div id="dropdown2" class="tab-pane fade in active">
                    <?php
                   require_once 'view/page/form/formetatcompt.php';


                    ?>                                    </div>
                <div id="dropdown3" class="tab-pane fade">
                    <?php
                    //require_once 'view/page/tables/tablebilan.php';
                    ?>                                       </div>

                <div id="dropdown4" class="tab-pane fade">
                    <?php
                    // require_once 'view/page/form/formfam.php';
                    ?>
                </div>

                <div id="dropdown5" class="tab-pane ">
paie
                    <?php
                    // require_once 'view/page/form/formfam.php';
                    ?>
                </div>


        </div>
 <div id="view-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <div id="modal-loader" style="display: none; text-align: center;">
                                    <img src="ajax-loader.gif">
                                </div>

                                <!-- content will be load here -->
                                <div id="dynamic-content"></div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>

                        </div>
                    </div>
                </div><!-- /.modal -->


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
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
