
<div id="home" class="tab-pane in active">
    <div class="row">
        <div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="Employee's Avatar" id="avatar2"  src="{$url_base}public/assets/images/avatars/uploadimge.png"/>
															</span>

            <div class="space space-4"></div>
            <div class="profile-info-value">
                <a href="#" class="btn btn-sm btn-block btn-success">
                    <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                    <span class="bigger-110">Ajouter departement</span>

                </a>
                <label for="departement_id"> Choisire departement </label>
                <select name="departement_id" id="departement_id" class="form-control champ" >
                    <option selected value="{$personne['departement_id']}">{if isset($personne)} {$personne['nom_departement']}   {/if}</option>
                    {foreach from=$departements item=champ}
                        <option value="{$champ['id']}">{$champ['nom_departement']}  </option>
                    {/foreach}
                </select>
            </div>



        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-9">
            <h4 class="blue">
                <span class="middle">Information Peronnelles</span>


            </h4>

            <div class="profile-user-info">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Prenom </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="text" name="prenom_personne" value="{if isset($personne)} {$personne['prenom_personne']} {/if}" id="prenom_personne"/>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Nom </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="text" name="nom_personne" value="{if isset($personne)} {$personne['nom_personne']} {/if}" id="nom_personne"/>

                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Nature </div>

                    <div class="profile-info-value">
                        <select name="genre_personne" class="form-control champ" >
                            <option selected value="{$personne['genre_personne']}">{if isset($personne)} {$personne['genre_personne']}   {/if}</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Date de naissance </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="date" name="date_naiss_personne" value="{if isset($personne)} {$personne['date_naiss_personne']} {/if}"  id="date_naiss_personne"/>

                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name">  Lieu de naissance  </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="text" name="lieu_naiss_personne" value="{if isset($personne)} {$personne['lieu_naiss_personne']} {/if}" id="lieu_naiss_personne"/>

                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Nationalité </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="text" name="nationalite_personne" value="{if isset($personne)} {$personne['nationalite_personne']} {/if}" id="nationalite_personne"/>
                    </div>
                </div>


            </div>

            <div class="hr hr-8 dotted"></div>

            <div class="profile-user-info">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Piece d'identité </div>

                    <div class="profile-info-value">
                        <select name="typepiece_personne" class="form-control champ" >
                            <option selected value="{$personne['typepiece_personne']}">{if isset($personne)} {$personne['typepiece_personne']}   {/if}</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSEPORT">PASSEPORT</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name">
                        Numero de la piece
                    </div>

                    <div class="profile-info-value">
                        <input class="form-control" type="text" name="numpiece_personne" value="{if isset($personne)} {$personne['numpiece_personne']} {/if}" id="numpiece_personne"/>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name">
                        <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                    </div>

                    <div class="profile-info-value">
                        <a href="#">Follow me on Twitter</a>
                    </div>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="space-20"></div>

</div><!-- /#home -->