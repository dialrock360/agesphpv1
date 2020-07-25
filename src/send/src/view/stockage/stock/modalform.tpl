

<div  id="modal-form" class="modal" tabindex="-1">
    <form method="post" name="FormData" action="{$url_base}Stock/add_Article_en_stock/edit" enctype="multipart/form-data">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"  class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger" id="rep"> </h4>
                </div>

                <div   class="modal-body">
                    <div class="row">


                        <div class="col-xs-12 col-sm-12">

                            <div class="space-4"></div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div id="dynamic-image-preview">
                                        <img src="{$url_base}public/assets/images/gallery/iconimg.png" class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                                    </div>

                                </div>

                                <div class="col-xs-6">


                                    <div class="form-group">
                                        <label  for="pu_article_en_stock"> Cout d'achat </label>
                                        <div>

                                            <input  type="hidden" name="addmethode" value="0"   />
                                            <input  type="hidden" name="id_stock" value="0"   />
                                            <input  type="hidden" name="nbrline"  id="nbrline" value="1"   />
                                            <input  type="hidden"    name="id_article"  value="0"   />
                                            <input  type="hidden"    name="id"  value="0"   />
                                            <input type="number" min="0" id="pu_article_en_stock" class="form-control" placeholder="Prix de vente unitaire"  onblur="setCoutAchat()" value="0" name="pu_article_en_stock" />
                                            <input type="hidden"   id="id_conditionement_article"  value="0" name="id_conditionement_article" />

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row"  style="background-color:lavender;">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="id_categorie">Conditionement</label>

                                                <select class="chosen-select form-control" id="id_conditionement" name="id_conditionement" data-placeholder="Choisir conditionement..." required>
                                                    <option >  </option>
                                                    {$optionconditionements}
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label  for="qnt_article_en_stock"> Quantité en Stock </label>
                                                <input type="number" readonly min="0" id="qnt_article_en_stock" placeholder="Quantité en Stock"  class="form-control" value="0" name="qnt_article_en_stock" />

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="form-group">
                                                            <label  for="min_qnt_article_en_stock">Qnt Minimal</label>
                                                            <input type="number"  value="0" min="0" id="min_qnt_article_en_stock" placeholder="Quantité en Stock"  class="form-control"  name="min_qnt_article_en_stock" />

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <div>
                                                        <div class="form-group">
                                                            <label  for="max_qnt_article_en_stock">Qnt Maximal</label>
                                                            <input type="number" value="0" min="0" id="max_qnt_article_en_stock" placeholder="Quantité Maximal en Stock"   class="form-control" name="max_qnt_article_en_stock" />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-6" style="background-color:lavender;">

                                    <div class="form-group">
                                        <label for="qnt_unite"> Prix d'une unité </label>

                                        <div>
                                            <input type="number" value="0"  min="0" id="prix_unite" class="form-control" placeholder="Prix achat unitaire"  readonly    name="prix_unite" />

                                        </div>
                                    </div>


                                    <div class="form-group" >
                                        <label  for="qnt_unite">Qnt unités </label>

                                        <div>
                                            <input type="number" value="1"  min="0" id="qnt_unite" class="form-control" placeholder="Nombre d'unite" onblur="setCoutAchat()"  name="qnt_unite" />
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label  for="id_unite"> Nature d'unités</label>

                                        <div>
                                            <select required class="chosen-select form-control" id="id_unite" name="id_unite" data-placeholder="Choisir Nature d'unités..."  >
                                                <option >  </option>
                                                {$optionconditionements}
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>












                            <div class="space-4"></div>


                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancel
                    </button>

                    <button class="btn btn-sm btn-primary" type="submit" name="valider">
                        <i class="ace-icon fa fa-check"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div><!-- PAGE CONTENT ENDS -->