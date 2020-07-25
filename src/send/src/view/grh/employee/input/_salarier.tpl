
<div class="row">

    <div class="col-xs-12">

        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">
                    <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa  fa-gavel orange"></i>
                        Modalites de travail
                    </h4>
                </h4>

                <span class="widget-toolbar">


														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

													</span>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="profile-user-info profile-user-info-striped">

                        <div class="profile-info-row">
                            <div class="profile-info-name">Poste</div>

                            <div class="profile-info-value">
                                <select class="form-control" name="poste_id" >
                                    <option selected value="{$personne['poste_id']}">{if isset($personne)} {$personne['poste_id']}   {/if}</option>
                                    {foreach from=$postes item=champ}
                                        <option value="{$champ['id']}">{$champ['nom_poste']}  </option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Temps de travail </div>

                            <div class="profile-info-value">
                                <select class="form-control" name="temps_travail" >
                                    <option selected value="{$personne['temps_travail']}">{if isset($personne)} {$personne['temps_travail']}   {/if}</option>
                                    <option value="Complet">Complet</option>
                                    <option value="Domicile">Domicile</option>
                                    <option value="Intermitent">Intermitent</option>
                                    <option value="Partiel">Partiel</option>
                                    <option value="Rappel">Rappel</option>
                                </select>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name">Nombre d'heures de travail</div>

                            <label class="profile-info-value">

                                <div class="row">
                                    <div class="col-sm-5"  >
                                        <input class="form-control" type="number" name="nbr_heur_travail" value="{if isset($salarier)} {$salarier['nbr_heur_travail']} {/if}"  id="nbr_heur_travail"/>

                                    </div>
                                    <div class="col-sm-2" style="background-color:orange;">Par</div>
                                    <div class="col-sm-5"  >

                                        <select class="form-control" name="freq_travail" >
                                            <option selected value="{$personne['freq_travail']}">{if isset($personne)} {$personne['freq_travail']}   {/if}</option>
                                            <option value="Jour">Jour</option>
                                            <option value="Hebdomadaire">Hebdomadaire</option>
                                            <option value="Mensuel">Mensuel</option>
                                        </select>
                                    </div>
                                </div>
                        </div>


                        <div class="profile-info-row">
                            <div class="profile-info-name"> Heures sup  </div>

                            <label class="profile-info-value">
                                <label> Nombre de jour de congé par mois tavaillé </label>
                                <input class="form-control" type="number" min="0.5" step="0.5" max="8" name="nbr_jr_conge_par_mois_tavail" value="{if isset($contrat)} {$contrat['nbr_jr_conge_par_mois_tavail']} {/if}"  id="nbr_jr_conge_par_mois_tavail"/>

                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Heures sup  </div>

                            <label class="profile-info-value">
                                <label> Prix des heur Supplementaire </label>
                            <input class="form-control" type="number" name="prix_heur_sup" value="{if isset($salarier)} {$salarier['prix_heur_sup']} {/if}"  id="prix_heur_sup"/>

                        </div>



                        <div class="profile-info-row">
                            <div class="profile-info-name"> Avantages </div>

                            <div class="profile-info-value">
                                <hr/>
                                <label> Avantages de service </label>
                                <div>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]" = "inlineCheckbox1" value = "Restaurant"> Restaurant
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]" value = "Internet"> Internet
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]" value = "Logement"> Logement
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]"  value = "Mutuelle"> Mutuelle
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]" value = "Pourboire"> Pourboire
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]"  value = "TIC"> TIC
                                    </label>
                                    <label class = "checkbox-inline">
                                        <input type = "checkbox" name="avantage[]" value = "Transport"> Transport
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE CONTENT BEGINS -->


    </div><!-- /.col -->
</div>
