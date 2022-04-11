<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyType[]|\Cake\Collection\CollectionInterface $telephonyTypes
 */
?>
<div class="telephonyTypes index content">
    <?= $this->Html->link(__('New Telephony Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Telephony Types') ?></h3>
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
                <?php foreach ($telephonyTypes as $telephonyType): ?>
                <tr>
                    <td><?= $this->Number->format($telephonyType->id) ?></td>
                    <td><?= h($telephonyType->name) ?></td>
                    <td><?= h($telephonyType->created) ?></td>
                    <td><?= h($telephonyType->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $telephonyType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telephonyType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telephonyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephonyType->id)]) ?>
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
