<table class="display">
    <caption>
        <div class="table-header">
            <h4 class="header smaller lighter white">Modificateur de Quantités</h4>
            <input type="hidden" id="number" name="number" required />


        </div>
    </caption>
    <thead>

    <tr>
        <th class="center">
            <label class="pos-rel">
                Image
            </label>
        </th>
        <th>Désignation</th>

        <th>
            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
            Quantité
        </th>
        <th >

            <span style="word-spacing:normal;"> Action : </span>
            <input type="checkbox" id="checkAllpQ" >
            <a id="getMPrd" onclick="getMproQ()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit  bigger-120 green"></i></span> </a>

        </th>
    </tr>
    </thead>

    <tbody >
    <?php



    $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE ID_CAT IN (SELECT ID_CAT FROM `categorie` WHERE vente=1) ORDER BY DESI");
    $countref = $resref->num_rows;
    if($countref > 0)
    {

        while($row=$resref->fetch_array())
        {
            extract($row);

            ?>

            <tr>
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
                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDP; ?>" id="viewPrd2" href="javascript:void(0)" data-toggle="tooltip" title="Aperçu">
                        <?php echo $DESI; ?>
                    </a>
                </td>
                <td><?php echo $QNT; ?></td>
                <td>
                    <?php   echo '<input id="'.$IDP.'" type="checkbox" name="checkp" class="checkp" value="'.$IDP.'" />';?>


                    <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDP; ?>" id="getPrdQ" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>