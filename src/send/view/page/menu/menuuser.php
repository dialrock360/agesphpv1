
<ul class="nav nav-tabs" id="myTab">

    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1">
            <img src="assets/images/icon/utilisateur.png" class="img-responsive" alt="EMPLOYERS" style="float: left">

            EMPLOYERS
            &nbsp;<br>
            <span class="badge badge-danger">
              <?php Count_User(); ?>
            </span>
        </a>
    </li>
    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown2">
            <img src="assets/images/icon/client.png" class="img-responsive" alt="EMPLOYERS" style="float: left">

            CLIENTS
            <br>
            <span class="badge badge-danger">
                                                <?php Count_Cli(); ?>
                                                </span>
        </a>


    </li>
    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown3">
            <img src="assets/images/icon/fournisseur.png" class="img-responsive" alt="EMPLOYERS" style="float: left">

            FOURNISSEURS
            &nbsp;  <br>
            <span class="badge badge-danger">
                                                 <?php Count_Four(); ?>
                                            </span>
        </a>
    </li>


    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown6">
            <img src="assets/images/icon/presta.png" class="img-responsive" alt="EMPLOYERS" style="float: left">

            PRESTATAIRE
            &nbsp;  <br>
            <span class="badge badge-danger">
                                                 <?php Count_Prest(); ?>
                                            </span>
        </a>
    </li>


</ul>