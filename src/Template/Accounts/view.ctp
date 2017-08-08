<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Account $account
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('Edit Account'), ['action' => 'edit', $account->id]); echo"</li>"; }  ?>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Form->postLink(__('Delete Account'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]); echo "</li>"; } ?>
          <li><?= $this->Html->link(__('List Accounts'), ['action' => 'index']) ?> </li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New Account'), ['action' => 'add']); "</li>"; } ?>
          <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); echo "</li>"; } ?>
          <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?> </li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']); echo"</li>"; } ?>
    </ul>
</nav>
<div class="accounts view large-9 medium-8 columns content">
    <h3><?= h($account->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $account->has('user') ? $this->Html->link($account->user->username, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Name') ?></th>
            <td><?= h($account->account_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Number') ?></th>
            <td><?= h($account->account_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Debit') ?></th>
            <td><?= h($account->debit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit') ?></th>
            <td><?= h($account->credit) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row">< ?= __('Id') ?></th>
            <td>< ?= $this->Number->format($account->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($account->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($account->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fees') ?></h4>
        <?php if (!empty($account->fees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!-- <th scope="col">< ?= __('Id') ?></th> -->
                <th scope="col"><?= __('Fee Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($account->fees as $fees): ?>
            <tr>
                <!-- <td>< ?= h($fees->id) ?></td> -->
                <td><?= h($fees->fee_name) ?></td>
                <td><?= h($fees->created) ?></td>
                <td><?= h($fees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fees', 'action' => 'view', $fees->id]) ?>
                    <?php if ($forAdmin === true) { echo $this->Html->link(__('Edit'), ['controller' => 'Fees', 'action' => 'edit', $fees->id]); } ?>
                    <?php if ($forAdmin === true) { echo $this->Form->postLink(__('Delete'), ['controller' => 'Fees', 'action' => 'delete', $fees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fees->id)]); } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
