
<?php

//load and initialize database class

//$tables = $db->getRows('produit',array('where'=>$condition,'order_by'=>'desi asc'));
$tables = $lsprd;

?>

<style>

    .table#table-borderless td, .table#table-borderless th {
        border: 0 !important;
    }

    .table#table-borderless {
        margin-bottom: 0px;
    }
    .mybordered {
        *border-collapse: collapse; /* IE7 and lower */
        border-spacing: 0;
        width: 100%;
    }

    .mybordered {
        border: solid #ccc 1px;
        -moz-border-radius: 6px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 1px 1px #ccc;
        -moz-box-shadow: 0 1px 1px #ccc;
        box-shadow: 0 1px 1px #ccc;
    }

    .mybordered tr:hover {
        background: #fbf8e9;
        -o-transition: all 0.1s ease-in-out;
        -webkit-transition: all 0.1s ease-in-out;
        -moz-transition: all 0.1s ease-in-out;
        -ms-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;
    }

    .mybordered td, .mybordered th {
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    .mybordered th {
        background-color: #dce9f9;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
        background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
        background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
        background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
        background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
        background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
        -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
        -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;
        box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
        border-top: none;
        text-shadow: 0 1px 0 rgba(255,255,255,.5);
    }

    .mybordered td:first-child, .mybordered th:first-child {
        border-left: none;
    }

    .mybordered th:first-child {
        -moz-border-radius: 6px 0 0 0;
        -webkit-border-radius: 6px 0 0 0;
        border-radius: 6px 0 0 0;
    }

    .mybordered th:last-child {
        -moz-border-radius: 0 6px 0 0;
        -webkit-border-radius: 0 6px 0 0;
        border-radius: 0 6px 0 0;
    }

    .mybordered th:only-child{
        -moz-border-radius: 6px 6px 0 0;
        -webkit-border-radius: 6px 6px 0 0;
        border-radius: 6px 6px 0 0;
    }

    .mybordered tr:last-child td:first-child {
        -moz-border-radius: 0 0 0 6px;
        -webkit-border-radius: 0 0 0 6px;
        border-radius: 0 0 0 6px;
    }

    .mybordered tr:last-child td:last-child {
        -moz-border-radius: 0 0 6px 0;
        -webkit-border-radius: 0 0 6px 0;
        border-radius: 0 0 6px 0;
    }




    strong {
        text-shadow: 0px 1px 0.5px #4d4d4d;
        color: grey;
        font: 16px 'LeagueGothicRegular';
    }
</style>
<style type="text/css">
    .form-style-9 select:required:invalid {
        color: #999;
    }
    .form-style-9 option[value=””][disabled] {
        display: none;
    }
    .form-style-9 option {
        color: #000;
    }
    .form-style-9{
        font-family: 'Open Sans Condensed', arial, sans;
        padding: 30px;
        background: #FFFFFF;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

    }
    .form-style-9 h2{
        background: #4D4D4D;
        text-transform: uppercase;
        font-family: 'Open Sans Condensed', sans-serif;
        color: #797979;
        font-size: 18px;
        font-weight: 100;
        padding: 20px;
        margin: -30px -30px 30px -30px;
    }
    #addpinput,#input1,#input2,#input3,#input4,#prosinput{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        display: block;
        width: 100%;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;

    }
    .form-style-9 input[type="text"],
    .form-style-9 input[type="date"],
    .form-style-9 input[type="datetime"],
    .form-style-9 input[type="email"],
    .form-style-9 input[type="number"],
    .form-style-9 input[type="search"],
    .form-style-9 input[type="time"],
    .form-style-9 input[type="url"],
    .form-style-9 input[type="password"],
    .form-style-9 textarea,
    .form-style-9 select
    {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        display: block;
        width: 100%;
        padding: 7px;
        border: none;
        background: transparent;
        margin-bottom: 10px;
        font: 16px Arial, Helvetica, sans-serif;
        height: 45px;
    }
    .form-style-9 textarea{
        resize:none;
        overflow: hidden;
    }
    .form-style-9 input[type="button"],
    .form-style-9 input[type="submit"]{
        -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
        box-shadow: inset 0px 1px 0px 0px #45D6D6;
        background-color: #2CBBBB;
        border: 1px solid #27A0A0;
        display: inline-block;
        cursor: pointer;
        color: #FFFFFF;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 14px;
        padding: 8px 18px;
        text-decoration: none;
        text-transform: uppercase;
    }
    .form-style-9 input[type="button"]:hover,
    .form-style-9 input[type="submit"]:hover {
        background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
        background-color:#34CACA;
    }
    .form-style-9 select:required:invalid {
        color: #999;
    }
    .form-style-9 option[value=””][disabled] {
        display: none;
    }
    .form-style-9 option {
        color: #000;
    }
