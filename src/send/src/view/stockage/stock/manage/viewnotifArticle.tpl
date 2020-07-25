
<div class="row">
    <div class="col-sm-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">

                    {if isset($nbrarticle_stocks_bas) && $nbrarticle_stocks_bas > 0}

                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <i class="ace-icon fa fa-hand-o-left bigger-110" data-icon-hide="ace-icon fa fa-hand-o-down" data-icon-show="ace-icon fa fa-hand-o-left"></i>
                            <div class="label col-xs-11 label label-lg label-warning arrowed-in arrowed-in-right">
                                <span class="badge badge-warning">{$nbrarticle_stocks_bas} </span>  <b>Articles en baisse</b>
                            </div>
                        </a>
                    {/if}
                </h4>
            </div>

            <div class="panel-collapse collapse" id="collapseTwo">
                <div class="panel-body">
                    <ul class="list-unstyled spaced">

                        {foreach from=$article_en_stocks_bas item=champ}

                            <li>
                                <i class="ace-icon fa fa-caret-right blue"></i>{$champ['nom_article']}
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    {if isset($nbrarticle_stocks_finis) && $nbrarticle_stocks_finis > 0}
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <i class="ace-icon fa fa-hand-o-left bigger-110" data-icon-hide="ace-icon fa fa-hand-o-down" data-icon-show="ace-icon fa fa-hand-o-left"></i>
                            <div class="label col-xs-11 label label-lg label-danger arrowed-in arrowed-in-right">
                                <span class="badge badge-warning">{$nbrarticle_stocks_finis}</span> <b>Articles en pénurie</b>
                            </div>
                        </a>
                    {/if}

                </h4>
            </div>

            <div class="panel-collapse collapse" id="collapseThree">
                <div class="panel-body">

                    <ul class="list-unstyled  spaced">


                        {foreach from=$article_en_stocks_finis item=champ}

                            <li>
                                <i class="ace-icon fa fa-caret-right red"></i>{$champ['nom_article']}
                            </li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->