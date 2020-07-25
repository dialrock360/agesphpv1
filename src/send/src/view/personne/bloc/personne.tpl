<input class="form-control" type="hidden" name="id" value="{if isset($personne)} {$personne['id']}{else}0{/if}"  id="id" placeholder="id"   />
<input class="form-control" type="hidden" name="id_service" value="{if isset($personne)} {$personne['id_service']}{else}1{/if}"  id="id_service" placeholder="id_service"   />
<input class="form-control" type="hidden" name="flag_personne" value="{if isset($personne)} {$personne['flag_personne']}{else}0{/if}"  id="flag_personne" placeholder="flag_personne"   />

<div class="row" style="background-color:lightskyblue;" >
    <div class="col-sm-6" >

        <div class="form-group">

            <label class="control-label">photo_personne de personne</label>
            <input class="form-control" type="file" name="photo_personne"  value="{if isset($personne)} {$personne['photo_personne']}{else} {/if}"  id="photo_personne" placeholder="photo_personne"   />

        </div>
        <div class="form-group">

            <label class="control-label">nom_personne de personne</label>
            <input class="form-control" type="text" name="nom_personne"  value="{if isset($personne)} {$personne['nom_personne']}{else} {/if}"  id="nom_personne" placeholder="nom_personne"   />

        </div>
        <div class="form-group">

            <label class="control-label">prenom_personne de personne</label>
            <input class="form-control" type="text" name="prenom_personne"  value="{if isset($personne)} {$personne['prenom_personne']}{else} {/if}"  id="prenom_personne" placeholder="prenom_personne"   />

        </div>
        <div class="form-group">

            <label class="control-label">typepiece_personne de personne</label>
            <select name="typepiece_personne" class="form-control champ" id="typepiece_personne">
                <option selected value="{if isset($personne)} {$personne['typepiece_personne']}{else} {/if}">{if isset($personne)} {$personne['typepiece_personne']}{else} {/if}</option>
                <option selected value="cni">cni</option>
                <option selected value="passeport">passeport</option>
                <option selected value="rc">rc</option>
                <option selected value="autre">autre</option>
            </select>

        </div>
        <div class="form-group">

            <label class="control-label">numpiece_personne de personne</label>
            <input class="form-control" type="text" name="numpiece_personne"  value="{if isset($personne)} {$personne['numpiece_personne']}{else} {/if}"  id="numpiece_personne" placeholder="numpiece_personne"   />

        </div>
    </div>
    <div class="col-sm-6" >


        <div class="form-group">

            <label class="control-label">genre_personne de personne</label>
            <select name="genre_personne" class="form-control champ" id="genre_personne">
                <option selected value="{if isset($personne)} {$personne['genre_personne']}{else} {/if}">{if isset($personne)} {$personne['genre_personne']}{else} {/if}</option>
                <option selected value="homme">homme</option>
                <option selected value="femme">femme</option>
                <option selected value="entreprise">entreprise</option>
                <option selected value="autre">autre</option>
            </select>

        </div>
        <div class="form-group">

            <label class="control-label">date_naiss_personne de personne</label>
            <input class="form-control" type="date" name="date_naiss_personne" value="{if isset($personne)} {$personne['date_naiss_personne']}{else} {/if}"  id="date_naiss_personne" placeholder="date_naiss_personne"   />

        </div>
        <div class="form-group">

            <label class="control-label">lieu_naiss_personne de personne</label>
            <input class="form-control" type="text" name="lieu_naiss_personne"  value="{if isset($personne)} {$personne['lieu_naiss_personne']}{else} {/if}"  id="lieu_naiss_personne" placeholder="lieu_naiss_personne"   />

        </div>
        <div class="form-group">

            <label class="control-label">nationalite_personne de personne</label>
            <input class="form-control" type="text" name="nationalite_personne"  value="{if isset($personne)} {$personne['nationalite_personne']}{else} {/if}"  id="nationalite_personne" placeholder="nationalite_personne"   />

        </div>

        <div class="form-group">

            <label class="control-label">details_personne de personne</label>
            <textarea rows="5" name="details_personne" id="details_personne"> {if isset($personne)} {$personne['details_personne']}{else} {/if} </textarea>

        </div>
    </div>
</div>



