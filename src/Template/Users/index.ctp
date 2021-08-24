<?= $this->element('utils/menu'); ?>
<section class="search-wrapper">
    <div class="search-area2 bgimage">
        <div class="bg_image_holder">
            <img src="/assets/images/search.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>
                                <span>Usuários</span> Music Lounge DNA</h3>
                        </div>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">Usuários</a>
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
<section class="products section--padding2">
    <div class="container">
        <div class="row">
            <div class="users index large-9 medium-8 columns content">
                <h3><?= __('Users') ?></h3>
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('tipo_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->nome) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->created->format('d/m/Y h:i:s')) ?></td>
                            <td><?= h($user->modified->format('d/m/Y h:i:s')) ?></td>
                            <td><?= $user->has('tipo') ? $this->Html->link($user->tipo->nome, ['controller' => 'Tipos', 'action' => 'view', $user->tipo->id]) : '' ?></td>
                            <td><?= $user->has('status') ? $this->Html->link($user->status->nome, ['controller' => 'Status', 'action' => 'view', $user->status->id]) : '' ?></td>
                            <td><?= $user->has('marca') ? $this->Html->link($user->marca->nome, ['controller' => 'Marcas', 'action' => 'view', $user->marca->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'perfil', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
        </div>
    </div>
</section>
<?= $this->element('utils/footer'); ?>