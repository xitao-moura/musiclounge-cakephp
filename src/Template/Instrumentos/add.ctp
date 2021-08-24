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
                        <li class="active">
                            <a href="#">Novo DNA</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">NOVO DNA</h1>
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
                    <div class="dashboard_title_area">
                        <div class="pull-left">
                            <div class="dashboard__title">
                                <h3>Cadastrar Instrumento</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <?= $this->Form->create($instrumento); ?>
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Características & Descrição</h3>
                            </div>

                            <div class="modules__content">
                                <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('categoria_id', ['options' => $categorias, 'class' => 'form-control text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('marca_id', ['options' => $marcas, 'class' => 'form-control text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('modelo_id', ['options' => $modelos, 'class' => 'form-control text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="select-wrap select-wrap2">
                                        <?= $this->Form->control('origem_id', ['options' => $origens, 'class' => 'form-control text_field', 'empty' => 'Selecione']); ?>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

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
                            </div>
                        </div>
                        <?= $this->Form->control('status_id', ['type' => 'hidden', 'value' => 1]); ?>
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
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>