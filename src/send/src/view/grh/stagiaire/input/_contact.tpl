
<div id="feed" class="tab-pane">
    <div class="profile-feed row">


        <div class="col-sm-6">

            <div class="profile-user-info profile-user-info-striped">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Telephones </div>

                    <div class="profile-info-value">
                        <i class="fa fa-phone light-blue bigger-110"></i>

                        <input class="form-control" type="text" name="tel" value="{if isset($cordonnees)} {$cordonnees['tel']} {/if}" id="tel"/>

                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Adresse </div>

                    <div class="profile-info-value">
                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                        <span  >
                                                                            <input class="form-control" type="text" name="adress" value="{if isset($cordonnees)} {$cordonnees['adress']} {/if}" id="adress"/>

                        </span>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name"> Code postal </div>

                    <div class="profile-info-value">

                        <i class="fa fa-barcode light-red bigger-110"></i>
                        <input class="form-control" type="text" name="codepostal" value="{if isset($cordonnees)} {$cordonnees['codepostal']} {/if}" id="codepostal"/>
                    </div>
                </div>


                <div class="profile-info-row">
                    <div class="profile-info-name">Contact urgent</div>

                    <div class="profile-info-value">
                        <label id="contact_urgent"> Personne à contacter en cas d'urgence</label>
                        <textarea class="form-control" rows="3" name="contact_urgent" id="contact_urgent">{if isset($cordonnees)} {$cordonnees['contact_urgent']} {/if}</textarea>

                    </div>
                </div>


            </div>
        </div><!-- /.col -->
        <div class="col-sm-6">

            <div class="profile-user-info profile-user-info-striped">


                <div class="profile-info-row">
                    <div class="profile-info-name"> État matrimonial  </div>

                    <div class="profile-info-value">

                        <i class="fa fa-comments-o light-blue2 bigger-110"></i>
                        <select name="etat_civile" class="form-control champ" >
                            <option selected value="{$cordonnees['etat_civile']}">{if isset($cordonnees)} {$cordonnees['etat_civile']}   {/if}</option>

                            <option value="Célibataire">Célibataire</option>
                            <option value="En couple">En couple </option>
                            <option value="Mariée(e)">Mariée(e)  </option>
                        </select>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> Nombre d'enfant </div>

                    <div class="profile-info-value">
                        <i class="fa fa-users light-orange bigger-110"></i>
                        <input class="form-control" type="number" name="nbr_enfant" value="{if isset($cordonnees)} {$cordonnees['nbr_enfant']} {/if}"  id="nbr_enfant"/>
                    </div>
                </div>


                <div class="profile-info-row">
                    <div class="profile-info-name"> Nombre de conjoint(e)(s) </div>

                    <div class="profile-info-value">

                        <i class="fa fa-exclamation-circle light-red bigger-110"></i>
                        <input class="form-control" type="number" name="nbr_conjoint" value="{if isset($cordonnees)} {$cordonnees['nbr_conjoint']} {/if}"  id="nbr_conjoint"/>
                    </div>
                </div>

                <div class="profile-info-row">
                    <div class="profile-info-name">Infos conjoints</div>

                    <div class="profile-info-value">

                        <label class="info_conjoint">Noms et Premoms des conjoint(e)(s)</label>
                        <textarea class="form-control" rows="3" name="info_conjoint" id="comment">{if isset($cordonnees)} {$cordonnees['info_conjoint']} {/if}</textarea>

                    </div>
                </div>

            </div>
        </div><!-- /.col -->







    </div><!-- /.row -->

    <div class="space-12"></div>

    <div class="center">
        <div class="profile-user-info profile-user-info-striped">


            <div class="profile-info-row">
                <div class="profile-info-name">Details</div>

                <div class="profile-info-value">
                    <label id="contact_urgent"> Informations ou details suppplementaire sur la personne </label>
                    <textarea class="form-control" rows="6" name="info_personne" id="comment">{if isset($cordonnees)} {$cordonnees['info_personne']} {/if}</textarea>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#feed -->