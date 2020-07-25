<table class="mybordered" id="recordsTable">
    <form action="<?php echo $base_url; ?>/controller/ProController.php"  method="post" enctype="multipart/form-data" >


        <input type="hidden" name="total" value="1" />
        <input type="hidden" name="5name1"  value="...." />
        <thead>

        <tr>
            <th>
                <div class="desactiver"  style="display: none">

                    <input type="file" class="form-control" name="7name1" id="id-input-file-2"  />
                    <input type="hidden" class="form-control" name="oldimg1" value="..."/>
                </div>
                <strong class="activer">Photo</strong>
            </th>
            <th>
                             <span class="input-icon desactiver" style="display: none" >
									<input type="text" placeholder="Designation " name="1name1" class="nav-search-input" id="addpinput" onkeyup="protabFunction()"  autocomplete="off"  required />
									<i class="ace-icon fa fa-plus nav-search-icon" id="inactif"></i>

                            </span>
                <span class="input-icon activer" >
									<input type="text" placeholder="Recherche" class="nav-search-input" id="prosinput"   autocomplete="off"   />
									<i class="ace-icon fa fa-search nav-search-icon " id="actif"></i>
                            </span>
            </th>
            <th>
                <input type="number" class="desactiver" id="input1"style="display: none" placeholder="Prix D'Achat" min="0" step="0.0001" class="form-control" name="3name1"  required/>
                <strong class="activer">Prix D'Achat</strong>
            </th>
            <th>
                <input type="number"class="desactiver" min="0" style="display: none" placeholder="Prix De Vente" id="input2" step="0.0001"  name="4name1"   required/>
                <strong class="activer">Prix De Vente</strong>
            </th>
            <th>

                <select  name="2name1" REQUIRED id="input3" class="desactiver" style="display: none">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                    <option value=”” disabled selected>Condis</option>
                    <?php
                    Select_Condis();
                    ?>
                </select>
                <strong class="activer">Quantités</strong>
            </th>

            <th>
                <select  name="6name1" REQUIRED id="input4" style="display: none" class="desactiver">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                    <option value=”” disabled selected>Categorie</option>
                    <?php
                    Select_Cat();
                    ?>
                </select>

                <strong class="activer"> Categories</strong>
            </th>
            <th >
                <p class="desactiver" style="display:none">

                    <button class="btn btn-white btn-info btn-bold btn-xs" type="button"  onClick="$('span.desactiver').slideUp(500);$('input.desactiver').slideUp(500);$('div.desactiver').slideUp(500);$('p.desactiver').slideUp(500);$('p#activer').slideDown(500);$('select.desactiver').slideUp(500);$('strong.activer').slideDown(500);$('span.activer').slideDown(500);">
                        <i class="ace-icon fa fa-times bigger-120 red"></i>

                    </button>

                    <button class="btn btn-white btn-default btn-round btn-xs" type="submit" name="msavepro" value="ok">
                        <i class="glyphicon glyphicon-ok green"></i>

                    </button>

                </p>
                <?php
                $tab_info='produit IDP flag mdelete';
                // include 'tabaction.php';
                ?>
                <p id="activer">
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="allcancelBtn" title="anuller" style="display: none">
                        <i class="glyphicon glyphicon-remove red bigger-120 "></i>
                    </a>

                    <a href="javascript:void(0)" data-toggle="tooltip"  class="allconfirmBtn" title="valider" style="display: none">
                        <i class="glyphicon glyphicon-ok green bigger-120 "></i>
                    </a>


                    <input type="checkbox" id="Allpcheck" class="checkall" >
                    <input type="hidden" id="tabinfo" value="produit IDP flag mdelete" >

                    <a id="getMPrd" onclick="getMpro()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple" class="alledit"><span> <i class="glyphicon glyphicon-edit  bigger-120 green"></i></span> </a>

                    <a href="javascript:void(0)" data-toggle="tooltip"  class="alldeleteBtn" title="Supprimer">
                        <span><i class="glyphicon glyphicon-trash  bigger-120 red"></i></span>
                    </a>

                    <a id="addPrd" onClick="$('p#activer').slideUp(500);$('p.desactiver').slideDown(500);$('span.activer').slideUp(500);$('span.desactiver').slideDown(500);$('strong.activer').slideUp(500);$('select.desactiver').slideDown(500);$('input.desactiver').slideDown(500);$('div.desactiver').slideDown(500);" href="javascript:void(0)" data-toggle="tooltip" title="Ajouter produit"><span><i class="glyphicon glyphicon-plus  bigger-120 blue"></i></span></a>

                </p>


            </th>
        </tr>
        </thead>
    </form>
    <form method="post" name="frm">
        <input type="hidden" id="number" name="number" required />
        <tbody id="userData">
        <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
            <tr id='tr_<? $IDP?>'>
                <td class="center">

                    <?php

                    if ($PHOTO == "" || $PHOTO == ".") {
                        ?>
                        <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                        <?php
                    }else{

                        ?>
                        <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDP; ?>" id="viewPrd" href="javascript:void(0)" data-toggle="tooltip" title="Aperçu">
                            <img class="lesImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="#"  width="32" height="32">

                        </a>

                        <?php
                    }
                    ?>

                </td>
                <td>
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier <?php echo $table['DESI']; ?>"><span class="editSpan DESI "><?php echo $table['DESI']; ?></span></a>

                    <input class="editInput DESI form-control input-sm" type="text" name="DESI" value="<?php echo htmlspecialchars($DESI); ?>" style="display: none;">
                </td>
                <td>
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title=" <?php echo $table['PRIXA']; ?>"> <span class="editSpan PRIXA editBtn"><?php echo $table['PRIXA']; ?></span></a>
                    <input class="editInput PRIXA form-control input-sm" type="text" name="PRIXA" value="<?php echo htmlspecialchars($PRIXA); ?>" style="display: none;">
                </td>
                <td>
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="<?php echo $table['PRIXV']; ?>"> <span class="editSpan PRIXV editBtn"><?php echo $table['PRIXV']; ?></span></a>
                    <input class="editInput PRIXV form-control input-sm" type="text" name="PRIXV" value="<?php echo htmlspecialchars($PRIXV); ?>" style="display: none;">
                </td>
                <td>
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="<?php echo $table['QNT']; ?>"> <span class="editSpan QNT editBtn"><?php echo $table['QNT']; ?></span></a>
                    <input class="editInput QNT form-control input-sm" type="text" name="QNT" value="<?php echo htmlspecialchars($QNT); ?>" style="display: none;">
                </td>




                <td class="hidden-480"><?php echo Souselect_Cat('nom',$IDP); ?></td>
                <?php
                $condis=$QNT;
                $tab_id=$IDP;
                $tab_cible='view/page/get/getprd.php';
                //include 'tablastd.php';
                ?>
                <td class="hidden-480">

                    <div class="btn-group btn-group-sm">
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="cancelBtn" title="anuller" style="display: none">
                            <i class="glyphicon glyphicon-remove red"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="saveBtn" title="enregister" style="display: none">
                            <i class="glyphicon glyphicon-floppy-disk blue"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="confirmBtn" title="valider" style="display: none">
                            <i class="glyphicon glyphicon-ok green"></i>
                        </a>
                    </div>



                    <input type='checkbox' id='del_<?php echo $IDP; ?>' name="checkp" value="<?php echo $IDP; ?>" class="checketed" >

                    <input type='hidden' id='taburl' value="<?php //echo $tab_cible; ?>" >

                    <a  data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDP; ?>" id="getPrd"  class="modaledit " href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>






                    <?php
                    if($condis<=0)
                    {
                        ?>

                        <!--
                                        <a class="delete_product" data-id="<?php echo $tab_id; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                            <i class="glyphicon glyphicon-trash red"></i>
                                        </a>
                                        inline styles related to this page -->
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="deleteBtn" title="Supprimer">
                            <i class="glyphicon glyphicon-trash red"></i>
                        </a>


                        <?php
                    }else{
                        ?>
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="deleteBtndisable" title="impossible de Supprimer">
                            <i class="glyphicon glyphicon-trash black"></i>
                        </a>


                        <?php
                    }
                    ?>
                    <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)" data-toggle="tooltip" class="Btnadd"  title="Ajouter">
                        <i class="glyphicon glyphicon-plus blue"></i>
                    </a>
                </td>
            </tr>
            <?php  $count++; endforeach; else: ?>
            <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
        <?php endif; ?>
        </tbody>
    </form>
</table>
