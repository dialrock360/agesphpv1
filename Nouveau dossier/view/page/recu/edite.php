<form>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Editer Profile</h4>
                </div>
                <div class="content">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Matricul</label>
                                <input type="text" class="form-control"  value="457DE00" name="mat">
                                <input type="hidden" class="form-control"   name="id" value="id" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" value="BOBO" name="nom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prénom</label>
                                <input type="text" class="form-control" value="michael" name="prenom">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Née le:</label>
                                <input type="date" class="form-control"  value="2002/05/10" name="date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Genre</label>
                                <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Genre " name="genre" required>
                                    <option value="HOMME" >HOMME</option>
                                    <option value="HOMME">HOMME</option>
                                    <option value="FEMME">FEMME</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tel</label>
                                <input type="text" class="form-control" value="77556644" name="tel">
                            </div>
                        </div>
                    </div>
                    <br />
                    <fieldset  style="background-color: rgba(134, 255, 116, 0.10);">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-3">
                                    <label>Année</label>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <input type="number" min="2000" max="2020" step="1" class="form-control" value="2005">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Semetre 1</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere1</label>
                                    <input type="text" class="form-control" value="10">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere2</label>
                                    <input type="text" class="form-control" value="12">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere3</label>
                                    <input type="number" class="form-control" value="15">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Semetre 2</label>
                                    <input type="hidden" class="form-control"  value="14">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere1</label>
                                    <input type="text" class="form-control"  value="14">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere2</label>
                                    <input type="text" class="form-control"  value="13">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Matiere3</label>
                                    <input type="number" class="form-control" value="17">
                                </div>
                            </div>
                        </div>
                        </fieldset>
                    <br />


                    <button type="submit" class="btn btn-info btn-fill pull-right" name="upd">Metre à Jour</button>
                    <div class="clearfix"></div>

                    <input type="hidden" class="form-control" value="0" name="valeur" />
                    <input type="hidden" class="form-control" value="0" name="annee" />
                    <input type="hidden" class="form-control" value="0" name="semestre" />
                    <input type="hidden" class="form-control" value="0" name="idm" />
                    <input type="hidden" class="form-control" value="etud" name="val" />
                    <input type="hidden" class="form-control" value="id etudiant" name="id" required />

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="public/img/sidebar-4.jpg"  alt="..."/>
                </div>
                <div class="content">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray" src="public/img/faces/face-3.jpg" alt="..."/>

                            <h4 class="title">BOBO<br />
                                <small>michael</small>
                            </h4>
                        </a>
                    </div>
                    <p class=""> <br><hr>
                    <div class="row">

                        <div class="col-md-2">

                        </div>
                        <div class="col-md-6 blue">
                            Moyenne Generale
                        </div>
                        <div class="col-md-2">
                            <h5 class="title center-block">
                                15.5
                            </h5>
                        </div>

                        <hr>
                        <div class="text-center">
                            <input type="file" class="form-control"  name="img"/>

                        </div>

                    </div>


                    </p>
                </div>
                <hr>

            </div>
        </div>

    </div>

</form>