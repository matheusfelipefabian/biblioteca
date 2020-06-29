<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publisher $publisher
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?php echo __('Actions') ?></h4>
            <?php echo $this->Html->link(__('Edit Publisher'), ['action' => 'edit', $publisher->id], ['class' => 'side-nav-item']) ?>
            <?php echo $this->Form->postLink(__('Delete Publisher'), ['action' => 'delete', $publisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id), 'class' => 'side-nav-item']) ?>
            <?php echo $this->Html->link(__('List Publishers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php echo $this->Html->link(__('New Publisher'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="publishers view content">
            <h3><?php echo h($publisher->id) ?></h3>
            <table>
                <tr>
                    <th><?php echo __('Name') ?></th>
                    <td><?php echo h($publisher->name) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Id') ?></th>
                    <td><?php echo $this->Number->format($publisher->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
