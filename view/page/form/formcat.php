<style>
   #closehidencat,#AcatI, .hidencat{
        display: none;
    }
   #borderles td {
       border: 0;
   }
</style>

<div class="row">
    <div class="col-sm-11" style="margin-left: 3%">

        <div class="table-responsive" id="myTablecat">

            <table class="table">
                <caption>Liste Des Categorie D'Articles</caption>

                <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" value="1" name="total" />

                    <thead>

                    <tr>
                        <th>
                         <span class="input-icon">
									<input type="text" placeholder="Nom de la Catégorie" class="nav-search-input" id="Catinput" onkeyup="mycatFunction()"  autocomplete="off" name="3name1" required="true"/>
									<i class="ace-icon fa fa-search nav-search-icon " id="ScatI"></i>
									<i class="ace-icon fa fa-plus nav-search-icon" id="AcatI"></i>
                 </span>
                        </th>
                        <th>
                            <div class="showcat"> Famille</div>
                            <div  class="hidencat">
                                <select id="selectcat" data-native-menu="false" class="form-control" name="1name1"  data-placeholder="Famille des Articles" required>

                                    <option value=”” disabled selected>Familles des Articles</option>

                                    <?php
                                    echo $Optionfam;
                                    ?>
                                </select>
                            </div>
                        </th>

                        <th>
                            Achetable
                            <div  class="hidencat">
                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch" name="4name1" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
                        </th>
                        <th>Vendable
                            <div  class="hidencat">

                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch2" name="5name1" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch2">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
                        </th>
                        <th>
                            Comptabilisé
                            <div  class="hidencat">

                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch2" name="6name1" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch2">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="showcat">
                                <input type="checkbox"  id="checkAllcat">
                                <a id="getMCat" onclick="getMCat()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit  bigger-120 green"></i></span> </a>

                                <a id="getDCat" onclick="getDCat()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash  bigger-120 red "></i></span></a>
                                <a id="showhidencat" onClick=" $('button#closehidencat').slideDown(500);$('a#showhidencat').slideUp(500);$('div.showcat').slideUp(600);$('div.hidencat').slideDown(600);$('i#AcatI').slideDown(600);$('i#ScatI').slideUp(600);"  href="javascript:void(0)" data-toggle="tooltip" title="Ajouter une Categorie D'Articles"><span> <i class="glyphicon glyphicon-plus  bigger-120 blue"></i></span> </a>

                            </div>
                            <div  class="hidencat">
                                <button type="submit" class="btn btn-info btn-xs  "  name="msavecat" >
                                    <i class="ace-icon fa fa-key bigger-110"></i>Valider
                                </button>
                                <button type="button" class="btn btn-danger btn-xs  "  id="closehidencat" onClick=" $('a#showhidencat').slideDown(500);$('div.showcat').slideDown(600);$('button#closehidencat').slideUp(500);$('div.hidencat').slideUp(600);$('i#AcatI').slideUp(600);$('i#ScatI').slideDown(600);"  >
                                    <i class="glyphicon glyphicon-off black bigger-110"></i>Fermer
                                </button>

                            </div>
                        </th>
                    </tr>
                    </thead>

                </form>
                <tbody id="mycatTable">

                <?php


                //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1

                $countref = $catdb->listecat();
                if($countref !=null)
                {

                    foreach($countref as $row )
                    {
                        extract($row);

                        ?>

                        <tr>
                            <td><?php echo $NOM_CAT; ?></td>
                            <td><?php  echo $DESI; ?></td>
                            <td>
                                <?php
                                if($ACHAT==1){
                                    echo 'OUI';

                                }if($ACHAT==0){
                                    echo 'NON';

                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($VENTE==1){
                                    echo 'OUI';

                                }if($VENTE==0){
                                    echo 'NON';

                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($COMPT==1){
                                    echo 'OUI';

                                }if($COMPT==0){
                                    echo 'NON';

                                }
                                ?>
                            </td>
                            <td>
                                <input type="checkbox" name="chkprd[]"  class="checkcat" value="<?php echo $ID_CAT; ?>"  />

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $ID_CAT; ?>" id="getCat" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <?php
                        $val='cat';
                        if($catdb->nbr_prd($ID_CAT)<=0){
                            ?>
                            <a class="delete_cat" data-id="<?php echo $ID_CAT; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                <i class="glyphicon glyphicon-trash red"></i>
                            </a>
                            <?php
                        }else{
                            ?>
                                <i class="glyphicon glyphicon-trash blac"></i>
                        <?php
                        }
                                ?>

                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
