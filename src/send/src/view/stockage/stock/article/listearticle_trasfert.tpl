


<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-small">
                <h4 class="widget-title blue smaller">
                    <i class="ace-icon fa fa-database green"></i>
                    Liste des articles

                </h4>

                <div class="widget-toolbar action-buttons">
                    <a href="{$url_base}Stock/import/{$id_stock}"  >
                        <i class="ace-icon fa fa-refresh blue"></i>
                    </a>
                    &nbsp;

                </div>

                <input id="search" class="form-control" type="text"   placeholder="Recherche..">
            </div>

            <div class="widget-body">
                <div class="widget-main padding-8">
                    <div id="profile-feed-1" class="profile-feed">

                        {if isset($article_en_stocks)}
                            {if $article_en_stocks != null}

                                {foreach from=$article_en_stocks item=obj}
                                    <div class="profile-activity clearfix">
                                        <div>

                                            <span class="pull-left">
                                                     {assign var="photos" value=($obj["path_photo"]=='') ? 'iconimg.png': $obj["path_photo"]}


                                    <img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/>
                                <span class="editInput path_photo form-control input-sm"  style="display: none;"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></span>

                                            </span>

                                            <a href="{$url_base}Stock/editarticle/{$obj["id"]}"><span class="editSpan nom_article "> {$obj["nom_article"]}</span></a>


                                            <div class="time">
                                                <i class="ace-icon fa fa-database bigger-110"></i>
                                                <span class="editSpan qnt_article_en_stock "> {$obj["qnt_article_en_stock"]}</span> <span class="editSpan nom_conditionement "> {$obj["nom_conditionement"]}</span> en stock
                                            </div>
                                        </div>

                                        <div class="tools action-buttons">
                                            <a href="#" class="blue">
                                                <i class="ace-icon fa fa-pencil bigger-125"></i>
                                            </a>

                                            <a href="#" class="red">
                                                <i class="ace-icon fa fa-times bigger-125"></i>
                                            </a>
                                        </div>
                                    </div>

                                {/foreach}

                            {else}
                                <tr>
                                    <td colspan="6">

                                        Liste vide
                                    </td>
                                </tr>

                            {/if}
                        {/if}
                   </div>
                </div>
            </div>
        </div>

        {include file='src/view/stockage/article/modalform.tpl'}
    </div><!-- /.span -->
</div><!-- /.row -->
