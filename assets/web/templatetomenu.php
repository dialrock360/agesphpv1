<?php
require_once 'model/functionfrontend.php';
require_once 'classes/Db.php';
// limit négatif (depuis PHP 5.1)

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$exp =explode('/', $url);
$separated = implode(' ', $exp);
$imp = explode(" ", $separated);
$file=end($imp);

$val =explode('.', $file);
$comma_separated = implode(' ', $val);
$result = explode(" ", $comma_separated);

$page=current($result); // cranberry
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Application de gestion D'Entreprise</title>

    <meta name="description" content="Common form elements and layouts" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <?php
    require_once 'bloc/header.php';
    ?>
</head>
<?php
if(Show_frontend('theme')=='bleu'|| Show_service('theme')=='#438EB9'){
?>
<body class="no-skin">
<?php
}else if(Show_frontend('theme')=='rose'|| Show_service('theme')=="#C6487E"){
?>
<body class="skin-2">
<?php
}else if(Show_frontend('theme')=='gris'|| Show_service('theme')=="#D0D0D0"){
?>
<body class="skin-3">
<?php
}else if(Show_frontend('theme')=='noire'|| Show_service('theme')=="#222A2D"){
?>
<body class="skin-1">
<?php
}else{
?>
<body class="no-skin">
<?php
}
?>


<?php
require_once 'bloc/topslidebar.php';
?>



