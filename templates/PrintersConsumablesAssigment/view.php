<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PrintersConsumablesAssigment $printersConsumablesAssigment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Printers Consumables Assigment'), ['action' => 'edit', $printersConsumablesAssigment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Printers Consumables Assigment'), ['action' => 'delete', $printersConsumablesAssigment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $printersConsumablesAssigment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Printers Consumables Assigment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Printers Consumables Assigment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="printersConsumablesAssigment view content">
            <h3><?= h($printersConsumablesAssigment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $printersConsumablesAssigment->has('item') ? $this->Html->link($printersConsumablesAssigment->item->id, ['controller' => 'Items', 'action' => 'view', $printersConsumablesAssigment->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($printersConsumablesAssigment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Id') ?></th>
                    <td><?= $this->Number->format($printersConsumablesAssigment->item_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($printersConsumablesAssigment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($printersConsumablesAssigment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
