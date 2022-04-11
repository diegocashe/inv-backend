<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Telephony[]|\Cake\Collection\CollectionInterface $telephony
 */
?>
<div class="telephony index content">
    <?= $this->Html->link(__('New Telephony'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Telephony') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('imei') ?></th>
                    <th><?= $this->Paginator->sort('imei2') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('phone_line_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($telephony as $telephony): ?>
                <tr>
                    <td><?= $this->Number->format($telephony->id) ?></td>
                    <td><?= h($telephony->imei) ?></td>
                    <td><?= h($telephony->imei2) ?></td>
                    <td><?= $telephony->has('item') ? $this->Html->link($telephony->item->id, ['controller' => 'Items', 'action' => 'view', $telephony->item->id]) : '' ?></td>
                    <td><?= $telephony->has('phone_line') ? $this->Html->link($telephony->phone_line->id, ['controller' => 'PhoneLines', 'action' => 'view', $telephony->phone_line->id]) : '' ?></td>
                    <td><?= h($telephony->created) ?></td>
                    <td><?= h($telephony->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $telephony->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telephony->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telephony->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephony->id)]) ?>
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
