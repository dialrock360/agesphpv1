

<style>
    #Acli{
        display: none;
    }
</style>






<?php
 //Catcher(135,'add');
?>
<div class="row">
    <div class="col-xs-12 col-lg-6">

        <div class="row">
            <div class="col-xs-12">


                <!-- div.dataTables_borderWrap -->
                <div>



                    <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h2 class="panel-title" align="center"> <i class="icon-certificate"></i>
                                    <strong><i class="fa fa-gavel"></i>PRODUIT DE FACTURATION INDUSTRIELLE</strong>

                                </h2>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="alert alert-info">

                                    <div class="widget-box">


                                        <div class="widget-body">
                                            <div class="widget-main">


                                                <div id="contencmpt">

                                                    <div class="element">

                                                        <div>
                                                            <label for="form-field-select-3">Articles et Services</label>

                                                            <br />
                                                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choix du Produit..." name="idcmp" required>
                                                                <option value="">  </option>
                                                                <?php     echo $Optioncomposer;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="element">
                                                        <div>
                                                            <label for="form-field-select-3">Composants</label>

                                                            <br />

                                                            <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produit "  id="uid" style="width:70%;">
                                                                <optgroup label="Articles et Services">

                                                                    <?php     echo $Optionprd;?>
                                                                </optgroup>
                                                            </select>
                                                            <a href="#"  id="getpcmp"  class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="panel panel-default">


                                                </div>

                                                <div class="table-responsive table-bordered">
                                                    <h5><strong>produit de composition</strong></h5>
                                                    <table class="table">
                                                        <thead id="titleCalcul"  >
                                                        <tr>
                                                            <th>Designation</th>
                                                            <th>Quantite</th>
                                                            <th>Montant</th>
                                                            <th> <!--<a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>-->
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="manligneCalcul" style="clear:both">


                                                        </tbody>
                                                        <tfoot>


                                                        <tr>

                                                            <td >
                                                                <input type="hidden" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />

                                                                <input type="hidden" id="valTVA_stand" value="0"  class="form-control"  />

                                                                <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                                                                <input name="ligne"   type="hidden" id="ligne" />
                                                            </td>

                                                            <td colspan="3">
                                                                <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                                                                <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reg" readonly/>
                                                                <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reste" readonly/>
                                                                <input  type="hidden" class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                                <input name="lettr"  type="hidden" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                                                                <input name="number"   type="hidden" value="" id="lignenombre" />

                                                                <div class="form-group">
                                                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Prix De Revient : </label>

                                                                    <div class="col-sm-8">
                                                                        <input type="text" id="valTotalTTC_stand" value="0" name="totalttc"   class="form-control"  readonly required />
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        </tfoot>

                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>









                                    <input type="submit" name="savecmp" value="ENREGISTER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-lg-6">
        <div class="row">
            <div class="infobox infobox-green">
                <div class="infobox-icon" onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1">
                    <i class="ace-icon fa fa-database"></i>
                </div>

                <div class="infobox-data">
                    <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1">

                                                <span class="infobox-data-number">  <?php
                                                    echo Count_AllProd();
                                                    ?></span>
                        <div class="infobox-content">Liste des Produit</div>
                    </a>
                </div>


                <div class="stat stat-primary" onclick="UnsheckAll()" data-toggle="tab" href="#dropdown2" data-toggle="tooltip" title="Ajouter un article ou un service">

                    <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown2" data-toggle="tooltip" title="Ajouter un article ou un service"><i class="glyphicon glyphicon-plus  bigger-120 blue"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            require_once 'view/page/tables/tableprocmp.php';

            ?>
        </div>

    </div>
</div>






