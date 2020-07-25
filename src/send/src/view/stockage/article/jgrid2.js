var varurl=$("#varurl").val();
function createJSON() {

    var jsonObj = [];
    var gridArrayData = [];

    $.ajax({
        type: 'GET',
        url: varurl+'/liste2',
        data: { get_param: 'value' },
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, value) {


                jsonObj.push({
                    id:   value["id"],
                    path_photo: value["path_photo"] ,
                    nom_article: value["nom_article"],
                    nom_categorie: value["nom_categorie"] ,
                    pxa_article:  value["pxa_article"],
                    pxv_article:  value["pxv_article"],
                    pxvbar_article: value["pxvbar_article"],
                    id_stock:  value["id_stock"]
                });

            });
            /*for (var i = 0; i < data.length; i++) {
                var item = data[i];

                gridArrayData.push({
                    Id: item.id,
                    Path_photo: item.path_photo,
                    Nom_article: item.nom_article,
                    Nom_categorie: item.nom_categorie,
                    Pxa_article: item.pxa_article,
                    Pxv_article: item.pxv_article,
                    Pxvbar_article: item.Pxvbar_article,
                    Id_stock: item.id_stock
                });
            }*/
            console.log(jsonObj);


        }
    });
    return jsonObj;
}



var grid_data2 =
    [
        {id:"1",path_photo:"1",nom_article:"Desktop Computer", nom_categorie:"FedEx",pxa_article:"100000",pxv_article:"200000",pxvbar_article:"150000", id_stock:"Yes"},
        {id:"2",path_photo:"1",nom_article:"Laptop Computer", nom_categorie:"FedEx",pxa_article:"200000",pxv_article:"300000",pxvbar_article:"250000", id_stock:"Yes"},
        {id:"3",path_photo:"1",nom_article:"LCD Monitor", nom_categorie:"TNT",pxa_article:"150000",pxv_article:"200000",pxvbar_article:"175000", id_stock:"No"},
        {id:"4",path_photo:"1",nom_article:"Speakers", nom_categorie:"ARAMEX",pxa_article:"10000",pxv_article:"20000",pxvbar_article:"15000", id_stock:"Yes"},
        {id:"5",path_photo:"1",nom_article:"Laser Printer", nom_categorie:"PRINTER",pxa_article:"40000",pxv_article:"50000",pxvbar_article:"450000", id_stock:"Yes"},
        {id:"6",path_photo:"1",nom_article:"Play Station", nom_categorie:"Games",pxa_article:"50000",pxv_article:"100000",pxvbar_article:"75000", id_stock:"Yes"},
        {id:"7",path_photo:"1",nom_article:"Mobile Telephone", nom_categorie:"InTime",pxa_article:"130000",pxv_article:"160000",pxvbar_article:"150000", id_stock:"No"},
        {id:"7",path_photo:"1",nom_article:"Server", nom_categorie:"FedEx",pxa_article:"1000000",pxv_article:"2500000",pxvbar_article:"1500000", id_stock:"Yes"} ,
        {id:"8",path_photo:"1",nom_article:"All in one Computer", nom_categorie:"FedEx",pxa_article:"200000",pxv_article:"300000",pxvbar_article:"250000", id_stock:"Yes"},
        {id:"9",path_photo:"1",nom_article:"Tab Computer", nom_categorie:"FedEx",pxa_article:"300000",pxv_article:"400000",pxvbar_article:"350000", id_stock:"Yes"},
        {id:"10",path_photo:"1",nom_article:"Plasma Monitor", nom_categorie:"TNT",pxa_article:"200000",pxv_article:"300000",pxvbar_article:"250000", id_stock:"No"},
        {id:"11",path_photo:"1",nom_article:"Speakers rt", nom_categorie:"ARAMEX",pxa_article:"15000",pxv_article:"30000",pxvbar_article:"25000", id_stock:"Yes"},
        {id:"12",path_photo:"1",nom_article:"Matrix Printer", nom_categorie:"PRINTER",pxa_article:"500000",pxv_article:"700000",pxvbar_article:"650000", id_stock:"Yes"},
        {id:"13",path_photo:"1",nom_article:"Play Station 2", nom_categorie:"FedEx",pxa_article:"80000",pxv_article:"120000",pxvbar_article:"100000", id_stock:"No"},
        {id:"14",path_photo:"1",nom_article:"Mobile Telephone z", nom_categorie:"Games",pxa_article:"18000",pxv_article:"250000",pxvbar_article:"200000", id_stock:"Yes"},
        {id:"15",path_photo:"1",nom_article:"Server x", nom_categorie:"FedEx",pxa_article:"4000000",pxv_article:"7000000",pxvbar_article:"6500000", id_stock:"Yes"}
    ];

var grid_data = createJSON();


