
<div id="modal-table" class="modal fade" tabindex="-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Enregistrer un nouvel Employer/Utilisateur
                </div>
            </div>
            <?php require_once 'formruser.php';?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="row" id="listuser">
    <!-- page-COL  -->
    <div class="col-xs-12">
        <!-- SINGLE-ROW  -->

        <div class="hr hr-18 dotted hr-double"></div>

        <div class="table-header">
            LISTE DES EMPLOYERS
        </div>
        <h4 class="pink">
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="#modal-table" role="button" class="green" data-toggle="modal"> Ajouter Un Nouvel Employer </a>
        </h4>







        <!-- end SINGLE-ROW   -->

        <!-- SINGLE-ROW 2 -->
        <div class="hr hr-18 dotted hr-double"></div>
        <!-- end SINGLE-ROW 2  -->
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="center">

                                    <button class="btn btn-xs btn-danger" id="deletu" style="display: none">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button><br/>
                                    <label class="pos-rel">

                                        <input type="checkbox" class="ace" onclick="$('#deletu').slideDown(500);" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th class="detail-col">Details</th>
                                <th>NOM</th>
                                <th>SALAIRE</th>
                                <th class="hidden-480">FONCTION</th>

                                <th>
                                    <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                    EMBAUHER LE
                                </th>
                                <th class="hidden-480">STATUT</th>

                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php


                            $log=htmlspecialchars(trim($_SESSION['login']));

                            $level=3;


                            include "bd.php";
                            $take='SELECT * FROM  UTILISATEUR WHERE LOGIN="'.$log.'"';
                            $req = $base->query($take);
                            if($result=$req)
                            {

                            if($ligne=mysqli_fetch_array($result))
                            {


                            $prenomuser=$ligne['PRENOM_USER'];
                            $nomuser=$ligne['NOM_USER'];
                            $login=$ligne['LOGIN'];
                            ?>
                            <?php
                            include "bd.php";
                            include "function.php";

                            $take='SELECT * FROM  UTILISATEUR where FLAG=0 AND LOGIN!="'.$ligne['LOGIN'].'" ORDER BY NOM_USER ';
                            $req = $base->query($take);
                            if($result=$req)
                            {
                            while($ligne=mysqli_fetch_array($result))
                            {


                            $prenom=$ligne['PRENOM_USER'];
                            $nom=$ligne['NOM_USER'];
                            $tel=$ligne['NUM_UER'];
                            $sexe=$ligne['SEXE_USER'];
                            $poste=$ligne['POSTE'];
                            $salaire=$ligne['SALAIRE'];
                            $statut=$ligne['STATUT'];
                            $daten=$ligne['DATNAIS'];
                            $datem=$ligne['DATEM'];
                            $adress=$ligne['ADRESS'];
                            $secu=$ligne['LEVESECURITY'];
                            $idu=$ligne['IDU'];
                            $img=$ligne['PHOTO'];
                            $login=$ligne['LOGIN'];
                            $email=$ligne['EMAIL'];
                            $cni=$ligne['CNI'];
                            $info=$ligne['INFOS'];
                            $passe=$ligne['PASSE'];
                            $cache=$_SESSION['login'];
                            $age=age($daten);


                            // Petit exemple
                            $age = age($daten);
                            ?>
                            <div id="modal-table<?php echo $idu; ?>" class="modal fade" tabindex="-<?php echo $idu; ?>">
                                <form action="modeluser.php" method="post" enctype="multipart/form-data" >

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header no-padding">
                                                <div class="table-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <span class="white">&times;</span>
                                                    </button>
                                                    <!--
                                                    <img width="50" height="50" alt="<?php echo $nom;?>" src="assets/images/avatars/<?php echo $img;?>" />  <?php echo '   '.$nom.' '.$prenom;?>
                                                   _-->
                                                    <input type="file" class="form-small file-archive" name="img" id="id-input-file-2" value="<?php echo $img;?>" />

                                                </div>
                                            </div>
                                            <div class="row">
                                                <input type="hidden"  value="<?php echo $idu;?>" name="id" />
                                                <input type="hidden"  value="<?php echo $cache;?>" name="cacher" />


                                                <div class="col-sm-6">
                                                    <div class="widget-box">
                                                        <div class="widget-header">
                                                            <h4 class="widget-title">Infos Personnelles</h4>
                                                        </div>

                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <div class="input-group">
																<span class="input-group-addon">
																	Prenom
																</span>

                                                                    <input type="text" class="input-control" value="<?php echo $prenom ;?>"  name="prenom" required />
                                                                </div>

                                                                <div class="input-group">
																<span class="input-group-addon">
																	<em style="visibility: hidden">.re</em>Nom
																</span>

                                                                    <input type="text" class="input-control" value="<?php echo $nom ;?>"  name="nom" required />
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>

                                                                    <input class="form-control date-picker" id="id-date-picker-1" type="date" data-date-format="dd-mm-yyyy" name="daten" value="<?php echo $daten ;?>"/>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-users"></i>
																</span>

                                                                    <select class="form-control" id="form-field-select-1" name="sexe" required>
                                                                        <option value="value="<?php echo $sexe ;?>"><?php echo $sexe;?></option>
                                                                        <option value="HOMME">HOMME</option>
                                                                        <option value="FEMME">FEMME</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-envelope"></i>
																</span>

                                                                    <input type="email" class="form-control"  value="<?php echo $email;?>" name="email" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="widget-box">
                                                        <div class="widget-header">
                                                            <h4 class="widget-title">Infos de Travail</h4>
                                                        </div>

                                                        <div class="widget-body">
                                                            <div class="widget-main">
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-money"></i>
																</span>

                                                                    <input type="number" class="form-control"  value="<?php echo $salaire ;?>"  name="salaire"/>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-phone"></i>
																</span>

                                                                    <input type="tel" class="form-control"  value="<?php echo $tel ;?>"  name="tel"/>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-location-arrow"></i>
																</span>

                                                                    <input type="text" class="form-control"  value="<?php echo $adress ;?>" name="adress" required/>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-fonticons"></i>
																</span>

                                                                    <select class="form-control" id="form-field-select-1" name="poste" required>
                                                                        <option value="value="<?php echo $poste ;?>""><?php echo $poste ;?></option>
                                                                        <option value="BARMAID">BARMAID</option>
                                                                        <option value="CUISINIER">CUISINIER</option>
                                                                        <option value="CUISINIERE">CUISINIERE</option>
                                                                        <option value="DIRECTREUR">DIRECTREUR</option>
                                                                        <option value="DIRECTRICE">DIRECTRICE</option>
                                                                        <option value="GARDIEN">GARDIEN</option>
                                                                        <option value="MENAGERE">MENAGERE</option>
                                                                        <option value="PATRON">PATRON</option>
                                                                        <option value="SERVEUR">SERVEUR</option>
                                                                        <option value="SERVEUSE">SERVEUSE</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>

                                                                    <input class="form-control date-picker" id="id-date-picker-1" type="date" data-date-format="dd-mm-yyyy" name="datem" value="<?php echo $datem ;?>"/>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <label for="cni">CNI:
                                                <div class="hr"></div>

                                                <div class="input-group input-group-lg">
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-check">CNI:</i>
																	</span>
                                                    <input type="text" class="form-control"  VALUE="<?php echo $cni;?>"   name="cni" required/>

                                                </div>
                                                <div class="widget-box">
                                                    <div class="widget-header">
                                                        <h4 class="widget-title">Info de Connexion</h4>
                                                    </div>

                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            <div class="input-group">
																<span class="input-group-addon">
																	Login
																</span>

                                                                <input type="text" class="form-control" value="<?php echo $login ;?>" name="login"  />
                                                            </div>
                                                            <div class="input-group">
																<span class="input-group-addon">
																	Mot de passe
																</span>

                                                                <input type="password" class="form-control"  value="<?php echo $passe ;?>" name="pass" />
                                                            </div>
                                                            <div class="input-group">
																<span class="input-group-addon">
																	Confirmer Mot de passe
																</span>

                                                                <input type="password" class="form-control"  value="<?php echo $cpasse;?>" name="pass_confirm" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                        </div><!-- /.modal-content -->
                                        <div class="modal-footer no-margin-top">
                                            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                                                <i class="ace-icon fa fa-times"></i>
                                                Fermer
                                            </button>

                                            <ul class="pagination pull-right no-margin">
                                                <li class="prev disabled">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-angle-double-left"></i>
                                                    </a>
                                                </li>

                                                <li class="active">
                                                    <button class="btn btn-sm btn-success pull-left"  name="modif" type="submit">
                                                        <i class="ace-icon fa fa-ticket"></i>
                                                        Valider
                                                    </button>
                                                </li>


                                                <li class="next">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-angle-double-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.modal-dialog -->
                                </form>
                            </div>


                    </div>
                    <tr>
                        <td class="center">
                            <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td class="center">
                            <div class="action-buttons">
                                <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down"></i>
                                    <span class="sr-only">Details</span>
                                </a>
                            </div>
                        </td>

                        <td>
                            <a href="#"><?php echo $prenom ;?></a>
                        </td>
                        <td><?php echo $salaire; ?></td>
                        <td class="hidden-480"><?php echo $poste; ?></td>
                        <td><?php echo $datem; ?></td>

                        <td class="hidden-480">
                            <?php
                            if ($statut==0){ echo '<span class="label label-sm label-warning">Employer</span>';}
                            else{ echo '<span class="label label-sm label-success">Utilisateur</span>';}
                            ?>
                        </td>

                        <td>
                            <div class="hidden-sm hidden-xs btn-group">

                                <a href="#modal-table<?php echo $idu; ?>" role="button" class="green" data-toggle="modal">
                                    <button class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-print bigger-120"></i>
                                    </button>
                                </a>

                                <a href="user.php<?php echo $idu; ?>" role="button" class="red" data-toggle="modal">
                                    <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>
                                </a>

                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
                                            </a>
                                        </li>

                                        <li>

                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>




                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="table-detail">
                                <div class="row">
                                    <?php if ($level>2) {
                                        ?>
                                        <form action="modeluser.php" method="post" enctype="multipart/form-data" >

                                            <div class="col-xs-12 col-sm-2">
                                                <div class="text-center">
                                                    <img src="assets/images/avatars/<?php echo $img;?>" class="img-responsive" alt="Cinque Terre">
                                                    <!--<img height="150" class="thumbnail inline no-margin-bottom" alt="<?php echo $prenom ;?> Avatar" src="assets/images/avatars/<?php echo $img;?>"
                                                    -->
                                                    <br />
                                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <a class="user-title-label" href="#">
                                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                                &nbsp;
                                                                        <span class="white"><?php echo $prenom.'  '.$prenom ;?>
                                                                        </span>
                                                            </a>

                                                        </div>

                                                    </div>
                                                    <input type="hidden"  name="id"  value="<?php echo $idu; ?>"  />

                                                    <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-sign-in">CNI</i>
																</span>

                                                        <input class="form-control input-mask-phone" type="text" id="form-field-mask-12" value="<?php echo $cni ;?>"   name="cni" required/>
                                                    </div>
                                                    <input type="file" class="form-control file-archive" name="img" id="id-input-file-2"  />

                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Prenom & Nom </div>

                                                        <div class="profile-info-value">
                                                                    <span>
                                                                        <input type="text" class="input-small" value="<?php echo $prenom ;?>"  name="prenom" required />
                                                                        <input type="text" class="input-small" value="<?php echo $nom ;?>"  name="nom" required />
                                                                        <select class="form-small" id="form-field-select-1" name="sexe" required>
                                            <option value="value="<?php echo $sexe ;?>"><?php echo $sexe;?></option>
                                                                            <option value="HOMME">HOMME</option>
                                            <option value="FEMME">FEMME</option>
                                        </select>



                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Age </div>

                                                        <div class="profile-info-value">
                                                            <div class="form-group">
                                              <span class="input-icon ">
                                                  <?php echo $age ;?> ans Nee le
											</span>
                                                                        <span class="input-icon input-icon-right">
                                                                        <input class="form-small date-picker" id="id-date-picker-3" type="date" data-date-format="dd-mm-yyyy" name="daten" value="<?php echo $daten ;?>"/>
												<i class="ace-icon fa fa-calendar gray"></i>
											</span>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Contact </div>

                                                        <div class="profile-info-value">
                                                            <div class="form-group">
                                              <span class="input-icon ">
												<input type="tel" id="form-field-icon-4" value="<?php echo $tel ;?>" name="tel"/>
												<i class="ace-icon fa fa-phone red"></i>
											</span>
                                                                        <span class="input-icon input-icon-right">
												<input type="email" id="form-field-icon-1" value="<?php echo $email ;?>" name="email"/>
												<i class="ace-icon fa fa-envelope blue"></i>
											</span>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Foction & Salaire </div>

                                                        <div class="profile-info-value">
                                                            <div class="form-group">
                                              <span class="input-icon ">
                                                  <select class="form-control" id="form-field-select-1" name="poste" required>
                                            <option value="<?php echo $poste ;?>" ><?php echo $poste ;?></option>
                                                      <option value="BARMAID">BARMAID</option>
                                            <option value="CUISINIER">CUISINIER</option>
                                            <option value="CUISINIERE">CUISINIERE</option>
                                            <option value="DIRECTREUR">DIRECTREUR</option>
                                            <option value="DIRECTRICE">DIRECTRICE</option>
                                            <option value="GARDIEN">GARDIEN</option>
                                            <option value="MENAGERE">MENAGERE</option>
                                            <option value="PATRON">PATRON</option>
                                            <option value="SERVEUR">SERVEUR</option>
                                            <option value="SERVEUSE">SERVEUSE</option>
                                        </select>
											</span>
                                                                <?php if ($poste!="PATRON") {
                                                                    ?>

                                                                    <span class="input-icon input-icon-right">
												<input type="number" id="form-field-icon-2" value="<?php echo $salaire ;?>" name="salaire"/>
												<i class="ace-icon fa fa-money green"></i>
											</span>
                                                                <?php }
                                                                ?>

                                                            </div>



                                                        </div>
                                                    </div>


                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Adresse </div>

                                                        <div class="profile-info-value">
                                                            <div class="form-group">
                                              <span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-5" value="<?php echo $adress ;?>" name="adress"/>
												<i class="ace-icon fa-map-marker light-orange "></i>
											</span>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Date d'Embauche </div>

                                                        <div class="profile-info-value">
                                                            <div class="form-group">
                                                                <?php if ($poste!="PATRON"){
                                                                    ?>

                                                                    <span class="input-icon ">
                                                                        <input class="form-small date-picker" id="id-date-picker-3" type="date" data-date-format="dd-mm-yyyy" name="datem" value="<?php echo $daten ;?>"/>
												<i class="ace-icon fa fa-calendar gray"></i>
											</span>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> A Propos </div>

                                                        <div class="profile-info-value">
                                                                    <span class="input-icon ">
															<textarea class="form-control" id="form-field-8" placeholder="Default Text" name="info"><?php echo $info ;?></textarea>
												                        <i class="ace-icon fa fa-info light-blue"></i>
											                        </span>
                                                        </div>
                                                    </div>

                                                    <?php if ($level>3) {
                                                        ?>
                                                        <div class="profile-info-row">
                                                            <div class="profile-info-name"> Login & Mot de Passe </div>
                                                            <div class="profile-info-value">
                                                                <div class="form-group">
                                              <span class="input-icon ">
                                                <input type="text" id="form-field-icon-9" value="<?php echo $login ;?>" name="login"/>
												<i class="ace-icon fa fa-money green"></i>
											</span>

                                                        <span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" value="<?php echo $passe ;?>" name="passe"/>
												<i class="ace-icon fa fa-money green"></i>
											</span>

                                                                </div>



                                                            </div>

                                                        </div>

                                                        <?php
                                                    }
                                                    ?>
                                                    <input type="text" id="form-field-icon-8" value="<?php echo $passe ;?>" name="passe" />

                                                    <input type="text" id="form-field-icon-7" value="<?php echo $login ;?>" name="login" />

                                                </div>
                                                <button class="btn btn-sm btn-success pull-left"  name="modif" type="submit">
                                                    <i class="ace-icon fa fa-ticket"></i>
                                                    Modiffier
                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                    <?php if ($level<=2) {
                                        ?>


                                        <div class="col-xs-12 col-sm-2">
                                            <div class="text-center">
                                                <!--
                                                <img height="150" class="thumbnail inline no-margin-bottom" alt="<?php echo $prenom ;?> Avatar" src="assets/images/avatars/<?php echo $img;?>"
                                               -->
                                                <br />
                                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                    <div class="inline position-relative">
                                                        <a class="user-title-label" href="#">
                                                            <i class="ace-icon fa fa-circle light-green"></i>
                                                            &nbsp;
                                                                        <span class="white">CNI:<?php echo $cni ;?>
                                                                            :</span>
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-7">
                                            <div class="space visible-xs"></div>
                                            <div class="profile-user-info profile-user-info-striped">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Prenom & Nom </div>

                                                    <div class="profile-info-value">
                                                                    <span>
                                                                     <?php echo $prenom.'  '.$prenom ;?>

                                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Age </div>

                                                    <div class="profile-info-value">
                                                        <div class="form-group">
                                              <span class="input-icon ">
                                                  <?php echo $age ;?> ans
											</span>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Contact </div>

                                                    <div class="profile-info-value">
                                                        <div class="form-group">
                                              <span class="input-icon ">
												<input type="tel" id="form-field-icon-4" value="<?php echo $tel ;?>" readonly/>
												<i class="ace-icon fa fa-phone red"></i>
											</span>
                                                                        <span class="input-icon input-icon-right">
												<input type="email" id="form-field-icon-1" value="<?php echo $email ;?>" readonly/>
												<i class="ace-icon fa fa-envelope blue"></i>
											</span>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Foction & Salaire </div>

                                                    <div class="profile-info-value">
                                                        <div class="form-group">
                                              <span class="input-icon ">
                                                  <select class="form-control" id="form-field-select-1" name="poste" readonly="">
                                            <option value="value="<?php echo $poste ;?>""><?php echo $poste ;?></option>
                                        </select>
											</span>
                                                            <?php if ($poste!="PATRON") {
                                                                ?>

                                                                <span class="input-icon input-icon-right">
												<input type="number" id="form-field-icon-2" value="<?php echo $salaire ;?>" readonly/>
												<i class="ace-icon fa fa-money green"></i>
											</span>
                                                            <?php }
                                                            ?>

                                                        </div>



                                                    </div>
                                                </div>


                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Adresse </div>

                                                    <div class="profile-info-value">
                                                        <div class="form-group">
                                              <span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-5" value="<?php echo $adress ;?>" name="adress"/>
												<i class="ace-icon fa-map-marker light-orange "></i>
											</span>

                                                        </div>
                                                        <span><?php echo $datem ;?></span>
                                                    </div>
                                                </div>
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> Date d'Embauche </div>

                                                    <div class="profile-info-value">
                                                        <div class="form-group">
                                                            <?php if ($poste!="PATRON"){
                                                                ?>

                                                                <span><?php echo $datem ;?></span>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> A Propos </div>

                                                    <div class="profile-info-value">
                                                                    <span class="input-icon ">
															<textarea class="form-control" id="form-field-8" placeholder="Default Text" readonly><?php echo $info ;?></textarea>
												                        <i class="ace-icon fa fa-info light-blue"></i>
											                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <?php
                                    }
                                    ?>

                                    <div class="col-xs-12 col-sm-3">
                                        <div class="space visible-xs"></div>
                                        <h4 class="header blue lighter less-margin">Envoyer un message a <?php echo $prenom ;?></h4>

                                        <div class="space-6"></div>
                                        <?php
                                        if ($statut==1){
                                            ?>
                                            <form>
                                                <fieldset>
                                                    <textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
                                                </fieldset>

                                                <div class="hr hr-dotted"></div>

                                                <div class="clearfix">
                                                    <label class="pull-left">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Email me a copy</span>
                                                    </label>

                                                    <button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
                                                        Envoyer
                                                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                    </button>
                                                </div>
                                            </form>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>



                    <?php
                    }


                    }
                    else
                        echo'  Erreur: impossible de recuperer les donnees';



                    ?>
                    <?php } } ?>









                    </tbody>
                    </table>
                </div><!-- /.span -->
            </div><!-- /.row -->

            <div class="hr hr-18 dotted hr-double"></div>

            <hr/><hr/><hr/><hr/><hr/><hr/><hr/><hr/><hr/><hr/><hr/>
            <table id="dynamic-table" STYLE="display: none;">


            </table>


            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->

    </div>
    <!-- end page-COL   -->
</div>


























<script type="text/javascript">



    $('.view-admin').click(function(){
        var adminid = $(this).text();
        $("#showid").text( adminid );
        $.post('tableuser.php',{lien2M:lien2M},function(data){

            var popID = $(this).data('rel'); //Get Popup Name


            return false;
        });
        $('#view_contact').modal('show');

    });

</script>