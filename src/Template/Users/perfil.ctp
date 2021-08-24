<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="dashboard.html">Usuário</a>
                        </li>
                        <li class="active">
                            <a href="#">Configurações</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Configurações de Usuário</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>

<section class="dashboard-area">
    <?= $this->element('utils/menu-logado'); ?>
    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Configurações de conta</h3>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
            <?= $this->Form->create($user, ['class' => 'setting_form']); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="information_module">
                        <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4>Informações Pessoais
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>

                        <div class="information__set toggle_module collapse show" id="collapse2">
                            <div class="information_wrapper form--fields">
                                <div class="form-group">
                                    <?= $this->Form->control('nome', ['class' => 'text_field', 'placeholder' => 'Nome']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('email', ['class' => 'text_field', 'placeholder' => 'Seu melhor email']); ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= $this->Form->control('new-password', ['class' => 'text_field', 'placeholder' => 'Nova Senha', 'type' => 'password', 'label' => 'Nova Senha']); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= $this->Form->control('password2', ['class' => 'text_field', 'placeholder' => 'Confirme a Senha', 'type' => 'password', 'label' => 'Confirme a Senha']); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <?= $this->Form->control('estados', ['options' => $estados, 'class' => 'form-control', 'empty' => 'Selecione', 'label' => 'Estado']); ?>
                                </div>


                                <div class="form-group">
                                    <?= $this->Form->control('cidades', ['options' => $cidades, 'class' => 'form-control', 'empty' => 'Selecione', 'label' => 'Cidade']); ?>
                                </div> -->

                                <div class="form-group">
                                    <?= $this->Form->control('descricao', ['class' => 'text_field', 'placeholder' => 'Fale-nos um pouco de você...', 'type' => 'textarea']); ?>

                                </div>
                            </div>
                            <!-- end /.information_wrapper -->
                        </div>
                        <!-- end /.information__set -->
                    </div>
                    <!-- end /.information_module -->
                </div>
                <div class="col-md-6">
                    <div class="information_module">
                        <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4>Imagem de perfil
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>

                        <div class="information__set profile_images toggle_module collapse" id="collapse3">
                            <div class="information_wrapper">
                                <div class="profile_image_area">
                                    <?php
                                        $avatar = '/assets/images/usr_avatar.png';
                                        if(($userLogado->avatar != 'usr_avatar.png')){
                                            $avatar = '/assets/images/users/' . $userLogado->avatar;
                                        }
                                    ?>
                                    <img src="<?= $avatar ?>" class="img-avatar" alt="user avatar" width="100">
                                    <div class="img_info">
                                        <p class="bold">Imagem de perfil</p>
                                        <p class="subtitle">JPG, GIF, PNG</p>
                                    </div>

                                    <label for="dp" class="upload_btn">
                                        <!-- <input type="file" id="dp" name="avatar"> -->
                                        <span class="btn btn--sm btn--round" data-toggle="modal" data-target="#modal-foto-avatar" aria-hidden="true">Upload Image</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.information_module -->

                    <div class="information_module">
                        <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4>Redes sociais
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>

                        <div class="information__set social_profile toggle_module collapse " id="collapse5">
                            <div class="information_wrapper">
                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-facebook"></span>
                                    </div>

                                    <div class="link_field">
                                        <?= $this->Form->control('facebook', ['class' => 'text_field', 'placeholder' => 'ex: www.facebook.com/MusicloungeBr']); ?>
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-twitter"></span>
                                    </div>

                                    <div class="link_field">
                                        <?= $this->Form->control('twitter', ['class' => 'text_field', 'placeholder' => 'ex: www.facebook.com/MusicloungeBr']); ?>
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-instagram"></span>
                                    </div>

                                    <div class="link_field">
                                        <?= $this->Form->control('instagram', ['class' => 'text_field', 'placeholder' => 'ex: www.instagram.com/musicloungebr']); ?>
                                    </div>
                                </div>
                                <!-- end /.social__single -->
                            </div>
                            <!-- end /.information_wrapper -->
                        </div>
                        <!-- end /.social_profile -->
                    </div>
                    <!-- end /.information_module -->
                </div>
                <?php if(!empty($user->marca_id)){ ?>
                <div class="col-md-12">
                    <div class="information_module">
                        <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4>Informações Catálogo
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="information__set profile_images toggle_module collapse" id="collapse4">
                            <div class="information_wrapper">
                                <div class="profile_image_area">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-6">
                    <button type="submit" class="btn btn--round btn--fullwidth btn--lg dna">Salvar</button>
                </div>
            </div>
            <?= $this->Form->end();?>
        </div>
    </div>
</section>

<?= $this->element('utils/footer'); ?>
<?= $this->element('utils/modal-foto-avatar'); ?>
<?php $this->append('script_footer'); ?>
<script type="text/javascript">
    $('#estados').change( function() {
        $.getJSON('estados_cidades.json', function (data) {
            
        });
    });
</script>
<?php $this->end(); ?>