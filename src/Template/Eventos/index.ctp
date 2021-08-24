<?= $this->element('utils/menu'); ?>
<section class="breadcrumb-area dna">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-2">
                <img src="/assets/images/DNA_logo_vertical_principal.png" class="img-fluid" style="height: 70px;"/>
            </div> -->
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="/">HOME</a>
                        </li>
                        <li>
                            <a href="/eventos">Eventos</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">EVENTOS</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>


<section class="dashboard-area">
  <div class="dashboard_contents">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                    <div class="dashboard__title dashboard__title pull-left">
                        <!-- <h3>Meus instrumentos</h3> -->
                    </div>

                    <div class="pull-right">
                        <div class="filter__option filter--text">
                            <p>
                                <span><?= $this->Paginator->counter(['format' => __('{{count}}')]) ?></span> eventos cadastrados</p>
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
            <?php foreach ($eventos as $evento): ?>
                <?php
                    $avatar = '/assets/images/usr_avatar.png';
                    if(($evento->user->avatar != 'usr_avatar.png')){
                        $avatar = '/assets/images/users/' . $evento->user->avatar;
                    }
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="product product--card">
                        <div class="product-desc" style="height: initial;">
                            <a href="#" class="product_title">
                                <p><strong><?= $evento->nome ?></strong></p>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="<?= $avatar ?>" alt="author image">
                                    <p>
                                        <a href="#"><?= $evento->user->nome?></a>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Instrumento:</strong> <?= $evento->categoria->nome ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Gênero:</strong> <?= $evento->tipo->nome ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Data inicio:</strong> <?= $evento->data_inicio->format('d/m/Y h:i') ?>
                                    </p>
                                    <p>
                                        <strong>Data final:</strong> <?= $evento->data_final->format('d/m/Y h:i') ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Rua:</strong> <?= $evento->rua ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Bairro:</strong> <?= $evento->bairro ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Cidade:</strong> <?= $evento->cidade ?>
                                    </p>
                                </li>
                                <br>
                                <li class="product_cat">
                                    <p>
                                        <strong>Estado:</strong> <?= $evento->estado ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<div class="eventos index large-9 medium-8 columns content">
    <h3><?= __('Eventos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_final') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorias_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= $this->Number->format($evento->id) ?></td>
                <td><?= h($evento->nome) ?></td>
                <td><?= h($evento->data_inicio) ?></td>
                <td><?= h($evento->data_final) ?></td>
                <td><?= h($evento->rua) ?></td>
                <td><?= h($evento->num) ?></td>
                <td><?= h($evento->complemento) ?></td>
                <td><?= h($evento->cep) ?></td>
                <td><?= h($evento->bairro) ?></td>
                <td><?= h($evento->created) ?></td>
                <td><?= h($evento->modified) ?></td>
                <td><?= $evento->has('status') ? $this->Html->link($evento->status->id, ['controller' => 'Status', 'action' => 'view', $evento->status->id]) : '' ?></td>
                <td><?= $evento->has('tipo') ? $this->Html->link($evento->tipo->id, ['controller' => 'Tipos', 'action' => 'view', $evento->tipo->id]) : '' ?></td>
                <td><?= $evento->has('categoria') ? $this->Html->link($evento->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $evento->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?= $this->element('utils/footer'); ?>
<?php $this->append('script_footer'); ?>
<script type="text/javascript">
    $('.owl-carousel-eventos').owlCarousel({
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