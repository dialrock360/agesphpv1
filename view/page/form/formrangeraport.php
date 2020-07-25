

<style>
    #Afour{
        display: none;
    }
</style>


<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>




            <form >

                <div class="panel panel-warning">
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="alert alert-info">

                            <div class="widget-box">


                                <div class="widget-header">
                                    <h4 class="widget-title">
                                        <h5> Bilan de travail   <strong><?php echo $_GET['date'];

                                                ?>
                                                - <strong><?php echo $_GET['datef'];

                                                    $etatcmptdb = new Etat_compte();

                                                ?>
                                            </strong></h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <textarea name="conten"  required>
                                         <?php
                                         require_once "formrapport/range/contentpage.php";
                                         //require_once "formrapport/range/totalrecap.php";
                                         //require_once "formrapport/range/detailrecap.php";
                                         ?>
                                          </textarea >
                                        <script language="JavaScript" type="text/javascript">

                                            CKEDITOR.replace( 'conten', {
                                                toolbar : 'Standard',
                                                uiColor: '#E8F3FF',
                                                height:500,

                                            });
                                        </script>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
