
<div class="{if $status!='stagiaire'} hide {/if} ">
    <div id="user-profile-1" class="user-profile row">

        {include file='src/view/grh/stagiaire/input/_personne.tpl'}

        <div class="col-xs-12 col-sm-9">

            <div class="space-12"></div>

            {include file='src/view/grh/prestataire/input/_contact.tpl'}

            <div class="space-20"></div>

        </div>
    </div>
</div>