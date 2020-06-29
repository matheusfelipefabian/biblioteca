<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?php echo __('Actions') ?></h4>
            <?php echo $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?php echo $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?php echo $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?php echo $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?php echo h($customer->name) ?></h3>
            <table>
                <tr>
                    <th><?php echo __('Name') ?></th>
                    <td><?php echo h($customer->name) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Id') ?></th>
                    <td><?php echo $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('CPF') ?></th>
                    <td><?php echo h($customer->cpf) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Born') ?></th>
                    <td><?php echo h($customer->nascimento) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('E-mail') ?></th>
                    <td><?php echo h($customer->email) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Phone') ?></th>
                    <td><?php echo h($customer->telefone) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?php echo __('Related Loans') ?></h4>
                <?php if (!empty($customer->loans)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?php echo __('Id') ?></th>
                            <th><?php echo __('Customer Id') ?></th>
                            <th><?php echo __('Date') ?></th>
                            <th><?php echo __('Prazo') ?></th>
                            <th><?php echo __('Book Id') ?></th>
                            <th class="actions"><?php echo __('Actions') ?></th>
                        </tr>
                        <?php foreach ($customer->loans as $loans) : ?>
                        <tr>
                            <td><?php echo h($loans->id) ?></td>
                            <td><?php echo h($loans->customer_id) ?></td>
                            <td><?php echo h($loans->date->format('d/m/Y')) ?></td>
                            <td><?php echo h($loans->prazo->format('d/m/Y')) ?></td>
                            <td><?php echo h($loans->book_id) ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>
                                <?php echo $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>
                                <?php echo $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>
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
