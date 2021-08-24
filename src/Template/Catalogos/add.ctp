<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Catalogo $catalogo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Catalogos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catalogos form large-9 medium-8 columns content">
    <?= $this->Form->create($catalogo) ?>
    <fieldset>
        <legend><?= __('Add Catalogo') ?></legend>
        <?php
            echo $this->Form->control('imagem');
            echo $this->Form->control('telefone');
            echo $this->Form->control('user_id');
            echo $this->Form->control('status_id', ['options' => $status]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
