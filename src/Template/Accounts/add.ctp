<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <?php if($forAdmin === true){echo "<li>"; echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); "</li>"; }?>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
        <?php if ($forAdmin === true){echo "<li>"; echo $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']); "</li>"; }?>
    </ul>
</nav>
<div class="accounts form large-9 medium-8 columns content">
    <?= $this->Form->create($account) ?>
    <fieldset>
        <legend><?= __('Add Account') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('account_name');
            echo $this->Form->control('account_number');
            echo $this->Form->control('debit');
            echo $this->Form->control('credit');
          //  $this->Form->control('fees._ids', ['options' => $fees]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
