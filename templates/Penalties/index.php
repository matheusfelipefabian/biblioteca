<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty[]|\Cake\Collection\CollectionInterface $penalties
 */
?>

<div class="penalties index content">
    <h3><?php echo __('Penalties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id') ?></th>
                    <th><?php echo $this->Paginator->sort('value') ?></th>
                    <th><?php echo $this->Paginator->sort('customer_id') ?></th>
                    <th><?php echo $this->Paginator->sort('payed') ?></th>
                    <th><?php echo $this->Paginator->sort('loan_id') ?></th>
                    <th class="actions"><?php echo __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penalties as $penalty): ?>
                <tr>
                    <td><?php echo $this->Number->format($penalty->id) ?></td>
                    <td><?php echo $this->Number->format($penalty->value) ?></td>
                    <td><?php echo $this->Number->format($penalty->customer_id) ?></td>
                    <td><?php echo $penalty->payed? 'YES' : 'NOT' ?></td>
                    <td><?php echo $this->Number->format($penalty->loan_id) ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), ['action' => 'view', $penalty->id]) ?>
                        <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $penalty->id]) ?>
                        <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $penalty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')) ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
            <?php echo $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?php echo $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
