<caption>

    <a href="{$url_base}Stokage/Article/{$smarty.session.user.id_service}"  title=" Insertion multiple">
        <i class="fa fa-plus-circle light-blue2 bigger-150"></i>
        <i class="fa fa-plus-circle light-blue2 bigger-150"></i>
        <i class="fa fa-plus-circle light-blue2 bigger-150"></i>

    </a>
    <div id="ok" > </div>
</caption>

<thead>
<tr>
    <th>Image article </th>
    <th> <input id="search" class="form-control" type="text"   placeholder="Recherche.."></th>
    <th>categorie   </th>
    <th>En Stock</th>
    <th>
        <input type="checkbox" class=" bigger-150"id="Allpcheck"  >

         <a href="{$url_base}Article/liste/{$smarty.session.user.id_service}" class=" btn btn-sm btn-default btn-white btn-round" id="refresh"  title="Actualiser">
            <i class="fa fa-refresh light-grey bigger-150"></i>
        </a>
        <a   href="javascript:void(0)" data-toggle="modal" data-target="#modal-form" id="addArticle"    class=" btn btn-sm btn-info btn-white btn-round" id="refresh"  title="Ajouter article">
            <i class="fa fa-plus light-blue bigger-150"></i>
        </a>


    </th>
</tr>
</thead>