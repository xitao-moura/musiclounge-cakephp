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
                                <span>Parceiros</span> Music Lounge DNA</h3>
                        </div>
                        <!-- <div class="search__field">
                            <form action="#">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Busque um de nossos parceiro">
                                    <button class="btn btn--round" type="submit">Pesquisar</button>
                                </div>
                            </form>
                        </div> -->
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Parceiros</a>
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

<!-- <div class="filter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-bar filter--bar2">
                    <div class="pull-right">
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <?= $this->Form->control('nome', ['placeholder' => 'por nome', 'label' => false])?>
                            </div>
                        </div>
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <?= $this->Form->control('instrumento', ['options' => [], 'empty' => 'por instrumento', 'label' => false])?>
                            </div>
                        </div>
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <?= $this->Form->control('estado', ['options' => [], 'empty' => 'por estado', 'label' => false])?>
                            </div>
                        </div>
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <?= $this->Form->control('cidade', ['options' => [], 'empty' => 'por cidade', 'label' => false])?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<section class="products section--padding2">
    <div class="container">
        <div class="row">
            <?php foreach ($catalogos as $key => $catalogo) {
            ?>
            <div class="col-lg-6">
                <div class="product product--list product--list-small">
                    <div class="product__thumbnail">
                        <img src="https://musiclounge.com.br/assets/images/users/<?= $catalogo->user->avatar ?>" alt="Product Image">
                    </div>
                    <div class="product__details">
                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4><?= $catalogo->user->nome ?></h4>
                            </a>
                            <p><strong><i class="fa fa-phone" aria-hidden="true"></i>  </strong><a href="tel:<?= $catalogo->telefone ?>"><?= $catalogo->telefone ?></a></p>
                            <p><strong><i class="fa fa-envelope" aria-hidden="true"></i>  </strong><a href="mailto:<?= $catalogo->user->email ?>"><?= $catalogo->user->email ?></a></p>
                            <p><strong><i class="fa fa-map-marker" aria-hidden="true"></i>  </strong><?= $catalogo->user->cidade->nome ?> | <?= $catalogo->user->estado->uf ?></p>
                            <?php
                                echo $this->Html->link('Ver catálogo', [
                                      'controller' => 'Catalogos',
                                      'action' => 'view',
                                      'id' => $catalogo->id,
                                      'nome' => Cake\Utility\Text::slug(strtolower(sanitizeString($catalogo->user->nome)), '-')
                                  ],[
                                    'class' => 'btn btn--sm btn--round callto-action-btn',
                                    'escape' => false
                                  ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>