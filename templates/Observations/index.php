<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Observation[]|\Cake\Collection\CollectionInterface $observations
 */
?>
<div class="observations index content">
    <?= $this->Html->link(__('New Observation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Observations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('allocation_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($observations as $observation): ?>
                <tr>
                    <td><?= $this->Number->format($observation->id) ?></td>
                    <td><?= $observation->has('allocation') ? $this->Html->link($observation->allocation->id, ['controller' => 'Allocations', 'action' => 'view', $observation->allocation->id]) : '' ?></td>
                    <td><?= h($observation->created) ?></td>
                    <td><?= h($observation->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $observation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $observation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $observation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observation->id)]) ?>
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
