
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
                        <h2 class="panel-title" align="center">
                            <strong><i class="fa fa-shopping-cart"></i>RECU</strong> N° <?php  Newid_Fac();?>


                        <input  type="hidden" value="" id="AUTOINCREMENT"/>
                        <input type="hidden" name="idF" value="<?php  Newid_Fac();?>" id="INCREMENT"  readonly="true" style="opacity:0.5; height:10px;" >
                        </h2>
                        <input type="hidden" name="type" id="type" value="recu"   required >
                        <input type="hidden" name="conten" id="conten" value=" "    >
                        <input type="hidden" name="cacher" id="cacher" value="<?php echo $iduser; ?>"   required >

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-info">

                            <div class="widget-box">
                                <div class="widget-header">
                                    <div id="conteneur" class="widget-title">
                                     <span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">DATE DU
    <input type="date" name="date" value="<?php echo $Sdate;?>" id="date"   style="opacity:0.8; height:20px;" >
                                    </span>

                                    </div>
                                    <input type="hidden" name="option" value="1">


                                    <span class="widget-toolbar">
<a href="#" data-action="reload" onclick="myFunction()" data-toggle="tooltip" title="Recharger">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

													</span>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">

                                        <div id="conteneur" >
                                            <div class="element">

                                                <div class="form-group " >
            <span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">OBJET
    <input type="text" type="text" class="form-control" placeholder="objet de la Facture" id="INCREMENT" name="objet"  style="opacity:0.9; height:30px;" required >
                                    </span>


                                                </div>
                                            </div>



                                            <div class="element">
            <span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;"> Fournisseurs <i class="fa fa-users bigger-110"></i>
 <select class="form-control" name="idacom" style="opacity:0.9;display: inline-block"required>
                <?php   Select_Four(); ?>

            </select>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h5><strong>Feuille de Calculs</strong></h5>



                            <div class="table-responsive">
                                <table class="table">
                                    <thead id="titleCalcul"  >
                                    <tr>
                                        <th>Designation</th>
                                        <th>Conditionement</th>
                                        <th>Prix unitaire</th>
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
                                            <a href="#"   onClick="getLine()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                            <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produit "  id="uid" style="width:70%;">
                                                <optgroup label="PRODUITS ET ARTICLES">
                                                    <?php  Select_Prd('rec');?>
                                                </optgroup>
                                            </select>

                                        </td>
                                        <td>
                                            <a href="#"   onClick="getCLine()"   class="preview" title="Ajouter Facture payées et prestations de service"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                            <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Charges "  id="room" style="width:70%;">
                                                <optgroup label="CHARGES ET FACTURES">
                                                    <?php   Select_Prod('charge');?>
                                                </optgroup>
                                            </select>

                                        </td>
                                        <td>

                                        </td>
                                        <td>

                                        </td>
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
                                    <tr>

                                        <td colspan="4">
                                            <div class="form-group input-group">

                                                <span class="input-group-addon "> Avance</span>
                                                <input class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                <span class="input-group-addon ">Reste :</span>
                                                <input class="form-control " id="Reste" value="0.00" name="reste" readonly/>

                                            </div>
                                        </td>

                                        <td colspan="2">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Mode de Payement </label>

                                                <div class="col-sm-5">
                                                    <select  name="reg" class="col-xs-8 col-sm-8"  required>
                                                        <option value="Esp&egrave;ce">Esp&egrave;ce</option>
                                                        <option value="Ch&egrave;que">Ch&egrave;que</option>
                                                        <option value="Mobil Money">Mobil Money</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                    </tfoot>

                                </table>

                            </div>

                                        </div>
                                    </div>
                                    <div class="widget-footer">
                                        <input type="button" onClick="$('div#factureDEF').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                                        <input type="submit" name="btnsave" value="VALIDER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>





