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
                            <a href="#">Detalhes DNA</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">DETALHES DNA</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<?php
    if($session->check('Auth.User')){
        echo $this->element('utils/menu-logado');
    } 
?>
<section class="single-product-desc single-product-desc2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="item-preview item-preview2">
                    <div class="prev-slide">
                        <div class="owl-carousel-instrumentos owl-theme">
                            <?php
                                if(count($instrumento->imagens) == 0){
                                ?>
                                <img src="/assets/images/instrumentos/empty.jpg" alt="">
                                <?php
                                }else{
                                    foreach ($instrumento->imagens as $imagem) {
                                ?>
                                <a href="https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>" data-fancybox="gallery-<?= $instrumento->id?>" style="background: url('https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>');background-size: cover;background-position: center;" class="view"></a>
                                <!-- <img src="https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>" alt="<?= $imagem->descricao ?>"> -->
                                <?php
                                    }
                                }
                            ?>
                        </div>
                        <?php if($instrumento->status_id == 4){ ?>
                        <div class="col-md-12 bg-danger">
                            <h4 class="text-center text-white">ROUBADO</h4>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="tab tab2">
                        <div class="item-navigation">
                            <ul class="nav nav-tabs nav--tabs2">
                                <li>
                                    <a href="#product-details" class="active" aria-controls="product-details" role="tab" data-toggle="tab">Detalhes</a>
                                </li>
                                <li>
                                    <a href="#product-comment" aria-controls="product-comment" role="tab" data-toggle="tab">Caracteristicas</a>
                                </li>
                                <li>
                                    <a href="#product-historico" aria-controls="product-historico" role="tab" data-toggle="tab">Histórico</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane product-tab fade show active" id="product-details">
                                <?= $instrumento->descricao ?>
                            </div>
                            <div class="tab-pane product-tab fade" id="product-comment">
                                <div class="thread">
                                    <?= $instrumento->caracteristicas ?>
                                </div>
                            </div>
                            <div class="tab-pane product-tab fade" id="product-historico">
                                <div class="thread">
                                    <div class="withdraw_module withdraw_history">
                                        <div class="table-responsive">
                                            <table class="table withdraw__table">
                                                <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($instrumento->historicos as $historico) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $historico->created->format('d/m/Y H:i:s'); ?></td>
                                                        <td><?= $historico->data; ?></td>
                                                    </tr>
                                                    <?php
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-card card--product-infos">
                    <aside class="sidebar sidebar--single-product">
                        <div class="sidebar-card card--product-infos">
                            <div class="card-title">
                                <h4>Informações do instrumento</h4>
                            </div>
                            <ul class="infos">
                                <li>
                                    <p class="data-label">Criado</p>
                                    <p class="info"><?= $instrumento->created->format('d/m/Y h:i:s') ?></p>
                                </li>
                                <li>
                                    <p class="data-label">Modificado</p>
                                    <p class="info"><?= $instrumento->modified->format('d/m/Y h:i:s') ?></p>
                                </li>
                                <li>
                                    <p class="data-label">Categoria</p>
                                    <p class="info"><?= $instrumento->categoria->nome ?></p>
                                </li>
                                <li>
                                    <p class="data-label">Marca</p>
                                    <p class="info"><?= $instrumento->marca ?></p>
                                </li>
                                <li>
                                    <p class="data-label">Modelo</p>
                                    <p class="info"><?= $instrumento->modelo ?></p>
                                </li>
                                <!-- <li>
                                    <p class="data-label">Origem</p>
                                    <p class="info"><?= $instrumento->origem->nome ?></p>
                                </li> -->
                                <li>
                                    <p class="data-label">Número de Série</p>
                                    <p class="info"><?= $instrumento->numero_serie ?></p>
                                </li>
                                <li>
                                    <p class="data-label">Proprietário</p>
                                    <p class="info"><?= $instrumento->user->nome ?></p>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <a href="javascript:history.back(-1);" class="btn btn-sm btn-warning w-100 btn--round">Voltar</a>
            </div>
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>
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