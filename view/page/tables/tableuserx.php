
<?php
/*
if ( $doc== "user") {
?>
    <div class="row">
        <div class="col-xs-11" style="margin-left: 3%;">



            <table  class=' table table-striped table-bordered'>

                <thead>
                <tr >

                    <th>Noms</th>
                    <th>Poste</th>
                    <th>Photo</th>
                    <td>
                 <span class="input-icon">
									<input type="text" placeholder="Recherche.." class="nav-search-input" id="SchUinput" onkeyup="myschUFunction()"  autocomplete="on"  />
									<i class="ace-icon fa fa-search nav-search-icon " id="ScatI"></i>
                 </span>
                    </td>
                </tr>

                </thead>

                <tbody id="myschUTable">

                <?php


                //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
                $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE STATUT='user' ORDER BY NOM_USER");
                $countref = $resref->num_rows;
                if($countref > 0)
                {

                    while($row=$resref->fetch_array())
                    {
                        $img=$row['PHOTO'];
                        $poste=$row['POSTE'];
                        $prenom=$row['PRENOM_USER'];
                        $nom=$row['NOM_USER'];
                        $idu=$row['IDU'];
                        $flag=$row['FLAG'];
                        $statu=$row['STATUT'];
                        ?>
                        <tr >

                            <td>
                            <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">

                                <?php echo '<strong>'.$row['NOM_USER'].'</strong>  '.$row['PRENOM_USER']; ?>
                            <a/>
                            </td>
                            <td>
                                <?php echo $row['POSTE']; ?>
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">

                                    <!-- Trigger the Modal -->

                                    <?php
                                    if ($img == ""||$img == ".") {
                                        ?>
                                        <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                        <?php
                                    }else{
                                        ?>
                                        <img id="myImg"  src="assets/images/avatars/<?php echo $img;?>"  width="32" height="32">

                                        <?php
                                    }
                                    ?>

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01">

                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>
                            </td>
                            <td>

                                <a href="?idmu=<?php echo $idu; ?>"  data-toggle="tooltip" title="Aperçu">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a class="delete_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>

                                <a href="#modal-table" role="button" class="green" data-toggle="modal" href="javascript:void(0)" data-toggle="tooltip" title="Ajouter"><i class="glyphicon glyphicon-plus"></i> </a>
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
    <?php
}
if ($doc== "cli") {
    ?>
    <div class="row">
        <div class="col-xs-11" style="margin-left: 3%;">



            <table  class=' table table-striped table-bordered'>

                <thead>
                <tr >

                    <th>Noms</th>
                    <td>
                 <span class="input-icon">
									<input type="text" placeholder="Recherche.." class="nav-search-input" id="Schcliinput" onkeyup="myschcliFunction()"  autocomplete="on"  />
									<i class="ace-icon fa fa-search nav-search-icon " id="ScatI"></i>
                 </span>
                    </td>
                </tr>

                </thead>

                <tbody id="myschcliTable">

                <?php


                //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
                $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE STATUT='cli' ORDER BY NOM_USER");
                $countref = $resref->num_rows;
                if($countref > 0)
                {

                    while($row=$resref->fetch_array())
                    {
                        $img=$row['PHOTO'];
                        $poste=$row['POSTE'];
                        $prenom=$row['PRENOM_USER'];
                        $nom=$row['NOM_USER'];
                        $idu=$row['IDU'];
                        $flag=$row['FLAG'];
                        $statu=$row['STATUT'];
                        ?>
                        <tr >

                            <td>
                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Aperçu">

                                    <!-- Trigger the Modal -->

                                    <?php
                                    if ($img == ""||$img == ".") {
                                        ?>
                                        <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                        <?php
                                    }else{
                                        ?>
                                        <img id="myImg"  src="assets/images/avatars/<?php echo $img;?>"  width="32" height="32">

                                        <?php
                                    }
                                    ?>

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01">

                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>

                                <?php echo $row['NOM_USER']; ?></td>
                            <td>

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getcUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getcUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>

                                <a class="delete_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>

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
    <?php

}
if ($doc== "four") {
    ?>
    <div class="row">
        <div class="col-xs-11" style="margin-left: 3%;">



            <table  class=' table table-striped table-bordered'>

                <thead>
                <tr >

                    <th>Noms</th>
                    <td>
                 <span class="input-icon">
									<input type="text" placeholder="Recherche.." class="nav-search-input" id="Schfourinput" onkeyup="myschfourFunction()"  autocomplete="on"  />
									<i class="ace-icon fa fa-search nav-search-icon " id="ScatI"></i>
                 </span>
                    </td>
                </tr>

                </thead>

                <tbody id="myschfourTable">

                <?php


                //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
                $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE STATUT='four' ORDER BY NOM_USER");
                $countref = $resref->num_rows;
                if($countref > 0)
                {

                    while($row=$resref->fetch_array())
                    {
                        $img=$row['PHOTO'];
                        $poste=$row['POSTE'];
                        $prenom=$row['PRENOM_USER'];
                        $nom=$row['NOM_USER'];
                        $idu=$row['IDU'];
                        $flag=$row['FLAG'];
                        $statu=$row['STATUT'];
                        ?>
                        <tr >

                            <td>
                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Aperçu">

                                    <!-- Trigger the Modal -->

                                    <?php
                                    if ($img == ""||$img == ".") {
                                        ?>
                                        <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                        <?php
                                    }else{
                                        ?>
                                        <img id="myImg"  src="assets/images/avatars/<?php echo $img;?>"  width="32" height="32">

                                        <?php
                                    }
                                    ?>

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                        <!-- The Close Button -->
                                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content" id="img01">

                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>

                                <?php echo $row['NOM_USER']; ?></td>
                            <td>

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getcUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getcUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i></button>

                                <a class="delete_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>

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
    <?php

}
*/
?>


