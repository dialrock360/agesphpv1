

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title" align="center">
                    <strong><i class="fa fa-shopping-cart"></i> Bon d'achat </strong> N° <?php  Newid_Fac();?>


                    <input  type="hidden" value="" id="AUTOINCREMENT"/>
                    <input type="hidden" name="idF" value="<?php  Newid_Fac();?>" id="INCREMENT"  readonly="true" style="opacity:0.5; height:10px;" >
                </h2>
                <input type="hidden" name="type" id="type" value="recu"   required >
                <input type="hidden" name="conten" id="conten" value=" "    >
                <input type="hidden" name="cacher" id="cacher"   required >
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="alert alert-info">


                    {include file='src/view/logistique/achat/input/_headers.tpl'}


                </div>

                {include file='src/view/logistique/achat/input/_feillecalcul.tpl'}
            </div>

        </div>
    </div>
</div>
