<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Fee $fee
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('Edit Fee'), ['action' => 'edit', $fee->id]); echo "</li>"; }?>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Form->postLink(__('Delete Fee'), ['action' => 'delete', $fee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fee->id)]); echo "</li>"; }?>
          <li><?= $this->Html->link(__('List Fees'), ['action' => 'index']) ?> </li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New Fee'), ['action' => 'add']); echo "</li>"; } ?>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'])?>  </li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); echo "</li>"; } ?>
          <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <?php if ($forAdmin === true) { echo"<li>"; echo $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']); echo "</li>"; } ?>
    </ul>
</nav>
<div class="fees view large-9 medium-8 columns content">
    <h3><?= h($fee->fee_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fee Name') ?></th>
            <td><?= h($fee->fee_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fee->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($fee->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!-- <th scope="col">< ?= __('Id') ?></th> -->
                <!-- <th scope="col">< ?= __('Fee Id') ?></th> -->
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Middle Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <!-- <th scope="col">< ?= __('Password') ?></th> -->
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fee->users as $users): ?>
            <tr>
                <!-- <td>< ?= h($users->id) ?></td> -->
                <!-- <td>< ?= h($users->fee_id) ?></td> -->
                <td><?= h($users->First_Name) ?></td>
                <td><?= h($users->Middle_Name) ?></td>
                <td><?= h($users->Last_Name) ?></td>
                <td><?= h($users->username) ?></td>
                <!-- <td>< ?= h($users->password) ?></td> -->
                <td><?= h($users->email) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?php if ($forAdmin === true) {echo  $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]); }?>
                    <?php if ($forAdmin === true) {echo  $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]); }?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Accounts') ?></h4>
        <?php if (!empty($fee->accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!-- <th scope="col">< ?= __('Id') ?></th> -->
                <!-- <th scope="col">< ?= __('User Id') ?></th> -->
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col"><?= __('Account Number') ?></th>
                <th scope="col"><?= __('Debit') ?></th>
                <th scope="col"><?= __('Credit') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fee->accounts as $accounts): ?>
            <tr>
                <!-- <td>< ?= h($accounts->id) ?></td> -->
                <!-- <td>< ?= h($accounts->user_id) ?></td> -->
                <td><?= h($accounts->account_name) ?></td>
                <td><?= h($accounts->account_number) ?></td>
                <td><?= h($accounts->debit) ?></td>
                <td><?= h($accounts->credit) ?></td>
                <td><?= h($accounts->created) ?></td>
                <td><?= h($accounts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $accounts->id]) ?>
                    <?php if($forAdmin === true) {echo $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $accounts->id]); }?>
                    <?php if($forAdmin === true) {echo $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id)]); } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
