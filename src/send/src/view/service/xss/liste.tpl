
<div class="row">
    <div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">
        {if isset($tests)}
            {if $tests != null}
                <table class="table table-bordered table-stripped">
                    <caption  > LISTE DE tests</caption>
                    <tr>
                        <th>Id_service</th>
                        <th>valeur</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    {foreach from=$tests item=obj}
                        <tr>
                            <td>{$obj["id"]}</td>
                            <td>{$obj["valeur"]}</td>
                            <td><a href="{$url_base}Departement/delete/id/{$obj["id"]}">Supprimer</a></td>
                            <td><a href="{$url_base}Departement/edit/id/{$obj["id"]}"]}">Editer</a></td>
                        </tr>
                    {/foreach}
                </table>
            {else}
                Liste vide
            {/if}
        {/if}
    </div>
</div>