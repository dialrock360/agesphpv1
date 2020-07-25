<form id="id-message-form" class="hide form-horizontal message-form col-xs-12">
    <div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Destinataire:</label>

            <div class="col-sm-9">
												<span class="input-icon">
													<input type="email" name="recipient" id="form-field-recipient" data-value="" value="" placeholder="dialrock360@gmail.com" />
													<i class="ace-icon fa fa-user"></i>
												</span>
            </div>
        </div>

        <div class="hr hr-18 dotted"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Objet:</label>

            <div class="col-sm-6 col-xs-12">
                <div class="input-icon block col-xs-12 no-padding">
                    <input maxlength="100" type="text" class="col-xs-12" name="subject" id="form-field-subject" placeholder="Objet du message" />
                    <i class="ace-icon fa fa-comment-o"></i>
                </div>
            </div>
        </div>

        <div class="hr hr-18 dotted"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right">
                <span class="inline space-24 hidden-480"></span>
                Message:
            </label>

            <div class="col-sm-9">
                <div class="wysiwyg-editor"></div>
            </div>
        </div>

        <div class="hr hr-18 dotted"></div>

        <div class="form-group no-margin-bottom">
            <label class="col-sm-3 control-label no-padding-right">Pieces jointes:</label>

            <div class="col-sm-9">
                <div id="form-attachments">
                    <input type="file" name="attachment[]" />
                </div>
            </div>
        </div>

        <div class="align-right">
            <button id="id-add-attachment" type="button" class="btn btn-sm btn-danger">
                <i class="ace-icon fa fa-paperclip bigger-140"></i>
                Ajouter Pieces jointes
            </button>
        </div>

        <div class="space"></div>
    </div>
</form>
