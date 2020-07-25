<!-- <p>
    <button class="btn btn-white btn-info btn-bold" type="button"  onclick="UnsheckAll()" data-toggle="tab" href="#base">
        <i class="ace-icon fa fa-times bigger-120 red"></i>
        Fermer
    </button>

    <button class="btn btn-white btn-warning btn-grey" type="reset">
        <i class="ace-icon fa fa-refresh bigger-120  "></i>
        Annuler
    </button>

    <button class="btn btn-white btn-default btn-round" type="submit" name="msavepro">
        <i class="ace-icon fa fa-arrow-right icon-on-right green"></i>
        Valider
    </button>
</p>-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg  ">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Enregister un Nouveau Produit</h4>
        </div>
        <!-- Modal content-->
        <div class="modal-content ">

            <div class="modal-body">
                <?php  $i=1; ?>
                <div class="row ">
                    <div class="col-sm-8">

                        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="total" value="1" />



                            <div class="table-responsive form-style-8" >
                                <table class="table table-condensed  " id="table-borderless ">
                                    <caption><h2>Enregister un Nouveau Produit</h2></caption>



                                    <?php
                                    for($i=1; $i<=1; $i++)
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="6">
                                                <input type="file" class="form-control" name="7name1" id="id-input-file-3" />
                                                <input type="hidden" class="form-control" name="oldimg1" value="..."/>
                                            </td>
                                        </tr>
                                        <tr>






                                            <td>
                                                <input type="text" id="myInputpro" placeholder="Designation" autocomplete="off" name="1name1"  onkeyup="proFunction()" required />

                                            </td>




                                            <td>

                                                <input type="number" id="inputpxa" placeholder="Prix D'Achat" min="0" step="0.0001" class="form-control" name="3name1"  required/>
                                            </td>

                                            <td>
                                                <input type="number" min="0" placeholder="Prix De Vente" id="inputpxv" step="0.0001"  name="4name1"   required/>
                                            </td>




                                        </tr>

                                        <tr>

                                            <td>
                                                <select  name="6name1" REQUIRED >
                                                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                                    <option value=”” disabled selected>Categorie</option>
                                                    <?php
                                                    Select_Cat();
                                                    ?>
                                                </select>

                                            </td>

                                            <td>
                                                <select  name="2name1" REQUIRED class="nav-search-input " >
                                                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                                                    <option value=”” disabled selected>Condis</option>

                                                    <?php
                                                    Select_Condis();
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea name="5name1" class='form-control'  >
                                                    specs
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td ></td>
                                            <td colspan="4">  <input type="submit" value="Valider" name="msavepro"/></td>
                                            <td ></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>



                            </div>
                        </form>

                    </div>
                    <div class="col-sm-4">
                        <ul id="myULpro" class="list-group">
                            <?php

                            ///SELECT `IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1
                            $query = "SELECT * FROM PRODUIT WHERE FLAG=0 ORDER BY DESI ";
                            $stmt = $db_con->prepare( $query );
                            $stmt->execute();
                            while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
                                extract($row);
                                ?>

                                <li class="list-group-item"><a href="#"><?php echo $DESI; ?></a></li>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>