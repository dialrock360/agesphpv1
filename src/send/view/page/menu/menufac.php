
<style>
    #formFpro,#lisfp,#lisfd{
        display: none;
    }
    #conteneur
    {
        display: flex;
        justify-content: space-around;
    }
</style>
<style type="text/css">
    .mon_block2,.mon_block2court{

        opacity:0;
        border-radius:10px;
        width:1px;
        height: 1px;
        overflow: auto;
        padding:0;
        z-index:10;
        text-align:center;
        position: absolute;
        text-shadow: 1px 1px 5px #00000, -1px -1px -5px #00000;


        transition-property:width,height,opacity,z-index,padding,overflow;
        transition-duration:0.4s;

    }
    .ENTER{ cursor:pointer;}
    .diagD{
        display:block;overflow:hidden;cursor:pointer;
        background-color:#FFFFFF;
        font-family:"Times New Roman", Times, serif;
        font-size:12px;
        width:60px;height:40px;
        margin-top:0px;margin-left:0px;
        border:0px solid rgba(0,0,0,0.7);
    }

    .INTER:hover div.mon_block2{

        border-radius:10px;
        min-width: 400px;
        max-width: auto;
        height: 200px;
        z-index: auto;
        overflow:scroll;
        padding:6px 10px;
        opacity:1;
        text-align: center;
        position: absolute;
        text-shadow: 1px 1px 5px #00000, -1px -1px -5px #00000;
        background: #F0FFFF;

        box-shadow:1px 0 10px #009999;
        display: block;
    }
    .INTER:hover div.mon_block2court{

        border-radius:10px;
        width: auto;
        height: auto;
        z-index: auto;
        overflow:scroll;
        padding:6px 10px;
        opacity:1;
        text-align: center;
        position: absolute;
        text-shadow: 1px 1px 5px #00000, -1px -1px -5px #00000;
        background: #F0FFFF;

        box-shadow:1px 0 10px #009999;
        display: block;
    }
    .mon_block{

        opacity:0;
        display: none; /*--masqué par défaut--*/
        background: #fff;
        padding: 10px;
        border: 1px solid #ddd;
        float: left;
        font-size: 14px;
        border-radius:10px;
        margin-top:-5px;
        text-align:center;
        position: absolute;
        z-index: 99999;
        /*--Les différentes définitions de Box Shadow en CSS3--*/
        -webkit-box-shadow: 0px 0px 20px #000;
        -moz-box-shadow: 0px 0px 20px #000;
        box-shadow: 0px 0px 20px #000;
        /*--Coins arrondis en CSS3--*/
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;

        transition-property:display,width,height,margin-top,opacity;
        transition-duration:0.4s;
    }
    .pophigt{
        display:block;overflow:hidden;
        color:#000033;
        font-family:"Times New Roman", Times, serif;
        font-size:12px;
        width:100px;height:40px;
        margin-top:0px;margin-left:0px;
        cursor:pointer;
    }

    .mon_block:before{
        content:"\25B8";
        color: #FFFFFF;
        font-size:42px;
        width:100%;
        left:0;
        text-align:center;
        position:absolute;
        top:-14px;
        left:-36%;

        -webkit-transform:rotate(-90deg);
        -moz-transform:rotate(-90deg);
        -ms-transform:rotate(-90deg);
        -o-transform:rotate(-90deg);
        transform:rotate(-90deg);
        text-shadow: 1px 0 2px #000;
    }

    .pophigt:hover ~ div.mon_block{
        display:block;
        color:#0000FF;
        opacity:1;
        width: auto;height: auto;
        margin-top:-5px;
        border:0.5px groove #0099FF;
        box-shadow:0 0 10px black;

    }
    *html .mon_block {
        position: absolute;
    }
</style>

<?php
if($fac=='prof'){
    ?>


    <ul class="nav nav-tabs" id="myTabp">

        <li >
            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1">
                <img src="assets/images/icon/demande.png" class="img-responsive" alt="LISTE DEMANDE PROFORMA" style="float: left">

                LISTE DEMANDE PROFORMA
                &nbsp;<br>
                <span class="badge badge-danger">
                <?php Count_Facd(); ?>
                </span>
            </a>
        </li>

        <li >
            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown2">
                <img src="assets/images/icon/facturepro.png" class="img-responsive" alt="LISTE FACTURE PROFORMA" style="float: left">

                LISTE FACTURE PROFORMA
                &nbsp;<br>
                <span class="badge badge-danger">
                <?php Count_Facp(); ?>
                </span>
            </a>
        </li>
        <li >
            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown3">
                <img src="assets/images/icon/adddemande.png" class="img-responsive" alt="NOUVELLE DEMANDE PROFORMA" style="float: left">

                NOUVELLE DEMANDE PROFORMA
                <br><br>
            </a>


        </li>
        <li >
            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown4">
                <img src="assets/images/icon/addfacturepro.png" class="img-responsive" alt="NOUVELLE FACTURE PROFORMA" style="float: left">

                NOUVELLE FACTURE PROFORMA
                <br><br>
            </a>


        </li>

    </ul>
<?php
}
if($fac=='fac'){
    ?>

    <ul class="nav nav-tabs" id="myTabf">

        <li >
            <a  href="?file=page/facture/table">
                <img src="assets/images/icon/facture.png" class="img-responsive" alt="LISTE FACTURE" style="float: left">

                LISTE FACTURE
                &nbsp;<br>
                <span class="badge badge-danger">
            <?php $fact='facture';Count_Mvm($fact); ?>
            </span>
            </a>
        </li>
        <li >
            <a  href="?file=page/facture">
                <img src="assets/images/icon/addfacture.png" class="img-responsive" alt="LISTE FACTURE" style="float: left">

                NOUVELLE FACTURE
                <br><br>
            </a>


        </li>

    </ul>
<?php
}
if($fac=='rec'){
    ?>

    <ul class="nav nav-tabs" id="myTabr">

        <li >
            <a href="?file=page/recu/table">
                <img src="assets/images/icon/recu.png" class="img-responsive" alt="LISTE FACTURE" style="float: left">

                LISTE DEPENSES
                &nbsp;<br>
                <span class="badge badge-danger">
            <?php $fact='recu';Count_Mvm($fact); ?>
            </span>
            </a>
        </li>
        <li >
            <a href="?file=page/facture">
                <img src="assets/images/icon/addrecu.png" class="img-responsive" alt="LISTE FACTURE" style="float: left">
                NOUVEAU RECU
                <br><br>
            </a>


        </li>

    </ul>
<?php
}
?>







<div id="view-modal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div >
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:ghostwhite;">
                        <img src="assets/images/avatars/favicon.png" class="fa" alt="Alex's Avatar" />

                        <h4><span class="red"> Auberge de Sendou</span></h4>
                    </div>
                    <input type="hidden" name="cacher" id="cacher" value="<?php echo $log; ?>"   required >

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


                </div>

            </div>
        </div>
    </div>
</div><!-- /.modal -->


<div id="view-modal3" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; height: 100%;">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">


                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div id="modal-loader3" style="display: none; text-align: center;">
                    <img src="ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="dynamic-content3"></div>

            </div>

        </div>

    </div>

</div>
</div><!-- /.modal -->



<div id="view-modal2" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">

                <div id="modal-loader2" style="display: none; text-align: center;">
                    <img src="ajax-loader.gif">
                </div>

                <!-- content will be load here -->
                <div id="dynamic-content2"></div>

            </div>

            <div class="modal-footer">

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
        max-width: 90%;
        width: auto !important;
        display: inline-block;
    }
    .modal.in{
        text-align: center;
    }
</style>