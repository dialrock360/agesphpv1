<?php

$dburl='../../../model/DB.php';
require_once '../../../classes/classeinclude.php';
require_once '../../../model/include.php';
require_once '../../../model/DB.php';
require_once '../../../assets/web/rooting.php';
if($_POST['btnsave']){
    $titre='ENREGISTREMENT';
}else{
    $titre='MODIFICATION';
}





if(isset($_GET['ajaxetacompt'])&& !empty($_GET['ajaxetacompt'])){
    if(isset($_GET['dates'])&& !empty($_GET['dates'])){
        $caisseveille = 'Fonds = '.$capital=Get_fond();
    $db = new DB();
    $content="";
   
        $content .=' <div class="row"> ';
            $content .=' <div class="col-md-12"> ';
                $content .=' <h1>FEUILLE DE CONFIGURATION</h1> ';
                $content .=' <p> ';
                    $content .=' <form action="FacController.php" method="post" > ';


           

                $x=0;
                $tab=tri_bulle($_GET['dates']);
                foreach($tab as $date)
                {
                    $ttd=0;
                    $ttg=0;
                    $fac='facture';
                    $rec='recu';
                    $charge='CHARGES';

                    $db->setTablename('famille');
                    $condition = array("FLAG" =>0);
                    $countref =  $db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                    if($countref !=null) {
                      
                        $content .=' <div class="container"> ';

                            $content .='  <h2>Journée du <?php echo dateconverter($date); ?></h2> ';

                            $content .=' <table class="table table-striped"> ';
                                $content .=' <thead> ';
                                $content .='  <tr> ';
                                    $content .='    <th>Desi</th> ';
                                    $content .='  <th>Depense</th> ';
                                    $content .=' <th>Gain</th> ';
                                    $content .=' <th>Stock</th> ';
                                    $content .='  </tr> ';
                                $content .=' </thead> ';

                              
                                $i=0;
                                foreach($countref as $row){

                                    extract($row);


                                    $take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'   AND 	DATE_DEL="'.$date.' " ';

                                    $db->setTablename('v_facture');
                                    $condition = array("IDFA" =>$IDFA,"DATE_DEL" =>$date);
                                    $result =  $db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                                    if($result!=null)
                                    {
                                        $y=0;



                                        foreach($result as $ligne){
                                            extract($ligne);
                                            if($NOMMV== $rec){ $ttd=$ttd+$MTS; }
                                            if($NOMMV== $fac){$ttg=$ttg+$MTS; }
                                        }

                                        
                                        $content .=' <tr> ';
                                        $content .='      <td><input type="text" name="nom_<?php echo $x;?>_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="<?php echo $NOMF ;?>" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $x;?>_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo $IDFA; ?>"/></td> ';
                                        $content .='     <td><input type="text" name="dep_<?php echo $x;?>_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttd;?>" style="text-align:right;" class="form-control" required /></td> ';
                                        $content .='    <td><input type="text" name="gain_<?php echo $x;?>_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttg;?>" style="text-align:right;" class="form-control"  required /></td> ';
                                        $content .='    <td><input type="text" name="stock_<?php echo $x;?>_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="0" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td> ';

                                        $content .='  </tr> ';

                                       

                                        $ttds=$ttds+$ttd;
                                        $ttgs=$ttgs+$ttg;
                                        $res=$ttgs-$ttds+$capital;
                                        $ttd=0; $ttg=0;

                                    }
                                    $i++;
                                }



                                $content .='  <tr class="danger"> ';

                                    $content .='    <td><input type="text" name="nom_<?php echo $x;?>_<?php echo $i;?>" id="Champ2desi_<?php echo $i;?>" value="CAISSE" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_<?php echo $x;?>_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="<?php echo Show_Caisse("id");?>"/></td> ';
                                    $content .='    <td><input type="text" name="dep_<?php echo $x;?>_<?php echo $i;?>" id="Champ2dep_<?php echo $i;?>" value="<?php echo $ttds;  $ttds=0;?>" style="text-align:right;" class="form-control" required /></td> ';
                                    $content .='   <td><input type="text" name="gain_<?php echo $x;?>_<?php echo $i;?>" id="Champ2gain_<?php echo $i;?>" value="<?php echo $ttgs; $ttgs=0;?>"  style="text-align:right;" class="form-control"  required /></td> ';
                                    $content .='  <td><input type="text" name="stock_<?php echo $x;?>_<?php echo $i;?>" id="Champ2stock_<?php echo $i;?>" value="<?php echo $res; $capital=$res;?>" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /><input name="ligne_<?php echo $x;?>"   type="hidden" readonly value="<?php echo $i;?>" id="lignenombre" required /><input name="date_<?php echo $x;?>"   type="hidden" value="<?php echo $date;?>"  readonly required /></td> ';


                                    $content .='  </tr> ';

                                $content .=' </table> ';
                            $content .=' </div> ';



                       

                    }


                    $res=0;
                    $x++;


                }

             
                    $content .='  <input name="nbrreg" type="hidden" class="form-control" value="<?php echo $x;?>"> ';
                    $content .=' <input type="submit" name="saveetat" value="ENREGISTER"  class="btn btn-success " onmouseover="setline(this)" id="DEFLTR" > ';


                    $content .='  </form> ';
                $content .=' </p> ';
                $content .='  </div> ';
            $content .=' </div> ';


 
        echo $content;

 }
}





?>
