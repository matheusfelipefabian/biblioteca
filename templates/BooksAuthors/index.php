<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksAuthor[]|\Cake\Collection\CollectionInterface $booksAuthors
 */
?>
<div class="booksAuthors index content">
    <?= $this->Html->link(__('New Books Author'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Books Authors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('author_id') ?></th>
                    <th><?= $this->Paginator->sort('book_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($booksAuthors as $booksAuthor): ?>
                <tr>
                    <td><?= $this->Number->format($booksAuthor->id) ?></td>
                    <td><?= $booksAuthor->has('author') ? $this->Html->link($booksAuthor->author->name, ['controller' => 'Authors', 'action' => 'view', $booksAuthor->author->id]) : '' ?></td>
                    <td><?= $booksAuthor->has('book') ? $this->Html->link($booksAuthor->book->title, ['controller' => 'Books', 'action' => 'view', $booksAuthor->book->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booksAuthor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booksAuthor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booksAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksAuthor->id)]) ?>
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
