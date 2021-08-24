<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area dna">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="/assets/images/DNA_logo_vertical_principal.png" class="img-fluid" style="height: 70px;"/>
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
                            <a href="#">Menus DNA's</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">MEUS DNA's</h1>
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
            <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                <div class="dashboard__title dashboard__title pull-left">
                    <h3>Meus instrumentos</h3>
                </div>

                <div class="pull-right">
                    <div class="filter__option filter--text">
                        <p>
                            Você tem <span><?= $this->Paginator->counter(['format' => __('{{count}}')]) ?></span> instrumentos cadastrados</p>
                    </div>

                    <!-- <div class="filter__option filter--select">
                        <div class="select-wrap">
                            <select name="price">
                                <option value="low">Price : Low to High</option>
                                <option value="high">Price : High to low</option>
                            </select>
                            <span class="lnr lnr-chevron-down"></span>
                        </div>
                    </div> -->
                </div>
                <!-- end /.pull-right -->
            </div>
            <!-- end /.filter-bar -->
        </div>
        <!-- end /.col-md-12 -->
      </div>
      <!-- end /.row -->
      <div class="row">

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
                            <p><?= substr($instrumento->descricao, 0, 167) ?></p>
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
                                    <strong>Categoria:</strong> <?= $instrumento->categoria->nome ?>
                                </p>
                            </li>
                            <br>
                            <li class="product_cat">
                                <p>
                                    <strong>Marca:</strong> <?= $instrumento->marca ?>
                                </p>
                            </li>
                            <br>
                            <li class="product_cat">
                                <p>
                                    <strong>Modelo:</strong> <?= $instrumento->modelo ?>
                                </p>
                            </li>
                            <br>
                            <li class="product_cat">
                                <p>
                                    <strong>Número de Série:</strong> <?= $instrumento->numero_serie ?>
                                </p>
                            </li>
                            <!-- <li class="product_cat">
                                <a href="#">
                                    <span class="lnr lnr-book"></span>Plugin</a>
                            </li> -->
                        </ul>

                         <p><?= $instrumento->caracteristicas ?></p>
                    </div>
                    <!-- end /.product-desc -->

                    <div class="product-purchase">
                        <div class="row">
                            <?php if($instrumento->user_id == $session->read('Auth.User.id')){ ?>
                            <div class="col-md-4">
                                <?php
                                    if($instrumento->status_id == 1){
                                        echo $this->Form->postLink(
                                        '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>',
                                        ['controller' => 'Instrumentos', 'action' => 'setRoubado', $instrumento->id],
                                        ['class' => 'btn btn-sm btn-danger w-100 btn--round', 'escape' => false, 'title' => 'Informar roubo']);
                                    }else{
                                        echo $this->Form->postLink(
                                        '<i class="fa fa-bullhorn" aria-hidden="true"></i>',
                                        ['controller' => 'Instrumentos', 'action' => 'setEncontrado', $instrumento->id],
                                        ['class' => 'btn btn-sm btn-success w-100 btn--round', 'escape' => false, 'title' => 'Informar instrumento recuperado']);
                                    }
                                ?>
                            </div>
                            <div class="col-md-4">
                                <a href="/instrumentos/edit/<?= $instrumento->id ?>" class="btn btn-sm btn-warning w-100 btn--round" title="Editar"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            </div>
                            <?php } ?>
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
