

<small>
    <div class="btn-group">

        <span class="label  label-white  ">
         <a href="{$url_base}Logistique/listeAchat/{$smarty.session.user.id_service}" class="btn btn-white btn-primary">Achats</a>
        <a href="{$url_base}Logistique/listeCommande/{$smarty.session.user.id_service}"   class="btn btn-white btn-success">Commandes</a>
        <a href="{$url_base}Logistique/listeDemandepro/{$smarty.session.user.id_service}"    class="btn btn-white btn-warning">Demande de proforma</a>
        </span>
        <span class="label  label-white  ">

        <a href="{$url_base}Logistique/listeFournisseur/{$smarty.session.user.id_service}"    class="btn btn-white">Fournissseurs</a>
        <a href="{$url_base}Logistique/listeMaterielle/{$smarty.session.user.id_service}"   class="btn btn-white btn-info">Resources</a>
        </span>
        <span class="label  label-white  ">

        <a   href="{$url_base}Logistique/Reception/{$smarty.session.user.id_service}"  class="btn btn-white btn-purple">Reception</a>

        </span>
    </div>

</small>