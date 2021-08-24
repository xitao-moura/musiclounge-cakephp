<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area breadcrumb--center breadcrumb--smsbtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title">
                    <h3>Cadastro</h3>
                    <p class="subtitle">agora falta pouco para fazer parte de nossa comunidade</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Cadastro</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>

<section class="signup_area section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                
                    <div class="cardify signup_form">
                        <div class="login--header">
                            <h3>Crie uma Conta</h3>
                            <p>
                                Por favor preencha os campos a seguir com as informações necessárias para 
                                Registrar uma conta.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <?php
                                  echo $this->Form->postLink(
                                      '<i class="fa fa-facebook pull-left" style="margin-top: 13px;"></i> Cadastre-se com Facebook',
                                      [
                                          'prefix' => false,
                                          'plugin' => 'ADmad/SocialAuth',
                                          'controller' => 'Auth',
                                          'action' => 'login',
                                          'provider' => 'facebook',
                                          '?' => ['redirect' => $this->request->getQuery('redirect')]
                                      ],
                                      [
                                        'class' => 'btn btn--md btn--round btn-block form-group bg-primary text-white',
                                        'escape' => false
                                      ]
                                  );
                                ?>
                                <?php
                                  echo $this->Form->postLink(
                                      '<i class="fa fa-google-plus pull-left" style="margin-top: 13px;"></i> Cadastre-se com Google',
                                      [
                                          'prefix' => false,
                                          'plugin' => 'ADmad/SocialAuth',
                                          'controller' => 'Auth',
                                          'action' => 'login',
                                          'provider' => 'google',
                                          '?' => ['redirect' => $this->request->getQuery('redirect')]
                                      ],
                                      [
                                        'class' => 'btn btn--md btn--round btn-block form-group bg-danger text-white',
                                        'escape' => false,
                                        'style' => 'margin-top: 8px;'
                                      ]
                                  );
                                ?>
                            </div>
                        </div>
                        
                        <!-- end .login_header -->
                        <?= $this->Form->create($user); ?>
                            <div class="login--form">

                                <div class="form-group">
                                    <?= $this->Form->control('nome', ['class' => 'text_field', 'placeholder' => 'Infore seu Nome', 'label' => 'Seu Nome']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('email', ['class' => 'text_field', 'placeholder' => 'Seu melhor E-Mail', 'label' => 'E-mail Válido']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('password', ['class' => 'text_field', 'placeholder' => 'Entre com a Senha...', 'label' => 'Senha']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('password2', ['class' => 'text_field', 'placeholder' => 'Confirme sua Senha', 'label' => 'Confirme sua Senha', 'type' => 'password']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('tipo_id', ['options' => [1 => 'Músico', 3 => 'Parceiro'], 'class' => 'text_field', 'empty' => 'Selecione', 'label' => 'Tipo usuário', 'required']); ?>
                                </div>

                                <?= $this->Form->control('status_id', ['type' => 'hidden', 'value' => 1])?>

                                <button class="btn btn--md btn--round register_btn" type="submit">Registrar Agora</button>

                                <div class="login_assist">
                                    <p>Já tem um cadastro conosco?
                                        <a href="/login">
                                        Login
                                        </a>
                                    </p>
                                </div>
                            </div>
                        <?= $this->Form->end(); ?>
                        <!-- end .login--form -->
                    </div>
                    <!-- end .cardify -->
                
            </div>
            <!-- end .col-md-6 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</section>
<?= $this->element('utils/footer'); ?>

<!-- <div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('tipo_id', ['options' => $tipos]);
            echo $this->Form->control('status_id', ['options' => $status]);
            echo $this->Form->control('marca_id', ['options' => $marcas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
