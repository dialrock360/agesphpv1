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
                            <input  type="hidden" name="id_stock" value=" {if isset($stock)} {$stock['id']} {/if}"   />
                            <input  type="hidden" name="nbrline"  id="nbrline" value="1"   />

                            <input type="number" min="0" id="rows"  value="1"  class="input-small" name="rows" />
                            <table class="table table-striped table-bordered" id="tbl">
                                <tr>
                                    <th> <h4 class="widget-title">Infos Article</h4></th>
                                    <th> <h4 class="widget-title">Conditionement</h4></th>
                                    <th> <h4 class="widget-title">Conditions de ventes</h4></th>
                                    <th> <h4 class="widget-title">Quantité en Stock</h4></th>
                                    <th><button class="btn btn-info pull-right" type="button" onclick="addRow()">Ajouter</button></th>
                                </tr>

                            </table>
                            <div class="row">
                                <div class="col-md-12 " id="fomart">




                                    <div class="row" id="row_1">
                                        <div class="col-md-12 ">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Article N 1</h4>

                                                    <div class="widget-toolbar">
                                                        <a href="#" data-action="collapse">
                                                            <i class="ace-icon fa fa-chevron-up"></i>
                                                        </a>

                                                        <a href="#" data-action="close">
                                                            <i class="ace-icon fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">

                                                        <div class="row" >
                                                            <div class="col-md-3">
                                                                <div class="widget-box">
                                                                    <div class="widget-header">
                                                                        <h4 class="widget-title">Infos Article
                                                                        </h4>
                                                                    </div>

                                                                    <div class="widget-body">
                                                                        <div class="widget-main">
                                                                            <div class="form-group">
                                                                                <label for="id_article_1">Article</label>
                                                                                <select class="chosen-select form-control" id="id_article_1" name="id_article[]" data-placeholder="Choisir Article..." required>
                                                                                    <option> </option>
                                                                                    {$optionarticles}
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label  for="mypustock"> Cout d'achat </label>
                                                                                <input type="number" min="0" id="mypustock" class="form-control" placeholder="Prix de vente unitaire"  onblur="setCoutAchat1(1)"  value="0" name="pu_article_en_stock[]" />

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="widget-box">
                                                                    <div class="widget-header">
                                                                        <h4 class="widget-title">Conditionement</h4>
                                                                    </div>

                                                                    <div class="widget-body">
                                                                        <div class="widget-main">
                                                                            <div class="form-group">
                                                                                <label for="id_conditionement_1">Conditionement</label>
                                                                                <select class="chosen-select form-control" id="id_conditionement_1" name="id_conditionement[]" required data-placeholder="Choisir conditionement...">
                                                                                    <option> </option>
                                                                                    {$optionconditionements}
                                                                                </select>

                                                                            </div>

                                                                            <div  >
                                                                                <div class="row">

                                                                                    <div class="col-xs-3">
                                                                                        <div>
                                                                                            <label  for="myqnt">Qnt unités </label>

                                                                                             <input type="number" min="1" id="myqnt" value="1" class="input-small"  onblur="setCoutAchat1(1)"  name="qnt_unite[]" >
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-5 ">
                                                                                        <div>

                                                                                            <label  for="id_unite_1"> Nature d'unités</label>
                                                                                            <select required class="chosen-select form-control" id="id_unite_1" name="id_unite[]" data-placeholder="Choisir Nature d'unités...">
                                                                                                <option> </option>
                                                                                                {$optionconditionements}
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-xs-4">
                                                                                        <div>
                                                                                            <a href="javascript:void(0)" onclick="setCoutAchat1(1)" ><label  for="mypu"> Cout d'unités </label></a>
                                                                                            <input type="text"  onmouseover="setCoutAchat1(1)" id="mypu" class="input-small"   readonly  value="0" name="prix_unite[]" />

                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">

                                                                <div class="widget-box">
                                                                    <div class="widget-header">
                                                                        <h4 class="widget-title">Conditions de ventes</h4>
                                                                    </div>

                                                                    <div class="widget-body">
                                                                        <div class="widget-main">


                                                                            <div class="form-group">
                                                                                <label class="control-label">Prix de vente global</label>
                                                                                <input class="form-control" type="number"  min="0" value="0" name="pxv_conditionement_article[]" id="pxv_conditionement_article_1"/>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <label  for="pxv_u_conditionement_article">Prix de vente unité</label>
                                                                                            <input type="number" min="0" id="pxv_u_conditionement_article_1" placeholder="Pxv u"  class="form-control"  value="0" name="pxv_u_conditionement_article[]" />

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6 ">
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <label  for="pxv_bar_conditionement_article">Bareme de vente</label>
                                                                                            <input type="number" min="0" id="pxv_bar_conditionement_article_1" placeholder="Pxv limite"  value="0"  class="form-control" name="pxv_bar_conditionement_article[]" />

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">

                                                                <div class="widget-box">
                                                                    <div class="widget-header">
                                                                        <h4 class="widget-title">Quantité en Stock </h4>
                                                                    </div>

                                                                    <div class="widget-body">
                                                                        <div class="widget-main">

                                                                            <div class="form-group">
                                                                                <label  for="qnt_article_en_stock_1"> Quantité en Stock </label>
                                                                                <input type="number" readonly min="0" class="form-control" id="qnt_article_en_stock_1" placeholder="Quantité en Stock"  value="0" name="qnt_article_en_stock[]" />

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <label  for="min_qnt_article_en_stock_1">Min Qnt</label>
                                                                                            <input type="number" min="0" id="min_qnt_article_en_stock_1" placeholder="Quantité en Stock"  class="input-small"  value="1" name="min_qnt_article_en_stock[]" />

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6 ">
                                                                                    <div>
                                                                                        <div class="form-group">
                                                                                            <label  for="max_qnt_article_en_stock_1"> Max Qnt </label>
                                                                                            <input type="number" min="0" id="max_qnt_article_en_stock_1" placeholder="Quantité Maximal en Stock"   class="input-small" name="max_qnt_article_en_stock[]" />

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--
                                                            <div class="col-md-1">


                                                                <a class="btn btn-app btn-danger btn-xs radius-4 pull-right"  id="btnDelete_1" onclick="DeleteRow(1)" value="Supprimer" >
                                                                    <i class="ace-icon fa fa-trash bigger-160"></i>
                                                                </a>
                                                            </div>
                                                            -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>







                                </div>

                            </div>
                            <hr>

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