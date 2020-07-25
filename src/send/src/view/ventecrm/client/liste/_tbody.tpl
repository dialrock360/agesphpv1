


<tbody>

{if isset($personnes)}
    {if $personnes != null}

        {foreach from=$personnes item=obj}
            <tr id='tr_{$obj["id"]}'>
                <td>
                    {assign var="photos" value=($obj["photo_personne"]=='') ? 'default.png': $obj["photo_personne"]}
                    <img src="{$url_base}minam/assets/images/avatars/{$photos}" class="msg-photo" alt="{$obj["nom_personne"]}" height="32" width="32"/>
                </td>
                <td>{$obj["nom_personne"]}</td>
                <td>{$obj["tel"]}</td>
                <td>{$obj["adress"]}</td>
                <td>{$obj["genre_personne"]}</td>
                <td> </td>

                <td>
                    <div class="btn-group project-list-action">
                        <a href="{$url_base}Projet/manage/1"  title="Manager Projet" class="btn btn-white btn-action btn-xs">  <i class="ace-icon fa fa-check bigger-120 orange" ></i> View</a>
                        <a href="#"   href="#modal-form" role="button" title="Editer Projet"class="btn btn-white btn-xs">  <i class="ace-icon fa fa-pencil bigger-120 blue"></i> Edit</a>
                        <a href="{$url_base}Projet/delete/1"  title="Supprimer Projet" class="btn btn-default btn-xs">  <i class="ace-icon fa fa-trash bigger-120 red"> Delete</i></a>
                    </div>
                </td>
            </tr>
        {/foreach}

    {else}
        <tr>
            <td colspan="4">

                Liste vide
            </td>
        </tr>

    {/if}
{/if}


</tbody>