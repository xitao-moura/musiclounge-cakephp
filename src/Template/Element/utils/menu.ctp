
<style type="text/css">
    .top-menu-area {
        height: 82px;
        padding-top: 14px;
    }

    .author-area {
        padding-top: 8px;
    }
</style>
<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 v_middle">
                    <div class="logo">
                        <a href="/">
                            <img src="/assets/images/musicLounge_logo_principal.png" alt="logo image" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                    <!-- start .author-area -->
                    <!--  -->
                    <!-- end /.mobile_content -->
                </div>
                <!-- end /.col-md-5 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search" style="z-index: 9999">
                            <?php if($session->check('Auth.User')) { ?>
                            <div class="author-author__info inline has_dropdown" style="padding: 0px 0;">
                                <div class="author__avatar">
                                    <?php
                                        $avatar = '/assets/images/usr_avatar.png';
                                        if(($userLogado->avatar != 'usr_avatar.png')){
                                            $avatar = '/assets/images/users/' . $userLogado->avatar;
                                        }
                                    ?>
                                    <img src="<?= $avatar ?>" alt="user avatar" class="rounded-circle" width="50">
                                </div>
                                
                                <div class="autor__info">
                                    <p class="name">
                                        <?= $session->read('Auth.User.nome') ?>
                                    </p>
                                    <!-- <p class="ammount">$20.45</p> -->
                                </div>
                                <div class="dropdowns dropdown--author">
                                    <ul>
                                        <li>
                                            <a href="/perfil"><span class="lnr lnr-user"></span> Perfil</a>
                                        </li>
                                        <li>
                                            <a href="/instrumentos"><span class="lnr lnr-upload"></span> Meus instrumentos</a>
                                        </li>
                                        <li>
                                            <a href="/eventos"><span class="lnr lnr-upload"></span> Eventos</a>
                                        </li>
                                        <?php if($session->read('Auth.User.tipo_id') == 2){ ?>
                                            <li>
                                                <a href="/users/"><span class="lnr lnr-user"></span> Usuarios</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><span class="lnr lnr-user"></span> Newsletters</a>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="/logout"><span class="lnr lnr-exit"></span> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- <div class="">
                                <nuxt-link class="button is-primary" to="/registrar-usuario">
                                    <strong>Register</strong>
                                </nuxt-link>
                                <nuxt-link class="button is-light" to="/login">
                                    Log in
                                </nuxt-link>                                    
                            </div> -->
                            <?php if(!$session->check('Auth.User')) { ?>
                                <a href="/registrar-usuario" class="author-area__seller-btn inline">
                                    <strong> Cadastrar-se</strong>
                                </a>
                            <?php } ?>
                            <?php if(!$session->check('Auth.User')) { ?>
                                <a href="/login" class="author-area__seller-btn inline bg-success">
                                    <strong> Login</strong>
                                </a>
                            <?php } ?>
                            <!-- <form action="#">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="Encontre seu instrumento">
                                    <button type="submit" class="search-wrap__btn">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </div>
                            </form> -->
                        </div>
                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="has_dropdown">
                                    <a href="/">HOME</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="/dna">DNA</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="/bate-papo-ml">BATE PAPO ML</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="/parceiros">PARCEIROS</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="/sobre-nos">SOBRE NÓS</a>
                                </li>
                                <li>
                                    <a href="/contato">CONTATO</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row-->
        </div>
        <!-- start .container -->
    </div>
    <!-- end /.mainmenu-->
</div>