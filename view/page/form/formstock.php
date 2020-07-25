

<div class="row">
    <div class="col-sm-11" style="margin-left: 3%">

        <div class="table-responsive" id="myTablecat">
            <div class="alert alert-warning">

                <strong>  <small>Toute Modification Faite Ici Ne Sera Pas Suivit par le livre de Compte</small></strong>
                                <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >
                    <input type="hidden" name="total" value="1" />
                    <input type="hidden" name="idn" value="3" />
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                <h4 class="header smaller lighter white"> INITIALISER LA BANK</h4>
                               
                                <input type="hidden" id="numberfam" name="numberfam" required />

                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
							 <span id="dynamic-content"></span>
                                <table class="table table-bordered table-condensed table-hover table-striped">

                                    <tr>

                                        <th>DEPENSE</th>
                                        <th>GAINS</th>
                                        <th>CAISSE</th>
                                        <th>Action
                                        </th>
                                    </tr>
                                    <?php   $fondb->setId(1); $fond =  $fondb->get(); extract($fond);$i=1;?>
                                    <tr>
                                        <td>

                                            <input type="hidden" VALUE="<?php //echo $IDFA; ?>" class="form-control"  name="Aname<?php echo $i; ?>" />
                                            <input type="hidden" VALUE="<?php //echo $DESI; ?>" class="form-control"  name="Bname<?php echo $i; ?>" />
                                            <input type="hidden" VALUE="<?php //echo $COLOR; ?>" class="form-control"  name="Cname<?php echo $i; ?>" />

                                            <input type="TEXT" VALUE="<?php //echo $DEPENSE; ?>" class="form-control"  name="Dname<?php echo $i; ?>" readonly/>

                                        </td>
                                        <td>
                                            <input type="text" VALUE="<?php //echo $GAINS; ?>" class="form-control"  name="Ename<?php echo $i; ?>" readonly/>

                                        </td>
                                        <td>
                                            <input type="text" id="capital" VALUE="<?php echo $capital; ?>" class="form-control"  name="capital" />

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" onclick="updatecaisse()" name="mudatefond">


                                                <span class="bigger-110">Mettre A Jour</span>

                                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    <?php
                                 /*   for($i=1; $i<=1; $i++)
                                    {
                                        $fondb->setId(1);
                                        $countref =  $fondb->get();
                                        if($countref != null)
                                        {

                                                extract($countref);
                                                ?>
                                                <tr>
                                                    <td>

                                                        <input type="hidden" VALUE="<?php //echo $IDFA; ?>" class="form-control"  name="Aname<?php echo $i; ?>" />
                                                        <input type="hidden" VALUE="<?php //echo $DESI; ?>" class="form-control"  name="Bname<?php echo $i; ?>" />
                                                        <input type="hidden" VALUE="<?php //echo $COLOR; ?>" class="form-control"  name="Cname<?php echo $i; ?>" />

                                                        <input type="TEXT" VALUE="<?php //echo $DEPENSE; ?>" class="form-control"  name="Dname<?php echo $i; ?>" readonly/>

                                                    </td>
                                                    <td>
                                                        <input type="text" VALUE="<?php //echo $GAINS; ?>" class="form-control"  name="Ename<?php echo $i; ?>" readonly/>

                                                    </td>
                                                    <td>
                                                        <input type="text" id="capital" VALUE="<?php echo $capital; ?>" class="form-control"  name="capital" />

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-success" onclick="updatecaisse()" name="mudatefond">
														

                                                            <span class="bigger-110">Mettre A Jour</span>

                                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </td>

                                                </tr>
                                            <?php
                                            }


                                    }*/
                                    ?>

                                </table>


                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>
