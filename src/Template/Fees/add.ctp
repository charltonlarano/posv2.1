<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <?php if($forAdmin === true) echo "<li>"; echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); "</li>"; }?>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <?php if($forAdmin === true) echo "<li>"; echo $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']); "</li>"; }?>
    </ul>
</nav>
<div class="fees form large-9 medium-8 columns content">
    <?= $this->Form->create($fee) ?>
    <fieldset>
        <legend><?= __('Add Fee') ?></legend>
        <?php
            echo $this->Form->control('fee_name');
            echo $this->Form->control('accounts._ids', ['options' => $accounts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
