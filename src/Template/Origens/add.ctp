<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Origem $origem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Origens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Instrumentos'), ['controller' => 'Instrumentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Instrumento'), ['controller' => 'Instrumentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="origens form large-9 medium-8 columns content">
    <?= $this->Form->create($origem) ?>
    <fieldset>
        <legend><?= __('Add Origem') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('status_id', ['options' => $status]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
