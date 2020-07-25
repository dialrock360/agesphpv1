<div class="row">
    <div class="col-xs-12">

        <div >
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#drop1">
                            <i class="green ace-icon fa fa-home bigger-120"></i>
                            Rapports Journaliers
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#drop2">
                            Documents
                        </a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Siteweb &nbsp;
                            <i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-info">
                            <li>
                                <a data-toggle="tab" href="#drop3">Themes</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#drop4">Diaporama</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#drop5">Section</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="drop1" class="tab-pane fade in active">
					

                        <div class="row">
                        <div class="col-sm-12">
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs" id="myTab3">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home3">
                                            <i class="pink ace-icon fa fa-tachometer bigger-110"></i>
                                            Rapport
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#profile3">
                                            <i class="blue ace-icon fa fa-table bigger-110"></i>
                                            Fiche de Stock
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#dropdown13">
                                            <i class="ace-icon fa fa-rocket"></i>
                                            CIP
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home3" class="tab-pane in active">
                                        <p>
                                            <?php
                                           require_once 'view/page/form/getraport.php';
                                            ?>
                                        </p>
                                    </div>

                                    <div id="profile3" class="tab-pane">
                                        <p>
                                            <?php

                                         //  require_once 'view/page/form/getrapportstock.php';
                                            ?>
                                        </p>
                                    </div>

                                    <div id="dropdown13" class="tab-pane">
                                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->

                    </div>

                    
					</div>
          
                    <div id="drop2" class="tab-pane fade ">
					

                        <div class="row">
                        <div class="col-sm-12">
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs" id="2myTab4">
                                    <li class="active">
                                        <a data-toggle="tab" href="#2home3">
                                            <i class="pink ace-icon fa fa-tachometer bigger-110"></i>
                                            Fiche d'inventaire
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#2profile3">
                                            <i class="blue ace-icon fa fa-table bigger-110"></i>
                                            Fiche d'achats potentiels
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#2dropdown13">
                                            <i class="ace-icon fa fa-rocket"></i>
                                            Fiche des flux Entrées/Sorties
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="2home3" class="tab-pane in active">
                                        <p>
                                            <?php
                                            //require_once 'view/page/form/getficheinventair.php';
                                            ?>
                                        </p>
                                    </div>

                                    <div id="2profile3" class="tab-pane">
                                        <p>
                                            <?php

                                          // require_once 'view/page/form/getrapportstock.php';
                                            ?>
                                        </p>
                                    </div>

                                    <div id="2dropdown13" class="tab-pane">
                                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->

                    </div>

                    
					</div>
					
                    <div id="drop3" class="tab-pane fade ">
					
					</div>
					
				
                </div>
                
				
				</div>
        </div><!-- /.col -->


        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
