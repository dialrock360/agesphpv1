<div class="row">

    <div class="col-xs-12">

        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">
                    <h4 class="widget-title blue smaller">
                        <i class="ace-icon fa fa-money grey"></i>
                        Information de remuneration
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
                    <div class="row">
                        <div class="col-sm-6"  >
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">   Mode de paiement </div>

                                    <div class="profile-info-value">
                                        <select class="form-control" name="typepaie" >
                                            <option selected value="{$personne['typepaie']}">{if isset($personne)} {$personne['typepaie']}   {/if}</option>
                                            <option value="Espece">Espece</option>
                                            <option value="Check">Check</option>
                                            <option value="Virement">Virement</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> domiciliation </div>

                                    <div class="profile-info-value">
                                        <input class="form-control" type="text" name="domiciliation" value="{if isset($personne)} {$personne['domiciliation']} {/if}" id="domiciliation"/>

                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> IBAN </div>

                                    <div class="profile-info-value">
                                        <input class="form-control" type="text" name="iban" value="{if isset($personne)} {$personne['iban']} {/if}" id="iban"/>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-sm-6" style="background-color:powderblue;">

                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Type de salaire </div>

                                    <div class="profile-info-value">
                                        <div class="row">
                                            <div class="col-sm-6"  >
                                                <div class="radio">
                                                    <label>
                                                        <input name="type_salaire" type="radio" class="ace" value="Horaire" />
                                                        <span class="lbl"> Horaire</span>
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-sm-6"  >
                                                <div class="radio">
                                                    <label>
                                                        <input name="type_salaire" type="radio" class="ace" value="Forfaitaire" />
                                                        <span class="lbl"> Forfaitaire</span>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">  Salaire de base </div>

                                    <div class="profile-info-value">
                                        <div class="row">
                                            <div class="col-sm-5"  >

                                                <input class="form-control" type="number" name="salaire_base" value="{if isset($salarier)} {$salarier['salaire_base']} {/if}"  id="salaire_base"/>

                                            </div>
                                            <div class="col-sm-7"  >
                                                <div class="row">
                                                    <div class="col-sm-6"  >
                                                        <div class="radio">
                                                            <label>
                                                                <input name="nature_salaire_base" type="radio" class="ace" value="Brut" />
                                                                <span class="lbl"> Brut</span>
                                                            </label>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6"  >
                                                        <div class="radio">
                                                            <label>
                                                                <input name="nature_salaire_base" type="radio" class="ace" value="Net" />
                                                                <span class="lbl"> Net</span>
                                                            </label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
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