<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <?php
    require_once 'bloc/lefnavbar.php';
    ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <?php
                require_once 'bloc/reglage.php';
                ?>


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="visible">
                            <button data-target="#sidebar2" type="button" class="pull-left menu-toggler navbar-toggle">
                                <span class="sr-only">Toggle sidebar</span>

                                <i class="ace-icon fa fa-dashboard white bigger-125"></i>
                            </button>
                            <?php
                            if(Show_frontend('slidebar')=='two-menu'){
                                ?>
                                <div id="sidebar2" class="sidebar responsive menu-min ace-save-state">
                                    <ul class="nav nav-list">
                                        <?php
                                        if($file=='dashboard'){

                                            ?>
                                            <li class=" active hover">
                                                <a href="?file=page/dashboard">
                                                    <i class="menu-icon fa fa-home"></i>
                                                    <span class="menu-text"> Accueil </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php

                                        }else{
                                            ?>
                                            <li class=" hover">
                                                <a href="?file=page/dashboard">
                                                    <i class="menu-icon fa fa-home"></i>
                                                    <span class="menu-text"> Accueil </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php
                                        }

                                        ?>

                                        <?php
                                        if($file=='user'){
                                            ?>
                                            <li class=" active hover">
                                                <a href="?file=page/user">
                                                    <i class="menu-icon fa fa-users"></i>
                                                    <span class="menu-text"> Utilisateurs </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>


                                            <?php

                                        }
                                        else{
                                            ?>
                                            <li class=" hover">
                                                <a href="?file=page/user">
                                                    <i class="menu-icon fa fa-users"></i>
                                                    <span class="menu-text"> Utilisateurs </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php
                                        }

                                        ?>

                                        <?php
                                        if($leveluser>=3){
                                            if($file=='recu'){
                                                ?>
                                                <li class=" active hover">
                                                    <a href="?file=page/recu">
                                                        <i class="menu-icon fa fa-shopping-cart"></i>
                                                        <span class="menu-text"> Depenses </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php

                                            }else{
                                                ?>
                                                <li class="  hover">
                                                    <a href="?file=page/recu">
                                                        <i class="menu-icon fa fa-shopping-cart"></i>
                                                        <span class="menu-text"> Depenses </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php
                                            }

                                            ?>
                                            <?php

                                            if($file=='facture'){
                                                ?>
                                                <li class=" active hover">
                                                    <a href="?file=page/facture">
                                                        <i class="menu-icon fa fa-money"></i>
                                                        <span class="menu-text"> Vente </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php

                                            }else{
                                                ?>
                                                <li class=" hover">
                                                    <a href="?file=page/facture">
                                                        <i class="menu-icon fa fa-money"></i>
                                                        <span class="menu-text"> Vente </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php
                                            }
                                        }

                                        ?>
                                        <?php
                                        if($file=='proforma'){
                                            ?>
                                            <li class=" active hover">
                                                <a href="?file=page/proforma">
                                                    <i class="menu-icon fa fa-list-alt"></i>
                                                    <span class="menu-text"> Proforma </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php

                                        }
                                        else{
                                            ?>
                                            <li class="  hover">
                                                <a href="?file=page/proforma">
                                                    <i class="menu-icon fa fa-list-alt"></i>
                                                    <span class="menu-text"> Proforma </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php
                                        }

                                        ?>
                                        <?php
                                        if($leveluser>=3){
                                            if($file=='reservation'){
                                                ?>
                                                <li class=" active hover">
                                                    <a href="?file=page/reservation">
                                                        <i class="menu-icon fa fa-calendar"></i>
                                                        <span class="menu-text"> Notifications </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php

                                            }else{
                                                ?>
                                                <li class="  hover">
                                                    <a href="?file=page/reservation">
                                                        <i class="menu-icon fa fa-calendar"></i>
                                                        <span class="menu-text"> Notifications </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li>
                                                <?php
                                            }
                                        }

                                        ?>

                                        <?php

                                        if($file=='publication'){
                                            ?>
                                            <li class=" active hover">
                                                <a href="?file=page/publication">
                                                    <i class="menu-icon fa fa-cloud-upload"></i>
                                                    <span class="menu-text"> Publication </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                            <?php

                                        }
                                        else{
                                            ?><li class=" hover">
                                                <a href="?file=page/publication">
                                                    <i class="menu-icon fa fa-cloud-upload"></i>
                                                    <span class="menu-text"> Publication </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li><?php
                                        }


                                        ?>
                                        <?php
                                        if($file=='stock'){
                                            ?><li class=" active hover">
                                                <a href="?file=page/stock">
                                                    <i class="menu-icon fa fa-inbox"></i>
                                                    <span class="menu-text"> Stock </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li><?php

                                        }else{
                                            ?><li class="  hover">
                                                <a href="?file=page/stock">
                                                    <i class="menu-icon fa fa-inbox"></i>
                                                    <span class="menu-text"> Stock </span>
                                                </a>

                                                <b class="arrow"></b>
                                            </li><?php
                                        }

                                        ?>
                                        <?php
                                        if($leveluser>=3){
                                            if($file=='trash'){
                                                ?><li class=" active hover">
                                                    <a href="?file=page/trash">
                                                        <i class="menu-icon fa fa-trash"></i>
                                                        <span class="menu-text"> Corbeille </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li><?php

                                            }else{
                                                ?><li class="  hover">
                                                    <a href="?file=page/trash">
                                                        <i class="menu-icon fa fa-trash"></i>
                                                        <span class="menu-text"> Corbeille </span>
                                                    </a>

                                                    <b class="arrow"></b>
                                                </li><?php
                                            }
                                        }

                                        ?>


                                    </ul>
                                    <div class="sidebar-toggle sidebar-collapse">
                                        <i id="sidebar3-toggle-icon" class="ace-icon fa fa-angle-double-right ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                                    </div>
                                </div><!-- .sidebar -->
                                <?php
                            }
                            ?>
                        </div>

                        <div class="hidden-sm hidden-xs">

                            <?php
                            if(isset($_GET['idmu'])) {
                                require_once 'bloc/modifuser.php';
                            }
                            if(isset($_GET['date'])) {
                                require_once 'bloc/printepage.php';
                            }else{
                                require_once 'bloc/content.php';

                            }
                            ?>

                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php
    require_once 'bloc/footer.php';
    ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->


</body>
<script type="text/javascript">
    jQuery(function($) {
        $('#sidebar2').insertBefore('.page-content');
        $('#navbar').addClass('h-navbar');
        $('.footer').insertAfter('.page-content');

        $('.page-content').addClass('main-content');

        $('.menu-toggler[data-target="#sidebar2"]').insertBefore('.navbar-brand');


        $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
            if(event_name == 'sidebar_fixed') {
                if( $('#sidebar').hasClass('sidebar-fixed') ) $('#sidebar2').addClass('sidebar-fixed')
                else $('#sidebar2').removeClass('sidebar-fixed')
            }
        }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);

        $('#sidebar2[data-sidebar-hover=true]').ace_sidebar_hover('reset');
        $('#sidebar2[data-sidebar-scroll=true]').ace_sidebar_scroll('reset', true);
    })
</script>
</html>

