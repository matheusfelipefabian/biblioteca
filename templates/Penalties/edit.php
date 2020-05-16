<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty $penalty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $penalty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Penalties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="penalties form content">
            <?= $this->Form->create($penalty) ?>
            <fieldset>
                <legend><?= __('Edit Penalty') ?></legend>
                <?php
                    echo $this->Form->control('value');
                    echo $this->Form->control('customer_id');
                    echo $this->Form->control('payed');
                    echo $this->Form->control('loan_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
