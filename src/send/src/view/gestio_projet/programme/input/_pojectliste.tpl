
 {literal}
<style>
    * {
        box-sizing: border-box;
    }

    #myInput {
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li .nameproject {
        border: 1px solid #ddd;
        margin-top: -1px; /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block
    }

    #myUL li .toolbooton {
        border: 0.2px solid #dddd;
        margin-top: -1px; /* Prevent double borders */
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: inline-block;
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }
</style>
 {/literal}

 {include file='src/view/gestio_projet/projet/input/_modal.tpl'}

<div class="widget-box transparent">
    <div class="widget-header widget-header-small">
        <h4 class="widget-title blue smaller">
            <i class="ace-icon glyphicon glyphicon-signal blue"></i>
           Liste de Projects
            <i class="ace-icon fa fa-hand-o-right green"></i>
            <a href="#modal-form" role="button" class="btn btn-white btn-info" data-toggle="modal"> Ajouter un projet</a>
        </h4>

        <div class="widget-toolbar action-buttons">
             <span class="input-icon">
									<input type="text"  id="myInput" onkeyup="myFunction()"  placeholder="Rechercher projet.." class="nav-search-input"  autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
        </div>
    </div>

    <div class="widget-body">
        <div class="widget-main padding-8">
            <div id="profile-feed-1" class="profile-feed">
                <ul id="myUL">

                    <li>
                        <div class="profile-activity clearfix">
                            <div>
                                 <a class="user nameproject" href="#" > nom_projet </a>

                                <a href="#"> chef projet</a>

                                <div class="time">
                                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                    date projet
                                </div>
                                <div class="time">
                                    <i class="ace-icon glyphicon  glyphicon-adjust bigger-110"></i>
                                    <span class="label label-sm label-warning">En cour</span>
                                </div>
                            </div>
                            <div class="tools action-buttons">
                                <a href="{$url_base}Projet/manage/1" class="blue  toolbooton">
                                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                                </a>

                                <a href="{$url_base}Projet/delete/1" class="red  toolbooton">
                                    <i class="ace-icon fa fa-times bigger-125"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="profile-activity clearfix">
                            <div>
                                 <a class="user nameproject" href="#"> Titre projet </a>

                                <a href="#"> Patron projet 2</a>

                                <div class="time">
                                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                    Times projet
                                </div>
                                <div class="time">
                                    <i class="ace-icon glyphicon  glyphicon-adjust bigger-110"></i>

                                    <span class="label label-sm label-success">Achevé</span>
                                </div>
                            </div>

                            <div class="tools action-buttons">
                                <a href="{$url_base}Projet/manage/2" class="blue  toolbooton">
                                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                                </a>

                                <a href="{$url_base}Projet/delete/2" class="red  toolbooton">
                                    <i class="ace-icon fa fa-times bigger-125"></i>
                                </a>
                            </div>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
    </div>
</div>







 <script>
     function myFunction() {
         var input, filter, ul, li, a, i, txtValue;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         ul = document.getElementById("myUL");
         li = ul.getElementsByTagName("li");
         for (i = 0; i < li.length; i++) {
             a = li[i].getElementsByTagName("a")[0];
             txtValue = a.textContent || a.innerText;
             if (txtValue.toUpperCase().indexOf(filter) > -1) {
                 li[i].style.display = "";
             } else {
                 li[i].style.display = "none";
             }
         }
     }
 </script>