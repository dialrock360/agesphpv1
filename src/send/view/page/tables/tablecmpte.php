
<?php

//load and initialize database class

$db = new Db();
//get users from database

$idcaisse=Show_Caisse("id");

$condition = array('IDFA' => $idcaisse);
//get users from database
//$tables = $db->getRows('etat_compte',array('where'=>$condition,'order_by'=>'DATEE DESC'));

$etats = $db->getspecificQuery('SELECT * FROM `v_grp_etat_compte`');

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="row">
    <div class="col-sm-10" style="margin:10%" >

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

        <form method="post" name="frm">
            <input type="hidden" id="number" name="number" required />

            <div class="table-responsive">
                <table  class='table table-striped'>
                    <caption>

                        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1" data-toggle="tooltip" title="Ajouter produit" style="float: right">
                            ETAT DE CAISSE
                            <span class="label label-xlg label-info label-white middle arrowed-in-right arrowed-in">


                                <?php
echo $idcaisse=Show_Caisse("id");
                                //echo Show_Etatref('stock',$date,$idcaisse);
                                ?>
                            </span>


                        </a>
						<input id="myInput" type="text" placeholder="Search..">

                    </caption>

                    <thead>
                    <tr>
                        <th >
                            DATE
                            <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>

                        </th>
                        <th>DEPENSE</th>
                        <th>GAIN</th>
                        <th>CAISSE</th>

                        <th >

                        </th>


                    </tr>
                    </thead>
                    <form method="post" name="frm">
                        <input type="hidden" id="number" name="number" required />
                        <tbody id="userData" >
                        <?php $count = 1; if(!empty( $etats)): foreach( $etats as $table):  extract($table) ?>
                            <tr id='tr_<?php echo $DATEE; ?>' >
                                <td>
								<?php 
								
								echo dateconverter($table['DATEE'],1); ?>
                                </td>
                                <td>
                                    <?php echo $table['DEPENSE']; ?>
                                </td>
                                <td>
                                   <?php echo $table['GAINS']; ?>
                                </td>
                                <td>
                                    <?php echo $table['STOCK']; ?>
                                </td>





                                <td class="hidden-480">

                                    <div class="btn-group btn-group-sm">
                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="cancelBtn" title="anuller" style="display: none">
                                            <i class="glyphicon glyphicon-remove red"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="saveBtn" title="enregister" style="display: none">
                                            <i class="glyphicon glyphicon-floppy-disk blue"></i>
                                        </a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="confirmBtn" title="valider" style="display: none">
                                            <i class="glyphicon glyphicon-ok green"></i>
                                        </a>
                                    </div>



                                   
                                    <input type='hidden' id='taburl' value="<?php //echo $tab_cible; ?>" >

									 <a href="#" class="tooltip-success" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDE; ?>" id="getfac" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>

                                    <a href="javascript:void(0)" data-toggle="tooltip"  class="deleteBtn" title="Supprimer">
                                        <i class="glyphicon glyphicon-trash red"></i>
                                    </a>


                                </td>
                            </tr>
                            <?php  $count++; endforeach; else: ?>
                            <tr><td colspan="6">Aucune ligne(s) trouvé......</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </form>
                </table>

            </div>
        </form>
    </div>
</div>