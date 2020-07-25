

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
                            <strong><i class="fa fa-money"></i>NOUVELLE <?php echo $titre;?>

                            <input  type="hidden" value="" id="AUTOINCREMENT"/>
                            <input type="hidden" name="idF" value="null"    readonly="true" style="opacity:0.5; height:10px;" >
                        </h2>
                        <input type="hidden" name="type" id="type" value="<?php echo $type; ?>"   required >
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
    <input type="date" name="date" value="<?php echo $Sdate;?>" min="2010-01-01" max="<?php echo $Sdate;?>" id="date"   style="opacity:0.8; height:20px;" >
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
    <input type="text" type="text" class="form-control" placeholder="objet de la Facture" id="INCREMENT"  name="objet" style="opacity:0.9; height:30px;" required>
                                    </span>


                                                </div>
                                            </div>



                                            <?php
                                            require_once 'commercial.php';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h5><strong>Feuille de Calculs</strong></h5>



                            <?php
                            require_once 'feuillecalcul.php';
                            ?>

                            <input type="button" onClick="$('div#factureDEF').slideUp(500); $('div#infomalade').fadeIn(500);" value="FERMER" class="btn btn-danger" >

                            <input type="submit" name="btnsave" value="VALIDER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
</div>













