<div class="row">
    <div class="col-md-12 ">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                            Ajouter des produit dans ce stock
                        </a>

                        <div class="form-group">
                            <button class="btn btn-white btn-default btn-round  pull-right" onclick="addRow()">
                                <i class="ace-icon fa fa-plus-circle blue"></i>
                                Ajouter
                            </button>
                            <button class="btn btn-white btn-default btn-round  pull-left"  onclick="addArticlestk()" >
                                <i class="ace-icon fa fa-times red2"></i>
                                Fermer
                            </button>
                        </div>
                    </h4>
                </div>

                <div class="panel-collapse collapse in" id="collapseOne">
                    <div class="panel-body">


                        <form method="post" name="FormData" action="{$url_base}Stock/add_Article_en_stock/multiple" enctype="multipart/form-data">
                            <input  type="hidden" name="addmethode" value="2"   />
                            {include file='src/view/stockage/stock/article/_inputarticle_stock.tpl'}


                            <div class="form-group">


                                <button class="btn btn-success pull-right" type="submit" name="valider">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>