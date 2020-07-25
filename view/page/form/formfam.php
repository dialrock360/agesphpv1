

<div class="row">
    <div class="col-sm-11" style="margin-left: 3%">

        <div class="table-responsive" id="myTablecat">


            <table class="table">
                <caption>Liste Des Familles D'Articles</caption>


                <tbody id="myfamTable">
                <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="total" value="1" />
                    <input type="hidden" name="idn" value="1" />
                <thead>

                <tr>
                    <th>
                        <span class="input-icon">
									<input type="text" placeholder="Nom de la Famille" class="nav-search-input" id="Faminput" autocomplete="off" name="Aname1" onkeyup="myfamFunction()" required />
									<i class="ace-icon fa fa-search nav-search-icon " id="SfamI"></i>
									<i class="ace-icon fa fa-plus nav-search-icon" id="AfamI"></i>

                 </span>
                    </th>
                    <th>
                        <div  class="hidenfam">

                            <a href="javascript:void(0)" data-toggle="tooltip" title="Couleur Pour les Representation Graphic" >


                                <div id="color-picker-wrapper">

                                    <input type="color" value="#0000ff" id="color-picker" name="Bname1" required>
                                </div>

                            </a>

                        </div>

                    </th>
                    <th>
                        <div id="showfam">
                        <input type="checkbox"  id="checkAllf">
                        <a id="showhidenfam" onClick="$('div#showfam').slideUp(500);$('i#SfamI').slideUp(500);$('i#AfamI').slideDown(500);$('div.hidenfam').slideDown(600);"  href="javascript:void(0)" data-toggle="tooltip" title="Ajouter une Categorie D'Articles"><span> <i class="glyphicon glyphicon-plus  bigger-120 blue"></i></span> </a>
                        <a id="getMFam" onclick="getMfam()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit green"></i></span> </a>
                        <a id="getDFam" onclick="getDFam()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash red"></i></span></a>
                        </div>
                        <div  class="hidenfam">
                            <button type="submit" class="btn btn-info btn-xs  "  name="msavecat" >
                                <i class="ace-icon fa fa-key bigger-110"></i>Valider
                            </button>
                            <button type="button" class="btn btn-danger btn-xs  "  onClick="$('div.hidenfam').slideUp(500);$('i#AfamI').slideUp(500);$('i#SfamI').slideDown(500);$('div#showfam').slideDown(600);" >
                                <i class="glyphicon glyphicon-off black bigger-110"></i>Fermer
                            </button>

                        </div>
                    </th>
                </tr>
                </thead>




                </form>
                <?php


                //SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `ACHAT`, `VENTE`, `FLAG` FROM `famille` WHERE 1

                        ?>
                <?php if(!empty( $tablesf)): foreach( $tablesf as $tablef):  extract($tablef) ?>

                        <tr>
                            <style>
                                .cadre32 {
                                    border: outset 1px #0000ff;
                                    height: 32px;
                                    width: 32px;
                                    margin: auto;
                                }
                            </style>
                            <td><?php echo $DESI; ?></td>
                            <td>
                                <span class="label cadre32" style="background-color: <?php echo $COLOR; ?>; color: <?php echo $COLOR; ?>;">...</span><?php echo  ' '.colorFnam($COLOR); ?>
                            </td>
                            <td>
                                <input type="checkbox" name="chkfam[]"  class="checkf" value="<?php echo $IDFA; ?>"  />

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDFA; ?>" id="getFam" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>

                                <?php
                                if($famdb->nbr_cat($IDFA)<=0){
                                    ?>

                                    <a class="delete_fam" data-id="<?php echo $IDFA; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
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
                <?php endforeach; else: ?>
                    <tr><td colspan="4">Aucune ligne(s) trouvé......</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
