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
            <?= $this->Html->link(__('Edit Penalty'), ['action' => 'edit', $penalty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Penalty'), ['action' => 'delete', $penalty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Penalties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Penalty'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="penalties view content">
            <h3><?= h($penalty->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($penalty->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($penalty->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Id') ?></th>
                    <td><?= $this->Number->format($penalty->customer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Loan Id') ?></th>
                    <td><?= $this->Number->format($penalty->loan_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payed') ?></th>
                    <td><?= $penalty->payed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
