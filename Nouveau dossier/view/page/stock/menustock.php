
<style >
    #contencmpt
    {
        display: flex;
        justify-content: space-around;
    }
</style >
<ul class="nav nav-tabs" id="myTab">



    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown1">

            <img src="assets/images/icon/produit.png" class="img-responsive" alt="produit" style="float: right"> Produits <br>
            <span class="badge badge-danger">

           <?php
           echo Count_Prod();
           ?>
                                                </span>
        </a>


    </li>
    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#base" style="background-color: #CCCCFF ;color: #000000">


            <img src="assets/images/icon/composer.png" class="img-responsive" alt=" PRODUIT COMPOSES" style="float: right">
            PRODUIT COMPOSES
            <br>

            <span class="badge badge-danger" >
                                                 <?php
                                                 echo Count_Cmp();                                                 ?>
                                            </span>
        </a>
    </li>
    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown3">
            <img src="assets/images/icon/categorie.png" class="img-responsive" alt="categorie" style="float: right">


            &nbsp;
            Catégories<br>
            <span class="badge badge-danger">
                                                 <?php
                                                 echo Count_Cat();                                                 ?>
                                            </span>
        </a>
    </li>

    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#dropdown5">
            <img src="assets/images/icon/famille.png" class="img-responsive" alt="famille" style="float: right">


            &nbsp;
            Familles <br>
            <span class="badge badge-danger">
                                                 <?php
                                                 echo Count_Fam();                                                 ?>
                                            </span>
        </a>
    </li>
    <li >
        <a onclick="UnsheckAll()" data-toggle="tab" href="#home">
            <img src="assets/images/icon/condis.png" class="img-responsive" alt="Conditionement" style="float: right"> Conditionement
            <br>
            <span class="badge badge-danger" >


                <?php
                echo Count_Condis();                                                 ?>
                                            </span>
        </a>
    </li>
        <li>
            <a onclick="UnsheckAll()" data-toggle="tab" href="#messages">
                <i class="green ace-icon fa fa-retweet bigger-120"></i>

                Insertion Multiple
                <br>
                <br>
            </a>
        </li>


</ul>