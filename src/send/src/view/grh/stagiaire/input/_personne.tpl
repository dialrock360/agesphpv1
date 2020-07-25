<div class="col-xs-12 col-sm-3 center">
    <div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Stagiaire's Avatar" src="{$url_base}public/assets/images/avatars/uploadimge.png" />
												</span>

        <div class="space-4"></div>


    </div>

    <div class="space-6"></div>

    <div class="profile-contact-info">
        <div class="profile-contact-links align-left">
            <div class="btn btn-link" >
                <table class="table table-striped">

                    <tbody>
                    <tr>
                        <td>Prenom</td>
                        <td>
                            <input class="form-control" type="text" name="prenom_personne" value="{if isset($personne)} {$personne['prenom_personne']} {/if}" id="prenom_personne"/>

                        </td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>
                            <input class="form-control" type="text" name="nom_personne" value="{if isset($personne)} {$personne['nom_personne']} {/if}" id="nom_personne"/>

                        </td>
                    </tr>
                    <tr>
                        <td>Nature</td>
                        <td>
                            <select name="genre_personne" class="form-control champ" >
                                <option selected value="{$personne['genre_personne']}">{if isset($personne)} {$personne['genre_personne']}   {/if}</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>


    </div>

    <div class="hr hr12 dotted"></div>

    <div class="clearfix">
        <div class="grid2">
            <span class="bigger-175 blue">Piece d'identité </span>

            <br />
            <select name="typepiece_personne" class="form-control champ" >
                <option selected value="{$personne['typepiece_personne']}">{if isset($personne)} {$personne['typepiece_personne']}   {/if}</option>
                <option value="CNI">CNI</option>
                <option value="PASSEPORT">PASSEPORT</option>
                <option value="Autre">Autre</option>
            </select>
        </div>

        <div class="grid2">
            <span class="bigger-175 blue"> Numero</span>

            <br />
            <input class="form-control" type="text" placeholder="Numero de la piece" name="numpiece_personne" value="{if isset($personne)} {$personne['numpiece_personne']} {/if}" id="numpiece_personne"/>
        </div>
    </div>

    <div class="hr hr16 dotted"></div>
</div>

