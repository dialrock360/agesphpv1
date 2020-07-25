
<div class="form-group">
    <div class="checkbox">
        <label>
            <input  type="hidden" name="curendatabasename" value="{$activedb}"   />
            <input class="form-control" type="checkbox" name="use_curendatabase" value="yes" id="use_curendatabase"  />
            <input  type="hidden" name="addmethode" id="addmode" value="1"   />
            Utiliser la base de données courante
        </label>
    </div>
</div>
<fieldset id="selectetcurendatabase">
    <div class="form-group" >


        {if isset($databases)}
            <select class="form-control" name="otherdatabasename" id="databasename">
                <option selected disabled>Choisir la base de Données</option>
                {foreach from=$databases item=db}
                    <option value="{$db['dbname']}">{$db['dbname']}</option>
                {/foreach}
            </select>
        {/if}
    </div>
    {if isset($active) && $active==4}
    <div class="form-group">
        <div class="checkbox">

            <div class="row">
                <div class="col-sm-6"><label >Options</label></div>
                <div class="col-sm-3"><label class="checkbox-inline" ch><input type="checkbox"  name="getter" value="1" checked>Getter</label></div>
                <div class="col-sm-3"><label class="checkbox-inline"><input type="checkbox" name="setter" value="1" checked>Setter</label></div>
            </div>




        </div>
    </div>
    {/if}
</fieldset>

<script>

    $(document).ready(function(){
        /*$('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                alert("Checkbox is checked.");
            }
            else if($(this).prop("checked") == false){
                alert("Checkbox is unchecked.");
            }
        });*/
        $("#use_curendatabase").change(function() {
            if(this.checked) {

                //Do stuff
                $("#selectetcurendatabase").slideUp("500");
                $("#addmode").val(0);
            }else {

                $("#selectetcurendatabase").slideDown("500");
                $("#addmode").val(1);
            }
        });
    });


</script>