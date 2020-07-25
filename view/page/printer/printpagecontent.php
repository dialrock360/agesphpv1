<?php

$sdate = new DateTime();
$fdate = $sdate->format('d-m-Y');
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="col-xs-12">
        <div class="row" style="margin-left: 1%;">


        <?php
        if(isset($_GET['date'])) {
            $date=$_GET['date'];
            require_once 'raporcontent.php';
        }
        ?>


    </div>
    </div>
    </div>
</div><!-- /.main-content -->

