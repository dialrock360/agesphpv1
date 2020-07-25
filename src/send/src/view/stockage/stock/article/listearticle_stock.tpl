


<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <table id="stable" class="table  table-bordered table-hover">
            <caption>

                <div id="ok" > </div>
            </caption>
            <thead>
            <tr>
                <th>Image article </th>
                <th> <input id="search" class="form-control" type="text"   placeholder="Recherche.."></th>
                <th>Total unités </th>
                <th>Cout A.</th>
                <th>Prix A.</th>
                <th>Benefice.</th>
                <th>Quantite </th>
                <th>Cout Total</th>
                <th>Valeur </th>
                <th>Reserve</th>
                <th>

                    <button type="button" class="btn btn-info pull-right"   onclick="addArticlestk()"  ><i class="ace-icon fa fa-plus-circle bigger-120"></i>Ajouter</button>


                </th>
            </tr>
            </thead>

            <tbody id="myTable">
            {if isset($article_en_stocks)}
                {if $article_en_stocks != null}

                    {foreach from=$article_en_stocks item=obj}
                        <tr id='tr_{$obj["id"]}'>
                            <td class="center">
                                {assign var="photos" value=($obj["path_photo"]=='') ? 'iconimg.png': $obj["path_photo"]}

                                <a href="{$url_base}Stock/editarticle/{$obj["id"]}">


                                    <img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/>
                                </a>


                            </td>
                            <td>
                                <a href="{$url_base}Stock/editarticle/{$obj["id"]}"><span class="editSpan nom_article "> {$obj["nom_article"]} </span></a>{$obj["nom_conditionement"]}


                                <input  class="editInput id_conditionement_article form-control input-sm" type="hidden" name="id_conditionement_article" value="{$obj["id_conditionement_article"]}"   style="display: none;">
                                <input class="editInput id_article_en_stock form-control input-sm" type="hidden" name="id_article_en_stock" value="{$obj["id"]}"   style="display: none;">
                                <input class="editInput id_stock_article form-control input-sm"  type="hidden" name="id_stock_article" value="{if isset($stock)} {$stock['id']} {/if}" id="id_stock_article" style="display: none;">
                            </td>

                            <td>
                                <span class="editSpan nom_conditionement "> {$obj["qnt_unite"]*$obj["qnt_article_en_stock"]} {$obj["nom_unite_conditionement"]}</span>


                            </td>
                            <td>


                                <span class="editSpan cout_achat_conditionement_article "> {$obj["cout_achat_conditionement_article"]}</span>


                            </td>
                            <td>


                                <span class="editSpan pxv_conditionement_article "> {$obj["pxv_conditionement_article"]}</span>


                            </td>
                            <td>


                                <span class="text-success"> {$obj["pxv_conditionement_article"]-$obj["cout_achat_conditionement_article"]}</span>


                            </td>
                            <td>

                                <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  {$obj["qnt_article_en_stock"]}"><span class="editSpan qnt_article_en_stock "> {$obj["qnt_article_en_stock"]}</span></a>


                                <input class="editInput qnt_article_en_stock form-control input-sm" type="number" min="0" step="0.001" name="qnt_article_en_stock" value="{$obj["qnt_article_en_stock"]}"   style="display: none;">


                            </td>

                            <td>


                                <span class="editSpan cout_achat_total ">  {$obj["cout_achat_conditionement_article"]*$obj["qnt_article_en_stock"]}</span>

                                <input class="editInput cout_achat_total form-control input-sm" type="text" readonly name="cout_achat_total" value="{$obj["cout_achat_conditionement_article"]*$obj["qnt_article_en_stock"]}"   style="display: none;">

                            </td>
                            <td>

                                <span class="editSpan valeur_article_en_stock "> {$obj["valeur_article_en_stock"]}</span>

                                <input class="editInput valeur_article_en_stock form-control input-sm" type="text" readonly name="valeur_article_en_stock" value="{$obj["valeur_article_en_stock"]}"   style="display: none;">

                            </td>

                            <td>

                                {assign var="minqnt" value=$obj["min_qnt_article_en_stock"]}
                                {assign var="maxqnt" value=$obj["max_qnt_article_en_stock"]}
                                {assign var="qnt" value=$obj["qnt_article_en_stock"]}
                                {assign var="valeur_p" value=100}
                                {assign var="p" value=0}
                                {assign var="divmin" value=$maxqnt/2}
                                {if $qnt>0}
                                    {if $qnt<=$minqnt }

                                            {if  $minqnt<$divmin}
                                            {$p = ($qnt/$maxqnt) * $valeur_p}
                                            <span class="label label-sm label-danger">{$p|round:2}%</span>
                                        {/if}
                                    {/if}
                                     {if $qnt>$minqnt}
                                         {$p = ($qnt/$maxqnt) * $valeur_p}
                                         {if $p>50}
                                             <span class="label label-sm label-success">{$p|round:2}%</span>
                                         {/if}
                                         {if $p<50}
                                           {if $p>10}
                                             <span class="label label-sm label-warning">{$p|round:2} %</span>
                                           {/if}
                                           {if $p<10}
                                             <span class="label label-sm label-danger">{$p|round:2}%</span>
                                           {/if}
                                         {/if}
                                         {if $p==50}
                                             <span class="label label-sm label-info">{$p|round:2}%</span>
                                         {/if}
                                     {/if}


                                {/if}
                                {if $qnt==0}
                                    <span class="label label-sm label-danger">{$qnt}%</span>
                                {/if}



                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round cancelBtn" title="anuller" style="display: none">
                                        <i class="glyphicon glyphicon-remove red"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round saveBtn" title="enregister" style="display: none">
                                        <i class="glyphicon glyphicon-floppy-disk green"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round confirmBtn" title="valider" style="display: none">
                                        <i class="glyphicon glyphicon-ok green"></i>
                                    </a>
                                </div>

                                <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-info btn-white btn-round  editBtn" title="Editer">
                                    <i class="fa  fa-edit blue"></i>

                                </a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#view-modal"  data-id="{$obj["id"]}" class="btn btn-sm btn-warning btn-white btn-round  modaledit" title="Transferer">
                                    <i class="fa  fa-exchange blue"></i>

                                </a>

                                {if $qnt<1}

                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">
                                        <i class="glyphicon glyphicon-trash red"></i>

                                    </a>
                                {else}
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-inverse btn-white btn-round  deleteBtndisable" title="impossible de Supprimer">
                                        <i class="glyphicon glyphicon-trash black"></i>

                                    </a>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}

                {else}
                    <tr>
                        <td colspan="6">

                            Liste vide
                        </td>
                    </tr>

                {/if}
            {/if}
            </tbody>

        </table>

        {include file='src/view/stockage/article/modalform.tpl'}
    </div><!-- /.span -->
</div><!-- /.row -->
