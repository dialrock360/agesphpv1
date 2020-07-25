<div class="row">
    <div class="col-xs-12">

        <div class="tabbable">
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                <li class="active">
                    <a data-toggle="tab" href="#home4">Calendrier</a>
                </li>

                <li>
                    <a data-toggle="tab" href="#profile4">Reservation
                        <span class="badge badge-danger">
                                                5
                            <?php
                            //Count_Rdv();
                            ?>
                                                </span>
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#dropdown14">Convertisseur</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="home4" class="tab-pane in active">
                    <?php
                    require_once 'calendar.php';
                    ?>
                </div>

                <div id="profile4" class="tab-pane">
                    <?php
                    require_once 'rdv.php';
                    ?>                                         </div>

                <div id="dropdown14" class="tab-pane">
                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->