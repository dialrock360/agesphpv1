


<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>


            <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title" align="center"> <i class="icon-certificate"></i>
                            <strong><i class="fa fa-money"></i>FACTURE PROFORMA</strong>

                        </h2>
                        <input type="hidden" name="type"  value="proforma"   required >

                        <input type="hidden" name="cacher" id="cacher" value="<?php echo $iduser; ?>"   required >

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-info">

                            <div class="widget-box">
                                <h5><strong>Informations G&eacute;n&eacute;rales</strong>

                                </h5>

                                <div class="widget-header">
                                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">FACTURE N&deg;
    <input  type="hidden" value="" id="AUTOINCREMENT"/>
    <input type="text" name="idF" value="<?php   Newid_Fac();?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
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
                                            <input class="form-control" type="date"  name="date" value="<?php echo $Sdate;?>" required/>
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
                                                            Nouveau Client<input type="radio" name="option" value="2"
                                                                                 onClick="$('div#Ncli').slideDown(500);$('div#Acli').slideUp(500);"

                                                                                 checked />
                                                        </label>
                                                    </div>

                                                    <div class="col-xs-6 col-sm-3">

                                                        <label class="col-md-9">
                                                            
                                                        </label>

                                                    </div>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <label class="pull-right">
                                                            Ancien Client<input type="radio" name="option" value="1"
                                                                                onClick="$('div#Acli').slideDown(500);$('div#Ncli').slideUp(500);"

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
                                                                <input type="text" class="form-control" placeholder="Nom du Complet du Client"  name="nom"/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                                                <input type="text" class="form-control" placeholder="numero du du Client" name="tel"/>
                                                            </div>
                                                            <div class="form-group input-group">
                                                                <span class="input-group-addon">CNI ou NINEA</span>
                                                                <input type="text" class="form-control" name="cni"/>
                                                                <input type="hidden" class="form-control" name="statut" value="cli"/>

                                                            </div>

                                                        </div>
                                                        <div class="form-group " id="Acli">

                                                            <select class="form-control" name="idacom">
                                                                <?php   Select_Cli(); ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="standard">
                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon fpro">Objet</span>
                                                            <input type="text" class="form-control" placeholder="objet de la demande" name="objet" required/>


                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <span class="input-group-addon fpro">Condition</span>

                                                        <div >
                                                                <textarea style="width: 100%;" name="conten" class="Basicediteur">
                                                                    <p style="margin-left:40px"><strong>D&eacute;lai de livraison</strong> : 1 semaine apr&egrave;s r&eacute;ception du Bon de Commande.</p> <p style="margin-left:40px"><strong>Lieu de livraison</strong> : si&egrave;ge de l&rsquo;OP Validit&eacute; de l&rsquo;offre :&nbsp;date</p> <p style="margin-left:40px"><strong>Paiement</strong> : 15 jours apr&egrave;s la livraison.</p>



                                                                </textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead id="titleCalcul"  >
                                    <tr>
                                        <th>Designation</th>
                                        <th>Conditionement</th>
                                        <th>Prix unitaire</th>
                                        <th>Quantite</th>
                                        <th>Montant</th>
                                        <th> <a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="manligneCalcul" style="clear:both">
                                    <tr>

                                        <td><input type="text" name="nom_0" id="Champ2Design_0" value="" style="text-align:left;" class="form-control" /><input type="hidden" name="idp_0" id="Champ2Idp_0" value="-1" ><input type="hidden" name="idf_0" id="Champ2Idf_0" value="-1" ><input type="hidden" name="row_0" id="Champ2Row_0" value="0" ></td>
                                        <td><input type="text" name="condis_0"id="Champ2Condis_0" value="" style="text-align:left;" class="form-control" /></td>
                                        <td><input type="text" name="prix_0" id="Champ2TarifHT_0" value="0"  style="text-align:right;" class="form-control" /></td>
                                        <td><input type="number" min="1" max="" step="0.5" name="qnte_0" id="Champ2Qte_0" value="1.00"  style="text-align:right;" class="form-control" /></td>
                                        <td><input type="text" name="ptotal_0" id="Champ2Result_0" value="0" style="text-align:right;" class="form-control" /></td>
                                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(0)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>


                                    </tr>
                                    <tr>
                                        <td><input type="text" name="nom_1" id="Champ2Design_1" value="" style="text-align:left;" class="form-control"  /><input type="hidden" name="idp_1" id="Champ2Idp_1" value="-1" ><input type="hidden" name="idf_1" id="Champ2Idf_1" value="-1" ><input type="hidden" name="row_1" id="Champ2Row_1" value="1" ></td>
                                        <td><input type="text" name="condis_1" id="Champ2Condis_1" value="" style="text-align:left;" class="form-control"   /></td>
                                        <td><input type="text" name="prix_1" id="Champ2TarifHT_1" value="0" style="text-align:right;" class="form-control" /></td>
                                        <td><input type="number" min="1" max="" step="0.5" type="text" name="qnte_1" id="Champ2Qte_1" value="1.00" style="text-align:right;" class="form-control" /></td>
                                        <td><input type="text" name="ptotal_1"id="Champ2Result_1" value="0" style="text-align:right;" class="form-control" /></td>
                                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(0)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                                    </tr>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td>
                                            <button class="btn btn-xs btn-white btn-primary btn-round INPUTFACT" type="button" onclick="ajoutLine()">
                                                <i class="ace-icon fa fa-plus blue"></i>
                                                Ajouter
                                            </button>
                                        </td>

                                        <td></td>
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
                                        <td><input name="ligne"   type="hidden" id="ligne" /></td></td>
                                        <td>
                                            <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>

                                        <td colspan="4">

                                            <div class="alert alert-info">
                                                <input name="tva" type="hidden" id="valueTVARETURN2"  value="0" readonly="true" required/>
                                                <div class="form-group">
                                                    <input name="lettr" type="text" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>

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
                                            <input type="hidden" name="avance"  value="0"   required >
                                            <input type="hidden" name="reste"  value="0"   required >
                                        </td>

                                        <td>
                                            <input type="hidden" name="reg"  value="0"   required >


                                        </td>
                                        <td></td>

                                    </tr>

                                    </tfoot>

                                </table>
                            </div>

                            <input type="button" onClick="$('div#FACTUREpro').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                            <input type="submit" name="btnsave" value="VALIDER"   class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                        </div>
                    </div>
            </form>



        </div>
    </div>
</div>