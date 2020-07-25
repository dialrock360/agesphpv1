<?php
error_reporting(0);


include 'bd.php';
include 'functionsTest.php';
include 'functionscat.php';
$user='dial';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////MULTIPLE EDITOR/////////////////////////////////////////////////////////////////////////////////


$cpt=0;

if (isset($_REQUEST['idmpx']))  {
	$count= intval($_REQUEST['idmp']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
	if ($count>0){
		for($i=1; $i<=$count; $i++) {
			$pid = $a[$i];
			$query = "UPDATE PRODUIT SET FLAG=1 WHERE IDP=:pid";
			$stmt = $db_con->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));


		}
		if ($stmt) {
			?>
			<script>
				alert('<?php echo $count." Produits Supprimés Avec Success...!!!"; ?>');
				window.location.href='stock.php';
			</script>
			<?php
		}
	}
	else{

		?>
		<script>
			alert('Veillez Cocher au moins une case !!!');
			window.location.href='stock.php';
		</script>
		<?php
	}
}
if (isset($_REQUEST['idmp']))  {
	$count= intval($_REQUEST['idmp']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
	$user=4;

	if ($count>0){
		?>
		<script>
			var uid = <?php echo json_encode($count); ?>;
			var choix = <?php echo json_encode($chk); ?>;
			alert(uid+' Cocher!!!'+choix);

			bootbox.dialog({
					message: "Etes vous sure de vouloir supprimer ces produit?",
				title: "<i class='glyphicon glyphicon-trash'></i> Supprimer !",
				buttons: {

					success: {
						label: "Non",
						className: "btn-success",
						callback: function() {
							$('.bootbox').modal('hide');
						}
					},
					danger: {
						label: "Oui",
						className: "btn-danger",
						callback: function() {

							var sendInfo = {
								mdelete: uid,
								chk: choix
							};

							// using $.ajax();

							 $.ajax({

							 type: 'POST',
							 url: 'delete.php',
							 data: sendInfo

							 })
							 .done(function(response){

							 bootbox.alert(response);
							 parent.fadeOut('slow');

							 })
							 .fail(function(){

							 bootbox.alert('Something Went Wrog ....');

							 })



							/*$.post('delete.php', { 'deletep':pid })
								.done(function(response){
									bootbox.alert(response);
									parent.fadeOut('slow');
								})
								.fail(function(){
									bootbox.alert('Something Went Wrog ....');
								})*/

						}
					}
				}
			});
		</script>
		<?php
		/*for($i=1; $i<=$count; $i++) {
			$pid = $a[$i];
			//UPDATE `PRODUIT` SET `IDP`=[value-1],`IDU`=[value-2],`ID_CAT`=[value-3],`DESI`=[value-4],`PHOTO`=[value-5],`PRIXA`=[value-6],`PRIXV`=[value-7],`FTECH`=[value-8],`FLAG`=[value-9] WHERE 1
			$query = "UPDATE PRODUIT SET FLAG=1 WHERE IDP=:pid";
			$stmt = $db_con->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));

		}
		if ($stmt) {
			?>
			<script>
				alert('<?php echo $count." Produits Supprimé Avec Success ...!!!"; ?>');
				window.location.href='stock.php';
			</script>
			<?php
		}*/
	}
	else{

		?>
		<script>
			alert('Veillez Cocher au moins une case !!!');
			window.location.href='stock.php';
		</script>
		<?php
	}
}


if (isset($_REQUEST['idmcat']))  {
	$count= intval($_REQUEST['idmcat']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);

	if ($count>0){
		for($i=1; $i<=$count; $i++) {
			$pid = $a[$i];
			$query = "UPDATE CATEGORIE SET FLAG=1 WHERE ID_CAT=:pid";
			$stmt = $db_con->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));


		}
		if ($stmt) {
			?>
			<script>
				alert('<?php echo $count." Produits Supprimés Avec Success...!!!"; ?>');
				window.location.href='stock.php';
			</script>
			<?php
		}
	}
	else{

		?>
		<script>
			alert('Veillez Cocher au moins une case !!!');
			window.location.href='stock.php';
		</script>
		<?php
	}
}

if (isset($_REQUEST['idmc']))  {
	$count= intval($_REQUEST['idmc']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
if ($count>0){
	for($i=1; $i<=$count; $i++) {
		$pid = $a[$i];
		//  INSERT INTO `CONDIS`(`IDC`, `NOMC`, `FLAG`) VALUES ([value-1],[value-2],[value-3])

		$query = "UPDATE CONDIS SET FLAG=1 WHERE IDC=:pid";
		$stmt = $db_con->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));


	}
	if ($stmt) {
		?>
		<script>
			alert('<?php echo $count." Contitionements Supprimés Avec Success...!!!"; ?>');
			window.location.href='stock.php';
		</script>
		<?php
	}
}
else{

	?>
	<script>
		alert('Veillez Cocher au moins une case !!!');
		window.location.href='stock.php';
	</script>
	<?php
}
}

if (isset($_REQUEST['idmf']))  {
	$count= intval($_REQUEST['idmf']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
	if ($count>0){
		for($i=1; $i<=$count; $i++) {
			$pid = $a[$i];
			//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1

			$query = "FAMILLE CONDIS SET FLAG=1 WHERE IDFA=:pid";
			$stmt = $db_con->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));


		}
		if ($stmt) {
			?>
			<script>
				alert('<?php echo $count." Produits Supprimés Avec Success...!!!"; ?>');
				window.location.href='stock.php';
			</script>
			<?php
		}
	}
	else{

		?>
		<script>
			alert('Veillez Cocher au moins une case !!!');
			window.location.href='stock.php';
		</script>
		<?php
	}
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
