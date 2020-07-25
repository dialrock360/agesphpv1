<style>
    #user,#cli,#four,#formcli,#formfour{
        display: none;
    }
</style>


<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <i class="ace-icon fa fa-check green"></i>

            Bienvenu dans to
            <strong class="green">
                AGE
                <small>(v2.0.1)</small>
            </strong>,
            L 'Application de Gestion d'Entreprise (PME)   developpée par  <a href="contact.php">dialrock360@gmail.com</a> (+221775672179).

            <hr>
            <?php

            include 'service.php';
            ?>

        </div>

        <div class="row">

            <!-- inline scripts related to this page -->






            <div class="space-2"></div>

            <div class="col-sm-6 infobox-container">
                <div class="infobox infobox-green">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-comments"></i>
                    </div>

                    <div class="infobox-data">
                        <span class="infobox-data-number">32</span>
                        <div class="infobox-content">Message + 2 Nouveau</div>
                    </div>

                    <div class="stat stat-success">8%</div>
                </div>

                <div class="infobox infobox-blue">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-bed"></i>
                    </div>

                    <div class="infobox-data">
												<span class="infobox-data-number">
													11
                                                    <?php
                                                    //Count_Res();
                                                    ?>
												</span>
                        <div class="infobox-content">Reservations +
                            <?php
                            //Count_NRes();
                            ?>5

                            Nouvelles </div>
                    </div>

                    <div class="badge badge-success">
                        +32%
                        <i class="ace-icon fa fa-arrow-up"></i>
                    </div>
                </div>

                <div class="infobox infobox-grey">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-database"></i>
                    </div>

                    <div class="infobox-data">
												<span class="infobox-data-number">
														<?php
                                                        echo Count_Prod();
                                                        ?>
												</span>
                        <div class="infobox-content">Articles</div>
                    </div>
                </div>
                <div class="infobox infobox-pink">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-shopping-cart"></i>
                    </div>

                    <div class="infobox-data">
												<span class="infobox-data-number">
													<?php
                                                    Count_Facr();
                                                    ?>
												</span>

                        <div class="infobox-content">Achat</div>
                    </div>
                    <?php
                    Taux_Facr();
                    ?>
                </div>
                <div class="infobox infobox-orange">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-money"></i>
                    </div>

                    <div class="infobox-data">
												<span class="infobox-data-number">
													<?php
                                                    Count_Facf();
                                                    ?>
												</span>

                        <div class="infobox-content">Vente</div>
                    </div>
                    <?php
                    Taux_Facf();
                    ?>
                </div>



                <?php Taux_Facs() ;?>

                <div class="space-6"></div>
                <div class="hr hr8 hr-double"></div>
                <div class="hr hr8 hr-double"></div>

                <div class="infobox infobox-green infobox-small infobox-dark">
                    <div class="infobox-progress">
                        <div class="easy-pie-chart percentage" data-percent="61" data-size="39">
                            <span class="percent">61</span>%
                        </div>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Taches</div>
                        <div class="infobox-content">Accomplies</div>
                    </div>
                </div>

                <div class="infobox infobox-blue infobox-small infobox-dark">
                    <div class="infobox-chart">
                        <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Benefices</div>
                        <div class="infobox-content"><?php Val_Facbn();?></div>
                    </div>
                </div>

                <div class="infobox infobox-grey infobox-small infobox-dark">
                    <div class="infobox-icon">
                        <i class="ace-icon fa fa-download"></i>
                    </div>

                    <div class="infobox-data">
                        <div class="infobox-content">Marchandise</div>
                        <div class="infobox-content"><?php Mts_Stk();?></div>
                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-flat">
                        <h4 class="widget-title lighter">
                            <i class="ace-icon fa fa-star orange"></i>
                            Statistiques  de l'Annee En Cours


                        </h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                </div><!-- /.widget-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="hr hr32 hr-dotted"></div>

        <div class="row">

            <div class="col-sm-6">
                <div class="widget-box">
                    <div class="widget-header widget-header-flat widget-header-small">
                        <h5 class="widget-title">
                            <i class="ace-icon fa fa-signal"></i>
                            Statistiques des Dépenses
                        </h5>

                        <div class="widget-toolbar no-border">
                            <div class="inline dropdown-hover">
                                <button class="btn btn-minier btn-primary">
                                    Cette Semaine
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                    <li class="active">
                                        <a href="#" class="blue">
                                            <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                            Cette Semaine
                                        </a>
                                    </li>
                                    <li >
                                        <a href="sharvachat.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                            La Semaine Passé
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvachat.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Ce Moi
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvachat.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Le Moi Passé
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvachat.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Cette Année
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div id="piechart-placeholder" height="600" width="1600"></div>

                            <div class="hr hr8 hr-double"></div>
                            <div class="hr hr8 hr-double"></div>
                            <div class="hr hr8 hr-double"></div>

                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="widget-box">
                    <div class="widget-header widget-header-flat widget-header-small">
                        <h5 class="widget-title">
                            <i class="ace-icon fa fa-signal"></i>
                            Statistiques des Ventes
                        </h5>

                        <div class="widget-toolbar no-border">
                            <div class="inline dropdown-hover">
                                <button class="btn btn-minier btn-primary">
                                    Cette Semaine
                                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                    <li class="active">
                                        <a href="#" class="blue">
                                            <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                            Cette Semaine
                                        </a>
                                    </li>
                                    <li >
                                        <a href="sharvente.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                            La Semaine Passé
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvente.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Ce Moi
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvente.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Le Moi Passé
                                        </a>
                                    </li>

                                    <li>
                                        <a href="sharvente.php">
                                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                            Cette Année
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div id="VtW" class="tab-pane in active">
                                <div > <canvas id="canvas" height="600" width="1600"></canvas></div>
                            </div>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="hr hr32 hr-dotted"></div>

        <div class="row">
            <div class="col-sm-6">
                <div class="widget-box transparent" id="recent-box">
                    <div class="widget-header">
                        <h4 class="widget-title lighter smaller">
                            <i class="ace-icon fa fa-rss orange"></i>RECENT
                        </h4>

                        <div class="widget-toolbar no-border">
                            <ul class="nav nav-tabs" id="recent-tab">
                                <li class="active">
                                    <a data-toggle="tab" href="#task-tab">Rapport</a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#member-tab">Membres</a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#comment-tab">Commentaires</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-4">
                            <div class="tab-content padding-8">
                                <div id="task-tab" class="tab-pane active">

                                    <?php require_once 'view/page/tables/tableraportlimit.php';
                                    ?>

                                </div>

                                <div id="member-tab" class="tab-pane">
                                    <div class="clearfix">
                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Bob Doe's avatar" src="assets/images/avatars/user.jpg" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Bob Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">20 min</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
																							<span class="green">
																								<i class="ace-icon fa fa-check bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
																							<span class="orange">
																								<i class="ace-icon fa fa-times bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																							<span class="red">
																								<i class="ace-icon fa fa-trash-o bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Joe Doe's avatar" src="assets/images/avatars/avatar2.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Joe Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">1 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
																							<span class="green">
																								<i class="ace-icon fa fa-check bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
																							<span class="orange">
																								<i class="ace-icon fa fa-times bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																							<span class="red">
																								<i class="ace-icon fa fa-trash-o bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Jim Doe's avatar" src="assets/images/avatars/avatar.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Jim Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">2 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-warning label-sm">pending</span>

                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                            <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
																							<span class="green">
																								<i class="ace-icon fa fa-check bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
																							<span class="orange">
																								<i class="ace-icon fa fa-times bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																							<span class="red">
																								<i class="ace-icon fa fa-trash-o bigger-110"></i>
																							</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Alex Doe's avatar" src="assets/images/avatars/avatar5.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Alex Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">3 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-danger label-sm">blocked</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Bob Doe's avatar" src="assets/images/avatars/avatar2.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Bob Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">6 hour</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Susan's avatar" src="assets/images/avatars/avatar3.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Susan</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">yesterday</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Phil Doe's avatar" src="assets/images/avatars/avatar4.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Phil Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">2 days ago</span>
                                                </div>

                                                <div>
                                                    <span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv memberdiv">
                                            <div class="user">
                                                <img alt="Alexa Doe's avatar" src="assets/images/avatars/avatar1.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Alexa Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">3 days ago</span>
                                                </div>

                                                <div>
                                                    <span class="label label-success label-sm arrowed-in">approved</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="center">
                                        <i class="ace-icon fa fa-users fa-2x green middle"></i>

                                        &nbsp;
                                        <a href="#" class="btn btn-sm btn-white btn-info">
                                            See all members &nbsp;
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="hr hr-double hr8"></div>
                                </div><!-- /.#member-tab -->

                                <div id="comment-tab" class="tab-pane">
                                    <div class="comments">
                                        <div class="itemdiv commentdiv">
                                            <div class="user">
                                                <img alt="Bob Doe's Avatar" src="assets/images/avatars/avatar.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Bob Doe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="green">6 min</span>
                                                </div>

                                                <div class="text">
                                                    <i class="ace-icon fa fa-quote-left"></i>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                        <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
																						<span class="green">
																							<i class="ace-icon fa fa-check bigger-110"></i>
																						</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
																						<span class="orange">
																							<i class="ace-icon fa fa-times bigger-110"></i>
																						</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-110"></i>
																						</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv commentdiv">
                                            <div class="user">
                                                <img alt="Jennifer's Avatar" src="assets/images/avatars/avatar1.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Jennifer</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="blue">15 min</span>
                                                </div>

                                                <div class="text">
                                                    <i class="ace-icon fa fa-quote-left"></i>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <div class="action-buttons bigger-125">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-pencil blue"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i class="ace-icon fa fa-trash-o red"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv commentdiv">
                                            <div class="user">
                                                <img alt="Joe's Avatar" src="assets/images/avatars/avatar2.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Joe</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="orange">22 min</span>
                                                </div>

                                                <div class="text">
                                                    <i class="ace-icon fa fa-quote-left"></i>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <div class="action-buttons bigger-125">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-pencil blue"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i class="ace-icon fa fa-trash-o red"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="itemdiv commentdiv">
                                            <div class="user">
                                                <img alt="Rita's Avatar" src="assets/images/avatars/avatar3.png" />
                                            </div>

                                            <div class="body">
                                                <div class="name">
                                                    <a href="#">Rita</a>
                                                </div>

                                                <div class="time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span class="red">50 min</span>
                                                </div>

                                                <div class="text">
                                                    <i class="ace-icon fa fa-quote-left"></i>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <div class="action-buttons bigger-125">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-pencil blue"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i class="ace-icon fa fa-trash-o red"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hr hr8"></div>

                                    <div class="center">
                                        <i class="ace-icon fa fa-comments-o fa-2x green middle"></i>

                                        &nbsp;
                                        <a href="#" class="btn btn-sm btn-white btn-info">
                                            See all comments &nbsp;
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>

                                    <div class="hr hr-double hr8"></div>
                                </div>
                            </div>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->

            <div class="col-sm-6">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title lighter smaller">
                            <i class="ace-icon fa fa-comment blue"></i>
                            Conversation
                        </h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div class="dialogs">

                                <div class="itemdiv dialogdiv">
                                    <div class="user">
                                        <img alt="John's Avatar" src="assets/images/avatars/avatar.png" />
                                    </div>

                                    <div class="body">
                                        <div class="time">
                                            <i class="ace-icon fa fa-clock-o"></i>
                                            <span class="blue">38 sec</span>
                                        </div>

                                        <div class="name">
                                            <a href="#">John</a>
                                        </div>
                                        <div class="text">Raw denim you probably haven&#39;t heard of them jean shorts Austin.</div>

                                        <div class="tools">
                                            <a href="#" class="btn btn-minier btn-info">
                                                <i class="icon-only ace-icon fa fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <form>
                                <div class="form-actions">
                                    <div class="input-group">
                                        <input placeholder="Type your message here ..." type="text" class="form-control" name="message" />
                                        <span class="input-group-btn">
																	<button class="btn btn-sm btn-info no-radius" type="button">
                                                                        <i class="ace-icon fa fa-share"></i>
                                                                        Send
                                                                    </button>
																</span>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.widget-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->