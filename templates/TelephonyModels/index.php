<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TelephonyModel[]|\Cake\Collection\CollectionInterface $telephonyModels
 */
?>
<div class="telephonyModels index content">
    <?= $this->Html->link(__('New Telephony Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Telephony Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('telephony_type_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($telephonyModels as $telephonyModel): ?>
                <tr>
                    <td><?= $this->Number->format($telephonyModel->id) ?></td>
                    <td><?= $telephonyModel->has('model') ? $this->Html->link($telephonyModel->model->id, ['controller' => 'Models', 'action' => 'view', $telephonyModel->model->id]) : '' ?></td>
                    <td><?= $telephonyModel->has('telephony_type') ? $this->Html->link($telephonyModel->telephony_type->name, ['controller' => 'TelephonyTypes', 'action' => 'view', $telephonyModel->telephony_type->id]) : '' ?></td>
                    <td><?= h($telephonyModel->created) ?></td>
                    <td><?= h($telephonyModel->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $telephonyModel->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telephonyModel->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telephonyModel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telephonyModel->id)]) ?>
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
