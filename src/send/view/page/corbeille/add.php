
<form>
    <input type="hidden" class="form-control"   name="id" value="" required>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">  NOUVELLE NOTE</h4>

                </div>
                <div class="content">
                    <div class="row">
                        <div class="form-group">
                            <h5 class="title center-block" style="text-align: center;">
                                Matiere *
                            </h5>
                            <select class="form-control" name="idm" required>
                                <option ></option>
                                <option value="HOMME">PHP</option>
                                <option value="HOMME">C++</option>
                                <option value="HOMME">JAVA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input name="semestre" type="radio" class="input-lg" required />
                                        <span class="lbl bigger-120">Semestre 1</span>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="semestre" type="radio" class="input-lg"  required/>
                                        <span class="lbl bigger-120"> Semestre 2</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Année *</label>
                                <input type="text" class="form-control" placeholder="Année" name="annee" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Note *</label>
                                <input type="text" class="form-control" placeholder="Prénom de l'Etudiant" name="valeur" required>
                            </div>
                        </div>
                    </div>



                    <input type="hidden" class="form-control" value="0" name="tel" />
                    <input type="hidden" class="form-control" value="0" name="date" />
                    <input type="hidden" class="form-control" value="0" name="img" />
                    <input type="hidden" class="form-control" value="0" name="genre" />
                    <input type="hidden" class="form-control" value="0" name="prenom" />
                    <input type="hidden" class="form-control" value="0" name="nom" />
                    <input type="hidden" class="form-control" value="note" name="val" />
                    <input type="hidden" class="form-control"  name="img"  value="0"/>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-fill pull-right" name="add">Valider</button>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

    </div>
</form>