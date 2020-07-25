<?php require_once 'model/functionfrontend.php';

?>
<?php //require_once'model/functionsuser.php';?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Application de Gestion des PME</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>

    <script type="text/javascript" src="assets/login/validation.min.js"></script>
    <![endif]-->
    <style>
        #bgwg {
            background-image: url("assets/images/avatars/web.png");
            background-repeat: no-repeat;
            background-size: contain;
        }
    </style>
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <?PHP
        if(isset($_GET['insertU'])) {
            ?>
            <div class="row">

                <div class="col-sm-8 col-sm-offset-1" style="margin-left:15%;">

                    <div class="register-container">
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body" >
                                    <div class="widget-main" id="bgwg">
                                        <div class="header blue lighter bigger" style="background-color: #002b36;color: white; ">

                                            <h2 class="form-signin-heading">Add <i class="ace-icon fa fa-user green"></i>ser In to App.</h2>

                                        </div>

                                        <div class="space-6"></div>

                                        <form class="form-signin" method="post">


                                            <div class="row">

                                                <div class="col-xs-12 col-lg-6">
                                                    <p> IDENTIFICATION: </p>
                                                    <fieldset>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
															<i class="ace-icon fa fa-camera"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="prenom" name="prenom" required/>
															<i class="ace-icon fa fa-font"></i>
														</span>
                                                        </label>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="nom" name="nom" required/>
															<i class="ace-icon fa fa-bold"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
                                                            <a href="javascript:void(0)" data-toggle="tooltip" title="date de naissance">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" name="daten" />
															<i class="ace-icon fa fa-calendar"></i>

														</span>
                                                            </a>
                                                        </label>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="cni ou passeport"  name="cni" required/>
															<i class="ace-icon fa fa-barcode"></i>
														</span>
                                                        </label>




                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
	Genre
</div>
<div class="col-sm-9">

						   <a href="javascript:void(0)" data-toggle="tooltip" title="sexe">
							   <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="poste" required>
						<option value=""></option>
						<option value="FEMME">FEMME</option>
						<option value="HOMME">HOMME</option>
					</select>
							   </a>
</div>
														</span>


                                                        </label>

                                                    </fieldset>
                                                </div>

                                                <div class="col-xs-12 col-lg-6">
                                                    <p>INFORMATION D'EMBAUCHE: </p>


                                                    <fieldset>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="tel" class="form-control" placeholder="numero de telephone" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                                        </label>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="login"  name="login"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="mot de passe" name="passe" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="repeter mot de passe" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                                        </label>

                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
	Poste
</div>
<div class="col-sm-9">

						   <a href="javascript:void(0)" data-toggle="tooltip" title="Poste">
							   <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="poste" required>
						<option value=""></option>
						<option value="DIRECTREUR">DIRECTREUR</option>
						<option value="DIRECTRICE">DIRECTRICE</option>
						<option value="PATRON">PATRON</option>
					</select>
							   </a>
</div>
														</span>
                                                            <input type="hidden" class="form-control" placeholder="salaire" name="salaire" value="0" />
                                                            <input type="hidden" class="form-control" name="datem"  value="0000/00/00"/>
                                                            <input type="hidden" class="form-control" placeholder="adresse" name="adress" value="0"/>


                                                        </label>


                                                    </fieldset
                                                </div>

                                            </div>
                                            <hr />

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default" name="btn-login" id="btn-reg">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
                                                </button>
                                            </div>

                                        </form>


                                        <div class="space-6"></div>

                                    </div><!-- /.widget-main -->

                                    <a href="" >
                                        <div class="toolbar clearfix">
                                            <div style="text-align: center;">
                                                Se Connecter

                                            </div>
                                    </a>

                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->
                        <div class="blue" id="id-company-text"><img src="assets/images/avatars/ageicon.gif" class="fa" alt="Logo PME" />  Application de gestion De l'<?php $val='nom';echo Service_info($val);?></div>

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Retrouver le Mot de passe
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Entrez votre adresse email
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Envoyer</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        Retour au login
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.forgot-box -->

                    </div><!-- /.position-relative -->


                </div>
            </div><!-- /.col -->
            <?PHP
        }
        else{
            ?>

            <div class="row">

                <div class="col-sm-10 col-sm-offset-1">

                    <div class="login-container">
                        <div class="center">
                            <h1>

                                <img src="assets/img/avatars/<?php //$val='logo';echo Service_info($val);?>" class="fa" alt="<?php //$val='nom';echo Service_info($val);?>" />

                                <span class="red"><?php //$val='nom';echo Service_info($val);?></span><br/>

                            </h1>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body" >
                                    <?php  $val='nom';echo Show_service($val);?><img src="assets/images/avatars/<?php  $val='logo';echo Show_service($val);?>" class="fa" alt="Logo"  height="32" width="32"/>
                                    <div class="widget-main" id="bgwg">
                                        <h4 class="header blue lighter bigger" style="background-color: #002b36;color: white; ">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Entrez vos Informations
                                        </h4>

                                        <div class="space-6"></div>

                                        <div id="error">
                                            <!-- error will be shown here ! -->
                                        </div>
                                        <form class="form-signin" method="post" id="login-form">

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Votre Login" name="login" id="login" />
                                                <span id="check-e"></span>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Votre Mot  de Passe" name="pass" id="pass" />
                                            </div>

                                            <hr />

                                            <div class="form-group">
                                                <button type="button" class="btn btn-default" name="btn-login" id="btn-login">
                                                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; connecter
                                                </button>
                                            </div>

                                        </form>



                                        <div class="space-6"></div>

                                    </div><!-- /.widget-main -->

                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                Mot de passe oublié
                                            </a>
                                        </div>


                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.login-box -->
                            <div class="blue" id="id-company-text"><img src="assets/images/grid/ageicon.gif" class="fa" alt="Logo PME"  height="32" width="32"/>  Application de gestion De PME</div>

                            <div id="forgot-box" class="forgot-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="ace-icon fa fa-key"></i>
                                            Retrouver le Mot de passe
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Entrez votre adresse email
                                        </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                </label>

                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                                        <span class="bigger-110">Envoyer</span>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /.widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" data-target="#login-box" class="back-to-login-link">
                                            Retour au login
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /.widget-body -->
                            </div><!-- /.forgot-box -->

                        </div><!-- /.position-relative -->

                        <div class="navbar-fixed-top align-left">

                            <br />
                            &nbsp;
                            <a id="btn-login-dark" href="#">Noir</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-light" href="#">Claire</a>
                            &nbsp;
                            <span class="blue">/</span>
                            &nbsp;
                            <a id="btn-login-blur" href="#">Bleu</a>

                            &nbsp; &nbsp; &nbsp;
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <?php
        }
        ?>
    </div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });

    jQuery(function($) {
        $(document).on('click', '#btn-login', function(e) {
            e.preventDefault();
            // $("#btn-login").html('<img src="assets/login/ajax-loader1.gif"  height="32" width="32"/> &nbsp; connection ...');
            var login=  $('#login').val();
            var pass=  $('#pass').val();

            // alert(login+' Cocher!!!'+pass);


            var sendInfo = {
                login: login,
                pass: pass
            };
            $.ajax({

                type : 'POST',
                url  : './controller/login_process.php',
                data : sendInfo,
                beforeSend: function()
                {
                    $("#error").fadeOut();
                    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; verification ...');
                },
                success :  function(response)
                {
                    if(response==1){

                        $("#btn-login").html('<img src="assets/login/ajax-loader1.gif"  height="32" width="32"/> &nbsp; connection ...');
                        setTimeout(' window.location.href = "./controller/redirect.php?login='+login+'&pass='+pass+'"; ',3000);
                    }
                    else{

                        $("#error").fadeIn(1000, function(){
                            $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                            $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; connection');
                        });
                    }
                }
            });
        });
    });




    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>

</body>



</html>
