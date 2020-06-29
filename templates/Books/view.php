<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>

<!-- <?php
    // $this->Html->css('style');
?> -->
<style>
    .table{
        display: inline;
    }
    .capa{
        float: right;
        display: inline;
        position: relative;
        width: 115px;
        height:140px;
        box-shadow: 3px 3px 5px grey;
    }
</style>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="books-view-content">
            <h3><?= h($book->title) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($book->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Availiable Copies') ?></th>
                    <td><?= h($book->availiable) ?></td>
                </tr>
            </table>
            <div class="capa" ><img src=<?php echo "/biblioteca/webroot/img/capa/book_".$book->id.".jpg"?>></div>
            <div class="related">
                <h4><?= __('Related Authors') ?></h4>
                <?php if (!empty($book->authors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->authors as $authors) : ?>
                        <tr>
                            <td><?= h($authors->id) ?></td>
                            <td><?= h($authors->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Authors', 'action' => 'view', $authors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Authors', 'action' => 'edit', $authors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Authors', 'action' => 'delete', $authors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $authors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Genders') ?></h4>
                <?php if (!empty($book->genders)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->genders as $genders) : ?>
                        <tr>
                            <td><?= h($genders->id) ?></td>
                            <td><?= h($genders->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Genders', 'action' => 'view', $genders->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Genders', 'action' => 'edit', $genders->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genders', 'action' => 'delete', $genders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genders->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Loans') ?></h4>
                <?php if (!empty($book->loans)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Prazo') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->loans as $loans) : ?>
                        <tr>
                            <td><?= h($loans->id) ?></td>
                            <td><?= h($loans->customer_id) ?></td>
                            <td><?= h($loans->date) ?></td>
                            <td><?= h($loans->prazo) ?></td>
                            <td><?= h($loans->book_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
