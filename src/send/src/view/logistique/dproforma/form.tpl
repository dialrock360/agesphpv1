

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

                            {include file='src/view/logistique/achat/input/_headers.tpl'}

                            <div style="background-color:white">
                                <h5><strong>D&eacute;tails de la demande</strong></h5>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
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
