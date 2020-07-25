<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="?file=page/dashboard">Home</a>
        </li>

        <li class="active">
            <?php
            // limit négatif (depuis PHP 5.1)

            $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $exp =explode('/', $url);
            $separated = implode(' ', $exp);
            $imp = explode(" ", $separated);
            $file=end($imp);

            $val =explode('.', $file);
            $comma_separated = implode(' ', $val);
            $result = explode(" ", $comma_separated);

            echo current($result); // cranberry
            ?>
        </li>
    </ul><!-- /.breadcrumb -->

    
    
        <div class="nav-search" id="nav-search">
            <form class="form-search">
                                    <span class="input-icon">

                                    </span>
            </form>
        </div><!-- /.nav-search -->
</div>