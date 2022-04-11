<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model[]|\Cake\Collection\CollectionInterface $models
 */
?>
<div class="models index content">
    <?= $this->Html->link(__('New Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('brand_id') ?></th>
                    <th><?= $this->Paginator->sort('item_type_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                <tr>
                    <td><?= $this->Number->format($model->id) ?></td>
                    <td><?= h($model->code) ?></td>
                    <td><?= $model->has('brand') ? $this->Html->link($model->brand->name, ['controller' => 'Brands', 'action' => 'view', $model->brand->id]) : '' ?></td>
                    <td><?= $model->has('item_type') ? $this->Html->link($model->item_type->name, ['controller' => 'ItemTypes', 'action' => 'view', $model->item_type->id]) : '' ?></td>
                    <td><?= h($model->created) ?></td>
                    <td><?= h($model->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $model->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $model->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id)]) ?>
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
