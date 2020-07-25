<style>
    #user,#cli,#four,#formcli,#formfour{
        display: none;
    }
</style>









<div class="row">
    <div class="col-xs-12">
        <div id="modal-table" class="modal fade" tabindex="-2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header no-padding">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="white">&times;</span>
                            </button>
                            <h4 class="header white lighter bigger">
                                <i class="ace-icon fa fa-users white"></i>
                                Enregistrer un nouvel Employer ou Utilisateur
                            </h4>
                        </div>


                    </div>
                    <?php require_once 'view/page/form/formruser.php';?>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- content will be load here -->
                    <div id="dynamic-content"></div>



                    <div class="modal-footer">
                        <div id="modal-loader" style="display: none; text-align: center;">
                            <img src="ajax-loader.gif">
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div><!-- /.modal -->


        <div class="tabbable">
            <?php
            require_once 'view/page/menu/menuuser.php';
            ?>

            <div class="tab-content">
                <div id="dropdown1" class="tab-pane fade in active ">
                    <div class="table-header">
                        LISTE DES EMPLOYERS
                       
                    </div>
                    <?php
                    $doc= "user" ; include 'view/page/tables/tableuserx.php';
                    ?>
                </div>

                <div id="dropdown2" class="tab-pane fade">
                    <div class="table-header">

                        LISTE DES CLIENTS

                    </div>
                    <?php
                    $doc= "cli" ; include 'view/page/tables/tableuserx.php';
                    ?>
                </div>

                <div id="dropdown3" class="tab-pane fade">
                    <div class="table-header">
                        LISTE DES FOURNISSEURS

                    </div>
                    <?php
                    $doc= "four" ; include 'view/page/tables/tableuserx.php';
                    ?>
                </div>

                <div id="dropdown4" class="tab-pane fade">
                    <?php
                    $doc= "cli" ;include 'view/page/form/formcom.php';
                    ?>
                </div>

                <div id="dropdown5" class="tab-pane fade">

                    <?php
                    $doc= "four" ;include 'view/page/form/formcom.php';
                    ?>
                </div>
                <div id="dropdown6" class="tab-pane fade">
                    <div class="table-header">
                        LISTE DES PRESTATAIRES

                    </div>
                    <?php
                    $doc= "presta" ; include 'view/page/tables/tableuserx.php';
                    ?>
                </div>
                <div id="dropdown7" class="tab-pane fade">
                    <?php
                    $doc= "presta" ;include 'view/page/form/formcom.php';
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

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->