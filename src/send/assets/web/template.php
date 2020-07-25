<?php
require_once 'model/functionfrontend.php';
require_once 'model/DB.php';
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
    <title>Page de Gestion des Employers</title>

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

    <a href="#" class="menu-toggler invisible" id="menu-toggler" data-target="#sidebar"></a>

    <?php
    require_once 'bloc/lefnavbar.php';
    ?>
    <div class="main-content">
        <div class="main-content-inner">
            <?php
            require_once 'bloc/search.php';
            ?>
            <div class="page-content">
                <?php
                require_once 'bloc/reglage.php';
                ?>

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
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
</div
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
