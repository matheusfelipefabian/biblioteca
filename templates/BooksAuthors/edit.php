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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booksAuthor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booksAuthor->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Books Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booksAuthors form content">
            <?= $this->Form->create($booksAuthor) ?>
            <fieldset>
                <legend><?= __('Edit Books Author') ?></legend>
                <?php
                    echo $this->Form->control('author_id', ['options' => $authors]);
                    echo $this->Form->control('book_id', ['options' => $books]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
