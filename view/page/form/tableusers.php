
<?php
if ( $doc== "cli") {
    ?>


    <table id="myTablec" class="table table-striped table-hover">

        <thead>
        <tr>

            <th>
            </th>

        </tr>
        </thead>
        <tbody>
        <?php

        //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1

        $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='cli' ORDER BY NOM_USER");
        $countref = $resref->num_rows;
        if($countref > 0)
        {

            while($rowref1=$resref->fetch_array())
            {
                extract($rowref1);
                if ($STATUT == "cli" && $doc == "cli") {


                    ?>

                    <tr>

                        <td>
                            <a href="#"><?php echo $NOM_USER; ?></a>
                        </td>


                    </tr>
                <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
<?php
}
if ( $doc== "four") {
    ?>

    <table id="myTablef" class="table table-striped table-hover">

        <thead>
        <tr>

            <th>
            </th>

        </tr>
        </thead>
        <tbody>
        <?php

        //SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1

        $resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE FLAG=0 AND STATUT='four' ORDER BY NOM_USER");
        $countref = $resref->num_rows;
        if($countref > 0)
        {

            while($rowref1=$resref->fetch_array())
            {
                extract($rowref1);
                if ($STATUT == "four" && $doc == "four") {


                    ?>

                    <tr>

                        <td>
                            <a href="#"><?php echo $NOM_USER; ?></a>
                        </td>


                    </tr>
                <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
<?php
}
?>


