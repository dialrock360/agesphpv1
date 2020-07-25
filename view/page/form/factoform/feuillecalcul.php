<div class="table-responsive table-bordered">
    <table class="table">
        <thead id="titleCalcul"  >
        <tr>
            <th>Designation</th>
            <th>Conditionement</th>
            <th>Prix unitaire</th>
            <th>Quantite</th>
            <th>Montant</th>
            <th> <!--<a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>-->
                <div id="demo"></div>
            </th>
        </tr>
        </thead>
        <tbody id="manligneCalcul" style="clear:both">


        </tbody>
        <tfoot>
        <tr>
            <td>
                <a href="#"   onClick="setLine(1)"   class="preview" title="Ajouter des Produits  Commerciaux"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Produits Commerciaux"  id="uid" style="width:70%;">
                    <?php echo  $option1;?>
                </select>

            </td>
            <td>
                <a href="#"   onClick="setLine(2)"   class="preview" title="Ajouter des Produits Industriels ou services"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produits Industriels "  id="room" style="width:70%;">
                    <?php echo  $option2;?>
                </select>

            </td>
            <td></td>
            <td></td>
            <td>
                <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Total HT : </label>

                    <div class="col-sm-7">
                        <input type="text" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />
                    </div>
                </div>

            </td>
            <td>
                <div class="form-group">
                    <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> TVA (%) : </label>

                    <div class="col-sm-7">
                        <input type="text" id="valTVA_stand" value="0"  class="form-control"  />
                    </div>
                </div>
            </td>


        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input name="ligne"   type="hidden" id="ligne" /></td>
            <td>
                <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
            </td>
            <td></td>
        </tr>
        <tr>

            <td colspan="4">

                <div class="alert alert-info">
                    <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                    <div class="form-group">
                        <input name="lettr"  type="text" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                    </div>
                    <input name="number"   type="hidden" value="" id="lignenombre" />
                </div>
            </td>

            <td colspan="2">

                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Total TTC : </label>

                    <div class="col-sm-8">
                        <input type="text" id="valTotalTTC_stand" value="0" name="totalttc"   class="form-control"  readonly required />
                    </div>
                </div>
            </td>
        </tr>
        <tr>

            <td colspan="4">
                <div class="form-group input-group">

                    <span class="input-group-addon "> Avance</span>
                    <input class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                    <span class="input-group-addon ">Reste :</span>
                    <input class="form-control " id="Reste" value="0.00" name="reste" readonly/>

                </div>
            </td>

            <td colspan="2">
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Mode de Payement </label>

                    <div class="col-sm-5">
                        <select  name="reg" class="col-xs-8 col-sm-8"  required>
                            <option value="Esp&egrave;ce">Esp&egrave;ce</option>
                            <option value="Ch&egrave;que">Ch&egrave;que</option>
                            <option value="Mobil Money">Mobil Money</option>

                        </select>
                    </div>
                </div>
            </td>

        </tr>

        </tfoot>

    </table>
</div>