</style>
<div class="row">
    <div class="col-sm-12" >



        <!-- Trigger the modal with a button -->

        <!-- Modal -->

<div id="error"></div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body" id="iimodal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
            <div class="table-responsive ">



                <table class="mybordered" id="recordsTable">
                    <form action="<?php echo $base_url; ?>/controller/ProController.php"  method="post" enctype="multipart/form-data" >


                        <input type="hidden" name="total" value="1" />
                        <input type="hidden" name="5name1"  value="...." />
                        <input type="hidden" id="url"  value="<?php echo $base_url; ?>/controller/server.php" />
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
                                <select  name="2name1" REQUIRED id="2name1" style="display: none" class="desactiver">
                                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                    <option value=”” disabled selected>Condistionement</option>
                                    <?php
                                    echo $Optioncondis;
                                    ?>
                                </select>

                                <strong class="activer">Conditionnements</strong>
                            </th>
                            <th>
                                <input type="number" class="desactiver" id="4name1" style="display: none" placeholder="Prix D'Achat" min="0" step="0.0001" class="form-control" name="4name1"  required/>
                                <strong class="activer">Prix D'Achat</strong>
                            </th>
                            <th>
                                <input type="number"class="desactiver" min="0" style="display: none" placeholder="Prix De Vente" id="5name1" step="0.0001"  name="5name1"   required/>
                                <strong class="activer">Prix De Vente</strong>
                            </th>
                            <th>
                                <input type="number" class="desactiver" id="8name1" style="display: none" placeholder="QNT Initiale" min="0" step="0.0001" class="form-control" name="8name1"  required/>


                                <strong class="activer">Quantités</strong>
                            </th>

                            <th>
                                <select  name="3name1" REQUIRED id="3name1" style="display: none" class="desactiver">
                                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                    <option value=”” disabled selected>Categorie</option>
                                    <?php
                                    echo $Optioncat;
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

                                    <a id="addDPrd" onClick="$('p#activer').slideUp(500);$('p.desactiver').slideDown(500);$('span.activer').slideUp(500);$('span.desactiver').slideDown(500);$('strong.activer').slideUp(500);$('select.desactiver').slideDown(500);$('input.desactiver').slideDown(500);$('div.desactiver').slideDown(500);" href="javascript:void(0)" data-toggle="tooltip" title="Ajouter produit"><span><i class="glyphicon glyphicon-plus  bigger-120 blue"></i></span></a>

                                </p>


                            </th>
                        </tr>
                        </thead>
                    </form>

                    <form method="post" name="frm">
                        <input type="hidden" id="number" name="number" required />
                        <tbody id="userData">
                        <?php $count = 1;
                        if($tables!=null){

                            foreach( $tables as $table)
                            {
                                extract($table) ?>

                            <tr id='tr_<?php echo $IDP; ?>'>

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
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier <?php echo $table['IDC']; ?>"><span class="editSpan IDC "><?php echo $table['NOMC']; ?></span></a>

                                    <select  name="IDC" REQUIRED  style="display: none" class="editInput IDC form-control input-sm" >
                                        <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                        <option value=”<?php echo $IDC; ?>” disabled selected><?php echo $NOMC; ?></option>
                                        <?php
                                        echo $Optioncondis;
                                        ?>
                                    </select>
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
                                    <?php
                                    if($COMPOSER>0) {
                                        //echo Prdcmp_testdispo($IDP);
                                    }else {
                                    ?>
                                    <!-- <input type="number" id="QNT" value="<?php echo htmlspecialchars($QNT); ?>" >  -->

                                    <a href="javascript:void(0)" data-toggle="tooltip" class="editBtn" title="<?php echo $table['QNT']; ?>"> <span class="editSpan QNT editBtn"><?php echo $QNT; ?></span></a>
                                    <input class="editInput QNT form-control input-sm" type="text" name="QNT" value="<?php echo htmlspecialchars($QNT); ?>" style="display: none;">
                                    <?php
                                    }
                                    ?>
                                </td>





                                <td>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier <?php echo $table['ID_CAT']; ?>"><span class="editSpan ID_CAT "><?php echo $table['NOM_CAT']; ?></span></a>

                                     <select  name="ID_CAT" REQUIRED   style="display: none" class="editInput ID_CAT form-control input-sm" >
                                        <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                        <option value=”<?php echo $ID_CAT; ?>” disabled selected><?php echo $NOM_CAT; ?></option>
                                        <?php
                                        echo $Optioncat;
                                        ?>
                                    </select>
                                </td>
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

                                    <!--  <a  onclick="setQNT(<?php echo $table['QNT']; ?>,<?php echo $table['IDP']; ?>)"    href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                        <i class="fa fa-database"></i>
                                    </a> -->


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
                            <?php  $count++; } }else{  ?>
                            <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
                        <?php } ?>
                        </tbody>
                    </form>
                </table>

            </div>

    </div>
</div>

