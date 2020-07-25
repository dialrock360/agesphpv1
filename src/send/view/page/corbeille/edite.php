
<form>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">  MODIFICATION  NOTE</h4>

                </div>
                <div class="content">
                    <div class="row">
                        <div class="form-group">
                            <h5 class="title center-block" style="text-align: center;">
                                Matiere *
                            </h5>
                            <select class="form-control" name="idm" required>
                                <option value="HOMME">PHP</option>
                                <option value="HOMME">PHP</option>
                                <option value="HOMME">C++</option>
                                <option value="HOMME">JAVA</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Semestre *</label>
                                <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="semestre" required>
                                    <option value="HOMME">2</option>
                                    <option value="FEMME">1</option>
                                    <option value="SOCIETE">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Année *</label>
                                <input type="number" min="2000"  max="2020" step="1" class="form-control" VALUE="2015" name="annee" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Note *</label>
                                <input type="number" min="0"  max="20" step="1"  class="form-control" placeholder="Prénom de l'Etudiant" name="valeur" required>
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
                        <button type="submit" class="btn btn-info btn-fill pull-right" name="add">Modifier</button>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

    </div>
</form>