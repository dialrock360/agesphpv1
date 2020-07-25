

<?php
$log=htmlspecialchars(trim($_SESSION['login']));

if(!empty(isset($_GET['idmu'])))  {
    $id=$_GET['idmu'];

    $take='SELECT * FROM  UTILISATEUR where FLAG=0 AND 	IDU ="'.$_GET['idmu'].'"';
    $req = $base->query($take);
    if($result=$req)
    {
        if($ligne=mysqli_fetch_array($result)) {


            $prenom = $ligne['PRENOM_USER'];
            $nom = $ligne['NOM_USER'];
            $tel = $ligne['NUM_UER'];
            $sexe = $ligne['SEXE_USER'];
            $poste = $ligne['POSTE'];
            $salaire = $ligne['SALAIRE'];
            $statut = $ligne['STATUT'];
            $daten = $ligne['DATNAIS'];
            $datem = $ligne['DATEM'];
            $adress = $ligne['ADRESS'];
            $secu = $ligne['LEVESECURITY'];
            $id = $ligne['IDU'];
            $img = $ligne['PHOTO'];
            $login = $ligne['LOGIN'];
            $email = $ligne['EMAIL'];
            $cni = $ligne['CNI'];
            $info = $ligne['INFOS'];
            $passe = $ligne['PASSE'];
            $flag = $ligne['FLAG'];
            $cache=$_SESSION['login'];

            $age = age($daten);


            // Petit exemple
            $age = age($daten);
            ?>

            <div class="main-content">
                <div class="main-content-inner">

                    <div class="page-content">


                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->


                                <div class="hr dotted"></div>

                                <div>
                                    <form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
                                        <div id="user-profile-1" class="user-profile row">
                                            <div class="col-xs-12 col-sm-3 center">
                                                <div>
												<span class="profile-picture">
                                                    <img class=" img-responsive" alt="<?php echo $nom;?>" src="assets/images/avatars/<?php echo $img;?>"  />
                                                    <input id="id" type="hidden" value="<?php echo $id;?>" name="id">
                                                      <input id="origine" type="hidden" value="?idmu=<?php echo $id; ?>" name="origine">
                                                                            <input type="hidden"  name="oldimg"  value="<?php echo $img;?>" />

                                                     <div class="form-group">
                                                         <div class="col-xs-12">
                                                             <input type="file" id="id-input-file-3" name="img" />
                                                             <input type="hidden" class="form-control" name="statut" value="user" />
                                                         </div>
                                                     </div>


                                                                                                    <input type="hidden"  value="<?php echo $cache;?>" name="cacher" />


												</span>

                                                    <div class="space-4"></div>

                                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <a href="#" class="user-title-label dropdown-toggle"
                                                               data-toggle="dropdown">
                                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                                &nbsp;
                                                                <span class="white"><?php echo $prenom.' '.$nom.' [ '.$age.' Ans ]';?></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="space-6"></div>

                                                <div class="profile-contact-info">
                                                    <div class="profile-contact-links align-left">
                                                                    <span class="btn btn-link">

												CNI: <input type="text" class="input-small" value="<?php echo $cni ;?>"  name="cni"  style="border: none;" required />


											</span>
                                                        <div class="hr hr12 dotted"></div>
                                                        <span class="btn btn-link">

												Tel: <input type="text" class="input-small" value="<?php echo $tel ;?>"  name="tel"  style="border: none;" required />


											</span>
                                                        <span href="#" class="btn btn-link">
												<i class="ace-icon fa fa-globe bigger-125 blue"></i>
												<input type="text" class="input-control" value="<?php echo $email ;?>"  name="email" style="border: none;" />
											</span>
                                                    </div>

                                                    <div class="space-6"></div>

                                                    <div class="profile-social-links align-center">
                                                        <a href="?file=page/user" class="btn btn-sm btn-danger pull-left"  name="modif" type="submit">
                                                            <i class="ace-icon fa fa-home"></i>
                                                            Quiter
                                                        </a>

                                                        <a href="#">
                                                            <button class="btn btn-sm btn-success pull-right"  name="btnupdate" type="submit">
                                                                <i class="ace-icon fa fa-ticket"></i>
                                                                Mettre a jour
                                                            </button>
                                                        </a>
                                                        <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                                                            <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="hr hr12 dotted"></div>

                                                <div class="clearfix">
                                                    <div class="grid2">
                                                        <span class="bigger-175 blue">25</span>

                                                        <br />
                                                        Followers
                                                    </div>

                                                    <div class="grid2">
                                                        <span class="bigger-175 blue">12</span>

                                                        <br />
                                                        Following
                                                    </div>
                                                </div>

                                                <div class="hr hr16 dotted"></div>
                                            </div>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br />
													<span class="line-height-1 smaller-90"> Salaire </span>
												</span>

                                                    <span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br />
													<span class="line-height-1 smaller-90"> Attestation </span>
												</span>

                                                    <span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 33 </span>

													<br />
													<span class="line-height-1 smaller-90"> Congés </span>
												</span>

                                                    <span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br />
													<span class="line-height-1 smaller-90"> Dettes </span>
												</span>

                                                    <span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br />
													<span class="line-height-1 smaller-90"> Blame </span>
												</span>

                                                    <span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br />
													<span class="line-height-1 smaller-90"> Contacts </span>
												</span>
                                                </div>

                                                <div class="space-12"></div>

                                                <div class="profile-user-info profile-user-info-striped">


                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Nom</div>

                                                        <div class="profile-info-value">
												<span class="" id="nom">
													<input type="text" style="border: none;" class="input-control" value="<?php echo $nom ;?>"  name="nom" required />
												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Prenom</div>

                                                        <div class="profile-info-value">
												<span class="" id="prenom">
													<input type="text" style="border: none;" class="input-control" value="<?php echo $prenom ;?>"  name="prenom"  />
												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Sexe</div>

                                                        <div class="profile-info-value">
												<span class="" id="sexe">
													<select class="form-control" id="form-field-select-1" name="sexe" style="border: none;" required>
                                                        <option value="<?php echo $sexe ;?>"><?php echo $sexe ;?></option>
                                                        <option value="HOMME">HOMME</option>
                                                        <option value="FEMME">FEMME</option>
                                                        <option value="AUTRE">AUTRE</option>
                                                    </select></span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Nee le</div>

                                                        <div class="profile-info-value">
												<span class="" id="daten">
													<input class="form-small" id="id-date-picker-4" type="date"  value="<?php echo $daten;?>" style="border: none;" name="daten" />


												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Adress</div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                            <span class="" id="adress"><input type="text" class="input-control" value="<?php echo $adress ;?>" style="border: none;" name="adress"  /></span>
                                                        </div>
                                                    </div>


                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> Embauche le</div>

                                                        <div class="profile-info-value">
												<span class="" id="date">
													<input class="form-control" type="date"  value="<?php echo $datem;?>" style="border: none;" name="datem" />

												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Poste </div>

                                                        <div class="profile-info-value">
												<span class="" id="poste ">
													
													
<?php
                     include 'view/page/form/formposte.php';
                    ?>
													</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">salaire</div>

                                                        <div class="profile-info-value">
												<span class="" id="salaire">
													<input type="number" style="border: none;" class="input-control" value="<?php echo $salaire ;?>"  name="salaire"  />
												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">A propos</div>

                                                        <div class="profile-info-value">
												<span >
													<textarea class="form-control" id="form-field-8" style="border: none;"  name="info"><?php echo $info ;?></textarea>


												</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Login</div>

                                                        <div class="profile-info-value">
												<span class="" id="login">
													<input type="text" style="border: none;" class="input-control" value="<?php echo $login ;?>"  name="login"  />
												</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name">Mot de Passe</div>

                                                        <div class="profile-info-value">
												<span class="" id="passe">
													<input type="text" style="border: none;" class="input-control" value="<?php echo $passe;?>"  name="passe"  />
												</span>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

   

        <?php } }} ?>
