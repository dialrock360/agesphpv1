<style>
    #user,#cli,#four,#formcli,#formfour{
        display: none;
    }
</style>



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
                    <div id="dropdown2" class="tab-pane fade ">
                        <?php
                       // require_once 'view/page/tables/tablefact.php';
                        ?>
                    </div>

                    <div id="dropdown1" class="tab-pane fade in active">
                        <?php
                        require_once 'view/page/form/formrec.php';
                        ?>                                    </div>





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