<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo $base_url; ?>assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $base_url; ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>


<!-- page specific plugin scripts -->
<script src="<?php echo $base_url; ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/moment.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/fullcalendar.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootbox.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-tag.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.hotkeys.index.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-wysiwyg.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $base_url; ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {

        /* initialize the external events
         -----------------------------------------------------------------*/

        $('#external-events div.external-event').each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });




        /* initialize the calendar
         -----------------------------------------------------------------*/

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            //firstDay: 1,// >> change first day of week

            buttonHtml: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            },

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    className: 'label-important'
                },
                {
                    title: 'Long Event',
                    start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
                    end: moment().subtract(1, 'days').format('YYYY-MM-DD'),
                    className: 'label-success'
                },
                {
                    title: 'Some Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false,
                    className: 'label-info'
                }
            ]
            ,

            /**eventResize: function(event, delta, revertFunc) {

			alert(event.title + " end is now " + event.end.format());

			if (!confirm("is this okay?")) {
				revertFunc();
			}

		},*/

            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date) { // this function is called when something is dropped

                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');
                var $extraEventClass = $(this).attr('data-class');


                // we need to copy it, so that multiple events don't have a reference to the same object
                var copiedEventObject = $.extend({}, originalEventObject);

                // assign it the date that was reported
                copiedEventObject.start = date;
                copiedEventObject.allDay = false;
                if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }

            }
            ,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {

                bootbox.prompt("New Event Title:", function(title) {
                    if (title !== null) {
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                                className: 'label-info'
                            },
                            true // make the event "stick"
                        );
                    }
                });


                calendar.fullCalendar('unselect');
            }
            ,
            eventClick: function(calEvent, jsEvent, view) {

                //display a modal
                var modal =
                    '<div class="modal fade">\
                      <div class="modal-dialog">\
                       <div class="modal-content">\
                         <div class="modal-body">\
                           <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
                           <form class="no-margin">\
                              <label>Change event name &nbsp;</label>\
                              <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';


                var modal = $(modal).appendTo('body');
                modal.find('form').on('submit', function(ev){
                    ev.preventDefault();

                    calEvent.title = $(this).find("input[type=text]").val();
                    calendar.fullCalendar('updateEvent', calEvent);
                    modal.modal("hide");
                });
                modal.find('button[data-action=delete]').on('click', function() {
                    calendar.fullCalendar('removeEvents' , function(ev){
                        return (ev._id == calEvent._id);
                    })
                    modal.modal("hide");
                });

                modal.modal('show').on('hidden', function(){
                    modal.remove();
                });


                //console.log(calEvent.id);
                //console.log(jsEvent);
                //console.log(view);

                // change the border color just for fun
                //$(this).css('border-color', 'red');

            }

        });


    })
