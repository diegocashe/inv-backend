<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RadioType[]|\Cake\Collection\CollectionInterface $radioTypes
 */
?>
<div class="radioTypes index content">
    <?= $this->Html->link(__('New Radio Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Radio Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($radioTypes as $radioType): ?>
                <tr>
                    <td><?= $this->Number->format($radioType->id) ?></td>
                    <td><?= h($radioType->name) ?></td>
                    <td><?= h($radioType->created) ?></td>
                    <td><?= h($radioType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $radioType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $radioType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $radioType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $radioType->id)]) ?>
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
