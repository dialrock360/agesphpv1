
<div class="row">
    <div class="col-xs-12">

        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"><h4 class="widget-title blue smaller">
                        <i class="ace-icon fa  fa-filter orange"></i>
                        Informations d'embauche
                    </h4>
                </h4>
                <input class="form-control" type="hidden" name="etat_contrat" value="{if isset($personne)} {$personne['etat_contrat']} {/if}"  id="etat_contrat"/>

                <span class="widget-toolbar">


														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

													</span>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div>
                        <label for="metier">
                           Metier principal
                        </label>

                        <div class="input-group">
                            <input class="form-control" type="text" name="metier" value="{if isset($personne)} {$personne['metier']} {/if}" id="metier"/>

                            <span class="input-group-btn">
																	<label for="metier" class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa  fa-certificate bigger-110"></i>
																	</label>
																</span>
                        </div>
                    </div>
                    <div>
                        <label for="metier">
                           Numero de securite social
                        </label>

                        <div class="input-group">
                            <input class="form-control" type="text" name="numsecu_sire" value="{if isset($personne)} {$personne['numsecu_sire']} {/if}" id="metier"/>

                            <span class="input-group-btn">
																	<label for="metier" class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa  fa-codepen bigger-110"></i>
																	</label>
																</span>
                        </div>
                    </div>
                    <div>
                        <label for="type_contrat_id">
                           Type de contrat
                        </label>

                        <select class="form-control" name="type_contrat_id" id="type_contrat_id">

                            {if isset($type_contrats)}
                                {if $type_contrats != null}

                                        {foreach from=$type_contrats item=champ}
                                            <option value="{$champ['id']}">{$champ['nom_type_contrat']}  </option>
                                        {/foreach}

                                {else}
                                    <option  >   Liste vide</option>

                                {/if}
                            {/if}
                        </select>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-6"  >
                            <div>
                                <label for="datedebut">
                                    Date debut contract
                                </label>

                                <div class="input-group">
                                    <input class="form-control" type="date" name="datedebut" value="{if isset($contrat)} {$contrat['datedebut']} {/if}"  id="datedebut"/>

                                    <span class="input-group-btn">
																	<label for="datedebut" class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa fa-calendar bigger-110"></i>
																	</label>
																</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"  >
                            <div>
                                <label for="datefin">
                                    Date fin contract
                                </label>

                                <div class="input-group">
                                    <input class="form-control" type="date" name="datefin" value="{if isset($contrat)} {$contrat['datefin']} {/if}"  id="datefin"/>

                                    <span class="input-group-btn">
																	<label for="datefin" class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa fa-calendar bigger-110"></i>
																	</label>
																</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr />
                    <div>



                        <div class="row">
                            <div class="col-sm-6"  >
                                <label for="duree_essai">
                                    Durée essai (en Jours)
                                </label>

                                <div class="input-group">

                                    <input class="form-control" type="number" name="duree_essai" value="{if isset($contrat)} {$contrat['duree_essai']} {/if}"  id="duree_essai"/>

                                </div>
                            </div>
                            <div class="col-sm-6"  >
                                <label for="duree_essai">
                                    Temps de preavie avant demande conger (en Jours)
                                </label>

                                <div class="input-group">

                                    <input class="form-control" type="number" name="duree_essai" value="{if isset($contrat)} {$contrat['duree_essai']} {/if}"  id="duree_essai"/>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- PAGE CONTENT BEGINS -->


    </div><!-- /.col -->
</div><!-- /.row -->