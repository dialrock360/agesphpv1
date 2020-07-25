
<style>
    #Acli{
        display: none;
    }
</style>



<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>



            <form action="modelfac.php" method="post" >

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center">
                            <strong><i class="fa fa-shopping-cart"></i>RECU</strong>

                        </h2>
                        <input type="hidden" name="type" id="type" value="recu"   required >
                        <input type="hidden" name="conten" id="conten" value=" "    >

                        <input type="hidden" name="type"  value="facture"  id="type" required >


                        <input type="hidden" name="cacher" id="cacher" value="<?php echo $iduser; ?>"   required >
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-11" style="margin-left: 3%;">


                                <div class="widget-box">
                                    <h5><strong>Informations G&eacute;n&eacute;rales</strong>

                                    </h5>

                                    <div class="widget-header">
                                        <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">FACTURE N&deg;
    <input  type="hidden" value="" id="AUTOINCREMENT"/>
    <input type="text" name="idF" value="<?php  Newid_Fac();?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                                        </h4>

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

                                            <div class="input-group">
                                                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="date" value="<?php echo $Sdate;?>" required/>
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                            </div>
                                            <hr />
                                            <div class="panel panel-default">

                                                <div class="panel-heading">
                                                    <div class="row">

                                                        <div class="col-xs-6 col-sm-3">
                                                            <label class="pull-left">
                                                                Nouveau Fournisseur<input type="radio" name="option" value="Ncli" ID="NC"
                                                                                     onClick="$('div#Ncli').slideDown(500);$('div#Acli').slideUp(500);$('div#AS').slideDown(500);$('div#CF').slideUp(500);"

                                                                                     checked />
                                                            </label>
                                                        </div>

                                                        <div class="col-xs-6 col-sm-3">

                                                            <label class="col-md-9">
                                                                Achat Simpl<input type="radio" name="option" value="0" ID="CL"
                                                                                    onClick="$('div#Ncli').slideUp(500);$('div#Acli').slideUp(500);$('div#AS').slideDown(500);$('div#CF').slideUp(500);"
                                                                    />
                                                            </label>

                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <label class="pull-right">
                                                                Ancien Fournisseurs<input type="radio" name="option" value="1" ID="AC"
                                                                                    onClick="$('div#Acli').slideDown(500);$('div#Ncli').slideUp(500);$('div#AS').slideDown(500);$('div#CF').slideUp(500);"

                                                                    />

                                                            </label>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <label class="pull-right">
                                                                Charges et Factures<input type="radio" name="option" value="0" id="CH"
                                                                                    onClick="$('div#Acli').slideDown(500);$('div#Ncli').slideUp(500);$('div#CF').slideDown(500);$('div#AS').slideUp(500);"

                                                                    />

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">



                                                    </div>
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive table-bordered">
                                                        <div class="designe">
                                                            <div id="Ncli">
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                                                    <input type="text" class="form-control" placeholder="Nom du Complet du Fournisseur"  name="nom"/>
                                                                </div>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                                                    <input type="text" class="form-control" placeholder="numero du du Fournisseur" name="tel"/>
                                                                </div>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon">CNI ou NINEA</span>
                                                                    <input type="text" class="form-control" name="cni"/>
                                                                </div>

                                                            </div>
                                                            <div class="form-group " id="Acli">

                                                                <select class="form-control" name="idacom">
                                                                    <?php   Select_Four(); ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="standard">
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon fpro">Objet</span>
                                                                <input type="text" class="form-control" placeholder="Detaille,Objet,date..." name="objet" required/>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-11" style="margin-left: 3%;">


                                <div class="widget-box">

                                    <div class="widget-body">
                                        <div class="widget-main">

                                            <div class="table-responsive">
                                                <table id='' class='table'>
                                                    <caption>
                                                        <h5><strong>Feuille de Calculs</strong></h5>
                                                    </caption>
                                                    <thead id="titleCalcul"  >
                                                    <tr>
                                                        <th>Designation</th>
                                                        <th>Conditionement</th>
                                                        <th>Prix unitaire</th>
                                                        <th>Quantite</th>
                                                        <th>Montant</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="manligneCalcul" style="clear:both">

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div id="AS" >
                                                                <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix du Produit "  id="uid" style="width:237px;"><option> </option><?php    $val='rec';   Select_Prd($val);?></select>
                                                                <a href="#"   onClick="getLine()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                                            </div>
                                                            <div id="CF">
                                                                <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix du Produit "  id="uidch" style="width:237px;"><option> </option><?php    $val='charge';   Select_Prd($val);?></select>
                                                                <a href="#"   onClick="getCharge()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                                            </div>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td>

                                                        </td>
                                                        <td> Total HT :<input name="totalht" id="valTotalHT_stand" value="0" type="text"  class="form-control"></td>
                                                        <td>TVA (%) : <input  id="valTVA_stand" value="0" type="text" class="form-control"></td>

                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><input name="ligne"   type="hidden" id="nbrl" class="form-control"/></td>
                                                        <td><input onClick="monCalcul()" class="btn btn-sm btn-primary" value="Calculer" type="button" id="BING" ></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>

                                                        <td colspan="4">

                                                            <div class="alert alert-info">
                                                                <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" class="form-control" required/>

                                                                <input name="lettr" type="text" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " id="lettrSTAND"  class="form-control"required/>
                                                                <input name="number"   type="hidden" value="" id="lignenombre" class="form-control" />
                                                            </div>
                                                        </td>

                                                        <td>Total TTC :<input name="totalttc" id="valTotalTTC_stand" value="0" type="text" class="form-control"></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="4">
                                                            <div class="form-group input-group">

                                                                <span class="input-group-addon "> Avance</span>
                                                                <input class="form-control Avance" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                                <span class="input-group-addon ">Reste :</span>
                                                                <input class="form-control Reste" id="Reste" value="0.00" name="reste" readonly/>

                                                            </div>

                                                        </td>

                                                        <td>
                                                            <select  name="reg" class="form-control" required>
                                                                <option value="Esp&egrave;ce">Esp&egrave;ce</option>
                                                                <option value="Ch&egrave;que">Ch&egrave;que</option>
                                                                <option value="Virement banquaire">Virement banquaire</option>

                                                            </select>
                                                        </td>
                                                        <td></td>

                                                    </tr>
                                                    </tfoot>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="widget-footer">
                                        <input type="button" onClick="$('div#factureDEF').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                                        <input type="submit" name="savefac" value="VALIDER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

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





