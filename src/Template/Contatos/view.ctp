<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contato $contato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contato'), ['action' => 'edit', $contato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contato'), ['action' => 'delete', $contato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contatos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contato'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contatos view large-9 medium-8 columns content">
    <h3><?= h($contato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($contato->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($contato->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($contato->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assunto') ?></th>
            <td><?= h($contato->assunto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contato->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contato->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contato->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Mensagem') ?></h4>
        <?= $this->Text->autoParagraph(h($contato->mensagem)); ?>
    </div>
</div>
