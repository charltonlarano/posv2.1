<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    <?php if ($forAdmin === true ){ echo "<li>"; echo $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]); echo  "</li>";} ?>
    <?php if ($forAdmin === true ) { echo "<li>"; echo $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]);  echo"</li>"; }?>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index'])?> </li>
    <?php if ($forAdmin === true ) { echo "<li>"; echo $this->Html->link(__('New User'), ['action' => 'add']); echo "</li>";} ?>
        <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?> </li>
    <?php if ($forAdmin === true ) { echo "<li>"; echo $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']);  echo "</li>"; }?>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
    <?php if ($forAdmin === true) { echo"<li>"; echo $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']); echo"</li>"; }?>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fee') ?></th>
            <td><?= $user->has('fee') ? $this->Html->link($user->fee->fee_name, ['controller' => 'Fees', 'action' => 'view', $user->fee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->First_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($user->Middle_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->Last_Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row">< ?= __('Password') ?></th>
            <td>< ?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <?php if ($forAdmin == true)"<tr>
            <th scope='row'><?= __('Role') ?></th>
            <td>$user->role</td>
        </tr>"; ?>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row">< ?= __('Id') ?></th>
            <td>< ?= $this->Number->format($user->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <!-- <div class="related">
        <h4>< s?= __('Related Accounts') ?></h4>
        < ?php if (!empty($user->accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col">< ?= __('Id') ?></th>
                <th scope="col">< ?= __('User Id') ?></th>
                <th scope="col">< ?= __('Account Name') ?></th>
                <th scope="col">< ?= __('Account Number') ?></th>
                <th scope="col">< ?= __('Debit') ?></th>
                <th scope="col">< ?= __('Credit') ?></th>
                <th scope="col">< ?= __('Created') ?></th>
                <th scope="col">< ?= __('Modified') ?></th>
                <th scope="col" class="actions">< ?= __('Actions') ?></th>
            </tr>
            < ?php foreach ($user->accounts as $accounts): ?>
            <tr>
                <td>< ?= h($accounts->id) ?></td>
                <td>< ?= h($accounts->user_id) ?></td>
                <td>< ?= h($accounts->account_name) ?></td>
                <td>< ?= h($accounts->account_number) ?></td>
                <td>< ?= h($accounts->debit) ?></td>
                <td>< ?= h($accounts->credit) ?></td>
                <td>< ?= h($accounts->created) ?></td>
                <td>< ?= h($accounts->modified) ?></td>
                <td class="actions">
                    < ?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $accounts->id]) ?>
                    < ?= $this->Html->link(__('Edit'), ['controller' => 'Accounts', 'action' => 'edit', $accounts->id]) ?>
                    < ?= $this->Form->postLink(__('Delete'), ['controller' => 'Accounts', 'action' => 'delete', $accounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accounts->id)]) ?>
                </td>
            </tr>
            < ?php endforeach; ?>
        </table>
        < ?php endif; ?>
    </div> -->
</div>
