<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation[]|\Cake\Collection\CollectionInterface $allocations
 */
?>
<div class="allocations index content">
    <?= $this->Html->link(__('New Allocation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Allocations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('assigment_date') ?></th>
                    <th><?= $this->Paginator->sort('dispatch_date') ?></th>
                    <th><?= $this->Paginator->sort('ubication') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('assigned_people_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('assignor_user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allocations as $allocation): ?>
                <tr>
                    <td><?= $this->Number->format($allocation->id) ?></td>
                    <td><?= h($allocation->assigment_date) ?></td>
                    <td><?= h($allocation->dispatch_date) ?></td>
                    <td><?= h($allocation->ubication) ?></td>
                    <td><?= h($allocation->active) ?></td>
                    <td><?= $allocation->has('person') ? $this->Html->link($allocation->person->id, ['controller' => 'People', 'action' => 'view', $allocation->person->id]) : '' ?></td>
                    <td><?= $allocation->has('item') ? $this->Html->link($allocation->item->id, ['controller' => 'Items', 'action' => 'view', $allocation->item->id]) : '' ?></td>
                    <td><?= $allocation->has('user') ? $this->Html->link($allocation->user->id, ['controller' => 'Users', 'action' => 'view', $allocation->user->id]) : '' ?></td>
                    <td><?= h($allocation->created) ?></td>
                    <td><?= h($allocation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $allocation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $allocation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $allocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id)]) ?>
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
