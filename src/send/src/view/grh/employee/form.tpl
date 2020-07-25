<div class="{if $status!='employee'} hide {/if} ">
    <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Renseignements
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#friends">
                        <i class="blue ace-icon fa fa-bookmark bigger-120"></i>
                        Contrat
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#pictures">
                        <i class="pink ace-icon fa fa-picture-o bigger-120"></i>
                        Piece jointes
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                {include file='src/view/grh/employee/input/_personne.tpl'}
                {include file='src/view/grh/employee/input/_contact.tpl'}
                {include file='src/view/grh/employee/input/_contrat.tpl'}
                {include file='src/view/grh/employee/input/_piecejoint.tpl'}




            </div>
        </div>
    </div>
</div>