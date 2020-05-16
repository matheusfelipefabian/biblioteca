<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penalty[]|\Cake\Collection\CollectionInterface $penalties
 */
?>

<?php
            echo $this->Form->create(null);
        ?>
        <div class="search-text">
            <?php
            // Match the search param in your table configuration
            echo $this->Form->input('q',
                [
                    'label' => false,
                    'type' => 'text',
                    'placeholder' => 'Busque por um Livro'
                ]
            );
            ?>
        </div>

        <?php
        echo $this->Form->submit(__('SEARCH'), [
            'type' => 'submit'
        ]);
        echo $this->Form->end();
        ?>

<div class="penalties index content">
    <?= $this->Html->link(__('New Penalty'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Penalties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('payed') ?></th>
                    <th><?= $this->Paginator->sort('loan_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penalties as $penalty): ?>
                <tr>
                    <td><?= $this->Number->format($penalty->id) ?></td>
                    <td><?= $this->Number->format($penalty->value) ?></td>
                    <td><?= $this->Number->format($penalty->customer_id) ?></td>
                    <td><?= h($penalty->payed) ?></td>
                    <td><?= $this->Number->format($penalty->loan_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $penalty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $penalty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $penalty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $penalty->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
