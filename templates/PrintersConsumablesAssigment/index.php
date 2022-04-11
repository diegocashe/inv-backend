<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrintersConsumablesAssigment[]|\Cake\Collection\CollectionInterface $printersConsumablesAssigment
 */
?>
<div class="printersConsumablesAssigment index content">
    <?= $this->Html->link(__('New Printers Consumables Assigment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Printers Consumables Assigment') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('consumable_assigned_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($printersConsumablesAssigment as $printersConsumablesAssigment): ?>
                <tr>
                    <td><?= $this->Number->format($printersConsumablesAssigment->id) ?></td>
                    <td><?= $this->Number->format($printersConsumablesAssigment->item_id) ?></td>
                    <td><?= $printersConsumablesAssigment->has('item') ? $this->Html->link($printersConsumablesAssigment->item->id, ['controller' => 'Items', 'action' => 'view', $printersConsumablesAssigment->item->id]) : '' ?></td>
                    <td><?= h($printersConsumablesAssigment->created) ?></td>
                    <td><?= h($printersConsumablesAssigment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $printersConsumablesAssigment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $printersConsumablesAssigment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $printersConsumablesAssigment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printersConsumablesAssigment->id)]) ?>
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
