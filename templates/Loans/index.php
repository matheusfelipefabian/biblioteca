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
                    <th><?php echo $this->Paginator->sort('Loans.id', 'id') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.customer_id', 'Cliente') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.date', 'Data de Atribuição') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.prazo', 'Prazo') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.active', 'Ativo') ?></th>
                    <th><?php echo $this->Paginator->sort('Loans.book_id', 'Livro') ?></th>
                    <th class="actions"><?php echo __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan): ?>
                <tr>
                    <td><?php echo $this->Number->format($loan->id) ?></td>
                    <td><?php echo $loan->has('customer') ? $this->Html->link($loan->customer->name, ['controller' => 'Customers', 'action' => 'view', $loan->customer->id]) : '' ?></td>
                    <td><?php echo h($loan->date) ?></td>
                    <td><?php echo h($loan->prazo) ?></td>
                    <td><?php echo $loan->active? 'SIM' : 'NÃO' ?></td>
                    <td><?php echo $loan->has('book') ? $this->Html->link($loan->book->title, ['controller' => 'Books', 'action' => 'view', $loan->book->id]) : '' ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), ['action' => 'view', $loan->id]) ?>
                        <?php echo $this->Html->link(__('Editar'), ['action' => 'edit', $loan->id]) ?>
                        <?php echo $this->Form->postLink(__('Deletar'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?>
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
        <p><?php echo $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
