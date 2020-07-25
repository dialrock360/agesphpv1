

<div class="row">
    <div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">
        {if isset($ok)}
            {if $ok != 0}
                <div class="alert alert-success">Données ajoutées!</div>
            {else}
                <div class="alert alert-danger">Erreur!</div>
            {/if}
        {/if}
        <form method="post" class="form-horizontal" action="{$url_base}Stokage/postfaille" enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="id" value="0" id="id"/>

            <div class="form-group">
                <label class="control-label">valeur de test</label>
                <input class="form-control" type="text" name="valeur" id="valeur"/>
            </div>
            <div class="form-group">
                <label class="control-label">fichier de test</label>
                <input class="form-control" type="file" name="image" id="image"/>
            </div>
            


            <div class="form-group">
                <input class="btn btn-success" type="submit" name="valider" value="Envoyer"/>
                <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>
            </div>

        </form>
    </div>
</div>


{include file='src/view/service/xss/liste.tpl'}