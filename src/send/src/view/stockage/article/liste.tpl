

{include file='src/view/stockage/article/modalform.tpl'}

<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>


{include file='src/view/stockage/article/liste/_thead.tpl'}
{include file='src/view/stockage/article/liste/_tbody.tpl'}

