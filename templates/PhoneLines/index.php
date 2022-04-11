<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhoneLine[]|\Cake\Collection\CollectionInterface $phoneLines
 */
?>
<div class="phoneLines index content">
    <?= $this->Html->link(__('New Phone Line'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Phone Lines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('imsi') ?></th>
                    <th><?= $this->Paginator->sort('sim_card') ?></th>
                    <th><?= $this->Paginator->sort('operator_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($phoneLines as $phoneLine): ?>
                <tr>
                    <td><?= $this->Number->format($phoneLine->id) ?></td>
                    <td><?= h($phoneLine->number) ?></td>
                    <td><?= h($phoneLine->imsi) ?></td>
                    <td><?= h($phoneLine->sim_card) ?></td>
                    <td><?= $phoneLine->has('operator') ? $this->Html->link($phoneLine->operator->name, ['controller' => 'Operators', 'action' => 'view', $phoneLine->operator->id]) : '' ?></td>
                    <td><?= $phoneLine->has('item') ? $this->Html->link($phoneLine->item->id, ['controller' => 'Items', 'action' => 'view', $phoneLine->item->id]) : '' ?></td>
                    <td><?= h($phoneLine->created) ?></td>
                    <td><?= h($phoneLine->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $phoneLine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phoneLine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phoneLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phoneLine->id)]) ?>
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
