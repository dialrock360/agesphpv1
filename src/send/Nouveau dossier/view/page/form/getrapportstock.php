
<div class="col-sm-12">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title">Date Du jour</h4>

        </div>
        <div >
            <form action="<?php echo $base_url; ?>/controller/PupController.php" method="post" enctype="multipart/form-data"  >

                <div class="row">
                    <div class="col-xs-8 col-sm-10">
                        <div class="input-group">
                            <input class="form-control" type="hidden"  name="type" value="1" />
                            <input class="form-control" id="date" type="date" name="date"  />
                            <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <button type="submit" class="btn btn-info btn-sm  "  name="genererstock" >
                            Génerer<i class="glyphicon glyphicon-share"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>