<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area dna">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="/assets/images/logo-dna.png" class="img-fluid" style="height: 70px;"/>
            </div>
            <div class="col-md-10">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">HOME</a>
                        </li>
                        <li>
                            <a href="/instrumentos">Dashboard</a>
                        </li>
                        <?php if($instrumento->status_id == 5){ ?>
                            <li class="active">
                                <a href="#">Cadastrar DNA</a>
                            </li>
                        <?php }else{ ?>
                            <li class="active">
                                <a href="#">Editar DNA</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if($instrumento->status_id == 5){ ?>
                    <h1 class="page-title">CADASTRAR DNA</h1>
                <?php }else{ ?>
                    <h1 class="page-title">EDITAR DNA #<?= $instrumento->id ?></h1>
                <?php } ?>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<?= $this->element('utils/menu-logado'); ?>
<section class="dashboard-area">
    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area <?php if($instrumento->status_id == 4){ echo 'bg-danger'; } ?>">
                        <div class="pull-left">
                            <div class="dashboard__title">
                                <?php //debug($instrumento); ?>
                                <?php if($instrumento->status_id == 5){ ?>
                                    <h3>Cadastrar Instrumento</h3>
                                <?php }else{ ?>
                                    <h3 class="<?php if($instrumento->status_id == 4){ echo 'text-white'; } ?>">Editar Instrumento<?php if($instrumento->status_id == 4){ echo ' | INSTRUMENTO ROUBADO'; } ?></h3>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <?= $this->Form->create($instrumento); ?>
                        <?php if(!empty($session->read('Auth.User.marca_id')) && $instrumento->status_id == 5){ ?>
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Proprietário</h3>
                            </div>

                            <div class="modules__content">
                                <div class="form-group">
                                    <?= $this->Form->control('nome', ['class' => 'form-control text_field', 'placeholder' => 'Nome', 'required']); ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->control('email', ['class' => 'form-control text_field', 'placeholder' => 'E-mail', 'required']); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Características & Descrição</h3>
                            </div>

                            <div class="modules__content">
                                <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('categoria_id', ['options' => $categorias, 'class' => 'text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('marca', ['class' => 'form-control text_field', 'placeholder' => 'Marca']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('modelo', ['class' => 'form-control text_field', 'placeholder' => 'Modelo']); ?>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('origem_id', ['options' => $origens, 'class' => 'form-control text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <?= $this->Form->control('numero_serie', ['class' => 'form-control text_field', 'placeholder' => 'Número de série']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('caracteristicas', ['class' => 'form-control text_field', 'placeholder' => 'Informe as características do instrumento...', 'type' => 'textarea']); ?>
                                </div>

                                <div class="form-group">
                                    <?= $this->Form->control('descricao', ['class' => 'form-control text_field', 'placeholder' => 'Descrição...', 'type' => 'textarea']); ?>
                                </div>
                                <!-- end /.row -->
                                <?php if($instrumento->status_id == 4){ ?>
                                    <div class="form-group">
                                        <?= $this->Form->control('detalhes_roubo', ['class' => 'form-control text_field', 'placeholder' => 'Descreva os detalhes do roubo/furto, como por exemplo: local que aconteceu, data, horario e etc', 'type' => 'textarea']); ?>
                                    </div>                                        
                                <?php } ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--round btn--fullwidth btn--lg dna">Salvar</button>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-lg-4 col-md-5">
                    <aside class="sidebar upload_sidebar">
                        <div class="sidebar-card">
                            <div class="card-title">
                                <h3 class="text-center form-group">IMAGENS</h3>
                                <h3 class="text-center"><a href="javascript:void(0);" class="btn btn-sm btn-info w-100 btn--round" data-toggle="modal" data-target="#modalUploadImagensInstrumentos">INSERIR MAIS IMAGENS</a></h3>
                            </div>
                            <div class="card-body">
                                <div class="owl-carousel-instrumentos owl-theme">
                                    <?php foreach ($instrumento->imagens as $imagem) {
                                    ?>
                                    <img src="/assets/images/instrumentos/<?= $imagem->imagem ?>" alt="<?= $imagem->descricao ?>">
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <?php if($instrumento->status_id != 5 && $instrumento->user_id == $session->read('Auth.User.id')){ ?>
                        <aside class="sidebar upload_sidebar">
                            <a href="javascript:void(0);" class="btn btn-sm btn-success w-100 btn--round" data-toggle="modal" data-target="#modal-transferir-propriedade">TRANSFERIR PROPRIEDADE</a>
                        </aside>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>
<?= $this->element('modals/modal-upload-imagens-instrumento'); ?>
<?= $this->element('modals/modal-transferir-propriedade'); ?>
<?php $this->append('script_footer'); ?>
<script type="text/javascript">
    $('.owl-carousel-instrumentos').owlCarousel({
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
</script>
<?php $this->end();?>