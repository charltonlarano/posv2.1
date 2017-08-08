<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>


    <?= $this->Html->css('modal.css') ?>


    <?= $this->Html->script('jquery1.9.1.js') ?>
    <?= $this->Html->script('search.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($forAdmin === true){ echo "<li>"; echo $this->Html->link(__('New User'), ['action' => 'add']); echo "</li>"; } ?>
             <li><?= $this->Html->link(__('List Fees'), ['controller' => 'Fees', 'action' => 'index']) ?></li>
        <?php if ($forAdmin === true){ echo "<li>"; echo $this->Html->link(__('New Fee'), ['controller' => 'Fees', 'action' => 'add']); echo "</li>"; } ?>
            <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <?php if ($forAdmin === true) { echo "<li>"; echo $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']);  echo "</li>"; } ?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col">< ?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('fee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('First_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Middle_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Last_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <!-- <th scope="col">< ?= $this->Paginator->sort('password') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <?php if ($forAdmin === true) {  echo  "<th scope='col'>"; echo  $this->Paginator->sort('role');  echo "</th>";} ?>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <!-- <td>< ?= $this->Number->format($user->id) ?></td> -->
                <td>  <a onclick="$('#id01').hide().delay(750).fadeIn('slow');"  href="fees/iframe/<?php if(isset($user->fee)){

                      echo h($user->fee->id);

                      }?>" target="iframe_a">
                     <?php if(isset($user->fee)){

                      echo h($user->fee->fee_name);

                      }

                      ?> </a>



                 <div id="id01" class="w3-modal">

                    <div class="w3-modal-content" style="width:1130px; position: ">
                       <span onclick="getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>



                 <h1><center>Fees Summary</center></h1>
                      <div class="w3-container">
                        <div id="loader-wrapper">



                 </div>
                 <div id="myDIV" style="display:block;">

                      <iframe  style="  position:relative; " src=""  scrolling="no"  height="750px" width="1100px" name="iframe_a"></iframe>

                  </div>

                      </div>
                    </div>
                  </div>

                </td>
                <td><?= h($user->First_Name) ?></td>
                <td><?= h($user->Middle_Name) ?></td>
                <td><?= h($user->Last_Name) ?></td>
                <td><?= h($user->username) ?></td>
                <!-- <td>< ?= h($user->password) ?></td> -->
                <td><?= h($user->email) ?></td>
                <?php if ($forAdmin ===  true) echo "<td> $user->role</td>";?>
                <td><?= h($user->address) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?php if ($forBoth === true) { echo $this->Html->link(__('Tag Payment'), ['action' => 'view', $user->id]); } ?>
                    <?php if ($forAdmin === true) { echo $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]); } ?>
                    <?php if ($forAdmin ===  true) { echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); } ?>
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
