<?php

require_once '../../../model/include.php';
require_once '../../../assets/web/rooting.php';
$log='admin';
if (isset($_REQUEST['id'])) {

    $id = intval($_REQUEST['id']);
    $query = "SELECT * FROM UTILISATEUR WHERE IDU=:id";
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">
            <img id="myImg"  src="assets/images/avatars/<?php echo $PHOTO;?>" alt="<?php echo $PRENOM_USER.' '.$NOM_USER ;?>"  width="100" height="100">
        </h4>
    </div>
    <div class="modal-body">



        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <tr>
                    <th>Prenom</th>
                    <td><?php echo $PRENOM_USER; ?></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><?php echo $NOM_USER; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $EMAIL; ?></td>
                </tr>
                <tr>
                    <th>Poste</th>
                    <td><?php echo $POSTE; ?></td>
                </tr>
                <tr>
                    <th>Salaire</th>
                    <td><?php echo $SALAIRE; ?></td>
                </tr>
            </table>

        </div>

    </div>

    <?php
}


if (isset($_REQUEST['idc'])) {
//SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
    $id = intval($_REQUEST['idc']);
    $query = "SELECT * FROM UTILISATEUR WHERE IDU=:id";
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">
            <img id="myImg"  src="assets/images/avatars/<?php echo $PHOTO;?>" alt="<?php echo $PRENOM_USER.' '.$NOM_USER ;?>"  width="100" height="100">
        </h4>
    </div>
    <div class="modal-body">



        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <tr>
                    <th>Nom</th>
                    <td><?php echo $NOM_USER; ?></td>
                </tr>
                <tr>
                    <th>Cni/Ninea</th>
                    <td><?php echo $CNI; ?></td>
                </tr>
                <tr>
                    <th>Contacte</th>
                    <td><?php echo $NUM_UER; ?></td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td><?php echo $ADRESS; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $EMAIL; ?></td>
                </tr>
            </table>

        </div>

    </div>

    <?php
}


if (isset($_REQUEST['idM'])) {
//SELECT `IDU`, `CNI`, `PRENOM_USER`, `NOM_USER`, `LOGIN`, `SEXE_USER`, `POSTE`, `SALAIRE`, `STATUT`, `DATNAIS`, `DATEM`, `LEVESECURITY`, `PASSE`, `ADRESS`, `EMAIL`, `NUM_UER`, `PHOTO`, `INFOS`, `CACHER`, `FLAG` FROM `UTILISATEUR` WHERE 1
    $id = intval($_REQUEST['idM']);
    $query = "SELECT * FROM UTILISATEUR WHERE IDU=:id";
    $stmt = $DBcon->prepare( $query );
    $stmt->execute(array(':id'=>$id));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">
            <img id="myImg"  src="assets/images/avatars/<?php echo $PHOTO;?>" alt="<?php echo $PRENOM_USER.' '.$NOM_USER ;?>"  width="100" height="100">
        </h4>
    </div>
    <div class="modal-body">


        <form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden"  value="<?php echo $log;?>" name="cacher" />
            <input id="origine" type="hidden" value="?file=page/user" name="origine">
            <input id="statut" type="hidden" value="<?php echo $STATUT;?>" name="statut">

            <div class="row">
                <div class="col-xs-12">
                    <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
<input type="hidden" class="form-control  " value="<?php echo $POSTE; ?>" name="poste" />
                                                                <input id="id" type="hidden" value="<?php echo $IDU;?>" name="id">
               <input id="oldimg" type="hidden" value="<?php echo $PHOTO; ?>" name="oldimg">

				<div >
								<div class="table-header">
									FORMULAIRE DE MODIFICATION
								</div>
							</div>


				<fieldset>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
															<i class="ace-icon fa fa-camera"></i>
														</span>
					</label>

					<label class="block clearfix">
                                <div class="col-sm-3">
	Nom
</div>
<div class="col-sm-9">
<span class="block input-icon input-icon-right">
																											<input type="text"  class="form-control" VALUE="<?php echo $NOM_USER; ?>"  name="nom"  required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
</div>

					</label>

					<label class="block clearfix">

                                 <div class="col-sm-3">
	CNI/NINEA
</div>
<div class="col-sm-9">

														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" VALUE="<?php echo $CNI; ?>"  name="cni"  />
															<i class="ace-icon fa fa-barcode"></i>
														</span>
</div>
					</label>

						<label class="block clearfix">
                                <div class="col-sm-3">
	Adresse
</div>
<div class="col-sm-9">

														<span class="block input-icon input-icon-right">
															<input type="texte" class="form-control" VALUE="<?php echo $ADRESS; ?>" name="adresse" />
															<i class="ace-icon fa fa-map-marker "></i>
														</span>
</div>
					</label>

					<label class="block clearfix">
                        <div class="col-sm-3">
	Tel
</div>
<div class="col-sm-9">

														<span class="block input-icon input-icon-right">
															<input type="tel" class="form-control" VALUE="<?php echo $NUM_UER; ?>" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
</div>
					</label>


							<label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
	Nature
</div>
<div class="col-sm-9">

						   <a href="javascript:void(0)" data-toggle="tooltip" title="Nature">
							   <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="sexe" required>
						<option VALUE="<?php echo $SEXE_USER; ?>" ><?php echo $SEXE_USER; ?></option>
			                                <option value="HOMME">HOMME</option>
											<option value="FEMME">FEMME</option>
											<option value="SOCIETE">SOCIETE</option>
					</select>
							   </a>
</div>
														</span>
					</label>

				</fieldset>

																<input type="hidden" class="form-control" value="..." name="prenom" required/>
                            <input type="hidden" class="form-control" value="0" name="salaire" />
                            <input type="hidden" class="form-control" name="datem" value="<?php echo date("Y/m/d"); ?>" />

                            <input type="hidden" class="form-control" value="..." name="email" />
                            <input type="hidden" class="form-control" value="..."  name="login"/>

                            <input type="hidden" class="form-control" value="..." name="passe" />
                            <input type="hidden" class="form-control" value="..." name="info" />

                            <input type="hidden" class="form-control" name="daten" value="<?php echo date("Y/m/d"); ?>" />
		</div>

	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->
			</span>
                    </div>
                </div>
            </div>


            <div class="clearfix">
                <button type="reset" class="width-30 pull-left btn btn-sm">
                    <i class="ace-icon fa fa-refresh"></i>
                    <span class="bigger-110">Vider</span>
                </button>

                <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="btnupdate">
                    <span class="bigger-110">Mettre a Jour</span>

                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                </button>
            </div>

        </form>

    </div>

    <?php
}