{if isset($article_en_stock)}
<div  >
    <form method="post" name="FormData" action="{$url_base}Stock/add_Article_en_stock/edit" enctype="multipart/form-data">

        <div >
            <div >
                <div >
                    <h4 class="blue bigger" id="rep">{$article_en_stock['nom_article']} </h4>
                </div>

                <div  >
                    <div class="row">


                        <div class="col-xs-12 col-sm-12">

                            <div class="space-4"></div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div id="dynamic-image-preview">
                                        <img src="{$url_base}public/assets/images/gallery/{$article_en_stock['path_photo']}" class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                                    </div>

                                </div>

                                <div class="col-xs-6">


                                    <div class="form-group">
                                        <label  for="pu_article_en_stock"> Cout d'achat </label>
                                        <div>
                                            <input  type="hidden" name="addmethode" value="0"   />
                                            <input  type="hidden" name="id_stock" value="{if isset($stock)} {$stock['id']} {/if}"   />
                                            <input  type="hidden" name="nbrline"  id="nbrline" value="1"   />
                                            <input  type="hidden"    name="id_article"  value="{$article_en_stock['id_article']}"   />
                                            <input  type="hidden"    name="id"  value="{$article_en_stock['id']}"   />
                                            <input type="number" min="0" id="pu_article_en_stock" class="form-control" placeholder="Prix de vente unitaire"  onblur="setCoutAchat()" value="{$article_en_stock['pu_article_en_stock']}" name="pu_article_en_stock" />
                                            <input type="hidden"   id="id_conditionement_article"  value="{$article_en_stock['id_conditionement_article']}" name="id_conditionement_article" />

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
                                                    <option value="{$article_en_stock['id_conditionement']}"> {$article_en_stock['nom_conditionement']} </option>
                                                    {$optionconditionements}
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label  for="qnt_article_en_stock"> Quantité en Stock </label>
                                                <input type="number" readonly min="0" id="qnt_article_en_stock" placeholder="Quantité en Stock"  class="form-control" value="{$article_en_stock['qnt_article_en_stock']}" name="qnt_article_en_stock" />

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <div class="form-group">
                                                            <label  for="min_qnt_article_en_stock">Qnt Minimal</label>
                                                            <input type="number"  value="{$article_en_stock['min_qnt_article_en_stock']}" min="0" id="min_qnt_article_en_stock" placeholder="Quantité en Stock"  class="form-control"  name="min_qnt_article_en_stock" />

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <div>
                                                        <div class="form-group">
                                                            <label  for="max_qnt_article_en_stock">Qnt Maximal</label>
                                                            <input type="number" value="{$article_en_stock['max_qnt_article_en_stock']}" min="0" id="max_qnt_article_en_stock" placeholder="Quantité Maximal en Stock"   class="form-control" name="max_qnt_article_en_stock" />

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
                                            <input type="number" value="{$article_en_stock['prix_unite']}"  min="0" id="prix_unite" class="form-control" placeholder="Prix achat unitaire"  readonly    name="prix_unite" />

                                        </div>
                                    </div>


                                    <div class="form-group" >
                                        <label  for="qnt_unite">Qnt unités </label>

                                        <div>
                                            <input type="number" value="{$article_en_stock['qnt_unite']}"  min="0" id="qnt_unite" class="form-control" placeholder="Nombre d'unite" onblur="setCoutAchat()"  name="qnt_unite" />
                                        </div>
                                    </div>

                                    <div class="form-group" >
                                        <label  for="id_unite"> Nature d'unités</label>

                                        <div>
                                            <select required class="chosen-select form-control" id="id_unite" name="id_unite" data-placeholder="Choisir Nature d'unités..."  >
                                                <option value="{$article_en_stock['id_unite']}"> {$article_en_stock['nom_uniteconditionement']}</option>

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

                <div  >
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

 {/if}