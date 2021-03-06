<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtraRow[]|\Cake\Collection\CollectionInterface $extraRows
 */
?>
<div class="extraRows index content">
    <?= $this->Html->link(__('New Extra Row'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Extra Rows') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extraRows as $extraRow): ?>
                <tr>
                    <td><?= $this->Number->format($extraRow->id) ?></td>
                    <td><?= h($extraRow->name) ?></td>
                    <td><?= $extraRow->has('item') ? $this->Html->link($extraRow->item->id, ['controller' => 'Items', 'action' => 'view', $extraRow->item->id]) : '' ?></td>
                    <td><?= h($extraRow->created) ?></td>
                    <td><?= h($extraRow->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $extraRow->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $extraRow->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $extraRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extraRow->id)]) ?>
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
