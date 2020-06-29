<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan[]|\Cake\Collection\CollectionInterface $loans
 */
?>
<div class="loans index content">
    <?php echo $this->Html->link(__('New Loan'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?php echo __('Loans') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('Loans.id', 'Id') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.customer_id', 'Customer') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.date', 'Date') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.prazo', 'Limit Date') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.active', 'Active') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.book_id', 'Book') ?></th>
                    <th class="actions"><?php echo __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan): ?>
                <tr>
                    <td><?php echo $this->Number->format($loan->id) ?></td>
                    <td><?php echo $loan->has('customer') ? $this->Html->link($loan->customer->name, ['controller' => 'Customers', 'action' => 'view', $loan->customer->id]) : '' ?></td>
                    <td><?php echo ($loan->date->format('d/m/Y')) ?></td>
                    <td><?php echo h($loan->prazo->format('d/m/Y')) ?></td>
                    <td><?php echo $loan->active? 'YES' : 'NOT' ?></td>
                    <td><?php echo $loan->has('book') ? $this->Html->link($loan->book->title, ['controller' => 'Books', 'action' => 'view', $loan->book->id]) : '' ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), ['action' => 'view', $loan->id]) ?>
                        <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id]) ?>
                        <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
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
