<?= $this->element('utils/menu'); ?>
<section class="pass_recover_area section--padding2">
    <div class="container">
        <div class="row">                    
            <div class="col-lg-6 offset-lg-3">
                <?= $this->Form->create(null); ?>
                    <div class="cardify recover_pass">
                        <div class="login--header">
                            <p>
                                Por favor informe seu E-mail cadastrado em nossa plataforma.
                                Uma verificação será enviada. Ao receber, continue com o processo de recuperação de 
                                senha
                            </p>
                        </div>
                        <!-- end .login_header -->

                        <div class="login--form">
                            <div class="form-group">
                                <?= $this->Form->control('email', ['class' => 'text_field', 'placeholder' => 'Informe seu E-mail', 'label' => 'Recuperação de Senha']); ?>
                            </div>

                            <button class="btn btn--md btn--round register_btn" type="submit">Continuar...</button>
                        </div>
                        <!-- end .login--form -->
                    </div>
                    <!-- end .cardify -->
                <?= $this->Form->end(); ?>
            </div>
            <!-- end .col-md-6 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</section>
<?= $this->element('utils/footer'); ?>