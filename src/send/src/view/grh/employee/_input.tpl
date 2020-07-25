
<input class="form-control" type="hidden" name="id" value="{if isset($employee)} {$employee['id']} {/if}" id="id"/>
<div class="form-group">
    <label class="control-label">Liste de Departements </label>
    <select name="id_departement" class="form-control champ" >                                                <option selected value="{$employee['id_departement']}">{if isset($employee)} {$employee['id_departement']}   {/if}</option>
        {foreach from=$departements item=champ}
            <option value="{$champ['id']}">{$champ['id_service']}  </option>
        {/foreach}
    </select>
</div>
<div class="form-group">
    <label class="control-label">id_categorie_pro de Employee</label>
    <input class="form-control" type="number" name="id_categorie_pro" value="{if isset($employee)} {$employee['id_categorie_pro']} {/if}"  id="id_categorie_pro"/>
</div>
<div class="form-group">
    <label class="control-label">id_ruperieur_hierarchique de Employee</label>
    <input class="form-control" type="number" name="id_ruperieur_hierarchique" value="{if isset($employee)} {$employee['id_ruperieur_hierarchique']} {/if}"  id="id_ruperieur_hierarchique"/>
</div>
<div class="form-group">
    <label class="control-label">avatar_employe de Employee</label>
    <input class="form-control" type="text" name="avatar_employe" value="{if isset($employee)} {$employee['avatar_employe']} {/if}" id="avatar_employe"/>
</div>
<div class="form-group">
    <label class="control-label">matricul_employee de Employee</label>
    <input class="form-control" type="text" name="matricul_employee" value="{if isset($employee)} {$employee['matricul_employee']} {/if}" id="matricul_employee"/>
</div>
<div class="form-group">
    <label class="control-label">cv_employee de Employee</label>
    <input class="form-control" type="text" name="cv_employee" value="{if isset($employee)} {$employee['cv_employee']} {/if}" id="cv_employee"/>
</div>
<div class="form-group">
    <label class="control-label">salaire_employee de Employee</label>
    <input class="form-control" type="number" name="salaire_employee" value="{if isset($employee)} {$employee['salaire_employee']} {/if}"  id="salaire_employee"/>
</div>
<div class="form-group">
    <label class="control-label">nom_employee de Employee</label>
    <input class="form-control" type="text" name="nom_employee" value="{if isset($employee)} {$employee['nom_employee']} {/if}" id="nom_employee"/>
</div>
<div class="form-group">
    <label class="control-label">nature_employee de Employee</label>
    <input class="form-control" type="text" name="nature_employee" value="{if isset($employee)} {$employee['nature_employee']} {/if}" id="nature_employee"/>
</div>
<div class="form-group">
    <label class="control-label">tel_employee de Employee</label>
    <input class="form-control" type="text" name="tel_employee" value="{if isset($employee)} {$employee['tel_employee']} {/if}" id="tel_employee"/>
</div>
<div class="form-group">
    <label class="control-label">email_employee de Employee</label>
    <input class="form-control" type="text" name="email_employee" value="{if isset($employee)} {$employee['email_employee']} {/if}" id="email_employee"/>
</div>
<div class="form-group">
    <label class="control-label">info_employee de Employee</label>
    <input class="form-control" type="text" name="info_employee" value="{if isset($employee)} {$employee['info_employee']} {/if}" id="info_employee"/>
</div>
<div class="form-group">
    <label class="control-label">flag_employee de Employee</label>
    <input class="form-control" type="text" name="flag_employee" value="{if isset($employee)} {$employee['flag_employee']} {/if}" id="flag_employee"/>
</div>





<fieldset>
        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
        </label>

        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
        </label>

        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
        </label>

        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
        </label>

        <label class="block">
            <input type="checkbox" class="ace" />
            <span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
        </label>

        <div class="space-24"></div>

        <div class="clearfix">
            <button type="reset" class="width-30 pull-left btn btn-sm">
                <i class="ace-icon fa fa-refresh"></i>
                <span class="bigger-110">Reset</span>
            </button>

            <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                <span class="bigger-110">Register</span>

                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>
        </div>
    </fieldset>