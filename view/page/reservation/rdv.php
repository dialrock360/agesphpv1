
<div class="row">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
                <li class="li-new-mail pull-right">
                    <a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
														<span class="btn btn-purple no-border">
															<i class="ace-icon fa fa-envelope bigger-130"></i>
															<span class="bigger-110">Nouveau Message</span>
														</span>
                    </a>
                </li><!-- /.li-new-mail -->

                <li class="active">
                    <a data-toggle="tab" href="#inbox" data-target="inbox">
                        <i class="blue ace-icon fa fa-inbox bigger-130"></i>
                        <span class="bigger-110">Boite de reception</span>
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#sent" data-target="sent">
                        <i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
                        <span class="bigger-110">Evoyées</span>
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#draft" data-target="draft">
                        <i class="green ace-icon fa fa-pencil bigger-130"></i>
                        <span class="bigger-110">Notes</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="pink ace-icon fa fa-tags bigger-130"></i>

                        <span class="bigger-110">
															Selecte
															<i class="ace-icon fa fa-caret-down"></i>
														</span>
                    </a>

                    <ul class="dropdown-menu dropdown-light-blue dropdown-125">
                        <li>
                            <a data-toggle="tab" href="#tag-1">
                                <span class="mail-tag badge badge-pink"></span>
                                <span class="pink">Réservation#</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#tag-family">
                                <span class="mail-tag badge badge-success"></span>
                                <span class="green">Service</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#tag-friends">
                                <span class="mail-tag badge badge-info"></span>
                                <span class="blue">Clients</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#tag-work">
                                <span class="mail-tag badge badge-grey"></span>
                                <span class="grey">Inscriptions</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- /.dropdown -->
            </ul>

            <div class="tab-content no-border no-padding">
                <div id="inbox" class="tab-pane in active">
                    <div class="message-container">
                        <div id="id-message-list-navbar" class="message-navbar clearfix">
                            <div class="message-bar">
                                <div class="message-infobar" id="id-message-infobar">
                                    <span class="blue bigger-150">Inbox</span>
                                    <span class="grey bigger-110">(2  Messages non lus)</span>
                                </div>

                                <div class="message-toolbar hide">
                                    <div class="inline position-relative align-left">
                                        <button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <span class="bigger-110">Action</span>

                                            <i class="ace-icon fa fa-caret-down icon-on-right"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; Reply
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-mail-forward green"></i>&nbsp; Forward
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-folder-open orange"></i>&nbsp; Archive
                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-eye blue"></i>&nbsp; Mark as read
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-eye-slash green"></i>&nbsp; Mark unread
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-flag-o red"></i>&nbsp; Flag
                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-trash-o red bigger-110"></i>&nbsp; Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="inline position-relative align-left">
                                        <button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="ace-icon fa fa-folder-o bigger-110 blue"></i>
                                            <span class="bigger-110">Move to</span>

                                            <i class="ace-icon fa fa-caret-down icon-on-right"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop pink2"></i>&nbsp; Tag#1
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop blue"></i>&nbsp; Family
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop green"></i>&nbsp; Friends
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop grey"></i>&nbsp; Work
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <button type="button" class="btn btn-xs btn-white btn-primary">
                                        <i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
                                        <span class="bigger-110">Delete</span>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <div class="messagebar-item-left">
                                    <label class="inline middle">
                                        <input type="checkbox" id="id-toggle-all" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    &nbsp;
                                    <div class="inline position-relative">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            <i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-100">
                                            <li>
                                                <a id="id-select-message-all" href="#">All</a>
                                            </li>

                                            <li>
                                                <a id="id-select-message-none" href="#">None</a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a id="id-select-message-unread" href="#">Unread</a>
                                            </li>

                                            <li>
                                                <a id="id-select-message-read" href="#">Read</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="messagebar-item-right">
                                    <div class="inline position-relative">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            Trier Par &nbsp;
                                            <i class="ace-icon fa fa-caret-down bigger-125"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-menu-right dropdown-100">
                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-check green"></i>
                                                    Date
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-check invisible"></i>
                                                    Origine
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-check invisible"></i>
                                                    Objet
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="nav-search minimized">
                                    <form class="form-search">
																		<span class="input-icon">
																			<input type="text" autocomplete="off" class="input-small nav-search-input" placeholder="Search inbox ..." />
																			<i class="ace-icon fa fa-search nav-search-icon"></i>
																		</span>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="id-message-item-navbar" class="hide message-navbar clearfix">
                            <div class="message-bar">
                                <div class="message-toolbar">
                                    <div class="inline position-relative align-left">
                                        <button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <span class="bigger-110">Action</span>

                                            <i class="ace-icon fa fa-caret-down icon-on-right"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; Reply
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-mail-forward green"></i>&nbsp; Forward
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-folder-open orange"></i>&nbsp; Archive
                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-eye blue"></i>&nbsp; Mark as read
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-eye-slash green"></i>&nbsp; Mark unread
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-flag-o red"></i>&nbsp; Flag
                                                </a>
                                            </li>

                                            <li class="divider"></li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-trash-o red bigger-110"></i>&nbsp; Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="inline position-relative align-left">
                                        <button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="ace-icon fa fa-folder-o bigger-110 blue"></i>
                                            <span class="bigger-110">Move to</span>

                                            <i class="ace-icon fa fa-caret-down icon-on-right"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop pink2"></i>&nbsp; Tag#1
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop blue"></i>&nbsp; Family
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop green"></i>&nbsp; Friends
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-stop grey"></i>&nbsp; Work
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <button type="button" class="btn btn-xs btn-white btn-primary">
                                        <i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
                                        <span class="bigger-110">Delete</span>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <div class="messagebar-item-left">
                                    <a href="#" class="btn-back-message-list">
                                        <i class="ace-icon fa fa-arrow-left blue bigger-110 middle"></i>
                                        <b class="bigger-110 middle">Back</b>
                                    </a>
                                </div>

                                <div class="messagebar-item-right">
                                    <i class="ace-icon fa fa-clock-o bigger-110 orange"></i>
                                    <span class="grey">Today, 7:15 pm</span>
                                </div>
                            </div>
                        </div>

                        <div id="id-message-new-navbar" class="hide message-navbar clearfix">
                            <div class="message-bar">
                                <div class="message-toolbar">
                                    <button type="button" class="btn btn-xs btn-white btn-primary">
                                        <i class="ace-icon fa fa-floppy-o bigger-125"></i>
                                        <span class="bigger-110">Save Draft</span>
                                    </button>

                                    <button type="button" class="btn btn-xs btn-white btn-primary">
                                        <i class="ace-icon fa fa-times bigger-125 orange2"></i>
                                        <span class="bigger-110">Discard</span>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <div class="messagebar-item-left">
                                    <a href="#" class="btn-back-message-list">
                                        <i class="ace-icon fa fa-arrow-left bigger-110 middle blue"></i>
                                        <b class="middle bigger-110">Back</b>
                                    </a>
                                </div>

                                <div class="messagebar-item-right">
																	<span class="inline btn-send-message">
																		<button type="button" class="btn btn-sm btn-primary no-border btn-white btn-round">
																			<span class="bigger-110">Send</span>

																			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																		</button>
																	</span>
                                </div>
                            </div>
                        </div>

                        <div class="message-list-container">
                            <div class="message-list" id="message-list">
                                <div class="message-item message-unread">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    <i class="message-star ace-icon fa fa-star orange2"></i>
                                    <span class="sender" title="Alex John Red Smith">Alex John Red Smith </span>
                                    <span class="time">1:33 pm</span>

                                    <span class="summary">
																		<span class="text">
																			Click to open this message
																		</span>
																	</span>
                                </div>

                                <div class="message-item message-unread">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    <i class="message-star ace-icon fa fa-star-o light-grey"></i>

                                    <span class="sender" title="John Doe">
																		John Doe
																		<span class="light-grey">(4)</span>
																	</span>
                                    <span class="time">7:15 pm</span>

                                    <span class="attachment">
																		<i class="ace-icon fa fa-paperclip"></i>
																	</span>

                                    <span class="summary">
																		<span class="badge badge-pink mail-tag"></span>
																		<span class="text">
																			Clik to open this message right here
																		</span>
																	</span>
                                </div>

                                <div class="message-item">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                    <span class="sender" title="Philip Markov">Philip Markov </span>
                                    <span class="time">10:15 am</span>

                                    <span class="attachment">
																		<i class="ace-icon fa fa-paperclip"></i>
																	</span>

                                    <span class="summary">
																		<span class="message-flags">
																			<i class="ace-icon fa fa-reply light-grey"></i>
																		</span>
																		<span class="text">
																			Photo booth beard raw denim letterpress vegan
																		</span>
																	</span>
                                </div>

                                <div class="message-item">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    <i class="message-star ace-icon fa fa-star orange2"></i>
                                    <span class="sender" title="Sabrina">Sabrina </span>
                                    <span class="time">Yesterday</span>

                                    <span class="summary">
																		<span class="text">
																			Nullam quis risus eget urna mollis ornare
																		</span>
																	</span>
                                </div>

                                <div class="message-item">
                                    <label class="inline">
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>

                                    <i class="message-star ace-icon fa fa-star-o light-grey"></i>
                                    <span class="sender" title="Philip Markov">Philip Markov </span>
                                    <span class="time">Yesterday</span>

                                    <span class="attachment">
																		<i class="ace-icon fa fa-paperclip"></i>
																	</span>

                                    <span class="summary">
																		<span class="badge badge-success mail-tag"></span>
																		<span class="text">
																			Vestibulum id ligula porta felis euismod
																		</span>
																	</span>
                                </div>

                                
                            </div>
                        </div>

                        <div class="message-footer clearfix">
                            <div class="pull-left"> 151 messages au total </div>

                        </div>

                    </div>
                </div>
            </div><!-- /.tab-content -->
        </div><!-- /.tabbable -->
    </div><!-- /.col -->
