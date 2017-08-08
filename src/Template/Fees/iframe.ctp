<?php
/**
  * @var \App\View\AppView $this
  */
?>

<script>
 var x = document.getElementById('hideme');
 x.style.display = 'none';
</script>
<div class="fees view large-9 medium-8 columns content">
    <h3><?= h($fee->fee_name) ?></h3>


<div id="totalkg" style="margin-left: 300px;">
    <table>
       <h3>Please give the total weight in kg(s).</h3>
        <tr>
           <td>Slot 1:</td>
           <?php foreach ($fee->accounts as $accounts):?>
        <?php if ($accounts->account_name === 'Post Mortem Fee') : ?>
      <td>
      <div class="form-group">
        <input type='text'  class='input form-control' id='val1' style="width: 50%;" value="0" placeholder="Total kg(s)" required="" />
        </div>
      </td>
      <td>


        <input class='input form-control' type="text" style="display: none;" value="<?= h($accounts->debit)?>" readonly />

      </td>

      <td>
      <div class="form-group">
        <input type='text' class=' input input2 form-control' id='sum1'  value='0.00' readonly='readonly' />
      </div>
      </td>
      </tr>


      <tr>
           <td>Slot 2:</td>
      <td>
      <div class="form-group">
        <input type='text' class='input form-control' id='val2' style="width: 50%;" value="0"  placeholder="Total kg(s)" required="" />
      </div>
      </td>
      <td>
        <input class='input form-control' type="text" style="display: none;" value="<?= h($accounts->debit)?>" readonly >
      </td>

      <td>
      <div class="form-group">
        <input type='text' class='input input2 form-control' id='sum2' value='0.00' readonly='readonly' />
        </div>
      </td>
      </tr>
      <tr>
           <td>Slot 3:</td>
      <td>
      <div class="form-group">
        <input type='text' class='input form-control' id='val3' style="width: 50%;" value="0" placeholder="Total kg(s)" required=""/>
      </td>
      <td>
      <div class="form-group">
        <input class="input form-control" type="text" style="display: none;" value="<?= h($accounts->debit)?>" readonly >
        </div>
      </td>

      <td>
      <div class=form-group>
        <input type='text' class='input input2 form-control' id='sum3' value='0.00' readonly='readonly' />
        </div>
      </td>
      </tr>
      <tr>
           <td>Slot 4:</td>
      <td>
      <div class="form-group">
        <input type='text' class='input form-control' style="width: 50%;" id='val4' value="0" placeholder="Total kg(s)" required="" />
        </div>
      <td>
        <input class="input form-control" type="text" style="display: none;" value="<?= h($accounts->debit)?>" readonly >
      </td>

      <td>
        <input type='text' class='input input2 form-control' id='sum4' value='0.00' readonly='readonly' />
      </td>
      </tr>
      <tr>
           <td>Slot 5:</td>
      <td>
      <div class="form-group">
        <input type='text' class='input form-control' id='val5' style="width: 50%;" value="0" placeholder="Total kg(s)" required=""  />
        </div>
      </td>
      <td>
        <input class="input form-control" type="text" style="display: none;" value="<?= h($accounts->debit)?>" readonly >
      </td>

      <td>
        <input type='text' class='input input2 form-control' id='sum5' value='0.00' readonly='readonly' />
      </td>
      </tr>

   <td></td>
   <td>
     <button class="btn btn-default"  id="btnTotal" onclick="myFunction()">View Payment</button>
    </td>
    <td>
      </td>
  <?php endif;?>
<?php endforeach; ?>

    </table>
