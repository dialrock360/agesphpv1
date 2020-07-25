<?php

//load and initialize database class

$db = new Db();
//get users from database
$tables = $db->getRows('poste',array('order_by'=>'libelle DESC'));


?>

<input list="browsers" name="poste" id="poste" value="<?php if(isset( $poste))echo $poste ;?>" >
<datalist id="browsers">
  	<option value="">
	                        <?php if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
							
						<option value="<?php echo $libelle;?>">
         <?php endforeach; else: ?>
		   <option value="employer">
                        <?php endif; ?>
</datalist>
	
	
	<script>

   $("#browsers").on('input',function(e){
 alert($(this).val());
});
</script>