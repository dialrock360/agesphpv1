

<style>
    #Afour{
        display: none;
    }
</style>




<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>





            <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                <div class="panel panel-warning">
                    <div class="panel-heading">

                        <h3 class="panel-title red" align="center"> <i class="fa fa-pencil-square-o "></i>
                            DEMANDE DE PROFORMA
                        </h3>
                        <input type="hidden" name="type" id="type" value="demande"   required >
                        <input type="hidden" name="totalht"  value="0"   required >
                        <input type="hidden" name="tva"  value="0"   required >
                        <input type="hidden" name="totalttc"  value="0"   required >
                        <input type="hidden" name="lettr"  value="0"   required >
                        <input type="hidden" name="avance"  value="0"   required >
                        <input type="hidden" name="reste"  value="0"   required >
                        <input type="hidden" name="ligne"  value="0"   required >
                        <input type="hidden" name="reg"  value="0"   required >
                        <input type="hidden" name="cacher" id="cacher" value="<?php echo $iduser; ?>"   required >



                        <div >

                        </div>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="alert alert-info">

                            <div class="widget-box">
                                <h5><strong>Informations G&eacute;n&eacute;rales</strong></h5>

                                <div class="widget-header">
                                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">DEMANDE N&deg;
    <input  type="hidden" value="" id="AUTOINCREMENT"/>
    <input type="text" name="idF" value="<?php  Newid_Fac();?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                                    </h4>

													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>

														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

													</span>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">


                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-11">
                                                        <div class="input-group">
                                                            <input class="form-control" type="date"  name="date" value="<?php echo $Sdate;?>" required/>
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="panel panel-default">
                                            <div class="panel-heading">


                                                <div class="row">

                                                    <div class="col-xs-6 col-sm-3">
                                                        <label class="pull-right">
                                                            Nouveau Fournisseurs<input type="radio" name="option"  value="2"
                                                                                       onClick="$('div#Nfour').slideDown(500);$('div#Afour').slideUp(500);"

                                                                                       checked />

                                                        </label>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <label class="pull-right">
                                                            
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-3">
                                                        <label class="pull-right">
                                                            Ancien Fournisseurs<input type="radio" name="option"  value="1"
                                                                                      onClick="$('div#Afour').slideDown(500);$('div#Nfour').slideUp(500);"

                                                            />

                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive table-bordered">
                                                <div class="designe">
                                                    <div id="Nfour">
                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                                            <input type="text" class="form-control" placeholder="Nom du Complet du Fournisseur" name="nom"/>

                                                        </div>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                                            <input type="text" class="form-control" placeholder="numero du Fournisseur" name="tel"/>
                                                        </div>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-addon">NINEA</span>
                                                            <input type="text" class="form-control" name="cni"/>
                                                            <input type="hidden" class="form-control" name="statut" value="four"/>

                                                        </div>


                                                    </div>

                                                    <div class="form-group " id="Afour">

                                                        <select class="form-control" name="idacom">
                                                            <option></option>
                                                            <?php   Select_Four(); ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="standard">
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon fpro">Objet</span>
                                                        <input type="text" class="form-control" placeholder="objet de la demande" name="objet" required/>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div style="background-color:white">
                                <h5><strong>D&eacute;tails de la demande</strong></h5>
                            </div>
                            <div class="form-group input-group dpro">


                                <fieldset>
                                    <div class="input-prepend">

                                        <span class="add-on">Contenu :</span>


                                        <textarea name="conten"  required>
<p style="margin-left:40px; text-align:right">Dakar; le</p> <div> <p style="margin-left:40px">A:<br /> BP :<br /> T&eacute;l/Fax :<br /> Email :</p> <p style="margin-left:40px">De :<br /> BP :<br /> T&eacute;l/Fax :<br /> Email :</p> <p style="margin-left:200px">&nbsp;</p> <p style="margin-left:280px; text-align:justify">Objet : demande de pro -forma&nbsp;</p> <p style="margin-left:40px; text-align:center"><br /> <br /> Messieurs,</p> <p style="margin-left:40px; text-align:center"><br /> Je vous prie de bien vouloir nous fournir une proforma pour les produits suivants...&nbsp; :</p> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:500px"> <thead> <tr> <th scope="col">D&eacute;signation</th> <th scope="col">Conditionnement</th> <th scope="col">Unit&eacute;</th> <th scope="col">Quantit&eacute;</th> </tr> </thead> <tbody> <tr> <td>p1</td> <td>...</td> <td>..</td> <td>...</td> </tr> <tr> <td>p2</td> <td>...</td> <td>...</td> <td>...</td> </tr> </tbody> </table> <h2 style="margin-left:40px; text-align:center">...</h2> <p>&nbsp;Je vous prie de bien vouloir sp&eacute;cifier sur votre proforma<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - &nbsp;les d&eacute;lais de livraison (&agrave; partir de la commande) &nbsp;;<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - &nbsp;la validit&eacute; de l&#39;offre &nbsp; ;<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - &nbsp;les conditions de paiement &nbsp;en tenant comp te que nous souhaitons payer une fois&nbsp;la livraison effectu&eacute;e ;<br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - &nbsp;les caract&eacute;ristiques des produits offerts par vous en particulier :</p> <p>&nbsp; &nbsp; &nbsp; En vous remerciant d&rsquo;avance, nous vous prions de croire, messieurs, &agrave; l&rsquo;expression de nos&nbsp;sentiments distingu&eacute;s.</p> <p>&nbsp;</p> <p>&nbsp;</p> <p style="text-align:right">M. (<strong>Nom et Prenom</strong>), Titre ou poste dans la structure</p> </div>
                </textarea>
                                        <script language="JavaScript" type="text/javascript">

                                            CKEDITOR.replace( 'conten', {
                                                toolbar : 'Standard',
                                                uiColor: '#E8F3FF',
                                                height:500,

                                            });
                                        </script>
                                    </div>

                                </fieldset>
                            </div>

                            <input type="button" onClick="$('div#FACTUREpro').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                            <input type="submit" name="btnsave" value="VALIDER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>











