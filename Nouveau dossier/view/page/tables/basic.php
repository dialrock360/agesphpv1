
<?php

require_once 'functionsfac.php';
?>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<div class="row">
		<div class="col-xs-12">

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				<h4 class="header smaller lighter white">BANK INITIALE</h4>
				<input type="hidden" id="numberfam" name="numberfam" required />

			</div>

			<!-- div.table-responsive -->

			<!-- div.dataTables_borderWrap -->
			<div>
				<table class="table table-bordered table-condensed table-hover table-striped">

					<tr>

						<th>DEPENSE</th>
						<th>GAINS</th>
						<th>CAISSE</th>
						<th>Action
						</th>
					</tr>


					<?php
					require_once 'bd.php';
					//SELECT `IDFA`, `DESI`, `NATURE`, `GAINS`, `DEPENSE`, `STOCK`, `LOG`, `FLAG` FROM `FAMILLE` WHERE 1
					$query = "SELECT * FROM FAMILLE WHERE DESI='CAISSE' ";
					$stmt = $db_con->prepare( $query );
					$stmt->execute();
					IF ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
						extract($row);
						?>
						<tr>
							<td><?php echo $DEPENSE; ?></td>

							<td><?php echo $GAINS; ?></td>
							<td><?php echo $STOCK; ?></td>

							<!--  <td><?php //echo $ID_CAT; ?></td>  -->
							<td>
								<a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDFA; ?>" id="getLog" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
									<i class="glyphicon glyphicon-eye-open"></i>
								</a>
								<a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDFA; ?>" id="getFamc" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
									<i class="glyphicon glyphicon-edit"></i>
								</a>


							</td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td colspan="4">

						</td>
					</tr>

				</table>


			</div>
		</div>
	</div>

</div>
<?php
require_once 'tableprdstk.php';
?>