<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableModel $consumableModel
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Consumable Model'), ['action' => 'edit', $consumableModel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Consumable Model'), ['action' => 'delete', $consumableModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableModel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Consumable Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Consumable Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="consumableModels view content">
            <h3><?= h($consumableModel->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $consumableModel->has('model') ? $this->Html->link($consumableModel->model->id, ['controller' => 'Models', 'action' => 'view', $consumableModel->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($consumableModel->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consumable Color') ?></th>
                    <td><?= $consumableModel->has('consumable_color') ? $this->Html->link($consumableModel->consumable_color->id, ['controller' => 'ConsumableColors', 'action' => 'view', $consumableModel->consumable_color->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Consumable Type') ?></th>
                    <td><?= $consumableModel->has('consumable_type') ? $this->Html->link($consumableModel->consumable_type->name, ['controller' => 'ConsumableTypes', 'action' => 'view', $consumableModel->consumable_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($consumableModel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($consumableModel->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($consumableModel->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
