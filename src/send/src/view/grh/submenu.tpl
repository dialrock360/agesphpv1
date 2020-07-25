

<small>
    <div class="btn-group">

        <span class="label  label-white  ">
         <a href="{$url_base}Rh/employee" class="btn btn-white btn-primary">Employés</a>
        <a href="{$url_base}Rh/stagiaire"  class="btn btn-white btn-success">Stagiaires</a>
        <a href="{$url_base}Rh/prestataire"   class="btn btn-white btn-warning">Prestataires</a>
        </span>
        <span class="label  label-white  ">

        <a href="{$url_base}Rh/formation/{$smarty.session.user.id_service}"   class="btn btn-white">Formation</a>
        <a href="{$url_base}Rh/recrutement/{$smarty.session.user.id_service}"  class="btn btn-white btn-info">Recrutement</a>
        </span>
        <span class="label  label-white  ">

        <a  href="{$url_base}Rh/formrh/presence"  class="btn btn-white btn-purple">Presence</a>
        <a  href="{$url_base}Rh/formrh/conge" class="btn btn-white btn-pink">Congé</a>
        <a href="{$url_base}Rh/paie/{$smarty.session.user.id_service}"   class="btn btn-white btn-danger">Paie</a>

        </span>
    </div>

</small>