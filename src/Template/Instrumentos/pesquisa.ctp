<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area">
	<div class="bg_image_holder">
        
    </div>
    <div class="hero-content content_above" style="height: 210px;">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
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
		                            <a href="/instrumentos/pesquisa">Instrumentos</a>
		                        </li>
		                        <li class="active">
		                            <a href="#">Pesquisa</a>
		                        </li>
		                    </ul>
		                </div>
		                <h1 class="page-title">Pesquisa</h1>
		            </div>
		            <!-- end /.col-md-12 -->
		        </div>
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>

    <!--start search-area -->
    <div class="search-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .container -->
            <div class="row">
                <!-- start .col-sm-12 -->
                <div class="col-sm-12">
                    <!-- start .search_box -->
                    <div class="search_box">
                        <form action="/instrumentos/pesquisa">
                            <input type="text" class="text_field" placeholder="Pesquisar Agora por marca, modelo, número de série ..." name="search">
                            <!-- <div class="search__select select-wrap">
                                <select name="category" class="select--field" id="blah">
                                    <option value="">All Categories</option>
                                    <option value="">PSD</option>
                                    <option value="">HTML</option>
                                    <option value="">WordPress</option>
                                    <option value="">All Categories</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div> -->
                            <button type="submit" class="search-btn btn--lg" @click="query">Pesquisar Agora</button>
                        </form>
                    </div>
                    <!-- end ./search_box -->
                </div>
                <!-- end /.col-sm-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!--start /.search-area -->
</section>
<section class="features section--padding">
	<div class="container">
		<div class="row">
            <?php if(count($instrumentos) == 0){ ?>
            <div class="col-md-12">
                <h1 class="text-center">Nenhum instrumento encontrado...</h1>
                <h1 class="text-center"><small>Apenas instrumentos com ocorrência de roubo ou furto ativo, estarão públicos.</small></h1>
            </div>
            <?php } ?>
			<?php foreach ($instrumentos as $instrumento): ?>
			<!-- start search-area -->
            <div class="col-lg-4 col-md-6">
                <div class="feature">
                    <div class="feature__img">
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
                                <!-- <img src="/assets/images/instrumentos/<?= $imagem->imagem ?>" alt="<?= $imagem->descricao ?>"> -->
                                <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <?php if($instrumento->status_id == 4){ ?>
                    <div class="col-md-12 bg-danger">
                        <h4 class="text-center text-white">ROUBADO</h4>
                    </div>
                    <?php } ?>
                    <div class="feature__title">
                        <h3><?= substr($instrumento->descricao, 0, 70) ?></h3>
                    </div>
                    <div class="feature__desc">
                        <p style="margin-bottom: 0px;"><strong>Marca: </strong><?= $instrumento->marca ?></p>
                        <p style="margin-bottom: 0px;"><strong>Modelo: </strong><?= $instrumento->modelo ?></p>
                        <p><?= substr($instrumento->caracteristicas, 0, 70) ?></p>
                    </div>
                    <div class="col-md-12">
                        <?php
                            echo $this->Html->link('Ver mais', [
                                  'controller' => 'Instrumentos',
                                  'action' => 'view',
                                  'id' => $instrumento->id,
                                  'marca' => Cake\Utility\Text::slug(strtolower(sanitizeString($instrumento->marca)), '-'),
                                  'modelo' => Cake\Utility\Text::slug(strtolower(sanitizeString($instrumento->modelo)), '-')
                              ],[
                                'class' => 'btn btn-sm btn-warning w-100 btn--round',
                                'escape' => false
                              ]);
                        ?>
                        <!-- <a href="/instrumentos/view/<?= $instrumento->id ?>" class="btn btn-sm btn-warning w-100 btn--round">Ver mais</a> -->
                    </div>
                </div>
                <!-- end /.feature -->
            </div>
            <!-- end /.col-lg-4 col-md-6 -->
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