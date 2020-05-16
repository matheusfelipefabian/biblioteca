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
            <?= $this->Html->link(__('Edit Books Gender'), ['action' => 'edit', $booksGender->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Books Gender'), ['action' => 'delete', $booksGender->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booksGender->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books Genders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Books Gender'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="booksGenders view content">
            <h3><?= h($booksGender->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $booksGender->has('book') ? $this->Html->link($booksGender->book->title, ['controller' => 'Books', 'action' => 'view', $booksGender->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= $booksGender->has('gender') ? $this->Html->link($booksGender->gender->name, ['controller' => 'Genders', 'action' => 'view', $booksGender->gender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booksGender->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
