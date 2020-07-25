




<form class="form-inline" action="../user.php" method="post" enctype="multipart/form-data" onSubmit="return verifForm(this)">

	<div class="modal-body no-padding">

		<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">

			<?php

			if (isset($_POST['lien2']) && !empty($_POST['lien2']))
			{
			$id= $_POST['lien2'];

			include "bd.php";



			$take="SELECT * FROM  UTILISATEUR WHERE IDU='$id'";
			$req = $base->query($take);
			if($result=$req)
			{
			if($ligne=mysqli_fetch_array($result))
			{


				$prenom=$ligne['PRENOM_USER'];
				$nom=$ligne['NOM_USER'];
				$tel=$ligne['NUM_UER'];
				$sexe=$ligne['SEXE_USER'];
				$poste=$ligne['POSTE'];
				$salaire=$ligne['SALAIRE'];
				$statut=$ligne['STATUT'];
				$daten=$ligne['DATNAIS'];
				$datem=$ligne['DATEM'];
				$adres=$ligne['ADRESS'];
				$level=$ligne['LEVESECURITY'];
				$id=$ligne['IDU'];
				$img=$ligne['PHOTO'];
				$login=$ligne['LOGIN'];
			?>
				<thead>
				<tr>

					<th><img width="50" height="50" alt="150x150" src="assets/images/upload/<?php echo $img;?>" /><?php echo '   '.$nom.' '.$prenom;?></th>
					<th>EMPLOYER </th>
					<th>CONNECTER</th>
				</tr>
				</thead>
			<tbody>
			<input type="hidden" name="id" value="<?php echo $idu;?>" >

			<tr>

				<td>
					<label for="form-field-select-1">Photo *</label>
					<input type="file" class="form-control file-archive" name="img" id="id-input-file-2" value="<?php echo $img;?>" />
					<br/>
					<label for="form-field-select-2">Prenom *</label><br/>
					<input type="text" class="form-control" value="<?php echo $prenom ;?>"  name="prenom" required /><br/>
					<label for="form-field-select-3">Nom *</label><br/>
					<input type="text" class="form-control"  value="<?php echo $nom ;?>"  name="nom" required/><br/>
					<label for="form-field-select-4">Nee le:</label><br/>
					<div class="input-group">

						<input class="form-control date-picker" id="id-date-picker-1" type="date" data-date-format="dd-mm-yyyy" name="daten" value="<?php echo $daten ;?>"/>
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
					</div>
					<div>
						<label for="form-field-select-1">Sexe *</label>

						<select class="form-control" id="form-field-select-1" name="sexe" required>
							<option value="value="<?php echo $sexe ;?>"><?php echo $sexe;?></option>
							<option value="HOMME">HOMME</option>
							<option value="FEMME">FEMME</option>
						</select>
					</div>

				</td>

				<td>
					<label for="form-field-select-1">POSTE *</label>
					<select class="form-control" id="form-field-select-1" name="poste" required>
						<option value="value="<?php echo $poste ;?>""><?php echo $poste ;?></option>
						<option value="BARMAID">BARMAID</option>
						<option value="CUISINIER">CUISINIER</option>
						<option value="CUISINIERE">CUISINIERE</option>
						<option value="DIRECTREUR">DIRECTREUR</option>
						<option value="DIRECTRICE">DIRECTRICE</option>
						<option value="GARDIEN">GARDIEN</option>
						<option value="MENAGERE">MENAGERE</option>
						<option value="PATRON">PATRON</option>
						<option value="SERVEUR">SERVEUR</option>
						<option value="SERVEUSE">SERVEUSE</option>
					</select>
					<br/>
					<label for="form-field-select-1">SALAIRE </label><br/>
					<input type="number" class="form-control"  value="<?php echo $salaire ;?>"  name="salaire"/>
					<br/>
					<label for="form-field-select-1">TEL *</label><br/>
					<input type="tel" class="form-control"  value="<?php echo $tel ;?>"  name="tel"/>
					<br/>
					<label for="form-field-select-1">DATE D'EMBAUCHE</label><br/>
					<div class="input-group">

						<input class="form-control date-picker" id="id-date-picker-1" type="date" data-date-format="dd-mm-yyyy" name="datem" value="<?php echo $datem ;?>"/>
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
					</div>

					<br/>
					<label for="form-field-select-1">ADRESSE *</label><br/>
					<input type="text" class="form-control"  value="<?php echo $adress ;?>" name="adress" required/>

				</td>
				<td>
					<label for="form-field-select-1">LOGIN</label><br/>
					<input type="text" class="form-control" value="<?php echo $login ;?>" name="login"  /><br/>
					<label for="form-field-select-1">MOT DE PASSE</label><br/>
					<input type="password" class="form-control"  value="<?php echo $passe ;?>" name="passe" />
					<br/>
					<label for="form-field-select-1">CONFIRMER PASSE</label><br/>
					<input type="password" class="form-control"  value="<?php echo $cpasse;?>" name="cpasse" />
					<br/>
					<label for="form-field-select-1">EMAIL</label><br/>
					<input type="email" class="form-control"  value="<?php echo $email ;?>" name="email" />

				</td>



			</tr>

			</tbody>
			<?php } } }?>

		</table>


	</div>

	<div class="modal-footer no-margin-top">
		<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			<i class="ace-icon fa fa-times"></i>
			Fermer
		</button>

		<ul class="pagination pull-right no-margin">
			<li class="prev disabled">
				<a href="#">
					<i class="ace-icon fa fa-angle-double-left"></i>
				</a>
			</li>

			<li class="active">
				<button class="btn btn-sm btn-success pull-left"  name="ok" type="submit">
					<i class="ace-icon fa fa-ticket"></i>
					Valider
				</button>
			</li>


			<li class="next">
				<a href="#">
					<i class="ace-icon fa fa-angle-double-right"></i>
				</a>
			</li>
		</ul>
	</div>

</form>






<script>

	$('#modal-table2').click(function(){
		var lien2 = $(this).text();
		$.post('formrmdf.php',{lien2:lien2},function(data){

			var popID = $(this).data('rel'); //Get Popup Name


			return false;
		});

</script>