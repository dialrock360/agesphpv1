{include file='src/view/gestio_projet/programme/input/_modal.tpl'}

<input class="form-control" type="hidden" name="varurl" value="{$url_base}/Gespro" id="varurl"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>


{include file='src/view/gestio_projet/programme/liste/_thead.tpl'}
{include file='src/view/gestio_projet/programme/liste/_tbody.tpl'}