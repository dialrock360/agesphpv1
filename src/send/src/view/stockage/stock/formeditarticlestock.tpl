<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>


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
                            <a href="#">
                                <i class="ace-icon fa fa-print"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-24">

                            <div class="col-sm-12">

                                <div id="accordion" class="accordion-style1 panel-group">

                                    <form method="post" name="FormData" action="{$url_base}Stock/add_Article_en_stock/edit" enctype="multipart/form-data">
                                        {include file='src/view/stockage/stock/article/_inputarticle_stock.tpl'}
                                        <input  type="hidden" name="addmethode" value="0"   />
                                        <input class="form-control" type="hidden" name="id_conditionement_article[]" value="{if isset($article_en_stock)} {$article_en_stock['id_conditionement_article']} {/if}" id="id_conditionement_article"/>
                                        <input class="form-control" type="hidden" name="id_article_en_stock[]" value="{if isset($article_en_stock)} {$article_en_stock['id']} {/if}" id="id_article_en_stock"/>
                                        <input class="form-control" type="hidden" name="ref_article[]" value="{if isset($article_en_stock)} {$article_en_stock['ref_article']} {/if}" id="ref_article"/>

                                        {if isset($article_en_stock)}

                                        {/if}
                                    </form>

                                </div>
                            </div><!-- /.col -->

                            <div class="hr hr8 hr-double hr-dotted"></div>

                            <div class="row">
                                <div class="col-sm-5 pull-right">
                                    <h4 class="pull-right">
                                        Valeur de l'article dans ce stock :
                                        <span class="red">{if isset($stock)} {$stock['valeur']} {/if} Fr</span>
                                    </h4>
                                </div>
                                <div class="col-sm-7 pull-left"> Extra Information </div>
                            </div>

                            <div class="space-6"></div>
                            <div class="well">
                                Thank you for choosing Ages Company products.
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


<script>
    var varurl=$("#varurl").val();
    var articles=$("#articles").val();


    function setCoutAchat()
    {
         var qnt_unite=parseInt($("#qnt_unite").val());
        // alert(qnt_unite);
         var pu_article_en_stock=parseInt($("#pu_article_en_stock").val());
         var prix_unite=parseInt($("#prix_unite").val());
         var numb = parseFloat(pu_article_en_stock/qnt_unite);
         var num = numb.toFixed(2);
     //    alert(pu_article_en_stock+' ff '+qnt_unite+' == '+num)
        $("#prix_unite").val(num);

    }












</script>