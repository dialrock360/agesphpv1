<?php

//load and initialize database class

$db = new Db();
$condition = array('flag' => 0);
//get users from database
$tables = $db->getRows('famille',array('where'=>$condition,'order_by'=>'DESI asc'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="row">
    <div class="col-xs-12">
<h4 class="text-center">
Critere de Selection

<hr/>
</h4>
<form class="form-horizontal" action="<?php echo $base_url; ?>/controller/PubController.php" method="post">
 <div class="input-group">
                                      <input class="form-control"  type="date" name="dateinv" value="<?php echo date("Y/m/d")  ;?>" required />
                                    <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                </div>
  <div class="row">
  <div class="col-sm-3">
  <div class="row">
  
  <div class="col-sm-12">
    <div class="form-group">
  <label for="famille"><b>Famille d'articles</b> :</label>
  <select class="form-control chosen chosen-select " multiple data-placeholder="Produits Commerciaux" name="famille" required>
    <option></option>
	
	 <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                            <!-- Default unchecked -->
							
                                        <option value="<?php  echo $IDFA;   ?>"><?php  echo $DESI;   ?></option>
							 
						      	<?php  $count++; endforeach; else: ?>
                           
							    <option value="">Aucune ligne(s) trouvé......</option>
                                <?php endif; ?>
  </select>
</div>
  
  
						
						 
  </div>
</div>
    
  </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-8"> 
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd"><b>Regulateur :</b></label>
    <div class="col-sm-10"> 
      <div class="row">
  <div class="col-sm-4">
   Achetable
                            <div  class="hidencat">
                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch" name="achat" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
  </div>
  <div class="col-sm-4">
  Vendable
                            <div  class="hidencat">

                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch2" name="vente" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch2">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
  </div>
  <div class="col-sm-4">
  Comptabilisé
                            <div  class="hidencat">

                                <div class="onoffswitch">

                                    <input type="checkbox" class="onoffswitch-checkbox" id="myonoffswitch2" name="compta" value="1" >
                                    <label class="onoffswitch-label" for="myonoffswitch2">

                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>

                                    </label>
                                </div>
                            </div>
  </div>
</div>
    </div>
  </div>
  
  <div class="form-group"> 
  
<label>  <b> Types d'articles : </b></label>
    <div class="col-sm-offset-2 col-sm-10">
    <label class="radio-inline">
      <input type="radio" name="typeproduit" value="0" checked>Produits Simples
    </label>
    <label class="radio-inline">
      <input type="radio" name="typeproduit"  value="1">Produits Composés
    </label>
    <label class="radio-inline">
      <input type="radio" name="typeproduit"  value="2">Prestations de Service
    </label>
	</div>
  </div>
  <div class="form-group"> 
  
<label>  <b> Rapport Quantité : </b></label>
    <div class="col-sm-offset-2 col-sm-10">
    <div class="form-group">
	
  <select class="form-control" id="sel1" name="clauseqnt">
    <option value=""></option>
    <option value="<">Inférieur à</option>
    <option value=">" >Supérieur à</option>
    <option value="=" >Egale</option>
  </select>
   <input type="number" min="0" step="0.01" id="qnt" name="qnt" class="form-control"/>
</div>
 
        
	</div>
  </div>
   <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="btninvent" value="Génerer" class="btn btn-default">Génerer</button>
    </div>
  </div>

  </div>
</div>

  
 </form>
	
	
	
	
	
	
	
	
	
	
	
	
	
	





    </div>
</div>
