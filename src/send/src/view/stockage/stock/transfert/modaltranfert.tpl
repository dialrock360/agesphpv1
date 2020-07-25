

<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" name="FormData" action="{$url_base}Stock/transfer_Article_en_stock/onetomany" enctype="multipart/form-data">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <i class="glyphicon glyphicon-barcode"></i> <span id="ref_article"> </span>
                    <span id="ref_article"> </span>
                </h4>
            </div>
            <div class="modal-body">

                <div id="modal-loader" style="display: none; text-align: center;">
                    <img src="{$url_base}public/image/ajax-loader.gif">
                </div>

                <div id="dynamic-content">

                    <div class="row">
                        <div class="col-md-4">



                            <div class="widget-box widget-color-dark">
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter"><span id="nom_article"> </span> <span id="lbnom_conditionement"> </span></h5>
                                    <input   type="hidden" id="id_article_en_stock" name="id_article_en_stock_source"   />
                                    <input   type="hidden" id="id_conditionement_article"  name="id_conditionement_article_source"   />
                                    <input   type="hidden" id="id_stock_article" name="id_stock_article_source"   />
                                    <input   type="hidden" id="cible" class="input-small" value="-1"  />
                                    <input   type="hidden" id="inbr_stock_cible" class="input-small" value="0"  />
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover"  >
                                                <thead>
                                                <tr>
                                                    <th colspan="2">   <span id="path_article"></span></th>
                                                </tr>
                                                </thead>
                                                <tbody class="list-unstyled spaced2" style="background-color: white">
                                                <tr  >
                                                    <th id="nom_conditionement">   </th>
                                                    <td> <span id="lbqnt_article_en_stock"></span></td>
                                                </tr>
                                                <tr  >
                                                    <th > AC </th>
                                                    <td> <span id="cout_achat_conditionement_article"></span></td>
                                                </tr>
                                                <tr  >
                                                    <th > CA U </th>
                                                    <td> <span id="pxa_u_article_en_stock"></span></td>
                                                </tr>
                                                <tr  >
                                                    <th > PXV </th>
                                                    <td> <span id="lbpxv_conditionement_article"></span></td>
                                                </tr>
                                                <tr  >
                                                    <th > PXV U </th>
                                                    <td> <span id="pxv_u_conditionement_article"></span></td>
                                                </tr>
                                                <tbody>
                                                <tfoot>
                                                <hr />
                                                <tr>
                                                    <th >Valeur net</th>
                                                    <td colspan="2">

                                                        <div class="price">
                                                            <b id="lbvaleur_article_en_stock"></b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>


                                    </div>

                                    <div>
                                        <a href="#" class="btn btn-block btn-inverse">
                                            <i class="ace-icon fa fa-database bigger-110"></i>
                                            <span>
												<input class="form-control" type="number" id="qnt_article_en_stock"  name="qnt_article_en_stock_source" value="0" style="color: black; " readonly/>
                                                <input   type="hidden" id="pxv_conditionement_article" name="pxv_conditionement_article_source"   />
                                                <input   type="hidden" id="valeur_article_en_stock" name="valeur_article_en_stock_source"   />

                                             </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div id="dinnamic-add">   </div>
                            <button class="btn btn-info" type="button" onclick="setTransfer()">
                                <i class="ace-icon fa fa-exchange bigger-110"></i>
                                Transferer
                            </button>
                        </div>
                        <div class="col-md-5" id="dinamic-part2">


                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary" type="submit" name="valider">
                    <i class="ace-icon fa fa-check"></i>
                    Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
    </form>
</div><!-- /.modal -->