</div>


    <div id="myDIV" style="display: none;" class="columns large-12">
        <h4><?= __('Breakdown of fees') ?></h4>
        <?php if (!empty($fee->accounts)): ?>
        <table class="table table-striped" width="136%" id="fees" cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col"><?= __('Account Number') ?></th>
                <!--<th scope="col">< ?= __('Debit') ?></th>
                <th scope="col">< ?= __('Credit') ?></th>!-->
                <th scope="col"><?= __('Total') ?></th>
                <!--<th scope="col">< ?= __('Created') ?></th>
                <th scope="col">< ?= __('Modified') ?></th>-->
            </tr>
            <?php foreach ($fee->accounts as $accounts): ?>
            <tr>
                <?php if ($accounts->account_name !== 'Post Mortem Fee' ) : ?>
                <td><?= h($accounts->account_name) ?></td>
                <td><?= h($accounts->account_number) ?></td>
                <!--<td>&#8369; <span class="DataListed"> < ?php ?// h($accounts->debit)?><span></td>
                <td>&#8369; <span class="DataSold"> < ?php // h($accounts->credit) ?></span></td>!-->
                <td>&#8369; <span class="DataListed"><?php if ($accounts->debit !== '0.00') { echo ($accounts->debit); } else{ echo($accounts->credit); }?></span></td>
                <!--<td>< ?= h($accounts->created) ?></td>
                <td>< ?= h($accounts->modified) ?></td>!-->

                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
            <tr>
                   <?php foreach ($fee->accounts as $accounts): ?>
            <tr>
                <?php if ($accounts->account_name === 'Post Mortem Fee' ) : ?>
                <td><?= h($accounts->account_name) ?></td>
                <td><?= h($accounts->account_number) ?></td>
                <!--<td>&#8369; <span>< ?php h($accounts->debit)?><span></td>
                <td>&#8369; <span>< ?php h($accounts->credit) ?></span></td>!-->
                <td><span>&#8369; <?php if ($accounts->debit !== '0.00') { echo ($accounts->debit);} else{ echo($accounts->credit); }?></td>
                <!--<td>< ?= h($accounts->created) ?></td>
                <td>< ?= h($accounts->modified) ?></td>!-->

                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <tr>
            <th>Slots</th>
            <th>Weight in Kg(s)</th>
            <th>Price</th>
        </tr>
             <tr id="tr1">
        <td>Slot 1 Total price /kg(s):</td>

        <td><span class="zero1" id="kgs1"></span> kg(s)</td>
        <td id="td1">&#8369; <span  id="output1"  class="DataListed"></span></td>



    </tr>
     <tr id="tr2">
        <td>Slot 2 Total price /kg(s):</td>

        <td><span class="zero2" id="kgs2"></span> kg(s)</td>
        <td id="td2">&#8369; <span  id="output2" class="DataListed"></span></td>

    </tr>
     <tr id="tr3">
        <td>Slot 3 Total price /kg(s):</td>

        <td><span class="zero3" id="kgs3"></span> kg(s)</td>
        <td id="td3">&#8369; <span  id="output3"  class="DataListed"></span></td>

    </tr>
     <tr id="tr4">
        <td>Slot 4 price /kg(s):</td>

        <td><span class="zero4" id="kgs4"></span> kg(s)</td>
        <td id="td4">&#8369; <span  id="output4"  class="DataListed"></span></td>

    </tr>
     <tr id="tr5">
        <td>Total 5 price /kg(s):</td>
        <td><span class="zero5" id="kgs5"></span> kg(s)</td>
        <td id="td5">&#8369; <span  id="output5"  class="DataListed"></span></td>

    </tr>

     <tr class="totalColumn">
        <td><h5>Total Debit and Credit:</h5></td>

        <td></td>
        <td>&#8369; <span class="totalColListed"></span>.00</td>
        <!--<td>&#8369; <span class="totalColSold"></span></td>!-->

    </tr>
    <tr>
    <td><h5>Total:</h5> &#8369;</h5><font style="margin-top:-33px; size: 15px; font-weight: 700; margin-left: 20px;" class="total"></font>
      <font style="size:15px; font-weight: 700; ">.00</font></div></td>
    <td></td>
    <td></td>


    </tr>
        </table>





        <?php endif; ?>
    </div>
</div>

    <?= $this->Html->css('modal.css') ?>


    <?= $this->Html->script('jquery1.9.1.js') ?>

    <?= $this->Html->script('jquery.v3.2.1.js') ?>
    <?= $this->Html->script('iframecalcu.js') ?>
    <?= $this->Html->script('iframetotal.js') ?>
    <?= $this->Html->script('iframehidetables.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    
