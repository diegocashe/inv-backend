<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConsumableModel[]|\Cake\Collection\CollectionInterface $consumableModels
 */
?>
<div class="consumableModels index content">
    <?= $this->Html->link(__('New Consumable Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Consumable Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('consumable_color_id') ?></th>
                    <th><?= $this->Paginator->sort('consumable_type_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consumableModels as $consumableModel): ?>
                <tr>
                    <td><?= $this->Number->format($consumableModel->id) ?></td>
                    <td><?= $consumableModel->has('model') ? $this->Html->link($consumableModel->model->id, ['controller' => 'Models', 'action' => 'view', $consumableModel->model->id]) : '' ?></td>
                    <td><?= h($consumableModel->code) ?></td>
                    <td><?= $consumableModel->has('consumable_color') ? $this->Html->link($consumableModel->consumable_color->id, ['controller' => 'ConsumableColors', 'action' => 'view', $consumableModel->consumable_color->id]) : '' ?></td>
                    <td><?= $consumableModel->has('consumable_type') ? $this->Html->link($consumableModel->consumable_type->name, ['controller' => 'ConsumableTypes', 'action' => 'view', $consumableModel->consumable_type->id]) : '' ?></td>
                    <td><?= h($consumableModel->created) ?></td>
                    <td><?= h($consumableModel->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $consumableModel->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $consumableModel->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $consumableModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consumableModel->id)]) ?>
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
