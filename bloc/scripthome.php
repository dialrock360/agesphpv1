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

<!--[if lte IE 8]>
<script src="<?php echo $base_url; ?>assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $base_url; ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.flot.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $base_url; ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<!-- inline scripts related to this page -->
<script>




    var lineChartData = {
        labels : ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"],
        datasets : [
            <?php

            if($listefamille!=null)
            {
            //$color = array("BLEU","#JAUNE", "#NOiR","#ROUGE","#GRIE","#VERS");

            $fillColor = array("rgba(0,102,153,0.2)","rgba(255,255,51,0.2)", "rgba(0,0,0,0.2)","rgba(192,192,192,0.2)","rgba(204,0,0,0.2)","rgba(0,204,51,0.2)");
            $strokeColor = array("#006699","#FFFF33", "#404040","#909090","#FF0000","#33FF00");;
            $pointColor = array("#006699","#FF9933", "#000000","#C0C0C0","#990000","#006600");


            $tidfa=Select_TIDFA();
            $x=0;
            foreach($listefamille as $ligne )
            {
            /* $DEP = $ligne['DEPENSE'];
             $DESI = $ligne['DESI'];
             $t1=($DEP*100)/$depCS;
             $t2=round($t1, 1);*/
            $DESI = $ligne['DESI'];
            $idfa = $ligne['IDFA'];

            $COLOR = $ligne['COLOR'];
            ?>
            {
                //bleu
                label: "My First dataset",
                fillColor : "<?php echo $fillColor[$x]; ?>",
                strokeColor : "<?php echo $strokeColor[$x]; ?>",
                pointColor : "<?php echo $pointColor[$x]; ?>",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(220,220,220,1)",
                data : [

                    <?php
                    $annee=date('Y');
                    $moi=date('m');
                    $semaine=date('W');
                    $tdat=T_date($moi,$semaine,$annee);
                    for($y=0;$y<7;$y++)
                    {
                        $facture='facture';
                        echo Select_MTSdateFid($tdat[$y],$facture,$idfa);
                        if ($y<6){
                            echo ',';
                        }

                    }

                    ?>
                ]
            }
            <?php
            if ($pointColor[$x]!="#336633"){
                echo ',';
            }
            $x=$x+1;
            }
            }

            ?>


        ]

    }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine1 = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }


