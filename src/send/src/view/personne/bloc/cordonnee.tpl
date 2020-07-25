
        <input class="form-control" type="hidden" name="id" value="{if isset($personne)} {$personne['id']}{else}0{/if}"  id="id" placeholder="id"   />
        <input class="form-control" type="hidden" name="personne_id" value="{if isset($personne)} {$personne['personne_id']}{else}0{/if}"  id="personne_id" placeholder="personne_id"   />
        <input class="form-control" type="hidden" name="flag_contact" value="{if isset($personne)} {$personne['flag_contact']}{else}0{/if}"  id="flag_contact" placeholder="flag_contact"   />


        <div class="row" style="background-color:yellow;" >
            <div class="col-sm-6" >

                <div class="form-group">

                    <label class="control-label">tel de cordonnees</label>

                    <input class="form-control" type="tel" name="tel"  value=""  id="tel" required placeholder="tel"   />

                </div>

                <div class="form-group">

                    <label class="control-label">adress de personne</label>
                    <input class="form-control" type="text" name="adress"  value="{if isset($personne)} {$personne['adress']}{else} {/if}"  id="adress" placeholder="adress"   />

                </div>
                <div class="form-group">

                    <label class="control-label">email_personne de personne</label>
                    <input class="form-control" type="text" name="email_personne"  value="{if isset($personne)} {$personne['email_personne']}{else} {/if}"  id="email_personne" placeholder="email_personne"   />

                </div>
                <div class="form-group">

                    <label class="control-label">codepostal de personne</label>
                    <input class="form-control" type="text" name="codepostal"  value="{if isset($personne)} {$personne['codepostal']}{else} {/if}"  id="codepostal" placeholder="codepostal"   />

                </div>
                <div class="form-group">

                    <label class="control-label">contact_urgent de personne</label>
                    <textarea rows="5" name="contact_urgent" id="contact_urgent"> {if isset($personne)} {$personne['contact_urgent']}{else} {/if} </textarea>

                </div>
                <div class="form-group">

                    <label class="control-label">etat_civile de personne</label>
                    <input class="form-control" type="text" name="etat_civile"  value="{if isset($personne)} {$personne['etat_civile']}{else} {/if}"  id="etat_civile" placeholder="etat_civile"   />

                </div>
            </div>
            <div class="col-sm-6" >


                <div class="form-group">

                    <label class="control-label">nbr_conjoint de personne</label>
                    <input class="form-control" type="number" name="nbr_conjoint" value="{if isset($personne)} {$personne['nbr_conjoint']}{else}0{/if}"  id="nbr_conjoint" placeholder="nbr_conjoint"   />

                </div>
                <div class="form-group">

                    <label class="control-label">nbr_enfant de personne</label>
                    <input class="form-control" type="number" name="nbr_enfant" value="{if isset($personne)} {$personne['nbr_enfant']}{else}0{/if}"  id="nbr_enfant" placeholder="nbr_enfant"   />

                </div>

                <div class="form-group">

                    <label class="control-label">info_conjoint de personne</label>
                    <textarea rows="5" name="info_conjoint" id="info_conjoint"> {if isset($personne)} {$personne['info_conjoint']}{else} {/if} </textarea>

                </div>

            </div>
        </div>