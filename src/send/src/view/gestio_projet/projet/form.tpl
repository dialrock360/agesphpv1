
<div class="row">
    <div class="col-lg-3"></div>

    <form id="adminpro-order-form" class="adminpro-form">
        <div class="col-lg-6">

            <div class="login-bg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo">
                            <a href="#"><img src="img/logo/logo.png" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-title">
                            <h1>Nouveau Project</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Programme</label>
                        <select name="id_programme" class="form-control" id="id_programme">
                            <option value="none" selected="" disabled="">Interested in</option>
                            <option value="design">Web Design</option>
                            <option value="development">Web Development</option>
                            <option value="illustration">Wordpress Pro</option>
                            <option value="branding">Joomla Pro</option>
                            <option value="video">Video Marketing</option>
                        </select>
                    </div>

                </div>
                <hr/>
                {include file='src/view/gestio_projet/projet/input/_input.tpl'}

            </div>
        </div>
    </form>
    <div class="col-lg-3"></div>
</div>