<?php

//load and initialize database class

$db = new Db();
$condition = array('flag' => 0,'STATUT' => $doc);
//get users from database
$tables = $db->getRows('UTILISATEUR',array('where'=>$condition,'order_by'=>'NOM_USER DESC'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="row">
    <div class="col-sm-11" style="margin-left: 3%">

        <form method="post" name="frm">
            <input type="hidden" id="number" name="number" required />

            <div class="table-responsive">
                <div class="panel panel-default users-content">

                    <table id='' class='table table-striped display'>

                        <thead>
                        <tr >

                            <th>Noms</th>
                            <th>Function</th>
                            <th>Photo</th>
                            <th>
                                <?php

                                if ( $doc== "user") {
                                    ?>
                                    <a href="#modal-table" role="button" class="purple" data-toggle="modal" href="javascript:void(0)" data-toggle="tooltip" title="Ajouter employer">
                                        <img src="assets/images/icon/addutilisateur.png" class="img-responsive" alt="EMPLOYERS" style="float: left">
                                    </a>
                                    <?php

                                }
                                if ( $doc== "cli") {
                                    ?>
                                    <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown4" data-toggle="tooltip" title="Ajouter client">
                                        <img src="assets/images/icon/addclient.png" class="img-responsive" alt="EMPLOYERS" style="float: left">
                                    </a>
                                    <?php

                                }
                                if ( $doc== "four") {
                                    ?>
                                    <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown5" data-toggle="tooltip" title="Ajouter fournisseur">
                                        <img src="assets/images/icon/addfournisseur.png" class="img-responsive" alt="EMPLOYERS" style="float: left">
                                    </a>
                                    <?php

                                }
                                if ( $doc== "presta") {
                                    ?>
                                    <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown7" data-toggle="tooltip" title="Ajouter prestataire">
                                        <img src="assets/images/icon/addpresta.png" class="img-responsive" alt="EMPLOYERS" style="float: left">
                                    </a>
                                    <?php

                                }

                                ?>
                            </th>
                        </tr>

                        </thead>

                        <tbody id="userData">
                        <?php if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                            <?php
                            /*$img=$row['PHOTO'];
                            $poste=$row['POSTE'];
                            $prenom=$row['PRENOM_USER'];
                            $nom=$row['NOM_USER'];
                            $idu=$row['IDU'];
                            $flag=$row['FLAG'];
                            $statu=$row['STATUT'];*/
                            ?>
                            <tr >

                                <td>
                                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDU; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">

                                        <?php echo '<strong>'.$NOM_USER.'</strong>  '.$PRENOM_USER; ?>
                                        <a/>
                                </td>
                                <td>
                                    <?php echo $POSTE; ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDU; ?>" id="getVUserM" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">

                                        <!-- Trigger the Modal -->

                                        <?php
                                        if ($PHOTO == ""||$PHOTO == ".") {
                                            ?>
                                            <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                            <?php
                                        }else{
                                            ?>
                                            <img id="myImg"  src="assets/images/avatars/<?php echo $PHOTO;?>"  width="32" height="32">

                                            <?php
                                        }
                                        ?>

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">

                                            <!-- The Close Button -->
                                            <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

                                            <!-- Modal Content (The Image) -->
                                            <img class="modal-content" id="img01">

                                            <!-- Modal Caption (Image Text) -->
                                            <div id="caption"></div>
                                        </div>

                                </td>
                                <td>

                                    <a href="?idmu=<?php echo $IDU; ?>"  data-toggle="tooltip" title="Aperçu">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a class="delete_user" data-id="<?php echo $IDU; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                        <?php

                                        if ( $doc== "user") {
                                            ?>
                                            <a href="#modal-table" role="button" class="purple" data-toggle="modal" href="javascript:void(0)" data-toggle="tooltip" title="Ajouter employer"><i class="glyphicon glyphicon-plus"></i> </a>

                                            <?php

                                        }
                                        if ( $doc== "cli") {
                                            ?>
                                            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown4" class="green" data-toggle="tooltip" title="Ajouter client"><i class="glyphicon glyphicon-plus"></i> </a>

                                            <?php

                                        }
                                        if ( $doc== "four") {
                                            ?>
                                            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown5" class="red"  data-toggle="tooltip" title="Ajouter fournisseur"><i class="glyphicon glyphicon-plus"></i> </a>

                                            <?php

                                        }
                                        if ( $doc== "presta") {
                                            ?>
                                            <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown7" class="black"  data-toggle="tooltip" title="Ajouter prestataire"><i class="glyphicon glyphicon-plus"></i> </a>

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
        </form>
    </div>
</div>






