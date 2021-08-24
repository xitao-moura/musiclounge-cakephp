<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instrumentos'), ['controller' => 'Instrumentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instrumento'), ['controller' => 'Instrumentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($categoria->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $categoria->has('status') ? $this->Html->link($categoria->status->id, ['controller' => 'Status', 'action' => 'view', $categoria->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($categoria->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Instrumentos') ?></h4>
        <?php if (!empty($categoria->instrumentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Caracteristicas') ?></th>
                <th scope="col"><?= __('Numero Serie') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Marca Id') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Origem Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->instrumentos as $instrumentos): ?>
            <tr>
                <td><?= h($instrumentos->id) ?></td>
                <td><?= h($instrumentos->descricao) ?></td>
                <td><?= h($instrumentos->caracteristicas) ?></td>
                <td><?= h($instrumentos->numero_serie) ?></td>
                <td><?= h($instrumentos->created) ?></td>
                <td><?= h($instrumentos->modified) ?></td>
                <td><?= h($instrumentos->marca_id) ?></td>
                <td><?= h($instrumentos->modelo_id) ?></td>
                <td><?= h($instrumentos->categoria_id) ?></td>
                <td><?= h($instrumentos->origem_id) ?></td>
                <td><?= h($instrumentos->status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Instrumentos', 'action' => 'view', $instrumentos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Instrumentos', 'action' => 'edit', $instrumentos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Instrumentos', 'action' => 'delete', $instrumentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $instrumentos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
