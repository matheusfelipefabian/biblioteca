<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksGender[]|\Cake\Collection\CollectionInterface $booksGenders
 */
?>
<div class="booksGenders index content">
    <?= $this->Html->link(__('New Books Gender'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books Genders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('book_id') ?></th>
                    <th><?= $this->Paginator->sort('gender_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($booksGenders as $booksGender): ?>
                <tr>
                    <td><?= $this->Number->format($booksGender->id) ?></td>
                    <td><?= $booksGender->has('book') ? $this->Html->link($booksGender->book->title, ['controller' => 'Books', 'action' => 'view', $booksGender->book->id]) : '' ?></td>
                    <td><?= $booksGender->has('gender') ? $this->Html->link($booksGender->gender->name, ['controller' => 'Genders', 'action' => 'view', $booksGender->gender->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booksGender->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booksGender->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booksGender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksGender->id)]) ?>
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
