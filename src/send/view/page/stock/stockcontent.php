<style>
    /* #user,#cli,#four,#formcli,#formfour{
         display: none;
     }*/
</style>
<div class="row">
    <div class="col-xs-12">

        <div class="tabbable">
            <?php

            require_once 'menustock.php';
            ?>

            <div class="tab-content">
                <div id="dropdown1" class="tab-pane fade ">
                    <?php
                    require_once 'view/page/tables/tableprd.php';
                    ?>
                </div>

                <div id="dropdown2" class="tab-pane fade">
                    <?php
                   // require_once 'view/page/form/formpro.php';
                    ?>                                    </div>
                <div id="dropdown3" class="tab-pane fade">
                    <?php
                    require_once 'view/page/form/formcat.php';
                    ?>                                       </div>

                <div id="dropdown5" class="tab-pane fade">

                    <?php
                    require_once 'view/page/form/formfam.php';
                    ?>
                </div>

                <div id="home" class="tab-pane ">

                    <?php
                    require_once 'view/page/form/formcondis.php';
                    ?>
                </div>


                <div id="messages" class="tab-pane fade">
                    <?php
                    require_once 'view/page/get/generate.php';
                    ?>                                    </div>

                <div id="base" class="tab-pane fade in active">
                    <?php //require_once 'formDprox.php';
                    //require_once 'tablefact1.php';

                    require_once 'view/page/form/formfcmp.php';

                    //require_once 'tableuser.php';

                    ?>

                </div>
                <style type="text/css">
                    .form-style-8{
                        font-family: 'Open Sans Condensed', arial, sans;
                        width:100%;
                        padding: 30px;
                        background: #FFFFFF;
                        margin: 50px auto;
                        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
                        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
                        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

                    }
                    .form-style-8 h2{
                        background: #4D4D4D;
                        text-transform: uppercase;
                        font-family: 'Open Sans Condensed', sans-serif;
                        color: #797979;
                        font-size: 18px;
                        font-weight: 100;
                        padding: 20px;
                        margin: -30px -30px 30px -30px;
                    }
                    .form-style-8 input[type="text"],
                    .form-style-8 input[type="date"],
                    .form-style-8 input[type="datetime"],
                    .form-style-8 input[type="email"],
                    .form-style-8 input[type="number"],
                    .form-style-8 input[type="search"],
                    .form-style-8 input[type="time"],
                    .form-style-8 input[type="url"],
                    .form-style-8 input[type="password"],
                    .form-style-8 textarea,
                    .form-style-8 select
                    {
                        box-sizing: border-box;
                        -webkit-box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        outline: none;
                        display: block;
                        width: 100%;
                        padding: 7px;
                        border: none;
                        border-bottom: 1px solid #ddd;
                        background: transparent;
                        margin-bottom: 10px;
                        font: 16px Arial, Helvetica, sans-serif;
                        height: 45px;
                    }
                    .form-style-8 textarea{
                        resize:none;
                        overflow: hidden;
                    }
                    .form-style-8 input[type="button"],
                    .form-style-8 input[type="submit"]{
                        -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
                        -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
                        box-shadow: inset 0px 1px 0px 0px #45D6D6;
                        background-color: #2CBBBB;
                        border: 1px solid #27A0A0;
                        display: inline-block;
                        cursor: pointer;
                        color: #FFFFFF;
                        font-family: 'Open Sans Condensed', sans-serif;
                        font-size: 14px;
                        padding: 8px 18px;
                        text-decoration: none;
                        text-transform: uppercase;
                    }
                    .form-style-8 input[type="button"]:hover,
                    .form-style-8 input[type="submit"]:hover {
                        background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
                        background-color:#34CACA;
                    }
                    .form-style-8 select:required:invalid {
                        color: #999;
                    }
                    .form-style-8 option[value=””][disabled] {
                        display: none;
                    }
                    .form-style-8 option {
                        color: #000;
                    }
                </style>

                <?php
                require_once 'view/page/form/formpro.php';
                ?>
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
            </div><!-- /.page-content -->
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
