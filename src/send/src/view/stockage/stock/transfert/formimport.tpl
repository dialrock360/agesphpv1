

<style>
    #Acli{
        display: none;
    }
</style>



<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>



            <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center"> <i class="icon-certificate"></i>
                            <strong><i class="fa fa-money"></i>FACTURE N° <?php  Newid_Fac();?></strong>  N° <?php  Newid_Fac();?>

                            <input  type="hidden" value="" id="AUTOINCREMENT"/>
                            <input type="hidden" name="idF" value="<?php  Newid_Fac();?>" id="INCREMENT"  readonly="true" style="opacity:0.5; height:10px;" >
                        </h2>
                        <input type="hidden" name="type" id="type" value="facture"   required >
                        <input type="hidden" name="conten" id="conten" value=" "    >
                        <input type="hidden" name="cacher" id="cacher" value="<?php echo $iduser; ?>"   required >

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-success">




                            <h5><strong>Feuille de Calculs</strong></h5>



                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead id="titleCalcul"  >
                                    <tr>
                                        <th>Designation</th>
                                        <th>Cnd de base</th>
                                        <th>Cnd de reception</th>
                                        <th>Stock</th>
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
                                        <td>
                                            <a href="#"   onClick="getLine()"   class="preview" title="Ajouter des Produits  Commerciaux"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                            <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Produits Commerciaux"  id="uid" style="width:70%;">
                                                {$optionarticle_en_stocks}
                                            </select>

                                        </td>

                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Total HT : </label>

                                                <div class="col-sm-7">
                                                    <input type="text" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> TVA (%) : </label>

                                                <div class="col-sm-7">
                                                    <input type="text" id="valTVA_stand" value="0"  class="form-control"  />
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input name="ligne"   type="hidden" id="ligne" /></td>
                                        <td>
                                            <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>

                                        <td colspan="4">

                                            <div class="alert alert-info">
                                                <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                                                <div class="form-group">
                                                    <input name="lettr"  type="text" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                                                </div>
                                                <input name="number"   type="hidden" value="" id="lignenombre" />
                                            </div>
                                        </td>

                                        <td colspan="2">

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Total TTC : </label>

                                                <div class="col-sm-8">
                                                    <input type="text" id="valTotalTTC_stand" value="0" name="totalttc"   class="form-control"  readonly required />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    </tfoot>

                                </table>
                            </div>

                            <input type="button" onClick="$('div#factureDEF').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                            <input type="submit" name="btnsave" value="VALIDER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>













