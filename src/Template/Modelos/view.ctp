<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Instrumentos'), ['controller' => 'Instrumentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Instrumento'), ['controller' => 'Instrumentos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marcas'), ['controller' => 'Marcas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marcas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modelos view large-9 medium-8 columns content">
    <h3><?= h($modelo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($modelo->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $modelo->has('status') ? $this->Html->link($modelo->status->id, ['controller' => 'Status', 'action' => 'view', $modelo->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modelo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($modelo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($modelo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Instrumentos') ?></h4>
        <?php if (!empty($modelo->instrumentos)): ?>
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
            <?php foreach ($modelo->instrumentos as $instrumentos): ?>
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
    <div class="related">
        <h4><?= __('Related Marcas') ?></h4>
        <?php if (!empty($modelo->marcas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modelo->marcas as $marcas): ?>
            <tr>
                <td><?= h($marcas->id) ?></td>
                <td><?= h($marcas->nome) ?></td>
                <td><?= h($marcas->created) ?></td>
                <td><?= h($marcas->modified) ?></td>
                <td><?= h($marcas->modelo_id) ?></td>
                <td><?= h($marcas->status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Marcas', 'action' => 'view', $marcas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Marcas', 'action' => 'edit', $marcas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marcas', 'action' => 'delete', $marcas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marcas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
