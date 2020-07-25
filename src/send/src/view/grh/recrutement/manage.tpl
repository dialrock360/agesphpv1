
<div class="project-details-area mg-b-15">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                <div class="project-details-wrap shadow-reset">
                    {include file='src/view/grh/recrutement/manage/_infoproject.tpl'}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="project-details-tab">
                                <ul class="nav nav-tabs res-pd-less-sm">
                                    <li class="active"><a data-toggle="tab" href="#tache">Les taches</a>
                                    </li>


                                    <li><a data-toggle="tab" href="#team">Les equipes</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#home">Messages des membres</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#menu1">Dernières activités</a>
                                    </li>
                                </ul>
                                <div class="tab-content res-tab-content-project">
                                    {include file='src/view/grh/recrutement/manage/_tasklist.tpl'}
                                    {include file='src/view/grh/recrutement/manage/_teamlist.tpl'}
                                    {include file='src/view/grh/recrutement/manage/_membercommunication.tpl'}
                                    {include file='src/view/grh/recrutement/manage/_activity.tpl'}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {include file='src/view/grh/recrutement/manage/_detailproject.tpl'}
        </div>
    </div>
</div>