</script>
<script type="text/javascript">
    jQuery(function($) {
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: ace.vars['old_ie'] ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                });
        });


        //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
        //but sometimes it brings up errors with normal resize event handlers
        $.resize.throttleWindow = false;


        var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});

        var data = [
            <?php

            if($caisse!=null)
            {
            $ligne1=$caisse;
            if($ligne1!=null)
            {
            //$color = array("BLEU","#JAUNE", "#NOiR","#ROUGE","#GRIE","#VERS");
            $color = array("#0099FF","#FFCC33", "#404040","#9900FF","#FF0000","#33FF00");
            $depCS=$ligne1['DEPENSE'];

            $t=0;
            $i=0;$x=0;$y=0;

            if($listefamille!=null)
            {

            foreach($listefamille as $ligne )
            {
            $DEP = $ligne['DEPENSE'];
            $IDFA = $ligne['IDFA'];
            $DESI = $ligne['DESI'];
            $COLOR = $ligne['COLOR'];

            $annee=date('Y');
            $moi=date('m');
            $sem=date('W');
            $dateIS=I_dateD($moi,$sem,$annee);
            $dateFS=F_Wdate($dateIS);
            $facture='recu';
            $depfa=Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA);
            $mtst=Select_MTSrange($dateIS,$dateFS,$facture);
            if ($depfa==0 and $mtst==0){$Desi=0;$t2=0;}else{$t1=($depfa*100)/$mtst;$t2=round($t1, 1);$Desi=$DESI;}







            ?>
            { label: "<?php echo $Desi; ?>",  data: <?php echo $t2; ?>, color: "<?php echo $COLOR; ?>"}
            <?php
            if ($color[$i]!="#33FF00"){
                echo ',';
            }
            $i=$i+1;
            }
            }


            }
            }
            ?>
        ];

        function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        tilt:0.8,
                        highlight: {
                            opacity: 0.25
                        },
                        stroke: {
                            color: '#fff',
                            width: 2
                        },
                        startAngle: 2
                    }
                },
                legend: {
                    show: true,
                    position: position || "ne",
                    labelBoxBorderColor: null,
                    margin:[-30,15]
                }
                ,
                grid: {
                    hoverable: true,
                    clickable: true
                }
            })
        }
        drawPieChart(placeholder, data);

        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */
        placeholder.data('chart', data);
        placeholder.data('draw', drawPieChart);


        //pie chart tooltip example
        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if(item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = Math.round(item.seriesIndex);
                    var tip = item.series['label'] + " : " +  Math.round(item.series['percent'])+'%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
            } else {
                $tooltip.hide();
                previousPoint = null;
            }

        });

        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function(e) {
            $tooltip.remove();
        });



        /*
         var d1 = [];
         for (var i = 0; i < Math.PI * 2; i += 0.5) {
         d1.push([i, Math.sin(i)]);
         }

         var d2 = [];
         for (var i = 0; i < Math.PI * 2; i += 0.5) {
         d2.push([i, Math.cos(i)]);
         }

         var d3 = [];
         for (var i = 0; i < Math.PI * 2; i += 0.2) {
         d3.push([i, Math.tan(i)]);
         }*/


        var d1 = [];
        var x = 0;
        var n =<?php $desi='BAR'; echo CoutVente_fam($desi);?>;



        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < 100; i += (18/7)) {
            d2.push([i, Math.round(i)]);
        }

        var d3 = [];
        for (var i = 0; i < 100; i += (82/7)) {
            d3.push([i, Math.round(i)]);
        }

        var d4 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.3) {
            d4.push([i, Math.sin(i)]);
        }

        var d5 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.4) {
            d5.push([i, Math.cos(i)]);
        }

        var d6 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.8) {
            d6.push([i, Math.tan(i)]);
        }



        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
        $.plot("#sales-charts", [

            <?php

            $t=0;
            $i=0;$x=0;$y=0;
            if($listefamille != null)
            {

            foreach($listefamille as $ligne )
            {
            $DESI = $ligne['DESI'];

            $i=$i+1;

            ?>
            { label: "<?php echo $DESI; ?>", data: d<?php echo $i; ?> }
            <?php
            if ($i<6){
                echo ',';
            }

            }
            }
            ?>
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: { show: true },
                points: { show: true }
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: 0,
                max: <?php $val='GAINS'; echo 100/*Show_Caisse($val)*/;?>,
                tickDecimals: 0
            },
            grid: {
                backgroundColor: { colors: [ "#fff", "#fff" ] },
                borderWidth: 1,
                borderColor:'#555'
            }
        });


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }


        $('.dialogs,.comments').ace_scroll({
            size: 300
        });


        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if(ace.vars['touch'] && ace.vars['android']) {
            $('#tasks').on('touchstart', function(e){
                var li = $(e.target).closest('#tasks li');
                if(li.length == 0)return;
                var label = li.find('label.inline').get(0);
                if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
            });
        }

        $('#tasks').sortable({
                opacity:0.8,
                revert:true,
                forceHelperSize:true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize:true,
                tolerance:'pointer',
                stop: function( event, ui ) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
            if(this.checked) $(this).closest('li').addClass('selected');
            else $(this).closest('li').removeClass('selected');
        });


        //show the dropdowns on top or bottom depending on window height and menu position
        $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
            var offset = $(this).offset();

            var $w = $(window)
            if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                $(this).addClass('dropup');
            else $(this).removeClass('dropup');
        });

    })



</script>