<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BooksGender $booksGender
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booksGender->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booksGender->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Books Genders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booksGenders form content">
            <?= $this->Form->create($booksGender) ?>
            <fieldset>
                <legend><?= __('Edit Books Gender') ?></legend>
                <?php
                    echo $this->Form->control('book_id', ['options' => $books]);
                    echo $this->Form->control('gender_id', ['options' => $genders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
