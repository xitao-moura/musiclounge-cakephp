<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Origem $origem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Origem'), ['action' => 'edit', $origem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Origem'), ['action' => 'delete', $origem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $origem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Origens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Origem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instrumentos'), ['controller' => 'Instrumentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instrumento'), ['controller' => 'Instrumentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="origens view large-9 medium-8 columns content">
    <h3><?= h($origem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($origem->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $origem->has('status') ? $this->Html->link($origem->status->id, ['controller' => 'Status', 'action' => 'view', $origem->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($origem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($origem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($origem->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Instrumentos') ?></h4>
        <?php if (!empty($origem->instrumentos)): ?>
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
            <?php foreach ($origem->instrumentos as $instrumentos): ?>
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
