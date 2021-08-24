<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area breadcrumb--center breadcrumb--smsbtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title">
                    <h3>Contato</h3>
                    <p class="subtitle">você veio ao lugar certo</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Contato</a>
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

<section class="contact-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h1>Como podemos 
                                <span class="highlighted">ajudar?</span>
                            </h1>
                            <p>Mande usa sugestão, dúvida, pergunta, nos xingue, mas não deixe de falar conosco. =)</p>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <!-- <div class="col-lg-4 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-map-marker"></span>
                            <h4 class="tiles__title">Endereço do escritório</h4>
                            <div class="tiles__content">
                                <p>Rua: Cajupiranga, 185 - Jd. Nordeste - São Paulo/SP</p>
                            </div>
                        </div>
                    </div> -->
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-lg-6 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-phone"></span>
                            <h4 class="tiles__title">Telefone</h4>
                            <div class="tiles__content">
                                <p>11 96090-5991</p>
                            </div>
                        </div>
                        <!-- end /.contact_tile -->
                    </div>
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-lg-6 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-inbox"></span>
                            <h4 class="tiles__title">E-mail</h4>
                            <div class="tiles__content">
                                <p>musiclounge@musiclounge.com.br</p>
                            </div>
                        </div>
                        <!-- end /.contact_tile -->
                    </div>
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-md-12">
                        <div class="contact_form cardify">
                            <div class="contact_form__title">
                                <h3>Deixe suas mensagens</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="contact_form--wrapper">
                                        <?= $this->Form->create(null, ['url' => ['controller' => 'Contatos', 'action' => 'add']]); ?>
                                        <!-- <form action="#"> -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <input type="text" placeholder="Nome"> -->
                                                        <?= $this->Form->control('nome', ['placeholder' => 'Nome', 'label' => false, 'required']); ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <input type="text" placeholder="Email"> -->
                                                        <?= $this->Form->control('email', ['placeholder' => 'Email', 'label' => false, 'required']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <input type="text" placeholder="Telefone"> -->
                                                        <?= $this->Form->control('telefone', ['placeholder' => 'Telefone', 'label' => false, 'required']); ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <input type="text" placeholder="Assunto"> -->
                                                        <?= $this->Form->control('assunto', ['placeholder' => 'Assunto', 'label' => false, 'required']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <textarea cols="30" rows="10" placeholder="mensagem"></textarea> -->
                                            <?= $this->Form->control('mensagem', ['placeholder' => 'Mensagem', 'label' => false, 'cols' => 30, 'type' => 'textarea', 'required']); ?>

                                            <div class="sub_btn">
                                                <button type="submit" class="btn btn--round btn--default">Enviar</button>
                                            </div>
                                        <!-- </form> -->
                                        <?= $this->Form->end(); ?>
                                    </div>
                                </div>
                                <!-- end /.col-md-8 -->
                            </div>
                            <!-- end /.row -->
                        </div>
                        <!-- end /.contact_form -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<?= $this->element('utils/footer'); ?>