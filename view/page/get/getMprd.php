<?php
error_reporting(0);


include 'bd.php';
include 'functionsTest.php';
include 'functionsPrd.php';
$user='dial';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////MULTIPLE EDITOR/////////////////////////////////////////////////////////////////////////////////




if (isset($_REQUEST['idmp']))  {
	$count= intval($_REQUEST['idmp']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
	$user=4;

	if ($count>0){
?>

		<div class="table-responsive">

			<table class="table table-striped table-bordered">
				<tr>

					<th>Modifier Plusieurs Articles</th>
				</tr>
				<tr>
					<td>

						<form class="form-signin" method="post" action="modelupprd.php" enctype="multipart/form-data" >

							<table class='table table-bordered'>

								<tr>
									<th>IMG</th>
									<th>Designation</th>
									<th>Conditionement</th>
									<th>Prix D'Achat</th>
									<th>Prix De Vente</th>
									<th>Details</th>

									<th>Categorie</th>
									<th>Photo</th>
									<input type="hidden" name="total" value="<?php echo $count; ?>" />

								</tr>
								<?php
								for($i=1; $i<=$count; $i++) {
									$id = $a[$i];
									$query = "SELECT * FROM PRODUIT WHERE IDP=:id";
									$stmt = $DBcon->prepare( $query );
									$stmt->execute(array(':id'=>$id));
									$row=$stmt->fetch(PDO::FETCH_ASSOC);
									extract($row);
								if($id!='on') {
									?>
									<tr>
										<td>
											<input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDP; ?>">

											<input type="hidden" name="id" value="<?php  Test_userRef($user); ?>" class='form-control' />


				<img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="32" height="32">
										</td>
										<td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $DESI;?>" class='form-control' /></td>
										<td>
											<select id="form-field-select-4" name="2name<?php echo $i; ?>">
												<?php
												Select_Condisref($IDC);
												Select_Condis();
//SELECT `IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1

												?>
											</select>
										</td>
										<td><input type="text" name="3name<?php echo $i; ?>" value="<?php echo $PRIXA;?>" class='form-control' /></td>
										<td><input type="text" name="4name<?php echo $i; ?>" value="<?php echo $PRIXV;?>" class='form-control' /></td>
										<td><input type="text" name="5name<?php echo $i; ?>" value="<?php echo $FTECH;?>" class='form-control' /></td>
										<td>
											<select id="form-field-select-3" name="6name<?php echo $i; ?>">

												<?php
												Select_Catref($ID_CAT);
												Select_Cat();
												?>
											</select>
										</td>
										<td><input type="file" name="7name<?php echo $i; ?>" class='form-control' /></td>

									</tr>
									<?php
								}}
								?>

								<tr>
									<td colspan="3">

										<div class="form-group">
											<button type="submit" class="btn btn-default" name="mudatepro" id="btn-submit">
												<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
											</button>
										</div>
									</td>
								</tr>
							</table>
						</form>


					</td>
				</tr>

			</table>

		</div>
		<?php


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
if (isset($_REQUEST['idmQp']))  {
	$count= intval($_REQUEST['idmQp']);
	$chk = $_REQUEST['chk'];
	$a = explode(' ', $chk);
	$user=4;

	if ($count>0){
?>

		<div class="table-responsive">

			<table class="table table-striped table-bordered">
				<tr>

					<th>Modifier Plusieurs Articles</th>
				</tr>
				<tr>
					<td>

						<form class="form-signin" method="post" action="modelupprd.php" enctype="multipart/form-data" >

							<table class='table table-bordered'>

								<tr>
									<th>IMG</th>
									<th>Designation</th>
									<th>Quantite</th>
									<input type="hidden" name="total" value="<?php echo $count; ?>" />

								</tr>
								<?php
								for($i=1; $i<=$count; $i++) {
									$id = $a[$i];
									$query = "SELECT * FROM PRODUIT WHERE IDP=:id";
									$stmt = $DBcon->prepare( $query );
									$stmt->execute(array(':id'=>$id));
									$row=$stmt->fetch(PDO::FETCH_ASSOC);
									extract($row);


								if($id!='on') {
									?>
									<tr>
										<td>
											<input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDP; ?>">

											<input type="hidden" name="id" value="<?php  Test_userRef($user); ?>" class='form-control' />


				<img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="32" height="32">
										</td>
										<td><input type="text" name="2name<?php echo $i; ?>" value="<?php echo $DESI;?>" class='form-control' readonly/></td>

										<td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $QNT?>" class='form-control' /></td>
										<td><input type="hidden" name="4name<?php echo $i; ?>" value="<?php echo $PRIXV;?>" class='form-control' /></td>
										<td><input type="hidden" name="5name<?php echo $i; ?>" value="<?php echo $FTECH;?>" class='form-control' /></td>
										<td>
											<select id="form-field-select-3" name="6name<?php echo $i; ?>" style="display: none">

												<?php
												Select_Catref($ID_CAT);
												Select_Cat();
												?>
											</select>
										</td>
										<td>
											<select id="form-field-select-4" name="3name<?php echo $i; ?>" style="display: none">
												<?php
												Select_Condisref($IDC);
												Select_Condis();
												//SELECT `IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1

												?>
											</select>
										</td>
										<td><input type="hidden" name="7name<?php echo $i; ?>" class='form-control' /></td>

									</tr>
									<?php
								}
								}
								?>

								<tr>
									<td colspan="3">

										<div class="form-group">
											<button type="submit" class="btn btn-default" name="mudateQpro" id="btn-submit">
												<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
											</button>
										</div>
									</td>
								</tr>
							</table>
						</form>


					</td>
				</tr>

			</table>

		</div>
		<?php


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

		?>
		<div class="table-responsive">

			<table class="table table-striped table-bordered">
				<tr>

					<th>Modification des  Catégories d'articles</th>
				</tr>
				<tr>
					<td>

						<form class="form-signin" method="post" action="modelupprd.php"  >

							<input type="hidden" name="idu" value="<?php  Test_userRef($user); ?>" class='form-control' />
							<input type="hidden" name="total" value="<?php echo $count; ?>" />
							<table class='table table-bordered'>

								<tr>
									<th>##</th>
									<th>Famille</th>
									<th>Nom</th>

								</tr>
								<?php
								//INSERT INTO `CATEGORIE`(`ID_CAT`, `IDFA`, `DATE_CAT`, `FAM_CAT`, `NOM_CAT`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4])

								for($i=1; $i<=$count; $i++)
								{

									$id = $a[$i];
									$query = "SELECT * FROM CATEGORIE WHERE ID_CAT=:id";
									$stmt = $DBcon->prepare( $query );
									$stmt->execute(array(':id'=>$id));
									$row=$stmt->fetch(PDO::FETCH_ASSOC);
									extract($row);
									$x=1;
									//echo date('d/m/Y');
								if($id!='on') {
									?>
									<tr>
										<input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $ID_CAT; ?>">


										<td><?php echo $i; ?></td>

										<td>  	<select id="form-field-select-3" name="1name<?php echo $i; ?>">
												<?php
												Select_Famref($IDFA);
												Select_Fam();
												?>
											</select>
										</td>
										<input type="hidden" name="2name<?php echo $i; ?>"  value="<?php echo date('y/m/d'); ?>" class='form-control' />
										<td><input type="text" name="3name<?php echo $i; ?>" value="<?php echo $NOM_CAT; ?>" class='form-control' /></td>

									</tr>
									<?php
								}}
								?>
								<tr>
									<td colspan="3">

										<button type="submit" class="btn btn-default" name="mudatecat" id="btn-submit">
											<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
										</button>
									</td>
								</tr>
							</table>
						</form>


					</td>
				</tr>

			</table>

		</div>

		<?php


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


			?>
			<div class="table-responsive">

				<table class="table table-striped table-bordered">
					<tr>

						<th>Modifier Plusieurs Conditionements</th>
					</tr>
					<tr>
						<td>

							<form class="form-signin" method="post" action="modelupprd.php"  >
								<input type="hidden" name="idu" value="<?php  Test_userRef($user); ?>" class='form-control' />



								<table class='table table-bordered'>

									<tr>
										<th>##</th>
										<th>Nom</th>

									</tr>
									<input type="hidden" name="total" value="<?php echo $count; ?>" />
									<?php
									//  INSERT INTO `CONDIS`(`IDC`, `NOMC`, `FLAG`) VALUES ([value-1],[value-2],[value-3])
									for($i=1; $i<=$count; $i++) {
										$id = $a[$i];
										$query = "SELECT * FROM CONDIS WHERE IDC=:id";
										$stmt = $DBcon->prepare( $query );
										$stmt->execute(array(':id'=>$id));
										$row=$stmt->fetch(PDO::FETCH_ASSOC);
										extract($row);
										if($id!='on') {
											?>
											<tr>
										<input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDC; ?>">


										<tr>
											<td><?php echo $i; ?></td>
											<td><input type="text" name="Aname<?php echo $i; ?>" class='form-control' value="<?php echo $NOMC;?>" /></td>

										</tr>
										<?php
									}}
									?>
									<tr>
										<td colspan="3">


											<button type="submit" class="btn btn-default" name="mudatecondis" id="btn-submit">
												<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
											</button>
										</td>
									</tr>
								</table>
							</form>


						</td>
					</tr>

				</table>

			</div>
			<?php



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


			?>

			<div class="table-responsive">

				<table class="table table-striped table-bordered">
					<tr>

						<th>Modifier les Familles d'articles choisis</th>
					</tr>
					<tr>
						<td>

							<form class="form-signin" method="post" action="modelupprd.php"  >

								<input type="hidden" name="idu" value="<?php  Test_userRef($user); ?>" class='form-control' />
								<input type="hidden" name="total" value="<?php echo $count; ?>" />

								<table class='table table-bordered'>

									<tr>
										<th>##</th>
										<th>Nom</th>
										<th>Description</th>
										<th>Vendable</th>

									</tr>
									<?php
									//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
									for($i=1; $i<=$count; $i++) {
										$id = $a[$i];
										$query = "SELECT * FROM FAMILLE WHERE IDFA=:id";
										$stmt = $DBcon->prepare( $query );
										$stmt->execute(array(':id'=>$id));
										$row=$stmt->fetch(PDO::FETCH_ASSOC);
										extract($row);
									if($id!='on') {
										?>
										<tr>
											<input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDFA; ?>">

											<td><?php echo $i; ?></td>
											<td><input type="text" name="Aname<?php echo $i; ?>" class='form-control' value="<?php echo $DESI; ?>" /></td>
											<td>
        <textarea name="Bname<?php echo $i; ?>">
			<?php echo $NATURE; ?>

        </textarea>
											</td>
											<td>
												<select id="skin-colorpicker" name="Cname<?php echo $i; ?>" REQUIRED>
													<?php
													//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
													if($VENTE==0) {
														?>
														<option value="<?php echo $VENTE; ?>">NON</option>
														<?php
													}else{
														?>
														<option value="<?php echo $VENTE; ?>">OUI</option>
														<?php
													}
													?>
													<option  value="1">OUI</option>
													<option  value="0">NON</option>
												</select>
											</td>

										</tr>
										<?php
									}}
									?>
									<tr>
										<td colspan="3">

											<button type="submit" class="btn btn-default" name="mudatefa" id="btn-submit">
												<span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
											</button>
										</td>
									</tr>
								</table>
							</form>


						</td>
					</tr>

				</table>

			</div>
			<?php

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
