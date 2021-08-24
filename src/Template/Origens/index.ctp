<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Origem[]|\Cake\Collection\CollectionInterface $origens
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Origem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Instrumentos'), ['controller' => 'Instrumentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Instrumento'), ['controller' => 'Instrumentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="origens index large-9 medium-8 columns content">
    <h3><?= __('Origens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($origens as $origem): ?>
            <tr>
                <td><?= $this->Number->format($origem->id) ?></td>
                <td><?= h($origem->nome) ?></td>
                <td><?= h($origem->created) ?></td>
                <td><?= h($origem->modified) ?></td>
                <td><?= $origem->has('status') ? $this->Html->link($origem->status->id, ['controller' => 'Status', 'action' => 'view', $origem->status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $origem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $origem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $origem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $origem->id)]) ?>
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
