<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksAuthor $booksAuthor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Books Author'), ['action' => 'edit', $booksAuthor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Books Author'), ['action' => 'delete', $booksAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksAuthor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Books Author'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booksAuthors view content">
            <h3><?= h($booksAuthor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= $booksAuthor->has('author') ? $this->Html->link($booksAuthor->author->name, ['controller' => 'Authors', 'action' => 'view', $booksAuthor->author->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $booksAuthor->has('book') ? $this->Html->link($booksAuthor->book->title, ['controller' => 'Books', 'action' => 'view', $booksAuthor->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booksAuthor->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
