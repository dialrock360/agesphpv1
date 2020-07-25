<form action="../model/modeluser.php" method="post" enctype="multipart/form-data" >

    <fieldset>

        <label class="block clearfix">
    <span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Designation
</div>
<div class="col-sm-6">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" class="form-control" placeholder="Nom de La Matière"  name="nom" onkeyup="matFunction()" required />
                                    <i class="ace-icon fa fa-barcode"></i>
                                </span>
</div>
<div class="col-sm-2">
    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="add">
        <span class="bigger-110">Valider</span>

        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
    </button>
</div>
                    </span>
        </label>

    </fieldset>

</form>