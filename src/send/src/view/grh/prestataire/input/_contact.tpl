


<div class="profile-user-info profile-user-info-striped">
    <div class="profile-info-row">
        <div class="profile-info-name"> Telephones </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="tel" value="{if isset($cordonnees)} {$cordonnees['tel']} {/if}" id="tel"/>

        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Adresse </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="adress" value="{if isset($cordonnees)} {$cordonnees['adress']} {/if}" id="adress"/>

        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name">  Code postal </div>

        <div class="profile-info-value">
            <input class="form-control" type="text" name="codepostal" value="{if isset($cordonnees)} {$cordonnees['codepostal']} {/if}" id="codepostal"/>

        </div>
    </div>


    <div class="profile-info-row">
        <div class="profile-info-name"> etat_civile</div>

        <div class="profile-info-value">
            <select name="etat_civile" class="form-control champ" >
                <option selected value="{$cordonnees['etat_civile']}">{if isset($cordonnees)} {$cordonnees['etat_civile']}   {/if}</option>

                <option value="Célibataire">Célibataire</option>
                <option value="En couple">En couple </option>
                <option value="Mariée(e)">Mariée(e)  </option>
            </select>
        </div>
    </div>
    <div class="profile-info-row">
        <div class="profile-info-name"> Contact </div>

        <div class="profile-info-value">
            <label id="contact_urgent"> Personne à contacter en cas d'urgence</label>
            <input class="form-control" type="text" name="contact_urgent" value="{if isset($cordonnees)} {$cordonnees['contact_urgent']} {/if}" id="contact_urgent"/>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Details </div>

        <div class="profile-info-value">
            <label id="contact_urgent"> Informations utiles</label>
            <textarea class="form-control" rows="3" name="details_personne" id="details_personne">{if isset($cordonnees)} {$cordonnees['details_personne']} {/if}</textarea>

        </div>
    </div>
</div>