</script>
<script type="text/javascript">
    jQuery(function($){

        //handling tabs and loading/displaying relevant messages and forms
        //not needed if using the alternative view, as described in docs
        $('#inbox-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            var currentTab = $(e.target).data('target');
            if(currentTab == 'write') {
                Inbox.show_form();
            }
            else if(currentTab == 'inbox') {
                Inbox.show_list();
            }
        })



        //basic initializations
        $('.message-list .message-item input[type=checkbox]').removeAttr('checked');
        $('.message-list').on('click', '.message-item input[type=checkbox]' , function() {
            $(this).closest('.message-item').toggleClass('selected');
            if(this.checked) Inbox.display_bar(1);//display action toolbar when a message is selected
            else {
                Inbox.display_bar($('.message-list input[type=checkbox]:checked').length);
                //determine number of selected messages and display/hide action toolbar accordingly
            }
        });


        //check/uncheck all messages
        $('#id-toggle-all').removeAttr('checked').on('click', function(){
            if(this.checked) {
                Inbox.select_all();
            } else Inbox.select_none();
        });

        //select all
        $('#id-select-message-all').on('click', function(e) {
            e.preventDefault();
            Inbox.select_all();
        });

        //select none
        $('#id-select-message-none').on('click', function(e) {
            e.preventDefault();
            Inbox.select_none();
        });

        //select read
        $('#id-select-message-read').on('click', function(e) {
            e.preventDefault();
            Inbox.select_read();
        });

        //select unread
        $('#id-select-message-unread').on('click', function(e) {
            e.preventDefault();
            Inbox.select_unread();
        });

        /////////

        //display first message in a new area
        $('.message-list .message-item:eq(0) .text').on('click', function() {
            //show the loading icon
            $('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');

            $('.message-inline-open').removeClass('message-inline-open').find('.message-content').remove();

            var message_list = $(this).closest('.message-list');

            $('#inbox-tabs a[href="#inbox"]').parent().removeClass('active');
            //some waiting
            setTimeout(function() {

                //hide everything that is after .message-list (which is either .message-content or .message-form)
                message_list.next().addClass('hide');
                $('.message-container').find('.message-loading-overlay').remove();

                //close and remove the inline opened message if any!

                //hide all navbars
                $('.message-navbar').addClass('hide');
                //now show the navbar for single message item
                $('#id-message-item-navbar').removeClass('hide');

                //hide all footers
                $('.message-footer').addClass('hide');
                //now show the alternative footer
                $('.message-footer-style2').removeClass('hide');


                //move .message-content next to .message-list and hide .message-list
                $('.message-content').removeClass('hide').insertAfter(message_list.addClass('hide'));

                //add scrollbars to .message-body
                $('.message-content .message-body').ace_scroll({
                    size: 150,
                    mouseWheelLock: true,
                    styleClass: 'scroll-visible'
                });

            }, 500 + parseInt(Math.random() * 500));
        });


        //display second message right inside the message list
        $('.message-list .message-item:eq(1) .text').on('click', function(){
            var message = $(this).closest('.message-item');

            //if message is open, then close it
            if(message.hasClass('message-inline-open')) {
                message.removeClass('message-inline-open').find('.message-content').remove();
                return;
            }

            $('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');
            setTimeout(function() {
                $('.message-container').find('.message-loading-overlay').remove();
                message
                    .addClass('message-inline-open')
                    .append('<div class="message-content" />')
                var content = message.find('.message-content:last').html( $('#id-message-content').html() );

                //remove scrollbar elements
                content.find('.scroll-track').remove();
                content.find('.scroll-content').children().unwrap();

                content.find('.message-body').ace_scroll({
                    size: 150,
                    mouseWheelLock: true,
                    styleClass: 'scroll-visible'
                });

            }, 500 + parseInt(Math.random() * 500));

        });



        //back to message list
        $('.btn-back-message-list').on('click', function(e) {

            e.preventDefault();
            $('#inbox-tabs a[href="#inbox"]').tab('show');
        });



        //hide message list and display new message form
        /**
         $('.btn-new-mail').on('click', function(e){
					e.preventDefault();
					Inbox.show_form();
				});
         */




        var Inbox = {
            //displays a toolbar according to the number of selected messages
            display_bar : function (count) {
                if(count == 0) {
                    $('#id-toggle-all').removeAttr('checked');
                    $('#id-message-list-navbar .message-toolbar').addClass('hide');
                    $('#id-message-list-navbar .message-infobar').removeClass('hide');
                }
                else {
                    $('#id-message-list-navbar .message-infobar').addClass('hide');
                    $('#id-message-list-navbar .message-toolbar').removeClass('hide');
                }
            }
            ,
            select_all : function() {
                var count = 0;
                $('.message-item input[type=checkbox]').each(function(){
                    this.checked = true;
                    $(this).closest('.message-item').addClass('selected');
                    count++;
                });

                $('#id-toggle-all').get(0).checked = true;

                Inbox.display_bar(count);
            }
            ,
            select_none : function() {
                $('.message-item input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');
                $('#id-toggle-all').get(0).checked = false;

                Inbox.display_bar(0);
            }
            ,
            select_read : function() {
                $('.message-unread input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

                var count = 0;
                $('.message-item:not(.message-unread) input[type=checkbox]').each(function(){
                    this.checked = true;
                    $(this).closest('.message-item').addClass('selected');
                    count++;
                });
                Inbox.display_bar(count);
            }
            ,
            select_unread : function() {
                $('.message-item:not(.message-unread) input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

                var count = 0;
                $('.message-unread input[type=checkbox]').each(function(){
                    this.checked = true;
                    $(this).closest('.message-item').addClass('selected');
                    count++;
                });

                Inbox.display_bar(count);
            }
        }

        //show message list (back from writing mail or reading a message)
        Inbox.show_list = function() {
            $('.message-navbar').addClass('hide');
            $('#id-message-list-navbar').removeClass('hide');

            $('.message-footer').addClass('hide');
            $('.message-footer:not(.message-footer-style2)').removeClass('hide');

            $('.message-list').removeClass('hide').next().addClass('hide');
            //hide the message item / new message window and go back to list
        }

        //show write mail form
        Inbox.show_form = function() {
            if($('.message-form').is(':visible')) return;
            if(!form_initialized) {
                initialize_form();
            }


            var message = $('.message-list');
            $('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');

            setTimeout(function() {
                message.next().addClass('hide');

                $('.message-container').find('.message-loading-overlay').remove();

                $('.message-list').addClass('hide');
                $('.message-footer').addClass('hide');
                $('.message-form').removeClass('hide').insertAfter('.message-list');

                $('.message-navbar').addClass('hide');
                $('#id-message-new-navbar').removeClass('hide');


                //reset form??
                $('.message-form .wysiwyg-editor').empty();

                $('.message-form .ace-file-input').closest('.file-input-container:not(:first-child)').remove();
                $('.message-form input[type=file]').ace_file_input('reset_input');

                $('.message-form').get(0).reset();

            }, 300 + parseInt(Math.random() * 300));
        }




        var form_initialized = false;
        function initialize_form() {
            if(form_initialized) return;
            form_initialized = true;

            //intialize wysiwyg editor
            $('.message-form .wysiwyg-editor').ace_wysiwyg({
                toolbar:
                    [
                        'bold',
                        'italic',
                        'strikethrough',
                        'underline',
                        null,
                        'justifyleft',
                        'justifycenter',
                        'justifyright',
                        null,
                        'createLink',
                        'unlink',
                        null,
                        'undo',
                        'redo'
                    ]
            }).prev().addClass('wysiwyg-style1');



            //file input
            $('.message-form input[type=file]').ace_file_input()
                .closest('.ace-file-input')
                .addClass('width-90 inline')
                .wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>');

            //Add Attachment
            //the button to add a new file input
            $('#id-add-attachment')
                .on('click', function(){
                    var file = $('<input type="file" name="attachment[]" />').appendTo('#form-attachments');
                    file.ace_file_input();

                    file.closest('.ace-file-input')
                        .addClass('width-90 inline')
                        .wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>')
                        .parent().append('<div class="action-buttons pull-right col-xs-1">\
							<a href="#" data-action="delete" class="middle">\
								<i class="ace-icon fa fa-trash-o red bigger-130 middle"></i>\
							</a>\
						</div>')
                        .find('a[data-action=delete]').on('click', function(e){
                        //the button that removes the newly inserted file input
                        e.preventDefault();
                        $(this).closest('.file-input-container').hide(300, function(){ $(this).remove() });
                    });
                });
        }//initialize_form

        //turn the recipient field into a tag input field!
        /**
         var tag_input = $('#form-field-recipient');
         try {
					tag_input.tag({placeholder:tag_input.attr('placeholder')});
				} catch(e) {}


         //and add form reset functionality
         $('#id-message-form').on('reset', function(){
					$('.message-form .message-body').empty();

					$('.message-form .ace-file-input:not(:first-child)').remove();
					$('.message-form input[type=file]').ace_file_input('reset_input_ui');

					var val = tag_input.data('value');
					tag_input.parent().find('.tag').remove();
					$(val.split(',')).each(function(k,v){
						tag_input.before('<span class="tag">'+v+'<button class="close" type="button">&times;</button></span>');
					});
				});
         */

    });
</script>