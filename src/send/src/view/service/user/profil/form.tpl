<div class="row">
    <div class="col-xs-12">

        <div id="user-profile-1" class="user-profile row">
            <div class="col-xs-12 col-sm-3 center">
                <div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{$url_base}public/assets/images/avatars/{$smarty.session.user.avatar}" />
												</span>

                    <div class="space-4"></div>

                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                        <div class="inline position-relative">
                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                <i class="ace-icon fa fa-circle light-green"></i>
                                &nbsp;
                                <span class="white">{$smarty.session.user.login} M/Mme. {$smarty.session.user.nom}</span>
                            </a>

                            <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                <li class="dropdown-header"> Change Status </li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-circle green"></i>
                                        &nbsp;
                                        <span class="green">Available</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-circle red"></i>
                                        &nbsp;
                                        <span class="red">Busy</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-circle grey"></i>
                                        &nbsp;
                                        <span class="grey">Invisible</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="space-6"></div>



            </div>

            <div class="col-xs-12 col-sm-9">

                <div class="space-12"></div>

                <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                        <div class="profile-info-name"> User name </div>
                        <input type="hidden" class="form-control" name="id" value="{$smarty.session.user.id}" />


                        <div class="profile-info-value">
                            <span class="editable" id="username">{$smarty.session.user.nom}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> User login </div>


                        <div class="profile-info-value">
                            <span class="editable" id="userlogin">{$smarty.session.user.login}</span>
                        </div>
                    </div>
                    <div class="profile-info-row">
                        <div class="profile-info-name"> User password </div>


                        <div class="profile-info-value">
                            <span class="editable" id="userpassword">{$smarty.session.user.password}</span>
                        </div>
                    </div>


                </div>


            </div>
        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
