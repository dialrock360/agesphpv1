
<input  type="hidden" name="id_stock" value=" {if isset($stock)} {$stock['id']} {/if}"   />
<input  type="hidden" name="type_stock" id="type_stock" value=" {if isset($stock)} {$stock['type_stock']} {/if}"   />
<input  type="hidden" name="nbrline"  id="nbrline" value="1"   />

<input type="hidden" min="0" id="rows"  value="1"  class="form-control" name="rows" />
<table class="table table-striped table-bordered" id="tbl">

    <tr id="row_0">
        <td>

            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Infos Article
                    </h4>

                    <input  type="hidden" id="id_article_en_stock_0" name="id_article_en_stock[]" value=" {if isset($article_en_stock)} {$article_en_stock['id']} {/if}"   />
                    <input  type="hidden" id="id_conditionement_article_0" name="id_conditionement_article[]" value="{if isset($article_en_stock)} {$article_en_stock['id_conditionement_article']} {/if}"   />
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <div class="form-group">
                            <label for="id_article_0">Article</label>
                            <select class="chosen-select form-control" id="id_article_0" name="id_article[]" data-placeholder="Choisir Article..." required>
                                <option> </option>
                                {$optionarticles}
                            </select>
                        </div>
                        <div class="form-group">
                            <label  for="mypustock"> Cout d'achat </label>

                            <input type="number" min="0" id="cout_achat_conditionement_article_0" step="0.001" class="form-control" placeholder="Prix de vente unitaire"  onblur="setCoutAchat(0)"  value="{if isset($article_en_stock)}{$article_en_stock['cout_achat_conditionement_article']|floatval}{/if}" name="cout_achat_conditionement_article[]" />

                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>

            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Conditionement</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <div class="form-group">
                            <label for="id_conditionement_0">Conditionement</label>
                            <select class="chosen-select form-control" id="id_conditionement_0" name="id_conditionement[]" required data-placeholder="Choisir conditionement...">
                                <option> </option>
                                {$optionconditionements}
                            </select>

                        </div>

                        <div  >
                            <div class="row">

                                <div class="col-xs-3">
                                    <div>
                                        <label  for="myqnt">Qnt unités </label>

                                        <input type="number" min="1" step="0.001" id="qnt_unite_0" value="{if isset($article_en_stock)}{$article_en_stock['qnt_unite']|floatval}{/if}" class="form-control"  onblur="setCoutAchat(0)"  name="qnt_unite[]" >
                                    </div>
                                </div>
                                <div class="col-xs-5 ">
                                    <div>

                                        <label  for="id_unite_0"> Nature d'unités</label>
                                        <select required class="chosen-select form-control" id="id_unite_0" name="id_unite[]" data-placeholder="Choisir Nature d'unités...">
                                            <option> </option>
                                            {$optionconditionementsunite}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div>
                                        <a href="javascript:void(0)" onclick="setCoutAchat(1)" ><label  for="pxa_u_article_en_stock_0"> Cout de l'unité </label></a>

                                        <input type="text"  onmouseover="setCoutAchat(1)" step="0.001" id="pxa_u_article_en_stock_0"  class="form-control"   readonly  value="{if isset($article_en_stock)}{$article_en_stock['pxa_u_article_en_stock']|floatval}{/if}" name="pxa_u_article_en_stock[]" />

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </td>
        <td>

            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Conditions de ventes</h4>
                    <span   id="alertvnt_0"> </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">


                        <div class="form-group">
                            <label class="control-label">Prix de vente global</label>

                            <input class="form-control" type="number"  min="0" value="{if isset($article_en_stock)}{$article_en_stock['pxv_conditionement_article']|floatval}{/if}" onblur="setPrixvente(0)" name="pxv_conditionement_article[]" id="pxv_conditionement_article_0"/>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div class="form-group">
                                        <label  for="pxv_u_conditionement_article">Prix de vente u</label>
                                        <input type="number" min="0" id="pxv_u_conditionement_article_0" placeholder="Pxv u" readonly class="form-control"  value="{if isset($article_en_stock)}{$article_en_stock['pxv_u_conditionement_article']|floatval}{/if}" name="pxv_u_conditionement_article[]" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div>
                                    <div class="form-group">
                                        <label  for="pxv_bar_conditionement_article">Bareme de vente</label>
                                        <input type="number" min="0" step="0.001" id="pxv_bar_conditionement_article_0" placeholder="Pxv limite" onblur="setPrixvente(0)"  value="{if isset($article_en_stock)}{$article_en_stock['pxv_bar_conditionement_article']|floatval}{/if}"  class="form-control" name="pxv_bar_conditionement_article[]" />

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </td>
        <td>

            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Quantité en Stock </h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <div class="form-group">
                            <label  for="qnt_article_en_stock_0"> Quantité en Stock </label>

                            <input type="number" readonly min="0" step="0.001" class="form-control" id="qnt_article_en_stock_0" placeholder="Quantité en Stock"  value="{if isset($article_en_stock)}{$article_en_stock['qnt_article_en_stock']|floatval}{/if}" name="qnt_article_en_stock[]" />

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <div class="form-group">
                                        <label  for="min_qnt_article_en_stock_0">Min Qnt</label>


                                        <input type="number" min="0" step="0.001" id="min_qnt_article_en_stock_0" placeholder="Quantité en Stock"  class="form-control"  value="{if isset($article_en_stock)}{$article_en_stock['min_qnt_article_en_stock']|floatval}{/if}" name="min_qnt_article_en_stock[]" />

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div>
                                    <div class="form-group">
                                        <label  for="max_qnt_article_en_stock_0"> Max Qnt </label>



                                        <input type="number" min="0" step="0.001" id="max_qnt_article_en_stock_0" placeholder="Quantité Maximal en Stock" value="{if isset($article_en_stock)}{$article_en_stock['max_qnt_article_en_stock']|floatval}{/if}"  class="form-control" required name="max_qnt_article_en_stock[]" />

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </td>
        <td>
            {if isset($article_en_stock)}

                {assign var="benef" value=0}
                {if $article_en_stock['pxv_conditionement_article']>$article_en_stock['cout_achat_conditionement_article']}
                    {$benef=$article_en_stock['pxv_conditionement_article']-$article_en_stock['cout_achat_conditionement_article']}
                {/if}
                <table class="table">
                    <tr>
                        <th>Cout d'achat</th>
                        <td> <input class="form-control" type="text"  readonly  value="{$article_en_stock['cout_achat_conditionement_article']}" id="ca"/></td>
                    </tr>
                    <tr>
                        <th>Cout unité</th>
                        <td> <input class="form-control" type="text"  readonly  value="{$article_en_stock['pxa_u_article_en_stock']}" id="cau"/></td>
                    </tr>
                    <tr>
                        <th>Prix de vente</th>
                        <td> <input class="form-control" type="text"  readonly  value="{$article_en_stock['pxv_conditionement_article']}" id="pv"/></td>
                    </tr>
                    <tr>
                        <th>Prix unité</th>
                        <td> <input class="form-control" type="text"  readonly  value="{$article_en_stock['pxv_u_conditionement_article']}" id="pvu"/></td>
                    </tr>
                    <tr>
                        <th>Valeur</th>
                        <td>
                            <input class="form-control" type="text" readonly name="valeur_article_en_stock[]" value="{$article_en_stock['valeur_article_en_stock']}" id="valeur_article_en_stock_0"/>


                        </td>
                    </tr>
                    <tr bgcolor="#b0e0e6">
                        <th >Bénéfice</th>
                        <td> <input class="form-control" type="text"  readonly  value="{$benef}" id="benef"/></td>
                    </tr>

                    <tr >
                        <td> <button href="#" type="submit" name="valider" class="btn btn-block btn-sm btn-primary">
                                <span>Enregistrer</span>
                            </button></td>
                    </tr>


                </table>
            {else}

                <button class="btn btn-danger pull-right" type="button" id="btnDelete_0" onclick="DeleteRow(0)"><i class="ace-icon fa fa-trash  bigger-110 icon-only"></i></button>

                <hr/>

                <button class="btn btn-info pull-right" type="button" onclick="addRow()"><i class="ace-icon fa fa-plus  bigger-110 icon-only"></i></button>
            {/if}


        </td>

    </tr>
</table>


<hr>