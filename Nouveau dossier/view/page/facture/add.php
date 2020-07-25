<style>
    /* styles de base si JS est activé */
    .js .input-file-container {
        position: relative;
        width: 225px;
    }
    .js .input-file-trigger {
        display: block;
        padding: 14px 45px;
        background: #39D2B4;
        color: #fff;
        font-size: 1em;
        transition: all .4s;

        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, .2);
        height: 235px;
        cursor: pointer;
    }
    .js .input-file {
        position: absolute;
        top: 0; left: 0;
        width: 225px;
        padding: 14px 0;
        opacity: 0;
        cursor: pointer;
    }

    /* quelques styles d'interactions */
    .js .input-file:hover + .input-file-trigger,
    .js .input-file:focus + .input-file-trigger,
    .js .input-file-trigger:hover,
    .js .input-file-trigger:focus {
        background: #34495E;
        color: #39D2B4;
    }

    /* styles du retour visuel */
    .file-return {
        margin: 0;
    }
    .file-return:not(:empty) {
        margin: 1em 0;
    }
    .js .file-return {
        font-style: italic;
        font-size: .9em;
        font-weight: bold;
    }
    /* on complète l'information d'un contenu textuel
       uniquement lorsque le paragraphe n'est pas vide */
    .js .file-return:not(:empty):before {
        content: "Selected file: ";
        font-style: normal;
        font-weight: normal;
    }
</style>


<div class="row">
    <div class="col-md-10" style="margin-left: 3%;">
        <div class="card">
            <div class="header">
                <h4 class="title"><i class="fa fa-user bigger-110"></i> Nouvel Etutiant</h4>

            </div>
            <div class="content">
                <div class="content">
                    <form class="form-signin" method="post" id="register-form">

                        <h4 class="form-signin-heading">

                            <div id="error">
                                <!-- error will be showen here ! -->
                            </div>
                        </h4>
                        <hr />


                        <div>
                            <div class="row">
                                <div class="col-sm-7">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>
                                                        <label for="id-date-picker-1">Nom</label>

                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" required />
																	<span class="input-group-addon">
																		<i class="fa fa-font bigger-110"></i>
																	</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div>
                                                        <label for="id-date-picker-1">Prenom</label>

                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-11">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" id="prenom" />
																	<span class="input-group-addon">
																		<i class="fa fa-bold bigger-110"></i>
																	</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="mat">Matricul</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" placeholder="Matricul de l'Etudiant" name="mat" id="mat" required/>
																	<span class="input-group-addon">
																		<i class="fa fa-barcode bigger-110"></i>
																	</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="mat">Née le:</label>
                                            <div class="input-group">

                                                <input class="form-control date-picker" id="date" type="date" data-date-format="dd-mm-yyyy" name="date" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="mat">Genre</label>
                                            <div class="form-group">
                                                <select class="form-control" name="genre" required>
                                                    <option ></option>
                                                    <option value="HOMME">HOMME</option>
                                                    <option value="FEMME">FEMME</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">

                                    <div class="input-file-container">
                                        <input class="input-file" id="my-file" type="file">
                                        <label for="my-file" class="input-file-trigger" tabindex="0">
                                            <i class="fa fa-image bigger-310"></i>

                                            Choisir une Photo...</label>
                                    </div>
                                    <p class="file-return"></p>

                                    <?php
                                    require_once'phonepiker.php';
                                    ?>
                                    <p class="file-return"></p>
                                </div>
                            </div>


                        </div>


                        <hr />

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-fill pull-right" name="add">Ajouter</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>



