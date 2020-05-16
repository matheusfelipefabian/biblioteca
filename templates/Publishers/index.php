<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publisher[]|\Cake\Collection\CollectionInterface $publishers
 */
?>
<div class="publishers index content">
    <?= $this->Html->link(__('New Publisher'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Publishers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($publishers as $publisher): ?>
                <tr>
                    <td><?= $this->Number->format($publisher->id) ?></td>
                    <td><?= h($publisher->Name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $publisher->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publisher->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $publisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id)]) ?>
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
