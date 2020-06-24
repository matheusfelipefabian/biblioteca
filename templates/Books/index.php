<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
 */
?>

<div class="page box">

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
</div>



<div class="books index content">
    <?php echo $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?php echo __('Livros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id') ?></th>
                    <th><?php echo $this->Paginator->sort('Books.title', 'Título') ?></th>
                    <th><?php echo $this->Paginator->sort('Books.availiable', 'Cópias Disponíveis') ?></th>
                    <th class="actions"><?php echo __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $this->Number->format($book->id) ?></td>
                    <td><?php echo h($book->title) ?></td>
                    <td><?php echo $this->Number->format($book->availiable) ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Ver'), ['action' => 'view', $book->id]) ?>
                        <?php echo $this->Html->link(__('Editar'), ['action' => 'edit', $book->id]) ?>
                        <?php echo $this->Form->postLink(__('Deletar'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
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
        <p><?php echo $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
