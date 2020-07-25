<?php


$db_host = "localhost";
$db_name = "senbd";
$db_user = "root";
$db_pass = "";

try{

    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}


?>


<!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
<div class="row" id="lafilterDiv">
    <div class="col-sm-11" style="margin-left: 3%">

        <form method="post" name="frm" >
            <input type="hidden" id="number" name="number" required />

            <div class="table-responsive">
                <table id='' class='display'>
                    <caption> <h2>CORBEILLE</h2></caption>

                    <thead>
                    <tr>
                        <th style="width:60%;">Nom</th>
                        <th style="width:25%;">Type</th>
                        <th style="width:15%;">Action
                            <input type="checkbox" class="check" id="checkAll">
                            <a id="getRTotal" onclick="getRTotal()" href="javascript:void(0)" data-toggle="tooltip" title="Restauration Multiple"><span> <i class="glyphicon glyphicon-refresh green"></i></span></a>
                            <a id="getDTotal" onclick="getDTotal()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash red"></i></span></a>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php



                    //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
                    $query = "SELECT * FROM UTILISATEUR WHERE FLAG=1";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                        $img=$row['PHOTO'];
                        $poste=$row['POSTE'];
                        $prenom=$row['PRENOM_USER'];
                        $nom=$row['NOM_USER'];
                        $ide=$row['IDU'];
                        $type='user';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>

                        <tr  >
                            <td> <?php echo $row['PRENOM_USER']."&nbsp;".$row['NOM_USER']; ?></td>
                            <td>Personne</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />




                                <a class="restor_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>

                                <a class="Cdelete_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php

                    ///SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1
                    $query = "SELECT * FROM CONDIS WHERE FLAG=1 ORDER BY NOMC";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        $ide = $IDC;
                        $type='condis';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>
                        <input type="hidden" id="type" name="condis" value="user" required />

                        <tr>
                            <td><?php echo $NOMC; ?></td>
                            <td>Conditionnement</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />

                                <a class="restor_condis" data-id="<?php echo $IDC; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>

                                <a class="Cdelete_condis" data-id="<?php echo $IDC; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>




                    <?php

                    ///SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
                    $query = "SELECT * FROM FAMILLE WHERE FLAG=1 ORDER BY DESI ";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        $ide = $IDFA;
                        $type='fam';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>
                        <input type="hidden" id="type" name="type" value="fam" required />

                        <tr>
                            <td><?php echo $DESI; ?></td>
                            <td>Famille</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />

                                <a class="restor_fam" data-id="<?php echo $IDFA; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>
                                <a class="Cdelete_fam" data-id="<?php echo $IDFA; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a></td>
                        </tr>
                    <?php
                    }
                    ?>


                    <?php
                    ///SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
                    $query = "SELECT * FROM PRODUIT WHERE FLAG=1 ORDER BY DESI ";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        $ide = $IDP;
                        $type='prd';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>
                        <input type="hidden" id="type" name="type" value="prd" required />

                        <tr>

                            <td><?php echo $DESI; ?></td>
                            <td>Articles</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />

                                <a class="restor_product" data-id="<?php echo $IDP; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>
                                <a class="Cdelete_product" data-id="<?php echo $IDP; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a></td>
                        </tr>
                    <?php
                    }
                    ?>


                    <?php

                    ///SELECT `ID_CAT`, `IDFA`, `DATE_CAT`, `NOM_CAT`, `FLAG` FROM `CATEGORIE` WHERE 1
                    $query = "SELECT * FROM CATEGORIE WHERE FLAG=1 ORDER BY NOM_CAT ";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        $ide = $ID_CAT;
                        $type='cat';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>
                        <input type="hidden" id="type" name="type" value="cat" required />

                        <tr>
                            <td><?php echo $NOM_CAT; ?></td>
                            <td>Categorie</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />

                                <a class="restor_cat" data-id="<?php echo $ID_CAT; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>
                                <a class="Cdelete_cat" data-id="<?php echo $ID_CAT; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a></td>
                        </tr>
                    <?php
                    }
                    ?>

                    <?php

                    //SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1

                    $query = "SELECT * FROM MOUVEMENT WHERE FLAG=1 ORDER BY NOMMV ";
                    $stmt = $db_con->prepare( $query );
                    $stmt->execute();
                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                        extract($row);
                        $ide = $IDMV;
                        $type='fac';
                        $tab1= array( $type => $ide,);
                        $e = implode(",", $tab1);
                        ?>
                        <input type="hidden" id="type" name="type" value="cat" required />

                        <tr>
                            <td><?php echo $NOMMV; ?></td>
                            <td>Document</td>

                            <td>
                                <input type="checkbox" name="chk[]" class="check" value="<?php Keyval($tab1) ;?>"  />

                                <a class="restor_fac" data-id="<?php echo $IDMV; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Restaurer!">
                                    <i class="glyphicon glyphicon-refresh"></i>
                                </a>
                                <a class="Cdelete_fac" data-id="<?php echo $IDMV; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer!">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>







</div>

<style>

    .container {
        overflow: hidden;
    }

    .filterDiv {
        display: none; /* Hidden by default */
    }
    #lafilterDiv {
        border-style: solid;
        border-color: #dedede #bababa #aaa #bababa;
        box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
        border-radius: 10px;
        background-color: #f6f6f6;
        background-image: linear-gradient(top, #f6f6f6, #eae8e8);
        background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image:    -moz-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image:     -ms-linear-gradient(top, #f6f6f6, #eae8e8);
        background-image:      -o-linear-gradient(top, #f6f6f6, #eae8e8);
        width:100%;
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }
</style>
