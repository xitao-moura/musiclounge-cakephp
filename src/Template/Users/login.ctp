<?= $this->element('utils/menu'); ?>
<!--Form Login!-->
    <section class="login_area section--padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="cardify login">
                            <div class="login--header">
                                <h3>Bem vindo de Volta ;)</h3>
                                <p>Conecte com seu E-mail</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <?php
                                        echo $this->Form->postLink(
                                            '<i class="fa fa-facebook pull-left" style="margin-top: 13px;"></i> Logar com Facebook',
                                            [
                                                'prefix' => false,
                                                'plugin' => 'ADmad/SocialAuth',
                                                'controller' => 'Auth',
                                                'action' => 'login',
                                                'provider' => 'facebook',
                                                '?' => ['redirect' => $this->request->getQuery('redirect')]
                                            ],
                                            ['class' => 'btn btn--md btn--round btn-block bg-primary text-white m-b-sm', 'escape' => false, 'style' => 'width: 90%;margin-left: 5%;']
                                        );
                                    ?>
                                    <p></p>
                                    <?php
                                        echo $this->Form->postLink(
                                            '<i class="fa fa-google-plus pull-left" style="margin-top: 13px;"></i> Logar com Google',
                                            [
                                                'prefix' => false,
                                                'plugin' => 'ADmad/SocialAuth',
                                                'controller' => 'Auth',
                                                'action' => 'login',
                                                'provider' => 'google',
                                                '?' => ['redirect' => $this->request->getQuery('redirect')]
                                            ],
                                            ['class' => 'btn btn--md btn--round btn-block form-group bg-danger text-white', 'escape' => false, 'style' => 'width: 90%;margin-left: 5%;']
                                        );
                                    ?>
                                </div>
                            </div>
                            <!-- end .login_header -->
                            <?= $this->Form->create(null); ?>
                                <div class="login--form">
                                    <div class="form-group">
                                        <label for="user_name">E-mail</label>
                                        <input name="email" id="email" type="text" class="text_field" placeholder="Informe seu E-mail...">
                                    </div>

                                    <div class="form-group">
                                        <label for="pass">Password</label>
                                        <input name="password" id="password" type="password" class="text_field" placeholder="Informe sua Senha...">
                                    </div>

                                    <div class="form-group">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="ch2">
                                            <label for="ch2">
                                                <span class="shadow_checkbox"></span>
                                                <span class="label_text">Quero me manter conectado</span>
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn--md btn--round form-group" type="submit">Acessar</button>

                                    <div class="login_assist">
                                        <p class="recover">Esqueci Minha
                                            <a href="/recuperar-senha" >
                                                Senha
                                            </a>
                                        </p>
                                        <p class="signup">Não tem uma
                                            <a href="/registrar-usuario">
                                                Conta
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <!-- end .login--form -->
                            <?= $this->Form->end(); ?>
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