/*
console.log(grid_data);
console.log(grid_data2);*/
var subgrid_data =
    [
        {id:"1", name:"sub grid item 1", qty: 11},
        {id:"2", name:"sub grid item 2", qty: 3},
        {id:"3", name:"sub grid item 3", qty: 12},
        {id:"4", name:"sub grid item 4", qty: 5},
        {id:"5", name:"sub grid item 5", qty: 2},
        {id:"6", name:"sub grid item 6", qty: 9},
        {id:"7", name:"sub grid item 7", qty: 3},
        {id:"8", name:"sub grid item 8", qty: 8}
    ];

jQuery(function($) {
    var grid_selector = "#grid-table";
    var pager_selector = "#grid-pager";


    var parent_column = $(grid_selector).closest('[class*="col-"]');
    //resize to fit page size
    $(window).on('resize.jqGrid', function () {
        $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
    })

    //resize on sidebar collapse/expand
    $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
        if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
            //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
            setTimeout(function() {
                $(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
            }, 20);
        }
    })

    //if your grid is inside another element, for example a tab pane, you should use its parent's width:
    /**
     $(window).on('resize.jqGrid', function () {
					var parent_width = $(grid_selector).closest('.tab-pane').width();
					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
				})
     //and also set width when tab pane becomes visible
     $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  if($(e.target).attr('href') == '#mygrid') {
					var parent_width = $(grid_selector).closest('.tab-pane').width();
					$(grid_selector).jqGrid( 'setGridWidth', parent_width );
				  }
				})
     */




    var jsonObj = [];
    var gridArrayData = [];

    $.ajax({
        type: 'GET',
        url: varurl+'Article/liste2',
        data: { get_param: 'value' },
        dataType: 'json',
        success: function (data) {
            $.each(data, function (index, value) {

                // console.log(' <img src="'+varurl+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+value["nom_article"]+'" height="32" width="32"/>' );
                jsonObj.push({
                    id:   value["id"],
                    path_photo:  ' <img src="'+varurl+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+value["nom_article"]+'" height="32" width="32"/>' ,
                    nom_article: value["nom_article"],
                    nom_categorie: value["nom_categorie"] ,
                    pxa_article:  value["pxa_article"],
                    pxv_article:  value["pxv_article"],
                    pxvbar_article: value["pxvbar_article"],
                    id_stock:  value["id_stock"]
                });

            });

            jQuery(grid_selector).jqGrid({
                //direction: "rtl",

                //subgrid options
                subGrid : true,
                //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
                //datatype: "xml",
                subGridOptions : {
                    plusicon : "ace-icon fa fa-plus center bigger-110 blue",
                    minusicon  : "ace-icon fa fa-minus center bigger-110 blue",
                    openicon : "ace-icon fa fa-chevron-right center orange"
                },
                //for this example we are using local data
                subGridRowExpanded: function (subgridDivId, rowId) {
                    var subgridTableId = subgridDivId + "_t";
                    $("#" + subgridDivId).html("<table id='" + subgridTableId + "'></table>");
                    $("#" + subgridTableId).jqGrid({
                        datatype: 'local',
                        data: subgrid_data,
                        colNames: ['No','Item Name','Qty'],
                        colModel: [
                            { name: 'id', width: 50 },
                            { name: 'name', width: 150 },
                            { name: 'qty', width: 50 }
                        ]
                    });
                },



                data: jsonObj,
                datatype: "local",
                height: 300,
                colNames:[' ', 'Id', 'Photos','Designation','Prix d\'achat ','Prix de vente','Baren de vente', 'Categorie','En stock'],
                colModel:[
                    {name:'myac',index:'', width:80, fixed:true, sortable:false, resize:false,
                        formatter:'actions',
                        formatoptions:{
                            keys:true,
                            //delbutton: false,//disable delete button

                            delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
                            //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
                        }
                    },
                    {name:'id',index:'id', width:60, sorttype:"int", editable: true},
                    {name:'path_photo',index:'path_photo',width:90, editable:true, sorttype:"file",editoptions:{multiple:""}},
                    {name:'nom_article',index:'nom_article', width:150,editable: true,editoptions:{size:"20",maxlength:"30"}},
                    {name:'pxa_article',index:'pxa_article', width:150, sortable:false,editable: true,edittype:"number", editoptions:{min:0}},
                    {name:'pxvbar_article',index:'pxvbar_article', width:150, sortable:false,editable: true,edittype:"number", editoptions:{min:0}},
                    {name:'pxa_article',index:'pxa_article', width:150, sortable:false,editable: true,edittype:"number", editoptions:{min:0}},
                    {name:'nom_categorie',index:'nom_categorie', width:90, editable: true,edittype:"select",editoptions:{value:"FE:FedEx;IN:InTime;Gm:Games;TN:TNT;Prt:PRINTER;AR:ARAMEX"}},
                    {name:'id_stock',index:'id_stock', width:70, editable: true,edittype:"checkbox",editoptions: {value:"Yes:No"},unformat: aceSwitch}
                ],

                viewrecords : true,
                rowNum:10,
                rowList:[10,20,30],
                pager : pager_selector,
                altRows: true,
                //toppager: true,

                multiselect: true,
                //multikey: "ctrlKey",
                multiboxonly: true,

                loadComplete : function() {
                    var table = this;
                    setTimeout(function(){
                        styleCheckbox(table);

                        updateActionIcons(table);
                        updatePagerIcons(table);
                        enableTooltips(table);
                    }, 0);
                },

                editurl: varurl+'/liste2',//nothing is saved
                caption: "jqGrid with inline editing",


                //,autowidth: true,


                /**
                 ,
                 grouping:true,
                 groupingView : {
						 groupField : ['name'],
						 groupDataSorted : true,
						 plusicon : 'fa fa-chevron-down bigger-110',
						 minusicon : 'fa fa-chevron-up bigger-110'
					},
                 caption: "Grouping"
                 */

            });

        }
    });


    $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size



    //enable search/filter toolbar
    //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
    //jQuery(grid_selector).filterToolbar({});


    //switch element when editing inline
    function aceSwitch( cellvalue, options, cell ) {
        setTimeout(function(){
            $(cell) .find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
        }, 0);
    }
    //enable datepicker
    function pickDate( cellvalue, options, cell ) {
        setTimeout(function(){
            $(cell) .find('input[type=text]')
                .datepicker({format:'yyyy-mm-dd' , autoclose:true});
        }, 0);
    }


    //navButtons
    jQuery(grid_selector).jqGrid('navGrid',pager_selector,
        { 	//navbar options
            edit: true,
            editicon : 'ace-icon fa fa-pencil blue',
            add: true,
            addicon : 'ace-icon fa fa-plus-circle purple',
            del: true,
            delicon : 'ace-icon fa fa-trash-o red',
            search: true,
            searchicon : 'ace-icon fa fa-search orange',
            refresh: true,
            refreshicon : 'ace-icon fa fa-refresh green',
            view: true,
            viewicon : 'ace-icon fa fa-search-plus grey',
        },
        {
            //edit record form
            //closeAfterEdit: true,
            //width: 700,
            recreateForm: true,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }
        },
        {
            //new record form
            //width: 700,
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                    .wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }
        },
        {
            //delete record form
            recreateForm: true,
            beforeShowForm : function(e) {
                var form = $(e[0]);
                if(form.data('styled')) return false;

                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);

                form.data('styled', true);
            },
            onClick : function(e) {
                //alert(1);
            }
        },
        {
            //search form
            recreateForm: true,
            afterShowSearch: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function(){
                style_search_filters($(this));
            }
            ,
            multipleSearch: true,
            /**
             multipleGroup:true,
             showQuery: true
             */
        },
        {
            //view record form
            recreateForm: true,
            beforeShowForm: function(e){
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        }
    )



    function style_edit_form(form) {
        //enable datepicker on "sdate" field and switches for "stock" field
        form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})

        form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
        //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
        //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
        buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

        buttons = form.next().find('.navButton a');
        buttons.find('.ui-icon').hide();
        buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
        buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
        buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }
    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
    }

    function beforeDeleteCallback(e) {
        var form = $(e[0]);
        if(form.data('styled')) return false;

        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_delete_form(form);

        form.data('styled', true);
    }

    function beforeEditCallback(e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_edit_form(form);
    }



    //it causes some flicker when reloading or navigating grid
    //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
    //or go back to default browser checkbox styles for the grid
    function styleCheckbox(table) {
        /**
         $(table).find('input:checkbox').addClass('ace')
         .wrap('<label />')
         .after('<span class="lbl align-top" />')


         $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
         .find('input.cbox[type=checkbox]').addClass('ace')
         .wrap('<label />').after('<span class="lbl align-top" />');
         */
    }


    //unlike navButtons icons, action icons in rows seem to be hard-coded
    //you can change them like this in here if you want
    function updateActionIcons(table) {
        /**
         var replacement =
         {
						'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
						'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
						'ui-icon-disk' : 'ace-icon fa fa-check green',
						'ui-icon-cancel' : 'ace-icon fa fa-times red'
					};
         $(table).find('.ui-pg-div span.ui-icon').each(function(){
						var icon = $(this);
						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
					})
         */
    }

    //replace icons with FontAwesome icons like above
    function updatePagerIcons(table) {
        var replacement =
            {
                'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
                'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
                'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
                'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
            };
        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
        })
    }

    function enableTooltips(table) {
        $('.navtable .ui-pg-button').tooltip({container:'body'});
        $(table).find('.ui-pg-div').tooltip({container:'body'});
    }

    //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

    $(document).one('ajaxloadstart.page', function(e) {
        $.jgrid.gridDestroy(grid_selector);
        $('.ui-jqdialog').remove();
    });
});