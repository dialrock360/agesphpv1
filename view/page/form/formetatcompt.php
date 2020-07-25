<style>
    #gconteneur
    {
        display: flex;
        justify-content: space-around;
    }
</style>
<div class="row">

    <div class="col-lg-12">
        <div class="alert alert-info" id="etatform">
            <div class="widget-box">
                <h5>
                    COMPTABILISER UNE JOURNEE D'EXERCICE

                </h5>

                <div class="widget-header">

                    <span class="widget-toolbar">
<a href="#" data-action="reload" onclick="myFunction()" data-toggle="tooltip" title="Recharger">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#"  onClick="$('div#etatform').slideUp(500);">
															<i class="glyphicon glyphicon-th"></i>
														</a>
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

													</span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <div class="row" style=" background-color: #fdfbf3">
                            <div class="col-sm-8">
                                <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >
                                    <div class="table-responsive table-bordered">
                                        <h5><strong>Recercher exercice pour La date Du </strong> <label class="btn btn-default btn-circle" >date
                                                <input type="hidden" name="dateex" value="<?php echo $Sdate;?>" id="datex"   style="opacity:0.8; height:20px;"  >
                                                <select required   class="chosen-select form-control" class="chosen" data-placeholder="Choisir la date de l' exercice"   id="datee" name="datee" >
                                                    <?php $count = 1; if(!empty( $listeetatcmpt)): foreach( $listeetatcmpt as $table):  extract($table) ?>
                                                        <option value="<?php echo $DATEE; ?>"> <?php echo $DATEE; ?></option>
                                                        <?php  $count++; endforeach; else: ?>
                                                        <option>Aucune date trouvée......</option>
                                                    <?php endif; ?>
                                                </select>
                                                <a  href="javascript:void(0)" id="gete"  onmouseover="setline(this)"  class="btn btn-sm btn-info">Génerer<i class="glyphicon glyphicon-share"></i></a>

                                            </label></h5>
                                        <table class="table">
                                            <thead id="titleCalcul"  >
                                            <tr>





                                                <th>Famille</th>
                                                <th>Dépenses</th>
                                                <th>Gains</th>
                                                <th>Bank</th>
                                            </tr>
                                            </thead>
                                            <tbody id="manligneCalcul" style="clear:both">


                                            </tbody>
                                            <tfoot>


                                            <tr>

                                                <td >
                                                    <input type="hidden" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />

                                                    <input type="hidden" id="valTVA_stand" value="0"  class="form-control"  />
                                                    <a  href="javascript:void(0)" id="calcul"  onclick="monCalcul()"  class="btn btn-sm btn-info">Calculer</a>

                                                    <input  id="ligne" type="number" name="ligne"   type="text" id="ligne" required readonly >

                                                </td>

                                                <td colspan="3">
                                                    <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                                                    <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reg" readonly/>
                                                    <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reste" readonly/>
                                                    <input  type="hidden" class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                    <input name="lettr"  type="hidden" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                                                    <input name="number"   type="hidden" value="" id="lignenombre" />
                                                    <input type="hidden" type="hidden" class="form-control" value="1">

                                                    <div class="form-group">
                                                        <input type="button" name="savesingleetat" value="Vider"  class="btn btn-danger " onclick="clearline()"   >


                                                    </div>
                                                </td>
                                            </tr>

                                            </tfoot>

                                        </table>
                                    </div>
                                    <input name="number"   type="hidden" value="" id="lignenombre" required />

                                </form>
                            </div>
							<div class="col-sm-4">
	 <form action="<?php echo $base_url; ?>/controller/FacController.php" method="get" >

                                <div class="element">
                                  Insertion Multiple de Flux

                                    <select required multiple class="chosen-select form-control" class="chosen" data-placeholder="Choisir les date a enregistrer"   id="idselect" name="dates[]" >
                                        <?php
                                        Select_alldatemouv();
                                        ?>
                                    </select>


                                    <button  type="submit"  value="getdatee" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-download-alt"></i>ENREGISTRER</button>



                                    <!--  <a href="#" class="tooltip-default" data-toggle="modal" data-target="cmptModal" id="comptday" href="javascript:void(0)" data-toggle="tooltip" title="Comptabiliser">
                                      <button class="btn btn-xs btn-default">
                                          ENREGISTRER
                                      </button>
                                  </a> -->
                                    <!-- Trigger the modal with a button -->
                                    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->

                                     <!-- Modal -->
                                    <!--  <div class="modal fade" id="myModal"  role="dialog">
                                         <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                     <h4 class="modal-title">Modal Header</h4>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p>This is a large modal.</p>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>-->

                                </div>
     </div>
                            </div>

                        </div >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
             require_once 'view/page/tables/tablecmpte.php';
            ?>
        </div>

    </div>


</div>




