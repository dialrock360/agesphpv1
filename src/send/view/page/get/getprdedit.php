<?php

require_once 'dbc.php';

if (isset($_REQUEST['idp'])) {
    //SELECT `IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1

    $id = intval($_REQUEST['idp']);
    $query = "SELECT * FROM PRODUIT WHERE IDP=:id";
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);
    $i=1;
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">
            <img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="100" height="100">
        </h4>
    </div>
    <div class="modal-body">



        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <tr>

                    <th>Modification De l'Article</th>
                </tr>
                <tr>
                    <td>

                        <form class="form-signin" method="post" action="modelprd.php" enctype="multipart/form-data" >


                            <input type="hidden" name="total" value="<?php echo $id; ?>" />
                            <table class='table table-bordered'>

                                <tr>
                                    <th>##</th>
                                    <th>Designation</th>
                                    <th>Conditionement</th>
                                    <th>Prix D'Achat</th>
                                    <th>Prix De Vente</th>
                                    <th>Details</th>

                                    <th>Categorie</th>
                                    <th>Photo</th>

                                </tr>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><input type="text" name="1name<?php echo $i; ?>" value="Designation" class='form-control' /></td>
                                    <td>
                                        <select id="form-field-select-4" name="2name<?php echo $i; ?>">
                                            <option></option>
                                            <?php
                                            Select_Condis();
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="3name<?php echo $i; ?>" placeholder="Prix d'Achat" class='form-control' /></td>
                                    <td><input type="text" name="4name<?php echo $i; ?>" placeholder="Prix de Vente" class='form-control' /></td>
                                    <td><input type="text" name="5name<?php echo $i; ?>" placeholder="Detail" class='form-control' /></td>
                                    <td>
                                        <select id="form-field-select-3" name="6name<?php echo $i; ?>">
                                            <option></option>
                                            <?php
                                            Select_Cat();
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="file" name="7name<?php echo $i; ?>" class='form-control' /></td>

                                </tr>

                                <tr>
                                    <td colspan="3">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default" name="msavepro" id="btn-submit">
                                                <span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>


                    </td>
                </tr>

            </table>

        </div>

    </div>

    <?php
}