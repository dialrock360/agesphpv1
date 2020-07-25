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


            </select>
                                    </span>
                </div>
            </div>
        </div>
    </div>
</div>