<style>
    #gconteneur
    {
        display: flex;
        justify-content: space-around;
    }
</style>
<div class="row">

    <div class="col-lg-12">


        <table class="table table-striped">


            <tr>
                <td>
                    <div id="gconteneur">
                        <div class="element">
                            <label class="btn btn-success btn-circle" >
                                <input type="radio" name="choix" value="produit" checked required> Produit
                            </label>
                        </div>
                        <div class="element">
                            <label class="btn btn-danger btn-circle" >
                                <input type="radio" name="choix" value="condis" checked required> Conditionnement
                            </label>
                        </div>
                        <div class="element">
                            <label class="btn btn-warning btn-circle">
                                <input type="radio" name="choix" value="categorie" required> Categorie
                            </label>
                        </div>
                        <div class="element">
                            <label class="btn btn-default btn-circle" >
                                <input type="radio" name="choix" value="famille" required>Famille D'Article

                            </label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Combien d'element Voullez vous Ajouter</td>
            </tr>

            <tr>
                <td>
                    <input type="number" id="qnt" name="qnt"  maxlength="2" pattern="[0-9]+" class="form-control" value="2" required />
                </td>
            </tr>

            <tr>
                <td>
                    <button data-toggle="modal" data-target="#view-modal" data-id=" " id="getElem" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-share"></i>émarer</button>

                </td>
            </tr>

        </table>


    </div>

</div>




