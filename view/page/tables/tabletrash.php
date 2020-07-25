<div class="container">

    <div class="page-header">
        <h1><a target="_blank" href="http://www.codingcage.com/2016/08/delete-rows-from-mysql-with-bootstrap.html">CORBEILLE</a></h1>
    </div>

    <table class="table table-bordered table-condensed table-hover table-striped">

        <tr>
            <th>#ID</th>
            <th>Designation</th>
            <th>Prix d'Achat</th>
            <th>Prix de Vente</th>
            <th>Action</th>
        </tr>


        <?php
        require_once 'dbc.php';
        ///SELECT `IDP`, `IDU`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1
        $query = "SELECT * FROM PRODUIT WHERE FLAG=1";
        $stmt = $db_con->prepare( $query );
        $stmt->execute();
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
            extract($row);
            ?>
            <tr>
                <td><?php echo $IDP; ?></td>
                <td><?php echo $DESI; ?></td>
                <td><?php echo $PRIXA; ?></td>
                <td><?php echo $PRIXV; ?></td>
                <!--  <td><?php //echo $ID_CAT; ?></td>  -->
                <td>
                    <a class="restor_product" data-id="<?php echo $IDP; ?>" href="javascript:void(0)">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a></td>
            </tr>
            <?php
        }
        ?>


    </table>

    <table class="table table-striped table-bordered">

        <thead>
        <tr>
            <th>Employer</th>
            <th>Voir Profile</th>
        </tr>
        </thead>

        <tbody>

        <?php

        require_once 'dbc.php';
        //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
        $query = "SELECT * FROM UTILISATEUR WHERE FLAG=1";
        $stmt = $db_con->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?php echo $row['PRENOM_USER']."&nbsp;".$row['NOM_USER']; ?></td>
                <td>
                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['IDU']; ?>" id="getUser" class="btn btn-sm btn-info">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a class="restor_user" data-id="<?php echo $row['IDU']; ?>" href="javascript:void(0)" >
                        <i class="glyphicon glyphicon-refresh"></i>
                    </a>

                </td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>


</div>