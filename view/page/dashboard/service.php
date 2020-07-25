<a href="#my-modal" role="button" class="bigger-125 bg-primary white" data-toggle="modal">
    &nbsp; Modifier les Informations de l'Entreprise en Activité &nbsp;
</a>

<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">

                    Modifiez Les Informations de Votre Entreprise &nbsp;
					 </h3>
			</div>

            <?php

            include 'edit.php';

            ?>

			<div class="modal-footer">
				<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
                    Fermer
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>