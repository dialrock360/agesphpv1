<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>
<input  type="hidden" value="{$url_base}Stock" id="varurlx"   />
<input  type="hidden" value="{$id_stock}" id="id_stock"   />

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="space-6"></div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-large">
                        <h3 class="widget-title grey lighter">
                            <i class="ace-icon fa fa-database blue"></i>
                            <span class="blue">{if isset($stock)} {$stock['nom_stock']} {/if}  || </span>
                            Valeur  :
                            <span class="red"> {if isset($stock)} {$stock['valeur']} {/if} Fr</span>



                        </h3>

                        <div class="widget-toolbar no-border invoice-info">
                            <span class="invoice-info-label">Invetaire:</span>
                            <span class="red">#121212</span>

                            <br />
                            <span class="invoice-info-label">Date:</span>
                            <span class="blue">04/04/2014</span>
                        </div>

                        <div class="widget-toolbar hidden-480">

                            <a href="{$url_base}Stock/import/{$id_stock}" class="btn btn-app btn-success btn-sm" title="Importation de stock">
                                <i class="ace-icon fa fa-undo bigger-230"></i>
                                Import
                            </a>
                            <a href="{$url_base}Stock/inventaire/{$id_stock}" class="btn btn-app btn-info btn-sm" title="Inventaire de stock">
                                <i class="ace-icon fa fa-print bigger-230"></i>
                                Iventaire
                            </a>
                            <a href="{$url_base}Stock/export/{$id_stock}" class="btn btn-app btn-warning btn-sm" title="Exportation de stock">
                                <i class="ace-icon fa fa-share bigger-200"></i>
                                Export
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-24">

                            <div class="col-sm-12">
                                {if isset($notif_stock) && $notif_stock > 0}

                                    <h3 class="row header smaller lighter blue">
                                        <span class="col-xs-6"> Notifications de ravitaillement </span><!-- /.col -->

                                    </h3>
                                {/if}
                                <div id="accordion" class="accordion-style1 panel-group">
                                    <div class="row">
                                        <div class="col-sm-12"  >

                                            {include file='src/view/stockage/stock/manage/viewnotifArticle.tpl'}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8"  >

                                            {include file='src/view/stockage/stock/transfert/formimport.tpl'}
                                        </div>
                                        <div class="col-sm-4"  >
                                            {include file='src/view/stockage/stock/article/listearticle_trasfert.tpl'}
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.col -->

                            <div class="hr hr8 hr-double hr-dotted"></div>

                            <div class="row">
                                <div class="col-sm-5 pull-right">
                                    <h4 class="pull-right">
                                        Valeur Total du stock :
                                        <span class="red">{if isset($stock)} {$stock['valeur']} {/if} Fr</span>
                                    </h4>
                                </div>
                                <div class="col-sm-7 pull-left"> Extra Information </div>
                            </div>

                            <div class="space-6"></div>
                            <div class="well">
                                Thank you for choosing Ace Company products.
                                We believe you will be satisfied by our services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