</div><!-- /.row -->

<?php
require_once 'sms.php';
?>
<div class="hide message-content" id="id-message-content">
    <div class="message-header clearfix">
        <div class="pull-left">
            <span class="blue bigger-125"> Clik to open this message </span>

            <div class="space-4"></div>

            <i class="ace-icon fa fa-star orange2"></i>

            &nbsp;
            <img class="middle" alt="John's Avatar" src="assets/images/avatars/avatar.png" width="32" />
            &nbsp;
            <a href="#" class="sender">John Doe</a>

            &nbsp;
            <i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
            <span class="time grey">Today, 7:15 pm</span>
        </div>

        <div class="pull-right action-buttons">
            <a href="#">
                <i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
            </a>

            <a href="#">
                <i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
            </a>

            <a href="#">
                <i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
            </a>
        </div>
    </div>

    <div class="hr hr-double"></div>

    <div class="message-body">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <p>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <p>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>

        <p>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <p>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>

        <p>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

    <div class="hr hr-double"></div>

    <div class="message-attachment clearfix">
        <div class="attachment-title">
            <span class="blue bolder bigger-110">Attachments</span>
            &nbsp;
            <span class="grey">(2 files, 4.5 MB)</span>

            <div class="inline position-relative">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    &nbsp;
                    <i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
                </a>

                <ul class="dropdown-menu dropdown-lighter">
                    <li>
                        <a href="#">Download all as zip</a>
                    </li>

                    <li>
                        <a href="#">Display in slideshow</a>
                    </li>
                </ul>
            </div>
        </div>

        &nbsp;
        <ul class="attachment-list pull-left list-unstyled">
            <li>
                <a href="#" class="attached-file">
                    <i class="ace-icon fa fa-file-o bigger-110"></i>
                    <span class="attached-name">Document1.pdf</span>
                </a>

                <span class="action-buttons">
													<a href="#">
														<i class="ace-icon fa fa-download bigger-125 blue"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
													</a>
												</span>
            </li>

            <li>
                <a href="#" class="attached-file">
                    <i class="ace-icon fa fa-film bigger-110"></i>
                    <span class="attached-name">Sample.mp4</span>
                </a>

                <span class="action-buttons">
													<a href="#">
														<i class="ace-icon fa fa-download bigger-125 blue"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
													</a>
												</span>
            </li>
        </ul>

        <div class="attachment-images pull-right">
            <div class="vspace-4-sm"></div>

            <div>
                <img width="36" alt="image 4" src="assets/images/gallery/thumb-4.jpg" />
                <img width="36" alt="image 3" src="assets/images/gallery/thumb-3.jpg" />
                <img width="36" alt="image 2" src="assets/images/gallery/thumb-2.jpg" />
                <img width="36" alt="image 1" src="assets/images/gallery/thumb-1.jpg" />
            </div>
        </div>
    </div>
</div><!-- /.message-content -->