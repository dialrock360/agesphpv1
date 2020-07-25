<div>
    <div id="user-profile-1" class="user-profile row">
        <div class="col-xs-12 col-sm-3 center">
            <div>


                <div class="space-4"></div>

                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                    <div class="inline position-relative">
                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="ace-icon fa fa-circle light-green"></i>
                            &nbsp;
                            <span class="white">{if isset($programme)} {$programme['nom_programme']} {/if}</span>
                        </a>

                    </div>
                </div>
            </div>

            <div class="space-6"></div>

            <div class="profile-contact-info">
                <div class="profile-contact-links align-left">
                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-plus-calendar bigger-120 green"></i>
                        Du {if isset($programme)} {$programme['date_programme']} {/if}
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-calendar bigger-120 grey"></i>
                        Au

                        {if isset($programme)} {$programme['datefin_programme']} {/if}
                    </a>

                    <a href="#" class="btn btn-link">
                        <i class="ace-icon fa fa-clock-o bigger-125 grey"></i>
                        Progression   {if isset($progression)} {$progression} {/if}
                    </a>
                </div>

            </div>

            <div class="hr hr12 dotted"></div>



            <div class="hr hr16 dotted"></div>
        </div>

        <div class="col-xs-12 col-sm-9">
            <div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br />
													<span class="line-height-1 smaller-90"> Totals </span>
												</span>

                <span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br />
													<span class="line-height-1 smaller-90">En cours </span>
												</span>

                <span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br />
													<span class="line-height-1 smaller-90">Avortés </span>
												</span>

                <span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br />
													<span class="line-height-1 smaller-90"> Stand by </span>
												</span>

                <span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br />
													<span class="line-height-1 smaller-90">Achevés </span>
												</span>

                <span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br />
													<span class="line-height-1 smaller-90"> Equipes </span>
												</span>
            </div>

            <div class="space-12"></div>


            <div class="space-20"></div>


            {include file='src/view/gestio_projet/programme/input/_pojectliste.tpl'}

            <div class="hr hr2 hr-double"></div>



        </div>
    </div>
</div>
