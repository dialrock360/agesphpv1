
<?php

if(Show_frontend('slidebar')=='top'){
$nmain='top';$vmain='Menu Haut';
    ?>


    <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">


    <?php
}
else if(Show_frontend('slidebar')=='mobil'){
    $nmain='mobil';$vmain='Menu Pour Telephone';
    ?>


    <div id="sidebar" class="sidebar                          responsive-min     ace-save-state">

    <?php
}
else if(Show_frontend('slidebar')=='two-menu'){
    $nmain='two-menu';$vmain='Menu double';
    ?>

    <div id="Menu double" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">

    <?php
}
else if(Show_frontend('slidebar')=='default'){
    $nmain='default';$vmain='Menu Gauche';
    ?>
    <div id="sidebar" class="sidebar   responsive      ace-save-state">
    <?php
}
else{
    $nmain='default';$vmain='Menu Gauche';
?>
<div id="sidebar" class="sidebar   responsive      ace-save-state">

<?php
}
?>

    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">




            <button class="btn btn-success">
                <a href="?idmu=<?php echo $iduser; ?>" style="color: rgba(134,255,116,0.1)">
                    <i class="ace-icon fa fa-users"></i>
                </a>

            </button>
            <button class="btn btn-danger" style="color: rgba(134,255,116,0.1)">
                <a href="./controller/deconnexion.php" >
                    <i class="ace-icon fa fa-power-off"></i>

                </a>

            </button>

            <button class="btn btn-warning" id="ace-settings-btn">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
            <button class="btn btn-info" href="#temp-modal" role="button" href="#temp-modal" role="button" class="bigger-125 bg-primary white" data-toggle="modal"  >


                    <i class="ace-icon fa fa-pencil"></i>

            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

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
        ?>
        <?php
        if($file=='caisse'){
            ?><li class=" active hover">
                <a href="?file=page/caisse">
                    <i class="menu-icon fa fa-eur"></i>
                    <span class="menu-text"> Comptes </span>
                </a>

                <b class="arrow"></b>
            </li><?php

        }else{
            ?><li class="  hover">
                <a href="?file=page/caisse">
                    <i class="menu-icon fa fa-eur"></i>
                    <span class="menu-text"> Comptes </span>
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


    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
