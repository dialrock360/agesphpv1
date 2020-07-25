
<div class="row">
    <div class="col-md-12 ">
        <div>
            <div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="center">Article</th>

                        <th class="hidden-xs">Image</th>
                    </tr>
                    </thead>

                    <tbody>
                    {if isset($articles)}
                    {if $articles != null}

                    {foreach from=$articles item=obj}

                        <tr id='tr_{$obj["id"]}'>
                            <td class="center">

                                <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  {$obj["nom_article"]}"><span class="editSpan nom_article "> {$obj["nom_article"]}</span></a>

                                <input class="editInput nom_article form-control input-sm" type="text" name="nom_article" value="{$obj["nom_article"]}" style="display: none;">


                            </td>
                            <td>
                                {assign var="photos" value=($obj["path_photo"]=='') ? 'iconimg.png': $obj["path_photo"]}
                                <a href="javascript:void(0)" data-toggle="tooltip" id="path_photo_{$obj["id"]}"  class="editBtn" title="Modifier  {$obj["nom_article"]}"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></a>
                                <span class="editInput path_photo form-control input-sm"  style="display: none;"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></span>



                            </td>


                        </tr>
                    {/foreach}

                    {else}
                        <tr>
                            <td colspan="5">

                                Liste vide
                            </td>
                        </tr>

                    {/if}
                    {/if}
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>