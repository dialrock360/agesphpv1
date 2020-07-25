<div class="profile-user-info profile-user-info-striped">

    <div class="profile-info-row">
        <div class="profile-info-name"> Telephones </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="tel"  value="{if isset($personne)} {$personne['tel']} {/if}" id="tel" required/>
            <input class="form-control" type="hidden" name="etat_civile"  value="{if isset($personne)} {$personne['etat_civile']} {/if}" id="etat_civile"/>
            <input class="form-control" type="hidden" name="id_service"  value="{if isset($id_service)} {$id_service} {/if}" id="id_service"/>
            <input class="form-control" type="hidden" name="nbr_conjoint" value="0" id="nbr_conjoint"/>
            <input class="form-control" type="hidden" name="info_conjoint" value="0" id="info_conjoint"/>
            <input class="form-control" type="hidden" name="nbr_enfant" value="0" id="nbr_enfant"/>
            <input class="form-control" type="hidden" name="flag_contact" value="0" id="flag_contact"/>

        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Adresse </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="adress"  value="{if isset($personne)} {$personne['adress']} {/if}" id="adress" required/>

        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name">  Code postal </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="codepostal"  value="{if isset($personne)} {$personne['codepostal']} {/if}" id="codepostal"/>
            <input class="form-control" type="hidden" name="etat_civile"  value="{if isset($personne)} {$personne['etat_civile']} {/if}" id="etat_civile"/>

        </div>
    </div>


    <div class="profile-info-row">
        <div class="profile-info-name"> Contact </div>

        <div class="profile-info-value">
            <label id="contact_urgent"> Personnes à contacter ou representant de l'entreprise en cas de personne morale</label>
            <input class="form-control" type="text" name="contact_urgent"  value="{if isset($personne)} {$personne['contact_urgent']} {/if}" id="contact_urgent"/>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Details </div>

        <div class="profile-info-value">
            <label id="contact_urgent"> Informations suplementaire</label>
            <textarea class="form-control" rows="5" name="details_personne" id="details_personne">{if isset($personne)} {$personne['details_personne']} {/if}</textarea>

        </div>
    </div>
</div>