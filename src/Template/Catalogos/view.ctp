<?= $this->element('utils/menu'); ?>
<section class="search-wrapper">
    <div class="search-area2 bgimage">
        <div class="bg_image_holder">
            <img src="/assets/images/catalogos/empty.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>
                                <span>Catálogo</span> <?= $catalogo->user->nome ?></h3>
                        </div>
                        <div class="search__field">
                            <p class="text-white" style="margin-bottom: 0px;"><strong><i class="fa fa-phone" aria-hidden="true"></i>  </strong><a href="tel:<?= $catalogo->telefone ?>" class="text-white"><?= $catalogo->telefone ?></a></p>
                            <p class="text-white" style="margin-bottom: 0px;"><strong><i class="fa fa-envelope" aria-hidden="true"></i>  </strong><a href="mailto:<?= $catalogo->user->email ?>" class="text-white"><?= $catalogo->user->email ?></a></p>
                            <p class="text-white" style="margin-bottom: 0px;"><strong><i class="fa fa-map-marker" aria-hidden="true"></i>  </strong><?= $catalogo->user->cidade->nome ?> | <?= $catalogo->user->estado->uf ?></p>
                        </div>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="active">
                                    <a href="/parceiros/">Catálogo</a>
                                </li>
                                <li class="active">
                                    <a href="#"><?= $catalogo->user->nome ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.search-area2 -->
</section>


<section class="dashboard-area">
  <div class="dashboard_contents">
    <div class="container">
      <!-- end /.row -->
      <div class="row">

        <?php if(count($instrumentos) == 0){
            echo '<h2>NENHUM INSTRUMENTO CADASTRADO NO CATÁLOGO NO MOMENTO</h2>';
        } ?>

        <!-- start .col-md-4 -->
        <?php foreach ($instrumentos as $instrumento): ?>
            <?php
                $avatar = '/assets/images/usr_avatar.png';
                if(($instrumento->user->avatar != 'usr_avatar.png')){
                    $avatar = '/assets/images/users/' . $instrumento->user->avatar;
                }
            ?>
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">
                    
                    <div class="product__thumbnail">
                        <div class="owl-carousel-instrumentos owl-theme">
                            <?php
                                if(count($instrumento->imagens) == 0){
                                ?>
                                <img src="https://musiclounge.com.br/assets/images/instrumentos/empty.jpg" alt="">
                                <?php
                                }else{
                                    foreach ($instrumento->imagens as $imagem) {
                                ?>
                                <a href="https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>" data-fancybox="gallery-<?= $instrumento->id?>" style="background: url('https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>');background-size: cover;background-position: center;">
                                    <!-- <img src="https://musiclounge.com.br/assets/images/instrumentos/<?= $imagem->imagem ?>" alt="<?= $imagem->descricao ?>"> -->
                                </a>
                                <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- end /.product__thumbnail -->
                    <?php if($instrumento->status_id == 4){ ?>
                    <div class="col-md-12 bg-danger">
                        <h4 class="text-center text-white">ROUBADO</h4>
                    </div>
                    <?php } ?>
                    <div class="product-desc">
                        
                        <a href="#" class="product_title">
                            <p><?= substr($instrumento->descricao, 0, 80) ?></p>
                        </a>
                        <ul class="titlebtm">
                            <li>
                                <img class="auth-img" src="<?= $avatar ?>" alt="author image">
                                <p>
                                    <a href="#"><?= $instrumento->user->nome?></a>
                                </p>
                            </li>
                            <br>
                            <li class="product_cat">
                                <p>
                                    <strong>Modelo:</strong> <?= $instrumento->modelo ?>
                                </p>
                            </li>
                            <!-- <li class="product_cat">
                                <a href="#">
                                    <span class="lnr lnr-book"></span>Plugin</a>
                            </li> -->
                        </ul>
                    </div>
                    <!-- end /.product-desc -->

                    <div class="product-purchase">
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                    echo $this->Html->link('<i class="fa fa-eye" aria-hidden="true"></i>', [
                                          'controller' => 'Instrumentos',
                                          'action' => 'view',
                                          'id' => $instrumento->id,
                                          'marca' => Cake\Utility\Text::slug(strtolower(sanitizeString($instrumento->marca)), '-'),
                                          'modelo' => Cake\Utility\Text::slug(strtolower(sanitizeString($instrumento->modelo)), '-')
                                      ],[
                                        'class' => 'btn btn-sm btn-info w-100 btn--round',
                                        'escape' => false
                                      ]);
                                ?>
                                <!-- <a href="/instrumentos/view/<?= $instrumento->id ?>" class="btn btn-sm btn-info w-100 btn--round" title="Detalhes"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                            </div>

                        </div>
                    </div>
                    <!-- end /.product-purchase -->
                </div>
                <!-- end /.single-product -->
            </div>
            <!-- end /.col-md-4 -->
        <?php endforeach; ?>
        
      
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